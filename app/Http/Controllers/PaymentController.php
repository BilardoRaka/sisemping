<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentLog;
use App\Models\Province;
use App\Models\Renter;
use App\Models\RenterEquipment;
use Illuminate\Http\Request;
use iPaymu\iPaymu;

class PaymentController extends Controller
{
    public function getPayment($id)
    {

        $renter = Renter::where('id', $id)->with('user','city','renter_equipment')->first();
        $equipments = RenterEquipment::where('renter_id', $id)->with('equipment')->get();
        $provinces = Province::all();

        return view('customer.payment',compact('renter','provinces','equipments'));

    }

    public function postPayment(Request $request)
    {
        $renter_id = $request->renter_id;
        $date = $request->date;
        $qty = $request->qty;
        $price = $request->price;
        $equipment = $request->equipment;
        $reference_id = 'INV-'.time();
        $payment_channel = $request->payment_channel;
        $total = 0;
 
        for ($i=0; $i < count($equipment) ; $i++) {
            $saveEquip = array(
                'name' => $equipment[$i],
                'price' => $price[$i],
                'qty' => $qty[$i],
            );
            $saveJson[] = $saveEquip;
            $total += $price[$i]*$qty[$i];
        }

        $order = Order::create([
            'renter_id' => $renter_id,
            'customer_id' => auth()->user()->customer->id,
            'equipment' => json_encode($saveJson),
            'total' => $total,
            'date' => $date
        ]);

        $apiKey = 'SANDBOX18881EAC-FA74-4E12-9398-CFB59AD31509'; // your api key
        $va = '0000002124563699'; // your va
        $production = false; // set false to sandbox mode

        $iPaymu = new iPaymu($apiKey, $va, $production);

        // set callback url
        $iPaymu->setURL([
            'ureturn' => 'https://your-website/thankyou_page',
            'unotify' => 'https://your-website/notify_page',
            'ucancel' => 'https://your-website/cancel_page',
        ]);

        // set buyer name
        $iPaymu->setBuyer([
            'name' => 'Bagus',
            'phone' => '08123123139',
            'email' => 'bagus@gmail.com',
        ]);

        // set your reference id (optional)
        $iPaymu->setReferenceId($reference_id);

        // set your expiredPayment
        $iPaymu->setExpired(24, 'hours'); // 24 hours

        // set payment method
        // check https://ipaymu.com/api-collection for list payment method
        $iPaymu->setPaymentMethod('va');

        // check https://ipaymu.com/api-collection for list payment channel
        $iPaymu->setPaymentChannel($payment_channel);

        $carts = [];
        $carts = $iPaymu->add(
            'id produk', // product id (string)
            'nama produk', // product name (string)
            $order->total, // price (float)
            1, // quantity (int)
            'deskripsi produk', // description
        );

        $iPaymu->addCart($carts);
        $encode_data = json_encode($iPaymu->directPayment());
        $decode_data = json_decode($encode_data);

        if($decode_data->Status != 200){
            return back()->with('failed', $decode_data->Message);            
        }

        PaymentLog::create([
            'order_id' => $order->id,
            'transaction_id' => $decode_data->Data->TransactionId,
            'reference_id' => $decode_data->Data->ReferenceId,
            'via' => $decode_data->Data->Via,
            'channel' => $decode_data->Data->Channel,
            'payment_no' => $decode_data->Data->PaymentNo,
            'payment_name' => $decode_data->Data->PaymentName,
            'subtotal' => $decode_data->Data->SubTotal,
            'fee' => $decode_data->Data->Fee,
            'total' => $decode_data->Data->Total,
            'fee_direction' => $decode_data->Data->FeeDirection,
            'log_json' => $encode_data,
            'expired_at' => $decode_data->Data->Expired
        ]);

        return to_route('payment.invoice', $reference_id)->with('success','Pembuatan invoice berhasil.');        

    }

    public function invoice($reference_id)
    {

        $payment = PaymentLog::where('reference_id', $reference_id)->first(); 
        $provinces = Province::all();

        $now = str_replace(['-',':',' '],'',date('Y-m-d H:i', strtotime(now('GMT+7'))));
        $expire = str_replace(['-',':',' '],'',date('Y-m-d H:i', strtotime($payment->expired_at)));

        if($expire < $now){
            return back()->with('failed', 'Payment kadaluarsa, silahkan membuat invoice baru.');
        }

        return view('customer.invoice',compact('payment','provinces'));

    }

    public function historyPayment()
    {
        $orders = Order::with('renter','payment_log')->where('customer_id',auth()->user()->customer->id)->latest()->get();
        $provinces = Province::all();
        
        return view('customer.history',compact('orders','provinces'));
    }
}

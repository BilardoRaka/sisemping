<!DOCTYPE html>
<html lang='zxx' class='js'>

    <head>
        <meta charset='utf-8'>
        <meta name='author' content='Sisemping'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <meta name='description' content='Simahanku'>
        <!-- Fav Icon  -->
        <link rel='shortcut icon' href='{{ asset('images/sisemping.png') }}'>
        <!-- Page Title  -->
        <title>Sisemping | Data Pembayaran</title>
        <!-- StyleSheets  -->
        <link rel='stylesheet' href='{{ asset('assets/css/dashlite.css?ver=3.1.0') }}'>
        <link id='skin-default' rel='stylesheet' href='{{ asset('assets/css/theme.css?ver=3.1.0') }}'>
        <style>
            td {
                vertical-align: middle,
            }
        </style>
    </head>
    <body>
    @include('layout.header-index')

    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body p-3">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">List Data Pembayaran Customer</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive col-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center">No.</th>
                                    <th style="text-align: center">Renter</th>
                                    <th style="text-align: center">Peralatan</th>
                                    <th style="text-align: center">Lihat Invoice</th>
                                    <th style="text-align: center">Total Harga</th>
                                    <th style="text-align: center">Waktu</th>
                                    <th style="text-align: center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->renter->name }}</td>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#modalDetail-{{ $order->id }}" data-bs-placement="top" class="btn btn-dim btn-outline-primary">Lihat Peralatan</a></td>
                                    <td><a href="{{ route('payment.invoice',$order->payment_log->reference_id) }}" class="btn btn-dim btn-outline-primary">Invoice</a></td>
                                    <td>Rp. {{ number_format($order->total,0,",",".") }}</td>
                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td>{{ ucwords($order->status) }}</td>
                                </tr>
                                <div class="modal fade zoom" tabindex="-1" id="modalDetail-{{ $order->id }}">
                                    <div class="modal-lg modal-dialog modal-dialog-top" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Peralatan Kemah yg Disewa</h5>
                                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <em class="icon ni ni-cross"></em>
                                                </a>
                                            </div>
                                            <div class="modal-body">
                                                @foreach(json_decode($order->equipment) as $equipment)
                                                <p>
                                                    {{ $equipment->qty }} Buah {{ $equipment->name }} <br>
                                                    Total: Rp. {{ number_format($equipment->price*$equipment->qty,0,",",".") }}
                                                </p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layout.footer-index')
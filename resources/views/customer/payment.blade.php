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
        <title>Sisemping | Pemesanan</title>
        <!-- StyleSheets  -->
        <link rel='stylesheet' href='{{ asset('assets/css/dashlite.css?ver=3.1.0') }}'>
        <link id='skin-default' rel='stylesheet' href='{{ asset('assets/css/theme.css?ver=3.1.0') }}'>
        <!-- tinyMCE -->
        <script src='{!! url('assets/js/tinymce/tinymce.min.js') !!}'></script>
        @yield('style')
        <style>
            td {
                vertical-align: middle;
            }
        </style>
    </head>

    <body>
    @include('layout.header-index')
    <div class='container p-3'>
        <h3>Sewa Peralatan Camping</h3>
        <form action="{{ route('payment.post',$renter->id) }}" method="post">
        @csrf
        <input type="hidden" name="renter_id" value="{{ $renter->id }}">
            <div class="row mt-3">
                <div class="form-group col-4">
                    <div class="form-control-wrap">
                        <input type="text" class="form-control form-control-lg form-control-outlined" value="{{ $renter->name }}" readonly>
                        <label class="form-label-outlined" for="title">Nama Renter</label>
                    </div>
                </div>
                <div class="form-group col-4">
                    <div class="form-control-wrap">
                        <input type="text" class="form-control form-control-lg form-control-outlined date-picker" name="date" autocomplete="off">
                        <label class="form-label-outlined" for="date">Tanggal Pemesanan</label>
                    </div>
                </div>
                <div class="form-group col-4">
                    <div class="form-control-wrap">
                        <select name="payment_channel" id="payment_channel" class="form-select js-select2 @error('payment_channel') is-invalid @enderror" data-ui="lg">
                            <option value="bca">Bank Central Asia</option>
                            <option value="bni">Bank Negara Indonesia</option>
                            <option value="bri">Bank Rakyat Indonesia</option>
                            <option value="bsi">Bank Syariah Indonesia</option>
                            <option value="bmi">Bank Muamalat Indonesia</option>
                            <option value="cimb">Bank CIMB Niaga</option>
                        </select>
                        <label class="form-label-outlined" for="company">Bank Pembayaran</label>
                    </div>
                </div>
            </div>
            <label for="" class="form-label">Peralatan yang akan disewa</label>
            <div class='row col-6'>
                <table class='table table-striped'>
                    <thead>
                        <tr class='nk-tb-item nk-tb-head'>
                            <th class='nk-tb-col text-center'><span class='sub-text'>No.</span></th>
                            <th class='nk-tb-col text-center'><span class='sub-text'>Nama Peralatan</span></th>
                            <th class='nk-tb-col text-center'><span class='sub-text'>Harga Satuan</span></th>
                            <th class='nk-tb-col text-center'><span class='sub-text'>Jumlah Disewakan</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($equipments as $equipment)
                        <tr class='nk-tb-item'>
                            <td align='center'>{{ $loop->iteration }}</td>
                            <td>{{ $equipment->equipment->name }}</td>
                            <td>Rp. {{ number_format($equipment->price,0,",",".") }}</td>
                            <td>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="input-group">
                                            <input type="number" class="form-control form-control-lg" placeholder="Jumlah" onkeydown="validateNumber()" name="qty[]" max="{{ $equipment->qty }}" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <input type="hidden" name="equipment[]" value={{ $equipment->equipment->name }}>
                            <input type="hidden" name="price[]" value={{ $equipment->price }}>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-dim btn-outline-primary">Pesan</button>
        </form>
    </div>
    @include('layout.footer-index')
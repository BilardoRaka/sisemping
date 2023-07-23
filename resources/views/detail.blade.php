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
        <title>Sisemping | Index</title>
        <!-- StyleSheets  -->
        <link rel='stylesheet' href='{{ asset('assets/css/dashlite.css?ver=3.1.0') }}'>
        <link id='skin-default' rel='stylesheet' href='{{ asset('assets/css/theme.css?ver=3.1.0') }}'>
        <!-- tinyMCE -->
        <script src='{!! url('assets/js/tinymce/tinymce.min.js') !!}'></script>
        @yield('style')
    </head>

    <body>
        @include('layout.header-index')
        <div class='container p-3'>
            <h3>Informasi Detail Penyewa</h3>
            <p class='fs-6'>
                <span class='text-black'>
                    {{ $renter->name }}
                </span>
                <br>
                <span>
                    {{ $renter->city->province->name }}, {{ $renter->city->name }}
                    <br>
                    {{ $renter->address }}
                </span>
            </p>
            <p class='fs-6'>
                <span class='text-black'>
                    Kontak Penyewa:
                </span>
                <br>
                <span>
                    {{ $renter->phone }}
                    <br>
                    {{ $renter->user->email }}
                </span>
            </p>
            <label for='' class='form-label fs-6'>Peralatan Disewakan</label>
            <div class='row col-6'>
                <table class='table table-striped'>
                    <thead>
                        <tr class='nk-tb-item nk-tb-head'>
                            <th class='nk-tb-col text-center'><span class='sub-text'>No.</span></th>
                            <th class='nk-tb-col text-center'><span class='sub-text'>Nama Peralatan</span></th>
                            <th class='nk-tb-col text-center'><span class='sub-text'>Jumlah</span></th>
                            <th class='nk-tb-col text-center'><span class='sub-text'>Harga</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($equipments as $equipment)
                        <tr class='nk-tb-item'>
                            <td align='center'>{{ $loop->iteration }}</td>
                            <td>{{ $equipment->equipment->name }}</td>
                            <td align='right'>{{ $equipment->qty }} buah</td>
                            <td align='right'>Rp. {{ number_format($equipment->price,0,',','.') }}</td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
            <a href="{{ route('dashboard.index') }}" class='btn btn-dim btn-outline-danger'>Kembali</a>
        </div>

        @include('layout.footer-index')
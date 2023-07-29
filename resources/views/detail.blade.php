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
        <title>Sisemping | Detail Penyewa</title>
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
                <span class="project-detail">
                    {{ $renter->city->province->name }}, {{ $renter->city->name }}
                </span>
            </p>
            <p class='fs-6'>
                <span class='project-detail'>
                    Alamat Lengkap Penyewa
                </span>
                <span class='sub-text'>
                    {{ $renter->address }}
                </span>
            </p>
            <p class='fs-6'>
                <span class='project-detail'>
                    Deskripsi Penyewa
                </span>
                <span class='sub-text'>
                    {{ $renter->description }}
                </span>
            </p>
            <p class='fs-6'>
                <span class='project-detail'>
                    Kontak Penyewa
                </span>
                <span class="sub-text">
                    <a href="https://wa.me/{{ $renter->phone }}?text=Halo,%20saya%20tertarik%20untuk%20menyewa%20peralatan%20camping%20yang%20anda%20tawarkan%20di%20Sisemping." target="_blank">
                        <em class="icon ni ni-whatsapp"></em> +{{ $renter->phone }}
                    </a>
                    <br>
                    {{ $renter->user->email }}
                </span>
            </p>
            <label for='' class='project-detail fs-6'>Peralatan Disewakan</label>
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
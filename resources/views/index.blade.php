<!DOCTYPE html>
<html lang="zxx" class="js">

    <head>
        <meta charset="utf-8">
        <meta name="author" content="Sisemping">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Simahanku">
        <!-- Fav Icon  -->
        <link rel="shortcut icon" href="{{ asset('images/sisemping.png') }}">
        <!-- Page Title  -->
        <title>Sisemping | Index</title>
        <!-- StyleSheets  -->
        <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.1.0') }}">
        <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.1.0') }}">
        <!-- tinyMCE -->
        <script src="{!! url('assets/js/tinymce/tinymce.min.js') !!}"></script>
        @yield('style')
    </head>

    <body>
        @include('layout.header-index')
        <div class="p-3">
            @if(session()->has('failed'))
                <div class="alert alert-danger alert-icon">
                    <em class="icon ni ni-cross-circle"></em> {{ session('failed') }}
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success alert-icon">
                    <em class="icon ni ni-check-circle"></em> {{ session('success') }}
                </div>
            @endif
        </div>
        @if($renters->count() != null)
        <div class="nk-block p-3">
            <div class="row g-gs">
                @foreach($renters as $renter)
                <div class="col-sm-12 col-lg-6 col-xxl-4">
                    <div class="card card-bordered h-100">
                        <div class="card-inner">
                            <div class="project">
                                <div class="project-head">
                                    <a href="{{ route('dashboard.detail', $renter->id) }}" class="project-title">
                                        <div class="user-avatar sq bg-purple">
                                            @if($renter->logo == null)
                                            <span>
                                                {{ substr($renter->name,0,2) }}
                                            </span>
                                            @else
                                                <img src="{{ asset('/storage/'.$renter->logo) }}" alt="{{ $renter->name }}">
                                            @endif
                                        </div>
                                        <div class="project-info">
                                            <h6 class="title">{{ $renter->name }}</h6>
                                            <span class="sub-text">{{ $renter->city->name }}</span>
                                        </div>
                                    </a>
                                </div>
                                Alamat Lengkap
                                <span class="sub-text">
                                    @php 
                                        ((strlen($renter->address)) >= 50) ? $short_address = (substr($renter->address,0,50)).'...' : $short_address = $renter->address;
                                    @endphp
                                    {{ $short_address }}
                                </span>
                                <hr>
                                <div class="project-details">
                                    <p>
                                        Kontak Penyewa
                                        <span class="sub-text">
                                            <a href="mailto:{{ $renter->user->email }}"><em class="icon ni ni-mail"></em> {{ $renter->user->email }}</a> 
                                            <br>
                                            <a href="https://wa.me/{{ $renter->phone }}?text=Halo,%20saya%20tertarik%20untuk%20menyewa%20peralatan%20camping%20yang%20anda%20tawarkan%20di%20Sisemping." target="_blank">
                                                <em class="icon ni ni-whatsapp"></em> +{{ $renter->phone }}
                                            </a>
                                        </span>
                                    </p>
                                    <p>
                                        @php    
                                        ((strlen($renter->description)) >= 200) ? $short_desc = (substr($renter->description,0,200)).'...' : $short_desc = $renter->description; 
                                        @endphp
                                        {{ $short_desc }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <h4 class='text-center mt-5'>
            <img src="{{ asset('images/user-not-found.jpg') }}" height="400" alt="logo">
            <br>
            Tidak ada penyewa di kabupaten / kota yg dipilih.
        </h4>
        @endif
        
        <div class='d-flex justify-content-center'>
            {{ $renters->links() }}
        </div>

        @include('layout.footer-index')

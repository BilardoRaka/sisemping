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
                                            <span>
                                                {{ substr($renter->name,0,2) }}
                                            </span>
                                        </div>
                                        <div class="project-info">
                                            <h6 class="title">{{ $renter->name }}</h6>
                                            <span class="sub-text">{{ $renter->city->name }}</span>
                                        </div>
                                    </a>
                                </div>
                                <hr>
                                <div class="project-details">
                                    <p>
                                        Kontak Penyewa: <br>
                                        <span class="sub-text">
                                            {{ $renter->user->email }} <br>
                                            {{ $renter->phone }}
                                        </span>
                                    </p>
                                    <p>
                                        {{ $renter->description }}
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

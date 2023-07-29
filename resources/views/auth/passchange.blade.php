<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('/images/sisemping.png') }}">
    <!-- Page Title  -->
    <title>Sisemping | Change Password</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.1.0">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.1.0">
</head>

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-light p-3">
        <a class="navbar-brand" href="/">
            <img src="{{url('/images/sisemping.png')}}" height="40" class="d-inline-block align-top" alt="">
        </a>
        <ul class="navbar-nav ms-auto">
            @guest
            <li class="nav-item">
                <a href="{{ route('login') }}" class="btn btn-dim nav-link btn-outline-primary">Login</a>
            </li>
            @endguest
            @auth
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="user-toggle">
                        <div class="user-avatar sm">
                            <span>
                                @if(auth()->user()->role == 'renter')
                                {{ substr(auth()->user()->renter?->name,0,2) }}
                                @else
                                Ad
                                @endif
                            </span>
                        </div>
                        <div class="user-info d-none d-md-block">
                            <div class="user-status">{{ ucfirst(auth()->user()->role) }}</div>
                            <div class="user-name dropdown-indicator">
                                @if(auth()->user()->role == 'renter')
                                {{ auth()->user()->renter?->name }}
                                @else
                                Administrator
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                    <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                        <div class="user-card">
                            <div class="user-avatar">
                                <span>
                                    @if(auth()->user()->role == 'renter')
                                    {{ substr(auth()->user()->renter?->name,0,2) }}
                                    @else
                                    Ad
                                    @endif
                                </span>
                            </div>
                            <div class="user-info">
                                <span class="lead-text">
                                    @if(auth()->user()->role == 'renter')
                                    {{ auth()->user()->renter?->name }}
                                    @else
                                    Administrator
                                    @endif
                                </span>
                                <span class="sub-text">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-inner">
                        <ul class="link-list">
                            @if(auth()->user()->role == 'renter')
                            <li>
                                <a href="{{ route('profile.index') }}"><em class="icon ni ni-account-setting"></em><span>Edit Profile</span></a>
                            </li>
                            <li>
                                <a href="{{ route('equipment.index') }}"><em class="icon ni ni-aperture"></em><span>Manage Equipment</span></a>
                            </li>
                            @endif
                            @if(auth()->user()->role == 'admin')
                            <li>
                                <a href="{{ route('profile.renter.index') }}"><em class="icon ni ni-user-remove"></em><span>Data Renter</span></a>
                                <a href="{{ route('master.equipment.index') }}"><em class="icon ni ni-monitor"></em><span>Master Equipment</span></a>
                            </li>
                            @endif
                            <li>
                                <a href="{{ route('passchange') }}"><em class="icon ni ni-lock-alt"></em><span>Change Password</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown-inner">
                        <ul class="link-list">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="border-0 bg-white"><em class="icon ni ni-signout"></em><span>Logout</span></button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            @endauth
        </ul>
    </nav>
</header>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content">
                    <div class="container mt-3">
                        <div class="nk-block">
                            <div class="card card-bordered card-stretch">
                                <div class="card-inner-group">
                                    <div class="card-inner p-3">
                                        <h6>Change Password</h6>
                                        <hr>
                                        <div class="p-3">
                                        @if(session()->has('failed'))
                                            <div class="alert alert-danger alert-icon">
                                                <em class="icon ni ni-cross-circle"></em> {{ session('failed') }}
                                            </div>
                                        @endif
                                        </div>
                                        <form action="{{ route('passchange.attempt') }}" method="POST">
                                        @csrf
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <div class="form-control-wrap">
                                                        <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="oldPassword">
                                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                        </a>
                                                        <input type="password" class="form-control form-control-lg form-control-outlined @error('oldPassword') is-invalid @enderror" id="oldPassword" name="oldPassword">
                                                        <label class="form-label-outlined" for="oldPassword">Password Lama</label>
                                                        @error('oldPassword')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group col-12">
                                                    <div class="form-control-wrap">
                                                        <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="newPassword">
                                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                        </a>
                                                        <input type="password" class="form-control form-control-lg form-control-outlined @error('newPassword') is-invalid @enderror" id="newPassword" name="newPassword">
                                                        <label class="form-label-outlined" for="newPassword">Password Baru</label>
                                                        @error('newPassword')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-dim btn-outline-primary">Perbarui</button>
                                                    <a href="{{ route('dashboard.index') }}" class="btn btn-dim btn-outline-danger">Kembali</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=3.1.0"></script>
    <script src="./assets/js/scripts.js?ver=3.1.0"></script>

</html>
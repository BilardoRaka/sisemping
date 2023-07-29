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
    <title>Sisemping | Create Master Equipment</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="../assets/css/dashlite.css?ver=3.1.0">
    <link id="skin-default" rel="stylesheet" href="../assets/css/theme.css?ver=3.1.0">
</head>

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-light p-3">
        <a class="navbar-brand" href="/">
            <img src="{{url('/images/sisemping.png')}}" height="40" class="d-inline-block align-top" alt="">
        </a>
        <ul class="navbar-nav ms-auto">
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="user-toggle">
                        <div class="user-avatar sm">
                            <span>
                                Ad
                            </span>
                        </div>
                        <div class="user-info d-none d-md-block">
                            <div class="user-status">{{ ucfirst(auth()->user()->role) }}</div>
                            <div class="user-name dropdown-indicator">
                                Administrator
                            </div>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                    <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                        <div class="user-card">
                            <div class="user-avatar">
                                <span>
                                    Ad
                                </span>
                            </div>
                            <div class="user-info">
                                <span class="lead-text">
                                    Administrator
                                </span>
                                <span class="sub-text">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-inner">
                        <ul class="link-list">
                            <li>
                                <a href="{{ route('profile.renter.index') }}"><em class="icon ni ni-user-remove"></em><span>Data Renter</span></a>
                                <a href="{{ route('master.equipment.index') }}"><em class="icon ni ni-monitor"></em><span>Master Equipment</span></a>
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
                                        <h6>Create New Master Equipment</h6>
                                        <hr>
                                        <div class="p-3">
                                        @if(session()->has('failed'))
                                            <div class="alert alert-danger alert-icon">
                                                <em class="icon ni ni-cross-circle"></em> {{ session('failed') }}
                                            </div>
                                        @endif
                                        </div>
                                        <form action="{{ route('master.equipment.store') }}" method="POST">
                                        @csrf
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-lg form-control-outlined @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                                        <label class="form-label-outlined" for="title">Nama Peralatan</label>
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label class="form-label" for="description">Deskripsi Peralatan</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                                                        @error('description')
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
    <script src="../assets/js/bundle.js?ver=3.1.0"></script>
    <script src="../assets/js/scripts.js?ver=3.1.0"></script>

</html>
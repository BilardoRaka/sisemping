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
    <title>Sisemping | Edit Profile</title>
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
                                        <h6>Edit Profile Penyewa</h6>
                                        <hr>
                                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <div class="form-control-wrap">
                                                        <label class="form-label">Logo Usaha / Foto Penyewa (Maks. 1 mb)</label><br>
                                                        <img id="preview-image-before-upload" class="mb-3" style="max-height: 200px;" @if(auth()->user()->renter->logo != null) src="{{ asset('/storage/'.auth()->user()->renter?->logo) }}" @endif>
                                                        <div class="form-file">
                                                            <input type="file" class="form-file-input @error('logo') is-invalid @enderror" id="logo" name="logo">
                                                            <label class="form-file-label" for="logo">Pilih Gambar</label>
                                                            @error('logo')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-4">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-lg form-control-outlined @error('name') is-invalid @enderror" id="name" name="name" value="{{ auth()->user()->renter?->name }}">
                                                        <label class="form-label-outlined" for="title">Nama Penyewa</label>
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group col-4">
                                                    <div class="form-control-wrap">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="phone">+62</span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror" placeholder="Nomor Telepon" value="{{ auth()->user()->renter?->phone }}" onkeydown="validateNumber()" name="phone" required>
                                                            @error('phone')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-4">
                                                    <div class="form-control-wrap">
                                                        <select name="city_id" id="city_id" class="form-select js-select2 @error('city_id') is-invalid @enderror" data-ui="lg" data-search="on">
                                                            <option value=" " disabled selected>Kabupaten / Kota</option>
                                                            @foreach($cities as $city)
                                                            <option value="{{ $city->id }}" @if(auth()->user()->renter?->city_id == $city->id) selected @endif>{{ ucfirst($city->name) }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('city_id')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <label class="form-label-outlined" for="company">Lokasi Penyewa</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-label" for="description">Deskripsi Penyewa</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ auth()->user()->renter?->description }}</textarea>
                                                        @error('description')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-label" for="address">Alamat Lengkap Penyewa</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address">{{ auth()->user()->renter?->address }}</textarea>
                                                        @error('address')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-dim btn-outline-primary">Ubah</button>
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
    <script>
    $(document).ready(function (e) {
       $('#logo').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
          $('#preview-image-before-upload').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
       });
       
    });
    function validateNumber(evt) {
        var e = evt || window.event;
        var key = e.keyCode || e.which;

        if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
            // numbers   
            key >= 48 && key <= 57 ||
            // Numeric keypad
            key >= 96 && key <= 105 ||
            // Backspace and Tab and Enter
            key == 8 || key == 9 || key == 13 ||
            // Home and End
            key == 35 || key == 36 ||
            // left and right arrows
            key == 37 || key == 39 ||
            // Del and Ins
            key == 46 || key == 45) {
            // input is VALID
        } else {
            e.returnValue = false;
            if (e.preventDefault) e.preventDefault();
        }
    }
    </script>

</html>
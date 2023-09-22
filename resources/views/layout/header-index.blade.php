<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-light p-3">
        <a class="navbar-brand" href="/">
            <img src="{{url('/images/sisemping.png')}}" height="40" class="d-inline-block align-top" alt="">
        </a>
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item mr-3">
                        <form action="{{ route('dashboard.index') }}" method="GET" class="d-inline">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <select name="province_id" id="province_id" onchange="city(this.value)" class="form-select js-select2 @error('province_id') is-invalid @enderror" data-ui="md" data-search="on">
                                    <option value=" " disabled selected>
                                        Pilih Salah Satu Provinsi
                                    </option>
                                    @foreach($provinces as $province)
                                    <option value="{{ $province->id }}" @if(request('province_id') == $province->id) selected @endif>
                                        {{ $province->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('province_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label class="form-label-outlined" for="province_id">Provinsi</label>
                            </div>
                        </div>
                    </li>    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <select name="city_id" id="city_id" class="form-select js-select2 @error('city_id') is-invalid @enderror" data-ui="md" data-search="on">
                                    <option value=" " disabled selected>
                                        Pilih Salah Satu Kota
                                    </option>
                                    @if(request('city_id') or request('province_id'))
                                    @foreach($cities as $city)
                                    <option value="{{ $city->id }}" @if($city->id == request('city_id')) selected @endif>
                                        {{ $city->name }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('city_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label class="form-label-outlined" for="city_id">Kabupaten / Kota</label>
                            </div>
                        </div>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-control-outlined @error('name') is-invalid @enderror" id="name" name="name">
                                <label class="form-label-outlined" for="title">Nama Renter</label>
                            </div>
                        </div>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                    <li class="nav-item">
                        <button type="submit" class="btn btn-dim btn-outline-primary"><em class="icon ni ni-search"></em></button>
                    </li>    
                </form>
            </ul>
        </div>
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
                                @if(auth()->user()->role != 'admin')
                                {{ substr(auth()->user()->renter?->name,0,2) }}
                                {{ substr(auth()->user()->customer?->name,0,2) }}
                                @else
                                Ad
                                @endif
                            </span>
                        </div>
                        <div class="user-info d-none d-md-block">
                            <div class="user-status">{{ ucfirst(auth()->user()->role) }}</div>
                            <div class="user-name dropdown-indicator">
                                @if(auth()->user()->role != 'admin')
                                {{ auth()->user()->renter?->name }}
                                {{ auth()->user()->customer?->name }}
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
                                    @if(auth()->user()->role != 'admin')
                                    {{ substr(auth()->user()->renter?->name,0,2) }}
                                    {{ substr(auth()->user()->customer?->name,0,2) }}
                                    @else
                                    Ad
                                    @endif
                                </span>
                            </div>
                            <div class="user-info">
                                <span class="lead-text">
                                    @if(auth()->user()->role != 'admin')
                                    {{ auth()->user()->renter?->name }}
                                    {{ auth()->user()->customer?->name }}
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
                            @if(auth()->user()->role == 'customer')
                            <li>
                                <a href="{{ route('payment.history') }}"><em class="icon ni ni-cart"></em><span>Data Pembayaran</span></a>
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
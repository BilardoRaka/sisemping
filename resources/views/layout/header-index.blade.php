<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary p-3">
        <a class="navbar-brand" href="/">
            <img src="{{url('/images/sisemping.png')}}" height="40" class="d-inline-block align-top" alt="">
        </a>
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item mr-3">
                        <form action="{{ route('dashboard.index') }}" method="GET" class="d-inline">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <select name="province_id" id="province_id" onchange="city(this.value)" class="form-select js-select2 @error('province_id') is-invalid @enderror" data-ui="lg" data-search="on">
                                    <option value=" " disabled selected>
                                        Pilih Salah Satu Provinsi ...
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
                                <select name="city_id" id="city_id" class="form-select js-select2 @error('city_id') is-invalid @enderror" data-ui="lg" data-search="on">
                                    <option value=" " disabled selected>
                                        Pilih Salah Satu Kota ...
                                    </option>
                                    @if(request('city_id'))
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
                        <button type="submit" class="btn btn-dim btn-outline-primary"><em class="icon ni ni-search"></em></button>
                    </li>    
                </form>
            </ul>
        </div>
        <ul class="navbar-nav ms-auto">
            @guest
            <li class="nav-item">
                <button type="button" class="btn btn-dim nav-link btn-outline-primary">Login</button>
            </li>
            @endguest    
        </ul>
    </nav>
</header>
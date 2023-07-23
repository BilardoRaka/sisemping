<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary p-3">
        <a class="navbar-brand" href="/">
            <img src="{{url('/images/sisemping.png')}}" height="40" class="d-inline-block align-top" alt="">
        </a>
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <select name="province_id" id="province_id" class="form-select js-select2 @error('province_id') is-invalid @enderror" data-ui="lg" data-search="on">
                                @foreach($provinces as $province)
                                <option value="{{ $province->id }}">
                                    {{ $province->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('province_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="form-label-outlined" for="product_id">Provinsi</label>
                        </div>
                    </div>
                </li>    
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
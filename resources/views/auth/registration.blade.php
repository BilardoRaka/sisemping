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
    <title>Sisemping | Registration</title>
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
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-dim nav-link btn-outline-primary">Login</a>
                </li>
            </ul>
        </div>
    </nav>

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
                            <div class="form-group col-4">
                                <div class="form-control-wrap">
                                    <select name="role" id="role" class="form-select js-select2" data-ui="lg" onchange="roleForm(this.value)">
                                        <option value=" " disabled selected>Pilih Jenis Akun</option>
                                        <option value="renter">Renter</option>
                                        <option value="customer">Customer</option>
                                    </select>
                                    <label class="form-label-outlined" for="company">Jenis Akun</label>
                                </div>
                            </div>
                            <div class="card card-bordered card-stretch renter" hidden>
                                <div class="card-inner-group">
                                    <div class="card-inner p-3">
                                        <h6>Registrasi Penyedia Sewa Peralatan Camping</h6>
                                        <hr>
                                        <form action="{{ route('registration.attempt') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <div class="form-control-wrap">
                                                        <label class="form-label">Logo Usaha / Foto Penyewa (Maks. 1 mb)</label><br>
                                                        <img id="preview-image-before-upload" class="mb-3" style="max-height: 200px;">
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
                                                        <input type="text" class="form-control form-control-lg form-control-outlined @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
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
                                                            <input type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror" placeholder="Nomor Telepon" value="{{ old('phone') }}" onkeydown="validateNumber()" name="phone" required>
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
                                                            <option value="{{ $city->id }}" @if(old('city_id') == $city->id) selected @endif>{{ ucfirst($city->name) }}</option>
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
                                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
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
                                                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address">{{ old('address') }}</textarea>
                                                        @error('address')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-lg form-control-outlined @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                                        <label class="form-label-outlined" for="title">Email</label>
                                                        @error('email')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <div class="form-control-wrap">
                                                        <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                        </a>
                                                        <input type="password" class="form-control form-control-lg form-control-outlined @error('password') is-invalid @enderror" id="password" name="password">
                                                        <label class="form-label-outlined" for="password">Password</label>
                                                        @error('password')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                    <label class="form-label" for="table">Peralatan Camping yang Disewakan</label>
                                                    <div class="form-group col-12 child-repeater-table">
                                                        <table class="table table-bordered table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center; margin: auto;">Nama Peralatan</th>
                                                                    <th style="text-align:center; margin: auto;">Jumlah Dimiliki</th>
                                                                    <th style="text-align:center; margin: auto;">Harga Sewa / Hari</th>
                                                                    <th style="text-align:center; margin: auto;"><a href="javascript:void(0)" class="badge bg-success addRow">+</a></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <select name="equipment[]" class="form-select" required>
                                                                            <option value="">Pilih Peralatan</option>
                                                                            @foreach($equipments as $equipment)
                                                                            <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td><input type="text" name="qty[]" class="form-control" required onkeydown="validateNumber()"></td>
                                                                    <td><input type="text" name="price[]" class="form-control" required onkeydown="validateNumber()"></td>
                                                                    <td align="center"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-dim btn-outline-primary">Registrasi</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-bordered card-stretch customer" hidden>
                                <div class="card-inner-group">
                                    <div class="card-inner p-3">
                                        <h6>Registrasi Customer Penyewa Peralatan Camping</h6>
                                        <hr>
                                        <form action="{{ route('registration.attemptCustomer') }}" method="POST">
                                        @csrf
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-lg form-control-outlined @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                                        <label class="form-label-outlined" for="title">Nama Customer</label>
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <div class="form-control-wrap">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="phone">+62</span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror" placeholder="Nomor Telepon" value="{{ old('phone') }}" onkeydown="validateNumber()" name="phone" required>
                                                            @error('phone')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-lg form-control-outlined @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                                        <label class="form-label-outlined" for="title">Email</label>
                                                        @error('email')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <div class="form-control-wrap">
                                                        <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                        </a>
                                                        <input type="password" class="form-control form-control-lg form-control-outlined @error('password') is-invalid @enderror" id="password" name="password">
                                                        <label class="form-label-outlined" for="password">Password</label>
                                                        @error('password')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <button type="submit" class="btn btn-dim btn-outline-primary">Registrasi</button>
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

    $('thead').on('click', '.addRow', function(){
        var tr = "<tr>"+
                    "<td>"+
                        "<select name='equipment[]' class='form-select' required>"+
                            "<option value=''>Pilih Peralatan</option>"+
                            "@foreach($equipments as $equipment)"+
                            "<option value='{{ $equipment->id }}'>{{ $equipment->name }}</option>"+
                            "@endforeach"+
                        "</select>"+
                    "</td>"+
                    "<td><input type='text' name='qty[]' class='form-control' required onkeydown='validateNumber()'></td>"+
                    "<td><input type='text' name='price[]' class='form-control' required onkeydown='validateNumber()'></td>"+
                    "<td align='center'><a href='javascript:void(0)' class='badge bg-danger deleteRow'>-</a></td>"+
                "</tr>"
        $('tbody').append(tr);
    });
    $('tbody').on('click', '.deleteRow', function(){
        $(this).parent().parent().remove();
    });

    function roleForm(value){
        // console.log(value);
        if(value != 'renter'){
            $('div.renter').prop('hidden', true);
            $('div.customer').prop('hidden', false);
        } else {
            $('div.customer').prop('hidden', true);
            $('div.renter').prop('hidden', false);
        }
    }

    </script>

</html>
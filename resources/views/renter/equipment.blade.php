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
    <title>Sisemping | Manage Equipment</title>
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
                                        <h6>Manage Equipment Penyewa</h6>
                                        <hr>
                                        <form action="{{ route('equipment.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="row">
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
                                                                @foreach($renterEquipments as $rentEquip)
                                                                <tr>
                                                                    <td>
                                                                        <select name="equipment[]" class="form-select" required>
                                                                            @foreach($equipments as $equipment)
                                                                            <option value="{{ $equipment->id }}" @if($equipment->id == $rentEquip->equipment_id) selected @endif>{{ $equipment->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td><input type="text" name="qty[]" value="{{ $rentEquip->qty }}" class="form-control" required onkeydown="validateNumber()"></td>
                                                                    <td><input type="text" name="price[]" value="{{ $rentEquip->price }}" class="form-control" required onkeydown="validateNumber()"></td>
                                                                    <td align="center">
                                                                        @if(!$loop->first)
                                                                        <a href='javascript:void(0)' class='badge bg-danger deleteRow'>-</a>
                                                                        @endif
                                                                    </td>   
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
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

    </script>

</html>
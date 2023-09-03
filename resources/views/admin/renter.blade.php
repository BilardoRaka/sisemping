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
    <title>Sisemping | Data Renter</title>
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
        <div class="nk-main">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body p-3">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">List Data Penyewa</h3>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <ul class="nk-block-tools g-3">
                                                <li>
                                                    <div class="form-control-wrap">
                                                        <form action="/renter">
                                                            <div class="form-icon form-icon-right">
                                                                <button type="submit" class="badge border-0 bg-white"><em class="icon ni ni-search"></em></button>
                                                            </div>
                                                            <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Nama/Alamat">
                                                        </form>
                                                    </div>
                                                </li>
                                                {{-- <li>
                                                    <a href="/renter/create" class="btn btn-primary">
                                                        <em class="icon ni ni-plus-circle"></em>&nbsp;Tambah Pelanggan
                                                    </a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-icon">
                                        <em class="icon ni ni-check-circle"></em> <strong>{{ session('success') }}</strong>
                                    </div>
                                @endif
                                <div class="table-responsive col-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No.</th>
                                                <th style="text-align: center">Nama</th>
                                                <th style="text-align: center">Nomor Telepon</th>
                                                <th style="text-align: center">Email</th>
                                                <th style="text-align: center">Alamat</th>
                                                <th style="text-align: center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($renters as $renter)
                                                <tr>
                                                    <td align="center" class="nk-tb-col tb-col-mb">{{ $renters->firstItem()+$loop->index }}</td>
                                                    <td class="nk-tb-col tb-col-mb">
                                                        <div class="user-card">
                                                            <div class="user-avatar sq bg-purple">
                                                                @if($renter->logo == null)
                                                                <span>
                                                                    {{ substr($renter->name,0,2) }}
                                                                </span>
                                                                @else
                                                                    <img src="{{ asset('/storage/'.$renter->logo) }}" alt="{{ $renter->name }}">
                                                                @endif
                                                            </div>
                                                            <div class="user-name">
                                                                <span class="tb-lead">
                                                                    {{ $renter->name }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="nk-tb-col tb-col-mb">{{ $renter->phone }}</td>
                                                    <td class="nk-tb-col tb-col-mb">{{ $renter->user->email }}</td>
                                                    <td class="nk-tb-col tb-col-mb">{{ $renter->address }}</td>
                                                    <td align="center" class="nk-tb-col tb-col-mb">
                                                        <form action="{{ route('profile.renter.delete', $renter->user_id) }}" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                            <button class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Penyewa" onclick="return confirm('Anda yakin untuk hapus?')">
                                                                <em class="icon ni ni-trash"></em>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $renters->links() }}
                            </div>
                        </div>
                    </div>
                </div>
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
<!DOCTYPE html>
<html lang='zxx' class='js'>

    <head>
        <meta charset='utf-8'>
        <meta name='author' content='Sisemping'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <meta name='description' content='Simahanku'>
        <!-- Fav Icon  -->
        <link rel='shortcut icon' href='{{ asset('images/sisemping.png') }}'>
        <!-- Page Title  -->
        <title>Sisemping | Detail Penyewa</title>
        <!-- StyleSheets  -->
        <link rel='stylesheet' href='{{ asset('assets/css/dashlite.css?ver=3.1.0') }}'>
        <link id='skin-default' rel='stylesheet' href='{{ asset('assets/css/theme.css?ver=3.1.0') }}'>
        <!-- tinyMCE -->
        <script src='{!! url('assets/js/tinymce/tinymce.min.js') !!}'></script>
        @yield('style')
        <style>
            .star-rating {
                font-size: 0;
                white-space: nowrap;
                display: inline-block;
                width: 250px;
                height: 50px;
                overflow: hidden;
                position: relative;
                background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
                background-size: contain;
            }
            .star-rating i {
                opacity: 0;
                position: absolute;
                left: 0;
                top: 0;
                height: 100%;
                width: 20%;
                z-index: 1;
                background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
                background-size: contain;
            }
            .star-rating input {
                -moz-appearance: none;
                -webkit-appearance: none;
                opacity: 0;
                display: inline-block;
                width: 20%;
                height: 100%;
                margin: 0;
                padding: 0;
                z-index: 2;
                position: relative;
            }
            .star-rating input:hover + i,
            .star-rating input:checked + i {
                opacity: 1;
            }
            .star-rating i ~ i {
                width: 40%;
            }
            .star-rating i ~ i ~ i {
                width: 60%;
            }
            .star-rating i ~ i ~ i ~ i {
                width: 80%;
            }
            .star-rating i ~ i ~ i ~ i ~ i {
                width: 100%;
            }
            ::after,
            ::before {
                /* height: 100%; */
                padding: 0;
                margin: 0;
                box-sizing: border-box;
                text-align: center;
                vertical-align: middle;
            }
        </style>
    </head>

    <body>
        @include('layout.header-index')
        <div class='container p-3'>
            <h3>Informasi Detail Penyewa</h3>
            <p class='fs-6'>
                <span class='text-black'>
                    {{ $renter->name }} / Rating: {{ number_format($ratingAcc,2,".",",") }}
                </span>
                <br>
                <span class="project-detail">
                    {{ $renter->city->province->name }}, {{ $renter->city->name }}
                </span>
            </p>
            <p class='fs-6'>
                <span class='project-detail'>
                    Alamat Lengkap Penyewa
                </span>
                <span class='sub-text'>
                    {{ $renter->address }}
                </span>
            </p>
            <p class='fs-6'>
                <span class='project-detail'>
                    Deskripsi Penyewa
                </span>
                <span class='sub-text'>
                    {{ $renter->description }}
                </span>
            </p>
            <p class='fs-6'>
                <span class='project-detail'>
                    Kontak Penyewa
                </span>
                <span class="sub-text">
                    <a href="https://wa.me/{{ $renter->phone }}?text=Halo,%20saya%20tertarik%20untuk%20menyewa%20peralatan%20camping%20yang%20anda%20tawarkan%20di%20Sisemping." target="_blank">
                        <em class="icon ni ni-whatsapp"></em> +{{ $renter->phone }}
                    </a>
                    <br>
                    <a href="mailto:{{ $renter->user->email }}">{{ $renter->user->email }}</a>
                </span>
            </p>
            <label for='' class='project-detail fs-6'>Peralatan Disewakan</label>
            <div class='row col-6'>
                <table class='table table-striped'>
                    <thead>
                        <tr class='nk-tb-item nk-tb-head'>
                            <th class='nk-tb-col text-center'><span class='sub-text'>No.</span></th>
                            <th class='nk-tb-col text-center'><span class='sub-text'>Nama Peralatan</span></th>
                            <th class='nk-tb-col text-center'><span class='sub-text'>Jumlah</span></th>
                            <th class='nk-tb-col text-center'><span class='sub-text'>Harga</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($equipments as $equipment)
                        <tr class='nk-tb-item'>
                            <td align='center'>{{ $loop->iteration }}</td>
                            <td>{{ $equipment->equipment->name }}</td>
                            <td align='right'>{{ $equipment->qty }} buah</td>
                            <td align='right'>Rp. {{ number_format($equipment->price,0,',','.') }}</td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
            @if($renter->renter_rating->count() != 0 )
            <div class="bg-white rounded shadow p-3 mb-3">
                <h5>Yang orang lain katakan tentang penyewa ini.</h5>
                <table class='table table-striped'>
                    <tbody>
                    @foreach($renter->renter_rating as $rating)
                    <tr class="nk-tb-item">
                        <td>
                            <b>
                                {{ $rating->name }}
                            </b>
                            / Rating: {{ $rating->rating }}.00<br>
                            {{ $rating->comment }}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            <div class="bg-white rounded shadow p-3 mb-3">
                <form action="{{ route('dashboard.rating') }}" method="POST">
                @csrf
                <input type="hidden" name="renter_id" value="{{ $renter->id }}">
                    <h5>Berikan Komentar anda.</h5><hr>
                    <div class="form-group">
                        <span class="star-rating">
                            <input type="radio" name="rating" value="1" required><i></i>
                            <input type="radio" name="rating" value="2"><i></i>
                            <input type="radio" name="rating" value="3"><i></i>
                            <input type="radio" name="rating" value="4"><i></i>
                            <input type="radio" name="rating" value="5"><i></i>
                        </span>
                    </div>
                    <div class="form-group col-4">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-lg form-control-outlined @error('name') is-invalid @enderror" id="name" name="name">
                            <label class="form-label-outlined" for="title">Nama</label>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label class="form-label" for="comment">Komentar</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control form-control-lg" id="comment" name="comment">Komentar.</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dim btn-outline-primary">Buat Rating</button>
                    </div>
                </form>
            </div>
            <a href="{{ route('dashboard.index') }}" class='btn btn-dim btn-outline-danger'>Kembali</a>
        </div>

        @include('layout.footer-index')
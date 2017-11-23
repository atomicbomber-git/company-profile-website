@extends("layouts.main")

@section("title", "Administrator")

@section("main-content")
    @include("shared.navbar-base")

    <div style="height: 40px"></div>

    <div class="container">

        <div class="row">
            <div class="col-3">
                <div class="list-group">
                    <a class="list-group-item"> <i class="fa fa-home"></i> Halaman Depan </a>
                    <a class="list-group-item"> <i class="fa fa-list"></i> Teks Promosi </a>
                    <a class="list-group-item"> <i class="fa fa-phone"></i> Kontak </a>
                    <a class="list-group-item" href="{{ route("photo.create") }}"> <i class="fa fa-image"></i> Galeri </a>
                </div>
            </div>

            <div class="col">
                @yield("sub-content")
            </div>
        </div>

    </div>

@endsection

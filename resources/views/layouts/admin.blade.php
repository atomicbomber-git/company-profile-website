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
                    <a class="list-group-item"> <i class="fa fa-image"></i> Galeri </a>
                </div>
            </div>

            <div class="col">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi aliquid nesciunt pariatur perferendis. Eius quo amet deleniti necessitatibus dolores, reprehenderit enim alias voluptatibus ipsam, rem facere cupiditate obcaecati earum distinctio?
                </p>
            </div>
        </div>

    </div>

@endsection

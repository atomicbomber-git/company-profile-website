@extends("layouts.main")

@section("title", "Administrator")

@section("main-content")
    @include("shared.navbar-admin")

    <div style="height: 40px"></div>

    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action" href="#"> <i class="fa fa-home"></i> Halaman Depan </a>
                    <a class="list-group-item list-group-item-action" href="{{ route("slide.create") }}"> <i class="fa fa-image"></i> Slide </a>
                    <a class="list-group-item list-group-item-action" href="#"> <i class="fa fa-list"></i> Teks Promosi </a>
                    <a class="list-group-item list-group-item-action" href="#"> <i class="fa fa-phone"></i> Kontak </a>
                    <a class="list-group-item list-group-item-action" href="{{ route("photo.create") }}"> <i class="fa fa-image"></i> Galeri </a>
                    <a id="btn-logout" class="list-group-item list-group-item-action" href="#"> <i class="fa fa-power-off"></i> Log Out </a>
                </div>
            </div>

            <div class="col-md-9">
                @yield("sub-content")
            </div>
        </div>

    </div>
    
    <form method="post" id="logout-form" action="{{ route("logout") }}">
        {{ csrf_field() }}
    </form>

@endsection

@section("extra-scripts")
    @parent
    <script>
        $("#btn-logout").click(function() {
            $("#logout-form").submit();
        });
    </script>

@endsection
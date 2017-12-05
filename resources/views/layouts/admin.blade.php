@extends("layouts.main")

@section("title", "Administrator")

@section("main-content")
    @include("shared.navbar-admin")

    <div style="height: 40px"></div>

    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="list-group" style="margin-bottom: 20px">
                    <a class="list-group-item list-group-item-action" href="{{ route("slide.create") }}">
                        <i class="fa fa-image fa-fw"></i>
                        Slide
                    </a>
                    <a class="list-group-item list-group-item-action" href="{{ route("member.create") }}">
                        <i class="fa fa-users fa-fw"></i>
                        Anggota Tim
                    </a>
                    <a class="list-group-item list-group-item-action" href="{{ route("promotion.index") }}">
                        <i class="fa fa-list fa-fw"></i>
                        Teks Promosi
                    </a>
                    <a class="list-group-item list-group-item-action" href="{{ route("about.edit") }}">
                        <i class="fa fa-building fa-fw"></i>
                        Mengenai Perusahaan
                    </a>
                    <a class="list-group-item list-group-item-action" href="{{ route("contact.edit") }}">
                        <i class="fa fa-phone fa-fw"></i>
                        Kontak
                    </a>
                    <a class="list-group-item list-group-item-action" href="{{ route("photo.create") }}">
                        <i class="fa fa-image fa-fw"></i> Galeri
                    </a>
                    <a id="btn-logout" class="list-group-item list-group-item-action" href="#">
                        <i class="fa fa-power-off fa-fw"></i>
                        Log Out
                    </a>
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
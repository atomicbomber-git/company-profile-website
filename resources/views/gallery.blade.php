@extends("layouts.main")

@section("title", "Galeri")

@section("main-content")
    @include("shared.navbar-main")
    
    <div style="height: 40px"></div>

    <div class="container">
        <div class="row">
            @foreach ($photos as $photo)
                <div class="col-sm-3" style="margin-bottom: 20px">
                    <div class="card">
                        <img style="height: 160px; width: auto;" class="card-img-top" src="{{ route("photo.show", $photo) }}">
                        <div class="card-body">
                            <p>
                                {{ $photo->name }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@extends("layouts.main")

@section("title", "Galeri")

@section("main-content")
    @include("shared.navbar-main")
    
    <div style="height: 40px"></div>

    <div class="container">
        <h1> Galeri Foto </h1>
        <hr>
        <div class="row">
            @foreach ($photos as $photo)
                <div class="col-md-3" style="margin-bottom: 20px">
                    <div class="card">
                        <img style="height: 160px; width: auto;" class="card-img-top" src="{{ route("photo.show", $photo) }}">
                        <div class="card-body">
                            <div>
                                <div style="font-weight: bold"> {{ $photo->name }} </div>
                                <div class="text-muted">
                                    {{ $photo->created_at }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
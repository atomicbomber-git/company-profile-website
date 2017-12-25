@extends("layouts.main")

@section("title", "Galeri")

@section("main-content")
    @include("shared.navbar-main")
    
    <div style="height: 40px"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-list"></i> Kategori
                        <hr style="margin-top: 5px">
                        <ul class="fa-ul">
                            <li> <i class="fa-li fa fa-square"></i> <a href="{{ route("gallery") }}"> Semua </a> </li>
                            @foreach ($categories as $category)
                                <li> <i class="fa-li fa fa-square"></i>
                                    <a href="{{ route("gallery", ["category" => $category->id]) }}"> {{ $category->name }} </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div style="height: 10px"></div>

                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-map"></i> Lokasi
                        <hr style="margin-top: 5px">
                        <ul class="fa-ul">
                            <li> <i class="fa-li fa fa-square"></i> <a href="{{ route("gallery") }}"> Semua </a> </li>
                            @foreach ($locations as $location)
                                <li> <i class="fa-li fa fa-square"></i>
                                    <a href="{{ route("gallery", ["location" => $location->id]) }}"> {{ $location->name }} </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <h1>
                    <i class="fa fa-photo"></i>
                    Galeri Foto
                </h1>
                <hr>
                
                <div class="alert alert-info">
                    Filter Kategori: {{
                        null !== $current_category ? $current_category->name : "Semua"
                    }}
                </div>

                <div class="alert alert-info">
                    Filter Lokasi: {{
                        null !== $current_location ? $current_location->name : "Semua"
                    }}
                </div>

                <div class="row">
                    @foreach ($photos as $photo)
                        <div class="col-md-4" style="margin-bottom: 20px">
                            <div class="card">
                                <a href="{{ route("photo.show", $photo) }}">
                                    <img  class="card-img-top" src="{{ route("photo.thumbnail", $photo) }}">
                                </a>
                                <div class="card-body">
                                    <div>
                                        <div style="font-weight: bold"> {{ $photo->name }} </div>
                                        <hr style="margin-top: 5px">

                                        <dl style="font-size: 9pt">
                                            <dt> Kategori: </dt>
                                            <dd> {{ $photo->category->name }} </dd>
                                            <dt> Lokasi: </dt>
                                            <dd> {{ $photo->location->name }} </dd>
                                            <dt> Tanggal: </dt>
                                            <dd> {{ $photo->formattedDate() }} </dd>
                                            <dt> Deskripsi: </dt>
                                            <dd> {{ $photo->description }} </dd>
                                        </dl>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
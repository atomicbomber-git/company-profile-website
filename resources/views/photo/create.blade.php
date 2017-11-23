@extends("layouts.admin")

@section("sub-content")
    <div class="card" style="max-width: 400px; margin-bottom: 20px">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            Tambah Foto ke Galeri
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("photo.store") }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name"> Nama Foto: </label>
                    <input value="{{ old("name") }}" class="form-control {{ !$errors->has("name") ?: "is-invalid" }}" type="text" id="name" name="name">
                    <span class="invalid-feedback">
                        {{ $errors->first("name") }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="image"> Berkas: </label>
                    <input accept=".jpeg,.jpg,.png" id="image" name="image" type="file" class="form-control-file {{ !$errors->has("image") ?: "is-invalid" }}">

                    @if ($errors->first("image"))
                        <div class="text-danger text">
                            {{ $errors->first("image") }}  
                        </div>
                    @endif

                </div>

                <div style="text-align: right;">
                    <button class="btn btn-primary"> Tambahkan </button>
                </div>

                {{ csrf_field() }}
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-image"></i>
            Galeri
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    @foreach ($photos as $photo)
                        <div class="col-sm-4" style="margin-bottom: 20px">
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
        </div>
    </div>
@endsection
@extends("layouts.admin")

@section("title", "Edit Slide")

@section("sub-content")
    <div class="card" style="max-width: 550px; margin-bottom: 20px">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            Edit Slide
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("slide.update", $slide) }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="caption"> Caption Slide: </label>
                    <input type="text" class="form-control" id="caption" name="caption" value="{{ old("caption", $slide->caption) }}">
                    <span class="invalid-feedback"> {{ $errors->first("caption") }}  </span>
                </div>

                <div class="form-group">
                    <label for="description"> Deskripsi Slide: </label>
                    <textarea name="description" id="description" rows="3" class="form-control">{{ old("description", $slide->description) }}</textarea>
                    <span class="invalid-feedback"> {{ $errors->first("description") }}  </span>
                </div>

                <div class="form-group">
                    <label for=""> Gambar Slide Sekarang: </label>
                    <img
                        style="width: 500px; height: auto"
                        src="{{ route("slide.show", $slide) }}" alt="Gambar `{{ $slide->name }}`"
                        >
                </div>

                <div class="form-group">
                    <div class="alert alert-info">
                        <strong> Keterangan: </strong> Biarkan kolom dibawah kosong jika Anda tidak ingin mengubah foto.
                    </div>
                    <label for="image"> Berkas Gambar Slide Baru: </label>
                    <input accept=".jpeg,.jpg,.png" type="file" class="form-control-file" id="image" name="image">
                    <span class="invalid-feedback"> {{ $errors->first("image") }} </span>
                </div>

                <div class="form-group" style="text-align: right;">
                    <button class="btn btn-primary"> Ubah </button>
                </div>
                
                {{ method_field("PATCH") }}
                {{ csrf_field() }}
            </form>
        </div>
    </div>

@endsection
@extends("layouts.admin")

@section("title", "Edit Foto Galeri")

@section("sub-content")
    <div class="card" style="max-width: 550px; margin-bottom: 20px">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            Edit Foto Galeri
        </div>

        <div class="card-body">
            @if (session("message-success-update"))
                <div class="alert alert-success">
                    {{ session("message-success-update") }}
                </div>
            @endif

            <form method="POST" action="{{ route("photo.update", $photo) }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name"> Nama Foto: </label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old("name", $photo->name) }}">
                    <span class="invalid-feedback"></span>
                </div>

                <div class="form-group">
                    <label for=""> Kategori Foto </label>
                    <select name="category_id" id="category" class="form-control {{ !$errors->has("category") ?: "is-invalid" }}">
                        <option value="" {{ $photo->category->id ?: "selected" }}> --- Tidak Berkategori --- </option>
                        @foreach ($categories as $category)
                            <option {{ $category->id !== $photo->category->id ?: "selected" }} value="{{ $category->id }}"> {{ $category->name }} </option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback">
                        {{ $errors->first("category") }}
                    </span>
                </div>

                <div class="form-group">
                    <label for=""> Foto Sekarang: </label>
                    <img
                        style="width: 500px; height: auto"
                        src="{{ route("photo.show", $photo) }}" alt="Gambar `{{ $photo->name }}`"
                        >
                </div>

                <div class="form-group">
                    <div class="alert alert-info">
                        <strong> Keterangan: </strong> Biarkan kolom dibawah kosong jika Anda tidak ingin mengubah foto.
                    </div>
                    <label for="image"> Berkas Foto: </label>
                    <input accept=".jpeg,.jpg,.png" type="file" class="form-control-file" id="image" name="image">
                    <span class="invalid-feedback"></span>
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
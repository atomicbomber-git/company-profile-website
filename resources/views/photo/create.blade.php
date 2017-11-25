@extends("layouts.admin")

@section("title", "Kelola Galeri")

@section("extra-links")
    <link rel="stylesheet" href="{{ asset("css/sweetalert2.min.css") }}">
@endsection

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
                                    <div style="text-align: right">
                                        <a href="#" class="btn btn-success btn-sm"> <i class="fa fa-pencil"></i> </a>

                                        <form style="display: inline-block;" class="form-delete" method="POST" action="{{ route("photo.destroy", $photo) }}">
                                            <button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </button>
                                            {{ csrf_field() }}
                                            {{ method_field("DELETE") }}
                                        </form>
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

@section("extra-scripts")    
    @parent

    <script src="{{ asset("js/sweetalert2.all.js") }}"></script>

    <script>
        $(document).ready(function() {
            $(".form-delete").each(function(index, form) {
                $(form).on("submit", function(event) {
                    event.preventDefault();
                    swal({
                        'title': 'Konfirmasi Penghapusan',
                        'text': 'Anda yakin ingin menghapus foto ini?',
                        'type': 'warning',
                        'animation': 'true',
                        'showCancelButton': true,
                        'confirmButtonText': 'Ya',
                        'cancelButtonText': 'Tidak'
                    }).then(function(result) {
                        if (result.value) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
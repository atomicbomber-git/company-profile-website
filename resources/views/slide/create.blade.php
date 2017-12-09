@extends("layouts.admin")

@section("title", "Kelola Slide")

@section("sub-content")
    <div class="card" style="max-width: 500px; margin-bottom: 20px">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            Tambah Gambar Slide
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("slide.store") }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="caption"> Caption Slide: </label>
                    <input value="{{ old("caption") }}" class="form-control {{ !$errors->has("caption") ?: "is-invalid" }}" type="text" id="caption" name="caption">
                    <span class="invalid-feedback">
                        {{ $errors->first("caption") }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="description"> Deskripsi Slide: </label>
                    <textarea name="description" cols="10" rows="3" class="form-control {{ !$errors->has("description") ?: "is-invalid" }}">{{ old("description") }}</textarea>
                    <span class="invalid-feedback">
                        {{ $errors->first("description") }}
                    </span>
                </div>

                <div class="form-group">
                    <label for="image"> Berkas Gambar Slide: </label>
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

    <div class="card" style="width: 540px">
        <div class="card-header">
            <i class="fa fa-photo"></i>
            Daftar Gambar Slide
        </div>
        <div class="card-body">
            <div class="container">
                @foreach ($slides as $slide)
                    <div style="max-width: 480px">
                        <img class="image-responsive" src="{{ route("slide.show", $slide) }}" alt="" style="width: 480px; height: auto; margin-bottom: 10px">
                        <div class="row">
                            <div class="col-md-2" style="text-align: center">
                                <p> <span class="badge badge-info"> {{ $loop->iteration }} </span> </p>
                            </div>
                            <div class="col">
                                <div class="font-weight-bold"> {{ $slide->caption }} </div>
                                <div> {{ $slide->description }} </div>
                            </div>
                            <div class="col-md-4 text-right">
                                <a class="btn btn-sm btn-dark" href="{{ route("slide.edit", $slide) }}"> <i class="fa fa-pencil"></i> </a>
                                <form method="POST" action="{{ route("slide.destroy", $slide) }}" class="d-inline-block form-delete">
                                    <button class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
                                    {{ method_field("DELETE") }}
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                        <hr>
                    </div>
                @endforeach
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
                        'text': 'Anda yakin ingin menghapus slide ini?',
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
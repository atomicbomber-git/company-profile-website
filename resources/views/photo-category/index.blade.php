@extends("layouts.admin")

@section("title", "Kelola Kategori Foto")

@section("extra-links")
    <link rel="stylesheet" href="{{ asset("css/sweetalert2.min.css") }}">
@endsection

@section("sub-content")
    <div class="card" style="max-width: 400px; margin-bottom: 20px">
        <div class="card-header">
            <i class="fa fa-plus"> </i>
            Tambah Kategori Foto
        </div>
        <div class="card-body">
            <div class="container">
                @if (session("photo-category-create-success"))
                    <div class="alert alert-success">
                        {{ session("photo-category-create-success") }}
                    </div>
                @endif

                <form method="POST" action="{{ route("photo-category.store") }}">
                    <div class="form-group">
                        <label for="name"> Nama Kategori: </label>
                        <input value="{{ old("name") }}" class="form-control {{ !$errors->has("name") ?: "is-invalid" }}" type="text" id="name" name="name">
                        <span class="invalid-feedback">
                            {{ $errors->first("name") }}
                        </span>
                    </div>

                    <div class="form-group text-right">
                        <button class="btn btn-sm btn-primary"> Tambah Kategori </button>
                    </div>

                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i>
            Kelola Kategori Foto
        </div>
        <div class="card-body">
            
            @if (session("photo-category-delete-success"))
                <div class="alert alert-success">
                    {{ session("photo-category-delete-success") }}
                </div>
            @endif

            <table class="table table-sm">
                <thead>
                    <tr>
                        <th> Nama Kategori </th>
                        <th> Kendali </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td> {{ $category->name }} </td>
                        <td>
                            <button class="btn btn-dark btn-sm">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <form class="form-delete" style="display: inline-block;" method="POST" action="{{ route("photo-category.delete", $category) }}">
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                                {{ csrf_field() }}
                                {{ method_field("DELETE") }}
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
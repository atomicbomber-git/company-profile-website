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

            @if ($message = session("photo-category-update-success"))
                <div class="alert alert-success">
                    {{ $message }}
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
                            <button class="btn btn-edit btn-dark btn-sm" data-name="{{ $category->name }}" data-url=" {{ route("photo-category.update", $category) }} ">
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

    <div class="modal fade" id="edit-category-modal" tabindex="-1" role="dialog" aria-labelledby="edit-category-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-category-modal-label"> Edit Kategori </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-update" method="POST">
                    {{ csrf_field() }}
                    {{ method_field("PATCH") }}

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category-edit"> Nama Kategori </label>
                            <input id="category-edit" name="name" type="text" class="form-control">
                            <div id="category-edit-feedback" class="invalid-feedback">
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Tutup </button>
                        <button type="submit" class="btn btn-primary"> Ubah </button>
                    </div>
                </form>
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


            var editUrl = "";

            $(".btn-edit").each(function(index, button) {
                $(button).click(function() {
                    $("#category-edit").val( $(this).data("name") );
                    editUrl = $(this).data("url");

                    $("#edit-category-modal").modal("show");
                });
            });

            $("form#form-update").submit(function(event) {

                event.preventDefault();

                var data = $("form#form-update").serialize();

                $.post({
                    url: editUrl,
                    data: data,
                    dataType: "json",
                    error: function(data, status) {

                        alert(JSON.stringify(status));

                        if (errorMessage = data.responseJSON.errors.name) {
                            $("input#category-edit").addClass("is-invalid");
                            $("div#category-edit-feedback").html(
                                errorMessage
                            );
                        }
                    },
                    success: function(data) {
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endsection
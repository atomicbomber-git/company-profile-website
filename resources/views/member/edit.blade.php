@extends("layouts.admin")

@section("title", "Edit Anggota Tim")

@section("sub-content")
    <div class="card" style="max-width: 550px; margin-bottom: 20px">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            Edit Anggota Tim
        </div>

        <div class="card-body">
            @if (session("message-success-update"))
                <div class="alert alert-success">
                    {{ session("message-success-update") }}
                </div>
            @endif

            <form method="POST" action="{{ route("member.update", $member) }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name"> Nama: </label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old("name", $member->name) }}">
                    <span class="invalid-feedback"></span>
                </div>

                <div class="form-group">
                    <label for="name"> Posisi: </label>
                    <input type="text" class="form-control" id="name" name="position" value="{{ old("position", $member->position) }}">
                    <span class="invalid-feedback"></span>
                </div>

                <div class="form-group">
                    <label for=""> Foto: </label>
                    <img
                        style="width: 500px; height: auto"
                        src="{{ route("member.thumbnail", $member) }}" alt="Gambar `{{ $member->name }}`"
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
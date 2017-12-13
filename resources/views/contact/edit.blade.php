@extends("layouts.admin")

@section("title", "Edit Kontak")

@section("sub-content")
    <div class="card" style="max-width: 400px; margin-bottom: 10px">
        <div class="card-header"> <i class="fa fa-phone"></i> Edit Nomor Telepon </div>
        <div class="card-body">
            <div class="container">

                @if(session("message-success-phone"))
                    <div class="alert alert-success">
                        {{ session("message-success-phone") }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.update.phone') }}">
                    <div class="form-group">
                        <label for="phone"> Nomor: </label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $phone->caption }}">
                        <div class="invalid-feedback">
                            {{ $errors->first("phone") }}
                        </div>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-sm btn-primary">
                            Ubah
                        </button>
                    </div>

                    {{ csrf_field() }}
                    {{ method_field("patch") }}
                </form>
            </div>
        </div>
    </div>

    <div class="card" style="max-width: 400px">
        <div class="card-header"> <i class="fa fa-envelope"></i> Edit Alamat Email </div>
        <div class="card-body">
            <div class="container">

                @if(session("message-success-email"))
                    <div class="alert alert-success">
                        {{ session("message-success-email") }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.update.email') }}">
                    <div class="form-group">
                        <label for="email"> E-Mail: </label>
                        <input type="text" id="email" name="email" class="form-control" value="{{ $email->caption }}">
                        <div class="invalid-feedback">
                            {{ $errors->first("email") }}
                        </div>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-sm btn-primary">
                            Ubah
                        </button>
                    </div>

                    {{ csrf_field() }}
                    {{ method_field("patch") }}
                </form>
            </div>
        </div>
    </div>
@endsection
@extends("layouts.main")

@section("title", "Login Administrator")

@section("main-content")
    @include("shared.navbar-base")

    <div style="height: 50px"></div>

    <div class="container" style="width: 550px">
        
        <div class="card">
            <div class="card-header">
                <i class="fa fa-sign-in"></i>
                Login Administrator
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    <div class="form-group">
                        <label for="email"> Alamat E-Mail: </label>
                        <input id="email" name="email" type="email" class="form-control {{ $errors->has("email") ? "is-invalid" : "" }}">
                        <span class="invalid-feedback">
                            {{ $errors->first("email") }}
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="password"> Kata Sandi: </label>
                        <input id="password" name="password" type="password" class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}">
                        <span class="invalid-feedback">
                            {{ $errors->first("password") }}
                        </span>
                    </div>

                    <div style="text-align: right;">
                        <button class="btn btn-primary"> Masuk </button>
                    </div>

                    {{ csrf_field() }}
                </form>
            </div>
        </div>

    </div>
@endsection
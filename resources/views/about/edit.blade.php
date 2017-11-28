@extends("layouts.admin")

@section("title", "Mengenai Perusahaan")

@section("sub-content")
    <div class="card">
        <div class="card-header">
            <i class="fa fa-building"></i>
            Kelola Teks Mengenai Perusahaan
        </div>

        <div class="card-body">
            <div class="container">
                
                <div class="card">
                    <div class="card-header">
                        Teks Ucapan Selamat Datang
                    </div>

                    <div class="card-body">
                        @if (session("message_success_welcome"))
                            <div class="alert alert-success">
                                {{ session("message_success_welcome") }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route("about.update_welcome", $welcome_text) }}">
                            <div class="form-group">
                                <label for="caption"> Judul: </label>
                                <input value="{{ $welcome_text->caption }}" name="caption" id="caption" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="description"> Deskripsi: </label>
                                <textarea name="description" id="description" rows="3" class="form-control">{{ $welcome_text->description }}</textarea>
                            </div>

                            <div class="form-group text-right">
                                <button class="btn btn-primary"> Ubah </button>
                            </div>

                            {{ csrf_field() }}
                            {{ method_field("PATCH") }}
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
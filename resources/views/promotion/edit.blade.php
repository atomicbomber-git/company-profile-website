@extends("layouts.admin")

@section("title", "Edit Teks Promosi")

@section("sub-content")
    <div class="card">
        <div class="card-header"> <i class="fa fa-pencil"></i> Edit Teks Promosi </div>
        <div class="card-body">
            <div class="container">
                <form method="POST" action="{{ route("promotion.update", $promotional_text) }}">
                    <div class="form-group">
                        <label for="caption"> Judul: </label>
                        <input type="text" id="caption" name="caption" class="form-control" value="{{ $promotional_text->caption }}">
                        <div class="invalid-feedback">
                            {{ $errors->first("caption") }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description"> Deskripsi: </label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{ old("description", $promotional_text->description) }}</textarea>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-sm btn-primary">
                            Ubah
                        </button>
                    </div>
                    
                    {{ method_field("PATCH") }}
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection
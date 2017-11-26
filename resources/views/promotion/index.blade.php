@extends("layouts.admin")

@section("title", "Kelola Teks Promosi")

@section("sub-content")
    <div class="card">
        <div class="card-header"> <i class="fa fa-list"></i> Kelola Teks Promosi </div>
        <div class="card body">
            <div class="container">
                <p>
                    @foreach ($promotional_texts as $promotional_text)
                        <div class="card" style="margin-bottom: 10px">
                            <div class="card-header">
                                {{-- <i class="fa fa-stack"> 
                                    <i class="fa fa-circle fa-stack-2x">    </i>
                                    <i class="fa fa-wrench fa-stack-1x fa-inverse">    </i>
                                </i> --}}
                                <span class="badge badge-pill badge-info"> {{ $loop->iteration }} </span>
                                {{ $promotional_text->caption }}
                            </div>
                            <div class="card-body">
                                {{ $promotional_text->description }}
                                <div class="text-right">
                                    <a href="{{ route("promotion.edit", $promotional_text) }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </p>
            </div>
        </div>
    </div>

    
@endsection
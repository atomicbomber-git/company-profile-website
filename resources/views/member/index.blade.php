@extends("layouts.main")

@section("title", "Anggota Tim")

@section("main-content")
    @include("shared.navbar-main")
    
    <div style="height: 40px"></div>

    <div class="container">
        <h1> Anggota Tim </h1>
        <hr>
        <div class="row">
            @foreach ($members as $member)
                <div class="col-md-3" style="margin-bottom: 20px">
                    <div class="card">
                        <img style="height: 160px; width: auto;" class="card-img-top" src="{{ route("member.thumbnail", $member) }}">
                        <div class="card-body">
                            <dl>
                                <dt> Nama: </dt>
                                <dd> {{ $member->name }} </dd>
                                <dt> Posisi: </dt>
                                <dd> {{ $member->position }} </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
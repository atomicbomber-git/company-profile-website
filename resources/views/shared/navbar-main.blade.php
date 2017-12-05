@extends("shared.navbar-base")

@section("navbar-brand-url")
  {{ route("welcome") }}
@endsection

@section("navbar-menus")
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fa fa-users"></i>
        Anggota Tim
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route("gallery") }}">
        <i class="fa fa-image"></i>
        Galeri
      </a>
    </li>
  </ul>
@endsection
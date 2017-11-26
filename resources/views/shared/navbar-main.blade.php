@extends("shared.navbar-base")

@section("navbar-brand-url")
  {{ route("welcome") }}
@endsection

@section("navbar-menus")
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="#"> Mengenai Perusahaan </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"> Pelayanan </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"> Kontak </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route("gallery") }}"> Galeri </a>
    </li>
  </ul>
@endsection
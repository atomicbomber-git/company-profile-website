@extends("shared.navbar-base")

@section("navbar-menus")
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="about.html"> Mengenai Perusahaan </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="services.html"> Pelayanan </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact.html"> Kontak </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route("gallery") }}"> Galeri </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Portofolio
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
        <a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
        <a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
        <a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
        <a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
        <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
      </div>
    </li>
  </ul>
@endsection
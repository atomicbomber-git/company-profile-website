<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="@yield("navbar-brand-url")">
        <img height="30px" width="30px" src="{{ asset("images/brand.png") }}" class="d-inline-block align-top">
        CV. HK Mitra Mandiri Konsultan
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      @yield("navbar-menus")
    </div>
  </div>
</nav>
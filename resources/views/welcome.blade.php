@extends("layouts.main")

@section("title", "CV. HK Mitra Mandiri Konsultan")

@section("main-content") 
    @include("shared.navbar-main")

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @foreach ($slides as $slide)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->index !== 0 ?: "active" }}"></li>
          @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          @foreach ($slides as $slide)
            <div class="carousel-item {{ $loop->index !== 0 ?: "active" }}" style="height: 600px; background-image: url({{ route("slide.show", $slide) }})">
              <div class="carousel-caption d-none d-md-block">
                <h3> {{ $slide->caption }} </h3>
                <p> {{ $slide->description }} </p>
              </div>
            </div>
          @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">
        
        <div style="margin: 80px 0px 80px 0px">
            <h1 class="my-2"> {{ $welcome_text->caption }} </h1>

            <p>
              {{ $welcome_text->description }}
            </p>
        </div>

        <hr/>
          
      <!-- Marketing Icons Section -->
      <div class="row" style="margin: 80px 0px 80px 0px">

        <div class="col-md-4 text-center h-100">
          <i class="fa-stack fa-4x">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-cog fa-stack-1x fa-inverse"></i>
          </i>
          <h4> {{ $promotional_texts[0]->caption }} </h4>
          <p>
            {{ $promotional_texts[0]->description }}
          </p>
        </div>

        <div class="col-md-4 text-center h-100">
          <i class="fa-stack fa-4x">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
          </i>
          <h4> {{ $promotional_texts[1]->caption }} </h4>
          <p>
            {{ $promotional_texts[1]->description }}
          </p>
        </div>

        <div class="col-md-4 text-center h-100">
          <i class="fa-stack fa-4x">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-check fa-stack-1x fa-inverse"></i>
          </i>
          <h4> {{ $promotional_texts[2]->caption }} </h4>
          <p>
            {{ $promotional_texts[2]->description }}
          </p>
        </div>
      <hr>
</div>

    <h2> Galeri </h2>
    <div class="row">

      @foreach ($photos as $photo)
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card">
            <a href="{{ route("photo.show", $photo) }}"><img class="card-img-top" src="{{ route("photo.thumbnail", $photo) }}" alt="{{ $photo->name }}"></a>
            <div class="card-body">
              <h4 class="card-title">
                {{ $photo->name }}
              </h4>
            </div>
          </div>
        </div>
      @endforeach
    </div>
      <!-- /.row -->

      <!-- Features Section -->
      <hr/>
      <h2 style="margin-bottom: 20px"> Hubungi Kami </h2>

      <h5>
        <i class="fa fa-phone"></i>
        Nomor Telepon
      </h5>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>

      <h5>
        <i class="fa fa-envelope"></i>
        E-Mail
      </h5>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>

      <hr/>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>
@endsection
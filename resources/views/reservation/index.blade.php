<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('assets3/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ URL::asset('assets3/img/favicon.png') }}">
  <title>
    index
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{ URL::asset('assets3/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('assets3/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="{{ URL::asset('assets3/css/font-awesome.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ URL::asset('assets3/css/argon-design-system.css?v=1.2.2') }}" rel="stylesheet" />
  <style>
    ul {
      list-style-type: none;
    }
  </style>
</head>

<body class="index-page">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg bg-white navbar-light position-sticky top-0 shadow py-2">
    <div class="container">
      <a class="navbar-brand mr-lg-5" href="#">
        <img src="{{ URL::asset('assets3/img/brand/blue.png') }}">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item d-none d-lg-block">
            <form role="form" method="get" action="{{ route('client.login') }}">
              @csrf
              <button type="submit" class="btn btn-link text-primary " style="font-size:16px">Se connecter</button>
              <!-- <input type="hidden" name="url" value="{{$etablissement->url}}">
              <input type="hidden" name="user_id" value="{{$user->id}}"> -->
              <input type="hidden" name="etablissement_id" value="{{$etablissement->id}}">
            </form>
          </li>
          <li class="nav-item d-none d-lg-block">
            <form role="form" method="get" action="{{ route('client.register') }}">
              @csrf
              <button type="submit" class="btn btn-link text-primary" style="font-size:16px">S'inscrire</button>
              <input type="hidden" name="etablissement_id" value="{{$etablissement->id}}">
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="section section-hero section-shaped">
      <div class="shape shape-style-1 shape-primary">
        <span class="span-150"></span>
        <span class="span-50"></span>
        <span class="span-50"></span>
        <span class="span-75"></span>
        <span class="span-100"></span>
        <span class="span-75"></span>
        <span class="span-50"></span>
        <span class="span-100"></span>
        <span class="span-50"></span>
        <span class="span-100"></span>
      </div>
      <div class="page-header">
        <div class="container shape-container d-flex align-items-center py-5">
          <div class="col px-0">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-6 text-center">
                <h1 class="text-white text-uppercase">{{$etablissement->name}}</h1>
                <p class="lead text-white">{{$etablissement->description}}</p>
                <!-- <a type="submit" href="{{route('reservation_login')}}" class="btn btn-success text-white">Rendez-vous</a> -->
                <form role="form" method="get" action="{{ route('client.login') }}">
                  @csrf
                  <a type="submit" href="{{route('client.login')}}" class="btn btn-success text-white">Rendez-vous</a>
                  <!-- <button type="submit" class="btn btn-link text-primary " style="font-size:16px">Login</button> -->
                  <input type="hidden" name="etablissement_id" value="{{$etablissement->id}}">
                </form>
                <!-- </form> -->
                <!-- <div class="btn-wrapper mt-5">
                  <a href="https://www.creative-tim.com/product/argon-design-system" class="btn btn-lg btn-white btn-icon mb-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="ni ni-cloud-download-95"></i></span>
                    <span class="btn-inner--text">Download HTML</span>
                  </a>
                  <a href="https://github.com/creativetimofficial/argon-design-system" class="btn btn-lg btn-github btn-icon mb-3 mb-sm-0" target="_blank">
                    <span class="btn-inner--icon"><i class="fa fa-github"></i></span>
                    <span class="btn-inner--text"><span class="text-warning">Star us</span> on Github</span>
                  </a>
                </div> -->
                <!-- <div class="mt-5">
                  <small class="font-weight-bold mb-0 mr-2 text-white">*proudly coded by</small>
                </div> -->
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="col-12 col-md-8">
            <h3 class="small-title text-white">Contactez-nous</h3>
            <section id="contacts">
              <div class="info">
                <ul>
                  <li>
                    <div class=" h4">
                      <i class="fa fa-phone text-white"> </i>
                      <label for=""><a class="phone-number text-white h5" href=""> {{$etablissement->phone}}</a></label>
                    </div>
                  </li>
                  <li>
                    <div class="h4">
                      <i class="ni ni-email-83 text-white"></i>
                      <label for=""><a href="mailto:{{$user->email}}" class="email text-white h5"> {{$user->email}}</a></label>
                    </div>
                  </li>
                  <li>
                    <div class="links address_links text-white h4">
                      <i class="ni ni-pin-3">&#xe0c8;</i>
                      <label class="h5 text-white" for=""> {{$etablissement->adresse}}</label>
                    </div>
                  </li>
                </ul>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer ">
      @include('layouts.footers.nav')
    </footer>



    <!--   Core JS Files   -->
    <script src="{{ URL::asset('assets3/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets3/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets3/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets3/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ URL::asset('assets3/js/plugins/bootstrap-switch.js') }}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ URL::asset('assets3/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets3/js/plugins/moment.min.js') }}"></script>
    <script src="{{ URL::asset('assets3/js/plugins/datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets3/js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <script src="{{ URL::asset('assets3/js/argon-design-system.min.js?v=1.2.2') }}" type="text/javascript"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
</body>

</html>
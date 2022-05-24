<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets3/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets3/img/favicon.png">
  <title>
    Argon Design System by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="/assets3/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets3/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="/assets3/css/font-awesome.css" rel="stylesheet" />
  <link href="/assets3/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="/assets3/css/argon-design-system.css?v=1.2.2" rel="stylesheet" />
</head>

<body class="login-page">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light py-2">
    <div class="container">
      <a class="navbar-brand mr-lg-5" href="{{ url('reservation/'.$url) }}">
        <img src="/assets3/img/brand/white.png">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="../../../index.html">
                <img src="/assets3/img/brand/blue.png">
              </a>
            </div>
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
            <form role="form" method="get" action="{{ route('client.register') }}">
              @csrf
              <input type="hidden" name="etablissement_id" value="{{$etablissement_id}}">
              <button type="submit" class="btn btn-link text-white" style="font-size:16px">Register</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <section class="section section-shaped section-lg">
    <div class="shape shape-style-1 bg-gradient-default">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="container pt-lg-7">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card bg-secondary shadow border-0">
            <!-- <div class="card-header bg-white pb-5">
              <div class="text-muted text-center mb-3"><small>Sign in with</small></div>
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="/assets3/img/icons/common/github.svg"></span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="/assets3/img/icons/common/google.svg"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div> -->
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Sign in </small>
              </div>
              <form role="form" action="{{ route('client.check') }}" method="post">
                @csrf

                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" value="admin@argon.com" required autofocus>
                  </div>
                  @if ($errors->has('email'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" value="secret" required>
                  </div>
                  @if ($errors->has('password'))
                  <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label" for="customCheckLogin">
                    <span class="text-muted">{{ __('Remember me') }}</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">{{ __('Sign in') }}</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-light"><small>Forgot password?</small></a>
            </div>
            <div class="col-6 text-right">
              <form role="form" method="get" action="{{ route('client.register') }}">
                @csrf
                <input type="hidden" name="etablissement_id" value="{{$etablissement_id}}">
                <a type="submit" class=" text-light" onclick="this.closest('form').submit();return false;"><small>Create new account</small></a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="footer">
    @include('layouts.footers.nav')
  </footer>
  <!--   Core JS Files   -->
  <script src="/assets3/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="/assets3/js/core/popper.min.js" type="text/javascript"></script>
  <script src="/assets3/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="/assets3/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="/assets3/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="/assets3/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <script src="/assets3/js/plugins/moment.min.js"></script>
  <script src="/assets3/js/plugins/datetimepicker.js" type="text/javascript"></script>
  <script src="/assets3/js/plugins/bootstrap-datepicker.min.js"></script>
  <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <script src="/assets3/js/argon-design-system.min.js?v=1.2.2" type="text/javascript"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-design-system-pro"
      });
  </script>
</body>

</html>
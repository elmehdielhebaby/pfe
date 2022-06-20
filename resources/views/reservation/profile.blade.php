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

<body class="profile-page">
  <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light py-2">
    <div class="container">
      <a class="navbar-brand mr-lg-5" href="/client/home">
        <img src="/assets3/img/brand/white.png" width="120" height="200">
      </a>
      <div class="navbar-collapse collapse" id="navbar_global">
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a type="button" href='/client/home#mes_rendez_vous' class="btn btn-link text-white " style="font-size:16px">{{ __('Mes Rendez-vous') }}</a>
          </li>
          <li class="nav-item">
            <a type="button" href='/client/home#mes_rendez_vous' class="btn btn-link text-white " style="font-size:16px">{{ __('Historique Rendez-vous') }}</a>
          </li>

          <li class="nav-item d-none d-lg-block">
            <form method="get" role="form" action="{{ route('client.logout') }}">
              <button type="submit" class="btn btn-link text-white" style="font-size:16px"> <i class=" ni ni-user-run"></i> {{ __('Logout') }}</button>
              <input type="hidden" name="url" value="{{$etablissement->url}}">
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Navbar
  <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light py-2">
    <div class="container">
      <a class="navbar-brand mr-lg-5" href="{{route('lop')}}">
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
          <li class="nav-item">
            <a type="button" href='#mes_rendez_vous' class="btn btn-link text-white " style="font-size:16px">{{ __('Mes Rendez-vous') }}</a>
          </li>
          <li class="nav-item d-none d-lg-block">
            <form method="get" role="form" action="{{ route('client.logout') }}">
              <button type="submit" class="btn btn-link text-white" style="font-size:16px"> <i class=" ni ni-user-run"></i> {{ __('Logout') }}</button>
              <input type="hidden" name="url" value="{{$etablissement->url}}">
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->
  <!-- End Navbar -->
  <div class="wrapper">
    <section class="section-profile-cover section-shaped my-0">
      <!-- Circles background -->
      <img class="bg-image" src="/assets3/img/pages/mohamed.jpg" style="width: 100%;">
      <!-- SVG separator -->
      <div class="separator separator-bottom separator-skew">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-secondary" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </section>
    <section class="section bg-secondary">
      <div class="container  mt--200">
        <div class="px-4">
          <div class="row justify-content-center">
            <div class="container-fluid mt--300">
              <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                  <div class="row align-items-center">
                    <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                  </div>
                </div>
                <div class="card-body">
                  <form method="post" action="{{ route('client.profile.update') }}" autocomplete="off">
                    @csrf
                    @method('put')
                    <h6 class="heading-small text-muted mb-4">{{ __('Client information') }}</h6>
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <span class="alert-inner--text"><strong>{{ session('status') }}</strong></span>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    <div class="pl-lg-4">
                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="form-group{{ $errors->has('cin') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-cin">{{ __('Cin') }}</label>
                        <input type="text" name="cin" id="input-cin" class="form-control form-control-alternative{{ $errors->has('cin') ? ' is-invalid' : '' }}" placeholder="{{ __('cin') }}" value="{{ old('cin', $client->cin) }}" required>
                        @if ($errors->has('cin'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('cin') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-phone">{{ __('Téléphone') }}</label>
                        <input type="tel" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('phone') }}" value="{{ old('phone', $client->phone) }}" required>

                        @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="form-group{{ $errors->has('adresse') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-adresse">{{ __('Adresse') }}</label>
                        <input type="text" name="adresse" id="input-adresse" class="form-control form-control-alternative{{ $errors->has('adresse') ? ' is-invalid' : '' }}" placeholder="{{ __('adresse') }}" value="{{ old('adresse', $client->adresse) }}" required>

                        @if ($errors->has('adresse'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('adresse') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="form-group{{ $errors->has('age') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-age">{{ __('Age') }}</label>
                        <input type="number" min="1" max="120" name="age" id="input-age" class="form-control form-control-alternative{{ $errors->has('age') ? ' is-invalid' : '' }}" placeholder="{{ __('age') }}" value="{{ old('age', $client->age) }}" required>
                        @if ($errors->has('age'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('age') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                      </div>
                    </div>
                    <input type="hidden" name="clien_id" value="{{$client->id}}">
                  </form>
                  <hr class="my-4" />
                  <form method="post" action="{{ route('client.profile.password') }}" autocomplete="off">
                    @csrf
                    @method('put')

                    <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                    @if (session('password_status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('password_status') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif

                    <div class="pl-lg-4">
                      <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                        <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>

                        @if ($errors->has('old_password'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('old_password') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                        <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                        <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                      </div>
                    </div>
                    <input type="hidden" name="client_id" value="{{$client->id}}">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <footer class="footer" id="lop">
      @include('layouts.footers.nav')
    </footer>

    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- @stack('js') -->
    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>



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
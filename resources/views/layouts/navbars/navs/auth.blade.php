<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h2 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('user.home') }}">Dashboard</a>
        <!-- Form -->
        <!-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
            <div class="form-group mb-0">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text">
                </div>
            </div>
        </form> -->
        <!-- User -->

        <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
                <!-- Sidenav toggler -->
                <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </li>
            <li class="nav-item d-none d-lg-block ml-lg-4" id="docs">
                <a href="/reservation/{{$etablissement->url}}" target="_blank" class="btn btn-neutral btn-documentation text-success btn-icon">
                    <span class="btn-inner--icon">
                        <i class="ni ni-world-2 mr-2"></i>
                    </span>
                    <span class="nav-link-inner--text">Mon site de rendez vous</span>
                </a>
            </li>
            <li class="nav-item d-sm-none">
                <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                    <i class="ni ni-zoom-split-in"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.png">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('user.profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="{{ route('user.client.management') }}" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Client Management') }}</span>
                    </a>
                    <a href="{{ route('user.rendez-vous.index') }}" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Rendez Vous') }}</span>
                    </a>


                    <a href="{{ route('user.rendez-vous.history') }}" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('History des Rendez-Vous') }}</span>
                    </a>


                    <a href="{{ route('user.rendez-vous.today_rendez_vous') }}" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span> {{ __("Les Rendez-Vous d'aujourd'hui") }}</span>
                    </a>



                    <div class="dropdown-divider"></div>
                    <a href="{{ route('user.logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>







    </div>
</nav>
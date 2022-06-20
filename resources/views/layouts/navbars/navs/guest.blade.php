<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
    <div class="container px-4   ">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="img-thumbnail " />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">

            <!-- Navbar items -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="/">
                        <span class="nav-link-inner--text text-primary h3">{{ __('Accueil') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('user.register') }}">
                        <span class="nav-link-inner--text text-primary h3">{{ __("S'inscrire") }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('user.login') }}">
                        <span class="nav-link-inner--text text-primary h3">{{ __('Se connecter') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="#About">
                        <span class="nav-link-inner--text text-primary h3">{{ __('À propos') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="#Contact">
                        <span class="nav-link-inner--text text-primary h3">{{ __('Contactez-nous') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
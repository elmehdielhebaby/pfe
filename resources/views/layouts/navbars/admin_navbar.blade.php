@auth()
    @include('layouts.navbars.navs.admin_auth')
@endauth
    
@guest()
    @include('layouts.navbars.navs.guest')
@endguest
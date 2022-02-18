@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
  
<link rel="stylesheet" href="style.css">
<section class="main">
        <div>
            <h2><br></h2>
            <h3>Facilitez la prise de rendez-vous en ligne <br>De vos clients Pour optimiser votre temps <br>Et développer votre activité</h3>
            <a href="{{ route('register') }}" class="main-btn">Create your webSite</a>
        </div>
    </section>
    

@endsection

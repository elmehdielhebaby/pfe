@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
@include('layouts.headers.guest')

<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <small>{{ __('Vérifiez votre adresse e-mail') }}</small>
                    </div>
                    <div>
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                        </div>
                        @endif

                        {{ __('Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification.') }}

                        @if (Route::has('verification.resend'))
                        {{ __('Si vous n'avez pas reçu l'e-mail') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
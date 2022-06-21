@extends('layouts.admin_app')

@section('content')
@include('layouts.headers.admin_cards')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">

                @if(session()->has('activete'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-inner--text"><strong>{{ session()->get('activete') }} !</strong></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if(session()->has('deactivate'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-inner--icon"><i class="ni ni-support-16"></i></span>
                    <span class="alert-inner--text"><strong>{{ session()->get('deactivate') }} !</strong></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Etablissement</h3>
                        </div>
                        <div class="col-4 text-right">
                            <!-- <a href="" class="btn btn-sm btn-primary">Add user</a> -->
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Etablissement</th>
                                <th class="text-center" scope="col">Admin </th>
                                <th class="text-center" scope="col">Catégorie</th>
                                <th class="text-center" scope="col">Email</th>
                                <th class="text-center" scope="col">Date de creation </th>
                                <th class="text-center" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($etablissements as $etablissement)
                            <tr>
                                <th>{{$etablissement->name}}</th>
                                @foreach($users as $user)
                                @if($etablissement->user_id==$user->id)
                                @break;
                                @endif
                                @endforeach
                                <td class="text-center" scope="row"> {{$user->name}}</td>
                                <td class="text-center">{{$etablissement->categorie}}</td>
                                <td class="text-center"><a href="#">{{$user->email}}</a></td>
                                <td class="text-center">{{$user->created_at}}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#m{{$etablissement->id}}">Details</button>
                                        <div class="">
                                            <div class="modal fade" id="m{{$etablissement->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                                <div class="modal fade form-container show" tabindex="-1" role="dialog" style="z-index: 1051; display: block; padding-right: 16px;">
                                                    <div class="modal-dialog booking-info" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">information Etablissement </h4>
                                                                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">×</button>
                                                            </div>
                                                            <div class="modal-body ">
                                                                <table>

                                                                    <body>
                                                                        <tr>
                                                                            <td>
                                                                                <label for="" class="">état</label>
                                                                            </td>
                                                                            <td>
                                                                                <form action="{{ url('admin/user/'.$etablissement->id) }}" method="post">
                                                                                    @method('put')
                                                                                    @csrf
                                                                                    <label for=""></label>
                                                                                    <label class="custom-toggle">
                                                                                        <input type="checkbox" onChange="this.form.submit()" name="active" @if($etablissement->active == 1) checked @endif>
                                                                                        <span class="custom-toggle-slider rounded-circle"></span>
                                                                                    </label>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    </body>
                                                                </table>
                                                                <div class="form-container" style="text-align: lift;">
                                                                    <div id="view-client-info" class="tab-pane client-info">
                                                                        <div class="client-info">
                                                                            <input type="hidden" value="1" id="client_info_id">
                                                                            <div class="row top">
                                                                                <div class="col-sm-12 center">
                                                                                    <div class="client-data">
                                                                                        <div class="table-responsive">
                                                                                            <table class="text-left table table-advance table-bordered data-list">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td class="title">
                                                                                                            <i class="fa fa-user text-left"></i>
                                                                                                            <span class="with-icon"> Etablissement </span>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="data main"><span>{{$etablissement->name}} </span></div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="title">
                                                                                                            <i class="fa fa-user text-left"></i>
                                                                                                            <span class="with-icon"> Nom d'utilisateur </span>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="data main"><span>{{$user->name}} </span></div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="title">
                                                                                                            <i class="fa fa-user"></i>
                                                                                                            <span class="with-icon">Categorie</span>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="data main"><span>{{$etablissement->categorie}}</span></div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="title">
                                                                                                            <i class="fa fa-user"></i>
                                                                                                            <span class="with-icon">Description</span>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="data main"><span>{{$etablissement->description}}</span></div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="title">
                                                                                                            <i class="fa fa-user"></i>
                                                                                                            <span class="with-icon">Url</span>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="data main"><span>{{$etablissement->url}}</span></div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="title">
                                                                                                            <i class="fa fa-envelope"></i>
                                                                                                            <span class="with-icon">Email</span>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="data main">
                                                                                                                <span><a href="mailto:$etablissement->url?subject = Feedback&body = Message">{{$user->email}}</a></span>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    <tr>
                                                                                                        <td class="title">
                                                                                                            <i class="fa fa-phone"></i>
                                                                                                            <span class="with-icon">Téléphone</span>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="data main"><span>{{$etablissement->phone}}</span></div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="title">
                                                                                                            <i class="fa fa-phone"></i>
                                                                                                            <span class="with-icon">Adresse</span>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="data main"><span>{{$etablissement->adresse}}</span></div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="col-sm-12"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-link  ml-auto text-left" data-dismiss="modal">Fermer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="..."></nav>
                </div>
                <div class="d-flex justify-content-end">
                    {!! $etablissements->links() !!}
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
    @endsection

    @push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    @endpush
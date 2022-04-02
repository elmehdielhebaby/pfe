@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7" >
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Clients</h3>
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
                                <th class="text-center" scope="col">Name</th>
                                <th class="text-center" scope="col">Phone </th>
                                <!-- <th scope="col">age</th> -->
                                <th class="text-center" scope="col">Email</th>
                                <th class="text-center" scope="col">Cin</th>
                                <!-- <th scope="col">Adresse</th>   -->
                                <!-- <th scope="col">Date </th>   -->
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($users!=null and $clients!=null)
                            @foreach($clients as $client)
                            @if(auth()->user()->id==$client->user_id)
                            @foreach($users as $user)
                            @if($user->id==$client->client_id)
                            <tr>
                                <th class="text-center">{{$user->name}}</th>
                                <td class="text-center" scope="row"> {{$client->phone}}</td>
                                <!-- <td>{{$client->age}}</td> -->
                                <td class="text-center"><a href="mailto:$user->email?subject = Feedback&body = Message">{{$user->email}}</a></td>
                                <td class="text-center">{{$client->cin}}</td>
                                <td class="text-center text-right">
                                    <div class="dropdown">

                                        <button type="button" class="btn btn-block btn-primary " data-toggle="modal" data-target="#m{{$client->client_id}}">Details</button>
                                        <div class="">
                                            <div class="modal fade" id="m{{$client->client_id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                                <div class="modal fade form-container show" tabindex="-1" role="dialog" style="z-index: 1051; display: block; padding-right: 16px;">
                                                    <div class="modal-dialog booking-info" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Rendez-vous info</h4>
                                                                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="view-client-info" class="tab-pane client-info">
                                                                    <div class="client-info">
                                                                        <div class="col-sm-12 center">
                                                                            <div class="client-photo  hidden">
                                                                                <i class="fa fa-user"></i>
                                                                            </div>
                                                                            <div class="booking-form-title  ">
                                                                                Client Info
                                                                            </div>
                                                                            <div class="table-responsive">
                                                                                <table class="table table-advance table-bordered data-list">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="title">
                                                                                                <span class="with-icon"><i class="fa fa-user text-right"> </i> Name</span>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="data main"><span>{{$user->name}}</span></div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="title">
                                                                                                <span class="with-icon"><i class="fa fa-envelope"></i> Email</span>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="data main">
                                                                                                    <span><a href="mailto:$user->email?subject = Feedback&body = Message">{{$user->email}}</a></span>
                                                                                                </div>
                                                                                            </td>
                                                                                        <tr>
                                                                                            <td class="title">
                                                                                                <span class="with-icon"><i class="fa fa-phone"></i> Phone</span>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="data main"><span><a target="_blank" href="tel:+212665962908">{{$client->phone}}</a></span></div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="title">
                                                                                                <span class="with-icon"><i class="fa fa-user"></i> Age</span>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="data main"><span>{{$client->age}}</span></div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="title">
                                                                                                <span class="with-icon"><i class="fa fa-user"></i> Adresse</span>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="data main"><span>{{$client->adresse}}</span></div>
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
                                                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>




                                                    <div class="loader" style="display: none;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                </div>
            </div>
            <div class="modal fade" id="mo{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default1" aria-hidden="true">
                <!-- <div class="modal fade form-container show"  style="z-index: 1051; display: block; padding-right: 16px;"> -->
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modal-title-default">Confirmation annulation</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger" href="">Confirm</a>
                        </div>
                    </div>
                </div>
                </td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
                @endif
                </tbody>
                </table>
            </div>
            <div class="card-footer py-4">
                <nav aria-label="...">
                    <ul class="pagination justify-content-end mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                                <i class="fas fa-angle-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <!-- <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-angle-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">

                </nav>
            </div>
        </div>
    </div>
</div>
</div>



@include('layouts.footers.auth')
<!-- </div> -->
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
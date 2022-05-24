@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">

    <div class="row">
        <div class="col">
            <div class="card shadow">


                @if(session()->has('rdv_annl'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                    <span class="alert-inner--text"><strong>{{ session()->get('rdv_annl') }} !</strong></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if(session()->has('rdv_confirmer'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-inner--text"><strong>{{ session()->get('rdv_confirmer') }} !</strong></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if(session()->has('rdv_deja'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                    <span class="alert-inner--text"><strong>{{ session()->get('rdv_deja') }} !</strong></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Historique des rendez-vous</h3>
                        </div>
                    </div>
                </div>
                <div class="  table-bordered table-sm">
                    <table class="table align-items-center table-flush" id="dtBasicExample">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">Date</th>
                                <th class="text-center" scope="col">Time </th>
                                <th class="text-center" scope="col">Client</th>
                                <th class="text-center" scope="col">Status</th>
                                <th class="text-center" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rendez_vouss as $rendez_vous)
                                @foreach($clients as $client)
                                    @if($client->id==$rendez_vous->client_id)
                                        @break
                                    @endif
                            @endforeach
                            <!-- <tr>  -->
                            <tr>
                                <th class="text-center">{{$rendez_vous->date}}</th>
                                <td class="text-center" scope="row"> {{$rendez_vous->time}}</td>
                                <td class="text-center">{{$client->name}}</td>
                                @if($rendez_vous->active==1)
                                <td class="text-center text-warning">Pending </td>
                                @endif
                                @if($rendez_vous->active==2)
                                <td class="text-center text-success">Confirmed </td>
                                @endif
                                @if($rendez_vous->active==0)
                                <td class="text-center text-danger">Canceled </td>
                                @endif
                                <td class="text-right">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#m{{$rendez_vous->id}}">Details</button>
                                        <div class="">
                                            <div class="modal fade" id="m{{$rendez_vous->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                                <div class="modal fade form-container show" tabindex="-1" role="dialog" style="z-index: 1051; display: block; padding-right: 16px;">
                                                    <div class="modal-dialog booking-info" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Rendez-vous info</h4>
                                                                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-container">
                                                                    <!-- <div class="booking-info-container"> -->
                                                                    <!-- <ul class="nav nav-tabs custom-tabs">
                                                                                                    <li>
                                                                                                        <a data-toggle="tab" href="#booking-info" class="btn btn-link text-primary">
                                                                                                            <div class="title">Booking</div>
                                                                                                        </a>
                                                                                                    </li>
                                                                                                    <li class="">
                                                                                                        <a data-toggle="tab" href="#view-client-info" class="btn btn-link text-primary">
                                                                                                            <div class="title">Client</div>
                                                                                                        </a>
                                                                                                    </li>
                                                                                                </ul> -->
                                                                    <div class="tab-content">
                                                                        <!-- <div id="booking-info" class="tab-pane active">
                                                                                <div class="top-block row"> -->
                                                                        <div class="col-md-2 col-sm-10">
                                                                            <div class="date-time">
                                                                                <div class="time-interval text-left">
                                                                                    <div class="">
                                                                                        <i class="fa fa-calendar-alt"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="time-interval text-left">
                                                                                    <label class="text-left">Date : </label>
                                                                                    <label for=""> {{$rendez_vous->date}}</label>
                                                                                </div>
                                                                                <div class="time-interval text-left">
                                                                                    <label class="text-top">Time : </label>
                                                                                    {{$rendez_vous->time}}
                                                                                </div>
                                                                            </div>
                                                                            <div class="booking-history-block ">
                                                                                <div class="history with-icon">
                                                                                    <span class="one-row">
                                                                                        <i class="fa ico color-info fa-file-plus"></i>
                                                                                        Created by client :
                                                                                    </span>
                                                                                    <span>{{$rendez_vous->created_at}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- /.left -->
                                                                    </div>

                                                                    <div id="view-client-info" class="tab-pane client-info">
                                                                        <div class="client-info">
                                                                            <input type="hidden" value="1" id="client_info_id">
                                                                            <div class="row top">
                                                                                <div class="col-sm-12 center">
                                                                                    <div class="client-data">
                                                                                        <div class="client-photo  text-center hidden">
                                                                                            <i class="fa fa-user"></i>
                                                                                        </div>
                                                                                        <div class="booking-form-title  text-center ">
                                                                                            Client Info
                                                                                        </div>
                                                                                        <div class="table-responsive">
                                                                                            <table class="text-left table table-advance table-bordered data-list">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td class="title">
                                                                                                            <i class="fa fa-user text-left"></i>
                                                                                                            <span class="with-icon"> Name </span>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="data main"><span>{{$client->name}} </span></div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="title">
                                                                                                            <i class="fa fa-user"></i>
                                                                                                            <span class="with-icon">Age</span>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="data main"><span>{{$client->age}}</span></div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="title">
                                                                                                            <i class="fa fa-envelope"></i>
                                                                                                            <span class="with-icon">Email</span>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="data main">
                                                                                                                <span><a href="mailto:$client->email?subject = Feedback&body = Message">{{$client->email}}</a></span>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    <tr>
                                                                                                        <td class="title">
                                                                                                            <i class="fa fa-phone"></i>
                                                                                                            <span class="with-icon">Phone</span>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="data main"><span><a target="_blank" href="tel:+212665962908">{{$client->phone}}</a></span></div>
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
                                                                    </div><!-- /#client-info -->
                                                                    <!-- </div> -->
                                                                    <!-- </div> -->
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Fermer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="mo{{$rendez_vous->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default1" aria-hidden="true">
                                            <!-- <div class="modal fade form-container show"  style="z-index: 1051; display: block; padding-right: 16px;"> -->
                                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="modal-title-default">Confirmation annulation</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-6 col-sm-8">
                                                            <div class="date-time">
                                                                <div class="date-interval">
                                                                    <i class="fa fa-calendar-alt"></i>
                                                                    <div class="date-from">Date :{{$rendez_vous->date}}</div>
                                                                </div>
                                                                <div class="time-interval">
                                                                    <div class="time-from">Time : {{$rendez_vous->time}}</div>
                                                                </div>
                                                            </div><!-- /.date-time -->
                                                            <!-- <div class="booking-code">15k10nnl</div> -->
                                                            <div class="booking-history-block ">
                                                                <div class="history with-icon">
                                                                    <span class="one-row">
                                                                        <i class="fa ico color-info fa-file-plus"></i>
                                                                    </span>
                                                                    <span>Created at : {{$rendez_vous->date}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cancel</button>
                                                        <a class="btn btn-danger" href="{{ url('rendez_vous.annuler/'.$rendez_vous->id) }}">Confirm</a>
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
                    <nav aria-label="demo" class="demo" id="demo">
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


    <script>
        $(document).ready(function() {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>


    @include('layouts.footers.auth')
    <!-- </div> -->
    @endsection

    @push('js')

    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    @endpush
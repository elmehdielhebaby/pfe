@extends('layouts.app')

@section('content')
  @include('layouts.headers.cards')
    

  @foreach($clients as $client)
    @foreach($users as $user)
    @endforeach                
  @endforeach
                      

            

  <div class="container-fluid mt-3">
    <div class="row">
      <div class="col">
        <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Les rendez-vous</h3>
              </div>
                    <!-- <div class="col-4 text-right">
                        <a href="" class="btn btn-sm btn-primary">Add user</a>
                    </div> -->
            </div>
          </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Service duration </th>
                            <!-- <th scope="col">Service name</th> -->
                            <th scope="col">Client</th>
                            <th scope="col"></th>  
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rendez_vouss as $rendez_vous)
                            @if($rendez_vous->active==1)
                                @foreach($clients as $client)
                                                @if($client->client_id==$rendez_vous->client_id)
                                                    @foreach($users as $user)
                                                        @if($user->id==$rendez_vous->client_id)
                                                            @break
                                                        @endif
                                                    @endforeach 
                                                    @break
                                                @endif
                                            @endforeach
                                            <!-- <tr>  -->
                                            <tr >
                                                <th>{{$rendez_vous->date}}</th>
                                                <td scope="row"> {{$rendez_vous->time}}</td>
                                                <td>{{$user->name}}</td>
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <!-- <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <a class="dropdown-item" href="{{ url('rendez_vous.annuler/'.$rendez_vous->id) }}">Annuler</a>
                                                            <a class="dropdown-item" href="#">Detais</a>
                                                        </div> -->
                                                        <!-- <button type="button" class="btn btn-block btn-primary mb-3" data-toggle="modal" data-target="#modal-default">Default</button>
                                                        <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true"> -->
            
                                                        <button type="button" class="btn btn-block btn-primary mb-3" data-toggle="modal" data-target="#m{{$user->id}}">Details</button>
                                                            <div class="">
                                                                <div class="modal fade" id="m{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                                                    <div class="modal fade form-container show" tabindex="-1" role="dialog" style="z-index: 1051; display: block; padding-right: 16px;">
                                                                        <div class="modal-dialog booking-info" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">Rendez-vous info</h4>
                                                                                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">×</button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="form-container">
                                                                                        <div class="booking-info-container">
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
                                                                                                <input type="hidden" id="edit_allowed" value="1">
                                                                                                <input type="hidden" id="is_google_maps_booking" value="">
                                                                                                <div id="booking-info" class="tab-pane active">
                                                                                                    <div class="top-block row">
                                                                                                        <div class="col-md-4 col-sm-5">
                                                                                                            <div class="date-time">
                                                                                                                <div class="date-interval">
                                                                                                                    <i class="fa fa-calendar-alt"></i>
                                                                                                                    <div class="date-from">{{$rendez_vous->date}}</div>
                                                                                                                </div>
                                                                                                                <div class="time-interval">
                                                                                                                    <div class="time-from">{{$rendez_vous->time}}</div>
                                                                                                                    <!-- <div class="delimiter">-</div> -->
                                                                                                                    <!-- <div class="time-to">18:00 </div> -->
                                                                                                                </div>
                                                                                                                <!-- <div class="duration">
                                                                                                                    <i class="fa fa-hourglass-start"></i>
                                                                                                                    <span>1 hr.</span>
                                                                                                                </div> -->
                                                                                                            </div><!-- /.date-time -->
                                                                                                                <!-- <div class="booking-code">15k10nnl</div> -->
                                                                                                                <div class="booking-history-block ">
                                                                                                                    <div class="history with-icon">
                                                                                                                        <span class="one-row">
                                                                                                                            <i class="fa ico color-info fa-file-plus"></i>
                                                                                                                            Created by client
                                                                                                                        </span>
                                                                                                                        <span>{{$rendez_vous->date}}</span>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                        </div><!-- /.left -->

                                                                                                        <!-- -Right  -->
                                                                                                        <!-- <div class="col-md-8 col-sm-7">
                                                                                                            <div class="service-name">Service name 1</div>
                                                                                                            <ul class="data-list">
                                                                                                                <li class="perfomer-name with-icon">
                                                                                                                    <figure class="provider-with-dot">
                                                                                                                        <i class="fa ico fa-user"></i>
                                                                                                                    </figure>
                                                                                                                    <span>Provider name 1</span>
                                                                                                                    <a class="action" href="/v2/management/#providers/edit/details/1" title="Manage provider" target="_blank"><i class="fa fa-edit"></i></a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </div> -->
                                                                                                        <!-- /.right -->
                                                                                                    </div>
                                                                                                    <div class="main-block form-horizontal">
                                                                                                        <div class="comment" id="comment_list">
                                                                                                            <!-- <div class="full-comment-list"></div>
                                                                                                                <a href="javascript:" id="load_comments" class=" mr-3 mb-2"><i class="fa fa-eye"></i>Show all comments</a>
                                                                                                                <a href="javascript:" id="add_comment_book_info" class=" mb-2"><i class="fal fa-pencil"></i>Comment</a>
                                                                                                            </div> -->
                                                                                                            <!-- /.comment -->
                                                                                                            <div class="status-in-calendar"></div>
                                                                                                    </div>
                                                                                                </div><!-- /#booking-info -->
                                                                                                <div id="view-client-info" class="tab-pane client-info">
                                                                                                    <div class="client-info">
                                                                                                        <input type="hidden" value="1" id="client_info_id">
                                                                                                        <div class="row top">
                                                                                                            <div class="col-sm-12">
                                                                                                                <div class="client-photo  hidden">
                                                                                                                    <i class="fa fa-user"></i>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-sm-12 center">
                                                                                                                <div class="client-data">
                                                                                                                    <div class="booking-form-title  ">
                                                                                                                        Client Info
                                                                                                                    </div>
                                                                                                                    <div class="table-responsive">
                                                                                                                        <table class="table table-advance table-bordered data-list">
                                                                                                                            <tbody>
                                                                                                                                <tr>
                                                                                                                                    <td class="title">
                                                                                                                                        <span class="with-icon"><i class="fa fa-user"></i>Client name</span>
                                                                                                                                    </td>
                                                                                                                                    <td>
                                                                                                                                        <div class="data main"><span>{{$user->name}}</span></div>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td class="title">
                                                                                                                                        <span class="with-icon"><i class="fa fa-envelope"></i>{{$user->email}}</span>
                                                                                                                                    </td>
                                                                                                                                    <td>
                                                                                                                                        <div class="data main">
                                                                                                                                            <span><a href="mailto:halyniwoju@mailinator.com?subject=Concerning%20your%20booking%20with%20Provider%20name%201%20on%20the%3A%2011-03-2022%2017%3A00">halyniwoju@mailinator.com</a></span>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                <tr>
                                                                                                                                    <td class="title">
                                                                                                                                        <span class="with-icon"><i class="fa fa-phone"></i>Phone</span>
                                                                                                                                    </td>
                                                                                                                                    <td>    
                                                                                                                                        <div class="data main"><span><a target="_blank" href="tel:+212665962908">{{$client->phone}}</a></span></div>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <!-- <div class="txt-left edit-link mt-3">
                                                                                                                    <a href="javascript:;" class="btn btn-primary mb-2" id="edit_client">
                                                                                                                        <i class="fa fa-edit mr-2"></i> Edit
                                                                                                                    </a>
                                                                                                                </div> -->
                                                                                                            </div>
                                                                                                            <div class="col-sm-12"></div>
                                                                                                        </div>      
                                                                                                    </div>
                                                                                                </div><!-- /#client-info -->
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                                                                                    <!-- <a class="btn btn-danger" href="{{ url('rendez_vous.annuler/'.$rendez_vous->id) }}">Annuler rendez-vous</a> -->
                                                                                    <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#mo{{$user->id}}">Annuler rendez-vous</button>


                                                                                    
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
                                                                    <h6 class="modal-title" id="modal-title-default">Confirmation annulation</h6>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <div class="col-md-6 col-sm-8">
                                                              <div class="date-time">
                                                                <div class="date-interval">
                                                                  <i class="fa fa-calendar-alt"></i>
                                                                  <div class="date-from">Date     :{{$rendez_vous->date}}</div>
                                                                </div>
                                                                <div class="time-interval">
                                                                  <div class="time-from">Time    : {{$rendez_vous->time}}</div>
                                                                </div>
                                                              </div><!-- /.date-time -->
                                                                  <!-- <div class="booking-code">15k10nnl</div> -->
                                                              <div class="booking-history-block ">
                                                                <div class="history with-icon">
                                                                  <span class="one-row">
                                                                    <i class="fa ico color-info fa-file-plus"></i>
                                                                  </span>
                                                                  <span>Created at   :   {{$rendez_vous->date}}</span>
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
                                                    </div>
                                                </td>
                                            </tr >
                                        @endif
                                    @endforeach
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
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
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

           

        

        <!-- @include('layouts.footers.auth') -->
    <!-- </div> -->
 @endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
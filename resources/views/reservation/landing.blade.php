<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets3/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets3/img/favicon.png">
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

<body class="landing-page">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light py-2">
    <div class="container">
      <a class="navbar-brand mr-lg-5" href="#">
        <img src="/assets3/img/brand/white.png" width="120" height="200">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="#">
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
          <li class="nav-item">
            
              <a role="tab" href='#mes_rendez_vous' class="btn btn-link text-white " style="font-size:16px">Profile</a>
          
              

              
            
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
  <div class="wrapper">
    <div class="section section-hero section-shaped">
      <div class="shape shape-style-3 shape-default">
        <span class="span-150"></span>
        <span class="span-50"></span>
        <span class="span-50"></span>
        <span class="span-75"></span>
        <span class="span-100"></span>
        <span class="span-75"></span>
        <span class="span-50"></span>
        <span class="span-100"></span>
        <span class="span-50"></span>
        <span class="span-100"></span>
      </div>
      <div class="page-header">
        <div class="container shape-container d-flex align-items-center py-lg">
          <div class="col px-0">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-8 text-center">
                <h1 class="text-white display-1">{{$etablissement->name}}</h1>
                <h2 class="display-4 font-weight-normal text-white">{{$etablissement->description}}</h2>
                <div class="btn-wrapper mt-4">


                  <form action="{{route('rendezvous.create')}}" role="form" method="get">
                    <!-- @method('PUT') -->
                    @csrf
                    <input type="hidden" name="etablissement_id" value="{{$etablissement->id}}">
                    <input type="hidden" name="client_id" value="{{auth()->user()->id}}">
                    <!-- <label for="date" class="col-1 col-form-label text-white" > Date </label>
                    <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                      <div class="center input-group date col-5" data-provide="datepicker">
                        <input name="text" type="text" class="form-control" required >
                        <div class="input-group-addon">
                          <span  class=" input-group-text bg-light d-block">
                            <i class="fa fa-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    @if ($errors->has('date'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                          <strong>{{ $errors->first('date') }}</strong>
                        </span>
                    @endif -->
                    <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                      <div class="form-group center col-8">
                        <label for="date" class=" col-form-label text-white">Date</label>
                        <input type="date" name="date" value="{{old('date')}}" class="form-control" required>
                      </div>
                    </div>
                    @if ($errors->has('date'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('date') }}</strong>
                    </span>
                    @endif

                    <!-- 
                    <script>
                        $('#datepicker').datepicker({
                            uiLibrary: 'bootstrap4'
                        });
                    </script>
                   
                    <script type="text/javascript">
                      $(function () {
                          $('#datetimepicker11').datetimepicker({
                              daysOfWeekDisabled: [0, 6]
                          });
                      });
                    </script> -->
                    <div class="form-group{{ $errors->has('time') ? ' has-danger' : '' }}">
                      <div class="center col-8">
                        <label for="" class="text-white">Time</label>
                        <select name="time" class="custom-select custom-select-lg mb-3" required>
                          <option value="08:00:00">08:00</option>
                          <option value="09:00:00">09:00</option>
                          <option value="10:00:00">10:00</option>
                          <option value="11:00:00">11:00</option>
                          <option value="12:00:00">12:00</option>
                          <option value="13:00:00">13:00</option>
                          <option value="14:00:00">14:00</option>
                        </select>
                      </div>
                    </div>
                    @if ($errors->has('time'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                      <strong>{{ $errors->first('time') }}</strong>
                    </span>
                    @endif


                    <!-- <a class="btn btn-warning btn-icon mt-3 mb-sm-0">
                    <span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
                    <span class="btn-inner--text">Rendez-vous</span>
                  </a> -->

                    <button type="submit" class="btn btn-success">Rendez-vous</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <div class="section section-components" id='mes_rendez_vous'>
      <div class="container">
        <h3 class="h4 text-success font-weight-bold mb-4">
          </h4>
          <div class="row justify-content-center">
            <div class="col-lg-11">
              <!-- Tabs with icons -->
              <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-calendar-grid-58 mr-2"></i>Mes Rendez-vous</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="true"><i class="ni ni-bell-55 mr-2"></i>Profile</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Messages</a>
                  </li> -->
                </ul>
              </div>
              <div class="card shadow">
                <div class="card-body">
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                      <div class="table-responsive">
                        <table class="table align-items-center table-flush ">
                          <thead class="thead-light">
                            <tr>
                              <th class="text-center " scope="col">Date</th>
                              <th class="text-center" scope="col">Time </th>
                              <!-- <th scope="col">Service name</th> -->
                              <th class="text-center" scope="col">Created at</th>
                              <th class="text-center" scope="col">Status</th>
                              <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($rendez_vouss as $rendez_vous)
                            @if($rendez_vous->client_id==auth()->user()->id and $rendez_vous->etablissement_id==$etablissement->id)
                            <tr>
                              <th class="text-center " style="vertical-align: middle">{{$rendez_vous->date}}</th>
                              <td class="text-center" style="vertical-align: middle"> {{$rendez_vous->time}}</td>
                              <td class="text-center" style="vertical-align: middle">{{$rendez_vous->created_at}}</td>
                              @if($rendez_vous->active==1)
                              <td class="text-center text-warning " style="vertical-align: middle">Pending </td>
                              @endif
                              @if($rendez_vous->active==2)
                              <td class="text-center text-success" style="vertical-align: middle">Confirmed </td>
                              @endif
                              @if($rendez_vous->active==0)
                              <td class="text-center text-danger" style="vertical-align: middle">Canceled</td>
                              @endif
                              <td class="text-center">
                                <!-- <div class="dropdown "> -->
                                <form action="{{route('rendez_vous.pdf')}}" method="get" >
                                  <button type="submit" class="btn btn-primary "><i class="fa fa-file-pdf-o"></i> pdf</button>
                                  <button type="button" class="btn  btn-danger " data-toggle="modal" data-target="#l{{$rendez_vous->id}}">Annuler rendez-vous</button>
                                  <input type="hidden" name="id" value="{{$rendez_vous->id}}">
                                </form>
                                <div class="modal fade" id="l{{$rendez_vous->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                  <div class="modal fade form-container show" tabindex="-1" role="dialog" style="z-index: 1051; display: block; padding-right: 16px;">
                                    <div class="modal-dialog booking-info" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Confirmation annulation</h5>
                                          <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">×</button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="form-container">
                                            <div class="booking-info-container">
                                              <div class="tab-content">
                                                <div id="booking-info" class="tab-pane active">
                                                  <div class="top-block row">
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
                                                  <div class="main-block form-horizontal">
                                                    <div class="comment" id="comment_list">
                                                      <div class="status-in-calendar"></div>
                                                    </div>
                                                  </div><!-- /#booking-info -->
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cancel</button>
                                                  <a class="btn btn-danger" href="{{ url('rendez_vous.annuler/'.$rendez_vous->id) }}">Confirm</a>
                                                  <div class="loader" style="display: none;"></div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- </div> -->

                              </td>
                            </tr>
                            @endif
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                        </nav>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                      <div class="table-responsive">
                        <div class="" >
                          <form method="get" role="form" action="{{ route('client.profile') }}">
                            <button type="submit" class="btn btn-sm btn-link float-right ">{{ __('Edit') }}</button>
                            <input type="hidden" name="url" value="{{$etablissement->url}}">
                          </form>
                        </div>
                        <div class="text-center mt-5">
                          <h3>{{ auth()->user()->name }} <span class="font-weight-light">, {{ $client->age }}</span></h3>
                          <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i>{{ $client->phone }}</div>
                          <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i>{{ $client_user_table->email }}</div>
                          <div class="h6 mt-4"><i class="ni business_briefcase-24 mr-2"></i>{{ $client->adresse }}</div>
                          <!-- <div><i class="ni education_hat mr-2"></i>University of Computer Science</div> -->
                        </div>
                        <!-- <div class="mt-5 py-5 border-top text-center">
                          <div class="row justify-content-center">
                            <div class="col-lg-9">
                              <p>An artist of considerable range, Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.</p>
                              <a href="javascript:;">Show more</a>
                            </div>
                          </div>
                        </div> -->
                        <!-- </div>
                            </div>
                          </div> -->
                        <!-- </section> -->


                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>






    </div>
  </div>
  </div>
  <br /><br />
  <footer class="footer" id="lop">
    @include('layouts.footers.nav')
  </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="assets3/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets3/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets3/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets3/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="assets3/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets3/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <script src="assets3/js/plugins/moment.min.js"></script>
  <script src="assets3/js/plugins/datetimepicker.js" type="text/javascript"></script>
  <script src="assets3/js/plugins/bootstrap-datepicker.min.js"></script>
  <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <script src="assets3/js/argon-design-system.min.js?v=1.2.2" type="text/javascript"></script>
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
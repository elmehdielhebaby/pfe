<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <h1>Hello, world!</h1>


    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">.1..</div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">..2.</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">.3..</div>
    </div>


    <div class="row justify-content-center">
        <div class="col-lg-11">
            <!-- Tabs with icons -->
            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-bs-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-calendar-grid-58 mr-2"></i>Mes Rendez-vous</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-bs-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>L'historique
                            des rendez vous</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-bs-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Profile</a>
                    </li>
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
                                    
                            </div>
                            <div class="card-footer py-4">
                                <nav class="d-flex justify-content-end" aria-label="...">
                                </nav>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush ">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center " scope="col">Date</th>
                                            <th class="text-center" scope="col">Time </th>
                                            <th class="text-center" scope="col">Created at</th>
                                            <th class="text-center" scope="col">Status</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    
                                </table>
                            </div>
                            <div class="card-footer py-4">
                                <nav class="d-flex justify-content-end" aria-label="...">
                                </nav>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                            <div class="table-responsive">
                                <div class="">
                                    <form method="get" role="form" action="{{ route('client.profile') }}">
                                    </form>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>











    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
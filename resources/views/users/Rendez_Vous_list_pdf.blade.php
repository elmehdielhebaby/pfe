<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="screen.css" media="screen">
    <link rel="stylesheet" href="impression.css" type="text/css" media="print">
    <style>

    </style>
</head>

<body>

    <table class="table align-items-center table-flush" id="dtBasicExample">
        <thead class="thead-light">
            <tr>
                <th class="text-center" scope="col">Date</th>
                <th class="text-center" scope="col">Temps </th>
                <th class="text-center" scope="col">Client</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rendez_vouss as $rendez_vous)
            @foreach($clients as $client)
            @if($client->id==$rendez_vous->client_id)
            @break
            @endif
            @endforeach
            <tr>
                <th class="text-center">{{$rendez_vous->date}}</th>
                <td class="text-center" scope="row"> {{$rendez_vous->time}}</td>
                <td class="text-center">{{$client->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
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
        /* @font-face {
            font-family: SourceSansPro;
            src: url(SourceSansPro-Regular.ttf);
        } */

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 16cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }


        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 20px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3 {
            color: #57B223;
            font-size: 1em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1em;
            background: #57B223;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {}

        table .total {
            background: #57B223;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>

    <br>
    <br>

    <h1>Liste des rendez vous </h1>
    <h3>date : {{ $toDate}}</h3>
    <br>
    <br>

    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th class="text-center total" scope="col">N</th>
                <th class="text-center unit" scope="col">Date</th>
                <th class="text-center qty" scope="col">Temps </th>
                <th class="text-center total" scope="col">Client</th>
            </tr>
        </thead>
        <tbody>
            {{$key=1}}
            @foreach($rendez_vouss as $rendez_vous)
            @foreach($clients as $client)
            @if($client->id==$rendez_vous->client_id)
            @break
            @endif
            @endforeach
            <tr>
                <td class="text-center total" scope="col">{{$key}}</td>
                <th class="text-center unit" scope="col">{{$rendez_vous->date}}</th>
                <td class="text-center qty" scope="col"> {{$rendez_vous->time}}</td>
                <td class="text-center total" scope="col">{{$client->name}}</td>
            </tr>
            {{$key+1}}
            @endforeach
            </tfoot>
    </table>

    <!-- 
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
        </tbody> -->
    </table>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf</title>
    <link rel="stylesheet" type="text/css" href="screen.css" media="screen">
    <link rel="stylesheet" href="impression.css" type="text/css" media="print">
    <style>
        body {
            /* Modifications : la couleur de fond de page - la police - l'unité utilisée pour la taille de la police  */
            background-color:
                #fff;
            font-family: Serif;
            font-size: 15pt;
        }

        #page {
            /* Modifications : suppression de la bordure - marges */
            margin: 0;
            border: none;
        }

        #banner,
        #menuright,
        #footer {
            /* Les éléments qui ne seront pas affichés  */
            display: none;
        }

        h1#top {
            /* Affichage du titre */
            margin: 0;
            padding: 0;
            text-indent: 0;
            line-height: 25pt;
            font-size: 25pt;
        }

        h2,
        h3,
        #contenu h3,
        #contenu a,
        a {
            /* Modification de la couleur des titres et liens */
            color:
                #000;
        }
    </style>
</head>

<body>


    <h1 style="color:#0fb000;padding-left: 4%;">Reçu</h1>

    <hr width="100%" color="#edf0f5">

    <h3 style="color:#0fb000;text-align:left;padding-left: 2%;">Client</h3>
    <table style="background-color:#f2f5fa;padding: 1px;text-align:left;width:60%;">
        <tr style="margin-right: 150px;">
            <th style="padding: 3px;">Nom :</th>
            <td style="padding: 3px;">{{auth()->user()->name}}</td>
        </tr>
        <tr>
            <th style="padding: 3px;">Cin :</th>
            <td style="padding: 3px;">{{auth()->user()->cin}}</td>
        </tr>
        <tr>
            <th style="padding: 3px;">Tel :</th>
            <td style="padding: 3px;">{{auth()->user()->phone}}</td>
        </tr>
        <tr>
            <th style="padding: 3px;">Email :</th>
            <td style="padding: 3px;">{{auth()->user()->email}}</td>
        </tr>
        <tr>
            <th style="padding: 3px;">Adresse :</th>
            <td style="padding: 3px;">{{auth()->user()->adresse}}</td>
        </tr>
    </table>

    <hr width="100%" color="#0fb000">

    <h3 style="color:#0fb000;text-align:left;padding-left: 2%;">Rendez Vous</h3>
    <table style="padding: 1px;text-align:left;width:40%;">
        <tr style="margin-right: 150px;">
            <th style="padding: 3px;">id :</th>
            <td style="padding: 3px;">{{$rendez_vous->id}}</td>
        </tr>
        <tr>
            <th style="padding: 3px;">date :</th>
            <td style="padding: 3px;">{{$rendez_vous->date}}</td>
        </tr>
        <tr>
            <th style="padding: 3px;">Temps :</th>
            <td style="padding: 3px;">{{$rendez_vous->time}}</td>
        </tr>
        <tr style="text-align:left;">
            <th style="padding: 3px;">Créer le :</th>
            <td style="padding: 3px;">{{$rendez_vous->created_at}}</td>
        </tr>
    </table>

    <hr width="100%" color="#0fb000">

    <h3 style="color:#0fb000;text-align:left;padding-left: 2%;">Etablissement</h3>
    <table style="padding: 1px;text-align:left;width:100%;">
        <tr style="margin-right: 150px;">
            <th style="padding: 3px;">Nom :</th>
            <td style="padding: 3px;">{{$etablissement->name}}</td>
        </tr>
        <tr>
            <th style="padding: 3px;">Téléphone :</th>
            <td style="padding: 3px;">{{$etablissement->phone}}</td>
        </tr>
        <tr>
            <th style="padding: 3px;">adresse:</th>
            <td style="padding: 3px;">{{$email_etablissement}}</td>
        </tr>
        <tr>
            <th style="padding: 3px;">adresse:</th>
            <td style="padding: 3px;">{{$etablissement->adresse}}</td>
        </tr>
    </table>


</body>

</html>
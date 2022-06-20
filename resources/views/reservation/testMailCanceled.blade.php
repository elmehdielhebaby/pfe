<!DOCTYPE html>
<html>

<head>
	<title>Email FORM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		/* table {
		  border: 2px solid black;
			} */
		h5 {
			text-indent: 20px;
			text-align: justify;
			letter-spacing: 3px;
		}
	</style>
</head>

<body>
	<h3>Bonjour {{$details['name_client']}}</h3>
	<p>Votre rendez vous a été Annulé</p>
	<p>Merci de prendre un autre rendez vous dans une differente date</p>
	<center>
		<table>
			<colgroup>
				<col width="400px">
				<col width="300px">
			</colgroup>
			<tr>
				<td>
					<h4>{{$details['name_etablissement']}}</h4>
					<dl>
						<dt></dt>
						<dd></dd>
				</td>
				<td></td>
			</tr>
			<!-- <tr>
		    <td><h5><i class="fa fa-star-o"></i>Nom de l'événement</h5><dl><dt></dt><dd>service 1</dd></dl></td>
		    <td><h5><i class="fa fa-user"></i>Intervenants/artistes</h5><dl><dt></dt><dd>prestataire1</dd></td>
		  </tr> -->
			<tr>
				<td>
					<h5><i class="fa fa-clock-o"></i>Date</h5>
					<dl>
						<dt></dt>
						<dd>{{$details['date']}}</dd>
				</td>
				<td>
					<h5><i class="fa fa-comments-o"></i>time</h5>
					<dl>
						<dt></dt>
						<dd>{{$details['time']}}</dd>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<h5><i class="fa fa-map-marker"></i>Adresse</h5>
					<dl>
						<dt></dt>
						<dd>{{$details['adress']}}</dd>
				</td>
			</tr>
		</table>
	</center>
</body>

</html>
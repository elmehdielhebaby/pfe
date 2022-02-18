<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon.ico">

	<title>REGISTER</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />
</head>

<body>
	<div class="image-container set-full-height" style="background-image: url('assets/img/wizard-profile.jpg')">
	    <!--   Creative Tim Branding   -->
	    <!--<a href="#">
	         <div class="logo-container">
	            <div class="logo">
	                <img src="assets/img/new_logo.png">
	            </div>
	            <div class="brand">
	                Creative Tim
	            </div>
	        </div>
	    </a>
-->
	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="purple" id="wizardProfile">
		                    <form role="form" method="post" action="{{ route('register') }}">
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
								@csrf
		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        	   Créer Votre Profile
		                        	</h3>
									<!-- <h5>This information will let us know more about you.</h5> -->
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#about" data-toggle="tab">About</a></li>
			                            <li><a href="#account" data-toggle="tab">Account</a></li>
			                            <li><a href="#address" data-toggle="tab">Address</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="about">
		                              <div class="row">
		                                	<h4 class="info-text"> Commençant Par les informations basique (avec validation)</h4>
		                                	<!-- <div class="col-sm-4 col-sm-offset-1">
		                                    	<div class="picture-container">
		                                        	<div class="picture">
                                        				<img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
		                                            	<input type="file" id="wizard-picture">
		                                        	</div>
		                                        	<h6>Choose Picture</h6>
		                                    	</div>
		                                	</div> -->
		                                	<div class="col-sm-6 col-sm-offset-2">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
													<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} label-floating">
			                                          <label class="control-label">Votre nome et prénom <small>(required)</small></label>
			                                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
			                                        </div>
												</div>
												@if ($errors->has('name'))
													<span class="invalid-feedback" style="display: block;" role="alert">
														<strong>{{ $errors->first('name') }}</strong>
													</span>
												@endif
		                                	</div>
		                                	<div class="col-sm-6 col-sm-offset-2">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
													<div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} label-floating">
			                                            <label class="control-label">Email <small>(required)</small></label>
			                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" required>
			                                        </div>
												</div>
												@if ($errors->has('email'))
													<span class="invalid-feedback" style="display: block;" role="alert">
														<strong>{{ $errors->first('email') }}</strong>
													</span>
												@endif
		                                	</div>
											<div class="col-sm-6 col-sm-offset-2">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock_outline</i>
													</span>
													<div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} label-floating">
			                                            <label class="control-label">Nouveau mot de pass<small>(required)</small></label>
														<input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" required>
			                                        </div>
												</div>
												@if ($errors->has('password'))
													<span class="invalid-feedback" style="display: block;" role="alert">
														<strong>{{ $errors->first('password') }}</strong>
													</span>
												@endif
		                                	</div>
											<div class="col-sm-6 col-sm-offset-2">
												<div class="input-group">
													<span class="input-group-addon">
													<i class="material-icons">lock_outline</i>
													</span>
													<div class="form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} label-floating">
			                                            <label class="control-label">Confirmer mot de passe<small>(required)</small></label>
			                                            <input class="form-control" type="password" name="password_confirmation" required>
			                                        </div>
												</div>
												@if ($errors->has('password_confirmation'))
													<span class="invalid-feedback" style="display: block;" role="alert">
														<strong>{{ $errors->first('password_confirmation') }}</strong>
													</span>
												@endif
		                                	</div>
		                            	</div>
		                            </div>
		                            <div class="tab-pane" id="account">
		                                <h4 class="info-text"> What are you doing? (checkboxes) </h4>
		                                <div class="row">
		                                    <div class="col-sm-8 col-sm-offset-2">
												<div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }} label-floating">
		                                            <label class="control-label">Téléphone travail</label>
		                                            <input type="tel" id="phone" name="phone" class="form-control" required>
		                                        </div>
												<div class="form-group label-floating">
													<label class="control-label">Veuillez choisir la catégorie de votre entreprise</label>
	                                            	<select name="categorie" class="form-control" required>
	                                                	<option disabled="" selected=""></option>
														<option value="Retailers"> Retailers </option>
														<option value="Beauté et bien-être">  Beauté et bien-être </option>
														<option value="Sports">  Sports </option>
														<option value="Médical">Médical </option>
														<option value="Rendez-vous personnels et services">  Rendez-vous personnels et services </option>
														<option value="Education"> Education</option>
														<option value="Evénements et divertissements"> Evénements et divertissements </option>
														<option value="Officiel"> Officiel </option>
	                                                	<option value="Supermarket"> Supermarket </option>
	                                                	<option value="Retail Finance">Retail Finance </option>
	                                                	<option value="Other retailers">  Other retailers </option>
	                                                	<option value="Entraîneurs personnels">Entraîneurs personnels </option>
	                                                	<option value="Gyms">Gyms</option>
	                                                	<option value="Cours de fitness">  Cours de fitness </option>
	                                                	<option value="Cours de yoga"> Cours de yoga </option>
	                                                	<option value="Cours de golf"> Cours de golf </option>
														<option value="Location de produits sportifs"> Location de produits sportifs </option>
														<option value="Massage"> Massage </option>
														<option value="Salons de beauté"> Salons de beauté </option>
														<option value="Salons de coiffure">Salons de coiffure </option>
														<option value="Salons de manucure">  Salons de manucure </option>
														<option value="Extensions de cils"> Extensions de cils </option>
														<option value="Spa"> Spa </option>
														<option value="Cliniques et médecins">  Cliniques et médecins </option>
														<option value="Dentistes"> Dentistes </option>
														<option value="Ostéopathes"> Ostéopathes </option>
														<option value="Acupuncture"> Acupuncture </option>
														<option value="Physiologistes"> Physiologistes </option>
														<option value="Psychologues"> Psychologues </option>
														<option value="Rendez-vous personnels et services">  Rendez-vous personnels et services </option>
														<option value="Conseil en affaires">Conseil en affaires </option>
														<option value="Conseil">  Conseil </option>
														<option value="Coaching"> Coaching </option>
														<option value="Services spirituels">Services spirituels </option>
														<option value="Consultants en design">  Consultants en design </option>
														<option value="Nettoyage">Nettoyage </option>
														<option value="Maison"> Maison </option>
														<option value="Services pour les animaux">   Services pour les animaux </option>
	                                                	<option value="...">...</option>
	                                            	</select>
		                                        </div>
												<div class="form-group label-floating">
		                                            <label class="control-label">Adresse de l’entreprise</label>
		                                            <input type="text" name="adresse" class="form-control" required>
		                                        </div>
												<div class="form-group label-floating">
		                                            <label class="control-label">Titre de votre page de réservation (nom de l’entreprise, par exemple)</label>
		                                            <input type="text" name="titre" class="form-control" required>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="address">
		                                <div class="row">
		                                    <div class="col-sm-12">
		                                        <h4 class="info-text"> Are you living in a nice area? </h4>
		                                    </div>
											<div class="col-sm-8 col-sm-offset-1 ">
												<div class="form-group label-floating">
													<label class="control-label"> Combien de services sont fournis par votre entreprise ?</label>
													<input type="number" name="service" class="form-control" min="1" max="10" required>
												</div>
											</div>
		                                    <div class="col-sm-8 col-sm-offset-1 ">
	                                        	<div class="form-group label-floating">
	                                        		<label class="control-label">Login société (partie de l’URL, ne peut être modifié</label>
	                                    			<input type="text" name="url" class="form-control"required>
	                                        	</div>
		                                    </div>

											<div class="col-sm-8 col-sm-offset-1">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Une brève description</label>
		                                            <textarea class="form-control" name="description" placeholder="" rows="4"></textarea required>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next1' value='Next' />
		                                <input type='submit' class='btn btn-finish btn-fill btn-primary btn-wd'  name='finish' value='Finish' />
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div><!-- end row -->
	    </div> <!--  big container -->

	    <div class="footer">
	        <div class="container text-center">
			<!--Made with <i class="fa fa-heart heart"></i> by <a href="#">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/bootstrap-wizard">here.</a>-->
	              <a href="/"><b>RDVFBS</b></a><!--<i class="fa fa-heart heart"></i>  <a href="#">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/bootstrap-wizard">here.</a>-->
	        </div>
	    </div>
	</div>
</body>
	<!--   Core JS Files   -->
    <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>

</html>

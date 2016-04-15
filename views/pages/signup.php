<? include_once 'config/form.php'; ?>
<!DOCTYPE html>
		<html>
		   <head>
		      <meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

		      <title><?= $title?></title>
		      <link rel="stylesheet" href="<?= URL ?>src/css/style.css">
		   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		   </head>
		   <body>

		   <?include 'views/partials/header.php';?>

<div class="container">

	<form action="#" method="post" class="signup-contain">
	<h1>Inscription</h1>

		<div>
			<input type="email" name="email" placeholder="Email" class="email">
		</div>

		<div>
			<input type="password" name="password" placeholder="Mot de passe" class="password">
		</div>

		<div>
			<input type="password" name="confirm" placeholder="Retapez votre mot de passe" class="password">
		</div>


		<div style="color: white;"> Avez-vous une préférence entre : </div>
		
		<div class="preference">
				<input type="radio" name="language" id="language" value="VO" <?= $language == 'VO' ? 'checked' : '' ?> ><label for="language"> VO</label>

				<input type="radio" name="language" id="language2" value="VF" <?= $language == 'VF' ? 'checked' : '' ?> class="bou">
					<label for="language2"> VF</label>


				<input type="radio" name="language" id="language3" value="none" <?= $language == 'none' ? 'checked' : '' ?> class="bou">
					<label for="language3"> Peu m'importe</label>

		</div>
		<div class="preference">

				<input type="radio" name="type" id="type" value="3D" <?= $type == '3D' ? 'checked' : '' ?> ><label for="type"> 3D</label>



				<input type="radio" name="type" id="type1" value="Numerique" <?= $type == 'Numerique' ? 'checked' : '' ?> ><label for="type1"> Numérique</label>


				<input type="radio" name="type" id="type2" value="none" <?= $type == 'none' ? 'checked' : '' ?> ><label for="type2"> Peu m'importe</label>


		</div>

		<div class="preference">

				<input type="radio" name="cinemas" id="cinemas" value="UGC" <?= $cinemas == 'UGC' ? 'checked' : '' ?> ><label for="cinemas"> UGC</label>


				<input type="radio" name="cinemas" id="cinemas1" value="Gaumont" <?= $cinemas == 'Gaumont' ? 'checked' : '' ?> ><label for="cinemas1"> Gaumont</label>


				<input type="radio" name="cinemas" id="cinemas2" value="Autres" <?= $cinemas == 'Autres' ? 'checked' : '' ?> ><label for="cinemas2"> Autres</label>


				<input type="radio" name="cinemas" id="cinemas3" value="none" <?= $cinemas == 'none' ? 'checked' : '' ?> ><label for="cinemas3"> Peu m'importe</label>


		</div>

		<div>
			<input type="submit" class="submit">
		</div>

	</form>

	</div>

	<?include 'views/partials/footer.php';?>
	<script src="src/js/libs/jquery-2.2.0.min.js"></script>
	<script src="src/js/app/script.js"></script>
	</body>
	</html>

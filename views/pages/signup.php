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

<div class="contain">

	<h1>Inscription</h1>

	<a href="<?= URL ?>login">Login</a>

	<form action="#" method="post">

		<div>
			<input type="email" name="email" placeholder="Email">
		</div>

		<div>
			<input type="password" name="password" placeholder="Mot de passe">
		</div>

		<div>
			<input type="password" name="confirm" placeholder="Retapez votre mot de passe">
		</div>

		 <div> Aidez-nous à vous proposer une expérience qui vous ressemble ! </div>

		<div> Avez-vous une préférence entre : </div>

		<div>
			<label>
				<input type="radio" name="language" value="VO" <?= $language == 'VO' ? 'checked' : '' ?> >
					VO
			</label>
			<label>
				<input type="radio" name="language" value="VF" <?= $language == 'VF' ? 'checked' : '' ?> >
					VF
			</label>
			<label>
				<input type="radio" name="language" value="none" <?= $language == 'none' ? 'checked' : '' ?> >
					Peu m'importe
			</label>
		</div>
		<div>
			<label>
				<input type="radio" name="type" value="3D" <?= $type == '3D' ? 'checked' : '' ?> >
					3D
			</label>
			<label>
				<input type="radio" name="type" value="Numerique" <?= $type == 'Numerique' ? 'checked' : '' ?> >
					Numérique
			</label>
			<label>
				<input type="radio" name="type" value="none" <?= $type == 'none' ? 'checked' : '' ?> >
					Peu m'importe
			</label>
		</div>

		<div>
			<label>
				<input type="radio" name="cinemas" value="UGC" <?= $cinemas == 'UGC' ? 'checked' : '' ?> >
					UGC
			</label>
			<label>
				<input type="radio" name="cinemas" value="Gaumont" <?= $cinemas == 'Gaumont' ? 'checked' : '' ?> >
					Gaumont
			</label>
			<label>
				<input type="radio" name="cinemas" value="Autres" <?= $cinemas == 'Autres' ? 'checked' : '' ?> >
					Autres
			</label>
			<label>
				<input type="radio" name="cinemas" value="none" <?= $cinemas == 'none' ? 'checked' : '' ?> >
					Peu m'importe
			</label>
		</div>

		<div>
			<input type="submit">
		</div>

	</form>

	</div>

	<?include 'views/partials/footer.php';?>
	</body>
	</html>

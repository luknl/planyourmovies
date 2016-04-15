<?php

	$errors      = array();
	$success     = array();
	$language    = '';
	$type        = '';
	$cinemas     = '';
	$id          = $_SESSION['id'];

	// data sent
	if(!empty($_POST))
	{

		// set variables
		$language   = strip_tags(trim($_POST['language']));
		$type       = strip_tags(trim($_POST['type']));
		$cinemas    = strip_tags(trim($_POST['cinemas']));

		// errors
		if(empty($language))
			$errors['language'] = 'Missing language';
		if(empty($type))
			$errors['type'] = 'Missing type';
		if(empty($cinemas))
			$errors['cinemas'] = 'Missing cinemas';

		if(!in_array($language,['VO','VF','none']))
			$errors['language'] = 'Not a choice';

		if(!in_array($type,['3D','Numerique','none']))
			$errors['type'] = 'Not a choice';

		if(!in_array($cinemas,['UGC','Gaumont','Autres','none']))
			$errors['cinemas'] = 'Not a choice';

		// success
		if(empty($errors))
		{

			$prepare = $pdo->prepare('UPDATE account SET language=:language, type=:type, cinemas=:cinemas WHERE id='.$id.'');
			$prepare->bindValue('language',$language);
			$prepare->bindValue('type',$type);
			$prepare->bindValue('cinemas',$cinemas);
			$execute = $prepare->execute();

			if($execute)
			{

				$prepare = $pdo->prepare('SELECT * FROM account WHERE id = '.$id.' ');
				$prepare->execute();
				$account = $prepare->fetch();

				$_SESSION['language'] = $account->language;
				$_SESSION['type'] = $account->type;
				$_SESSION['cinemas'] = $account->cinemas;

			}

		}
	}

	// data no sent
	else
	{
	}


?>

<!DOCTYPE html>
		<html>
		   <head>
		      <meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
		      <title><?= $title?></title>
		      <link rel="stylesheet" href="<?= URL ?>src/css/style.css">
	         <link rel="icon" type="image/ico" href="<?= URL ?>src/img/favicon.ico" alt="favicon" />
		   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		   </head>
		   <body>

		   <?include 'views/partials/header.php';?>

<div class="contain">

	<h1>Profil</h1>

	<a href="<?= URL ?>logout">Deconnexion</a>

	<br><br>

 <!-- Afficher ses préférences -->

 	<table>

		<caption><strong> Vos préférences : </strong></caption>

		<tr>
			<th> Langue : </th>
			<td><?php echo $_SESSION['language']; ?></td>
		</tr>
		<tr>
			<th> 3D ou Numérique : </th>
			<td><?php echo $_SESSION['type']; ?></td>
		</tr>
		<tr>
			<th> Cinémas préférés : </th>
			<td><?php echo $_SESSION['cinemas']; ?></td>
		</tr>

	</table>

<!-- Modifier ses préférences -->

	<a href="#" class="change">Modifier vos préférences</a>

		<form class="changes" action="<?= URL ?>profile" method="post" style="display:none;">

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


 <!-- Afficher les films suivis / les delete -->

 <!-- Revoir les films du mois pour en sélectionner de nouveaux / en retirer -->

 <!-- Liste films vus + note perso + avis -->

 	<h2> Calendrier </h2>

</div>

<?include 'views/partials/footer.php';?>

<script src="src/js/libs/jquery-2.2.0.min.js"></script>
<script src="src/js/app/script.js"></script>
<script type="text/javascript">
var change = document.querySelector(".change");
var form = document.querySelector(".changes");

change.onclick = function(){
	 form.style.display = 'block';
};
</script>
</body>
</html>

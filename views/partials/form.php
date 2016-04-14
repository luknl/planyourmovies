<?php

	$errors      = array();
	$success     = array();
	$language    = '';
	$type        = '';
	$cinemas     = '';
	$ip          = '';
	$token       = '';

	function str_random($length){
	    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
	    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
	}

	// data sent
	if(!empty($_POST))
	{

		$email    = $_POST['email'];
		$password = hash('sha256',SALT.$_POST['password']);
		$confirm  = hash('sha256',SALT.$_POST['confirm']);
		$ip       = $_SERVER['REMOTE_ADDR'];

		// set variables
		$language   = strip_tags(trim($_POST['language']));
		$type       = strip_tags(trim($_POST['type']));
		$cinemas    = strip_tags(trim($_POST['cinemas']));

		// errors
		if(empty($email))
			$errors['email'] = 'Missing email';
		if(!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/',$email))
			$errors['email'] = 'Invalid email';
		if(empty($password))
			$errors['password'] = 'Missing password';
		if($password != $confirm)
			$errors['password'] = 'Mot de passe incorrect';
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

			$token = str_random(60);

			$prepare = $pdo->prepare('INSERT INTO account (email,password,language,type,cinemas,IP,token) VALUES (:email,:password,:language,:type,:cinemas,:IP,:token)');
			$prepare->bindValue('email',$email);
			$prepare->bindValue('password',$password);
			$prepare->bindValue('language',$language);
			$prepare->bindValue('type',$type);
			$prepare->bindValue('cinemas',$cinemas);
			$prepare->bindValue('IP',$ip);
			$prepare->bindValue('token',$token);
			$execute = $prepare->execute();

			if($execute)
			{

				$prepare = $pdo->prepare('SELECT * FROM account WHERE email = :email AND password = :password');
				$prepare->bindValue('email',$email);
				$prepare->bindValue('password',$password);
				$prepare->execute();
				$account = $prepare->fetch();

				//will be used for the confirmation of the account
/*				$to = $email;
				$subject = 'Confirmation de votre compte';
				$message = 'Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://local.dev/Lab/Comptes/confirm.php?id=$account->id&token=$account->token';
				mail($to,$subject,$message,$headers);*/

				session_start();
				$_SESSION['id'] = $account->id;
				$_SESSION['language'] = $account->language;
				$_SESSION['type'] = $account->type;
				$_SESSION['cinemas'] = $account->cinemas;

				header('Location:profil.php');
				exit;
			}
			else
			{
				$errors[] = "Une erreur s'est produite ! :(";
			}

		}
	}

	// data no sent
	else
	{
	}

	echo '<pre>';
		print_r($errors);
	echo '</pre>';

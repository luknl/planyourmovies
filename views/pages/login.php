<?php

	function str_random($length){
	    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
	    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
	}

	//reconnection
/*	reconnect_from_cookie();*/

	//send
	if(!empty($_POST))
	{
		$email    = $_POST['email'];
		$password = hash('sha256',SALT.$_POST['password']);
		// $remember = $_POST['remember'];

		$prepare = $pdo->prepare('SELECT * FROM account WHERE email = :email');
		$prepare->bindValue('email',$email);
		$prepare->execute();
		$account = $prepare->fetch();

		//allow to reconnect to your profile when you close the window
/*		if($remember){
    		$remember_token = str_random(250);
    		$prepare = $pdo->prepare('UPDATE account SET remember = ? WHERE id = ?')->execute([$remember_token, $account->id]);
    		setcookie('remember', $account->id . '==' . $remember_token . sha1($account->id . 'ratonlaveurs'), time() + 60 * 60 * 24 * 7);
		}*/

		if($account)
		{
			if($account->password == $password)
			{
				$_SESSION['id'] = $account->id;
				$_SESSION['language'] = $account->language;
				$_SESSION['type'] = $account->type;
				$_SESSION['cinemas'] = $account->cinemas;
				header('Location:'.URL.'profile');
				exit;
			}
			else
			{
				echo 'Mauvais identifiant ou mot de passe !';
			}
		}
		else
		{
			echo 'Utilisateur non trouvé';
		}
	}

/*	function reconnect_from_cookie(){
	    if(session_status() == PHP_SESSION_NONE){
	        session_start();
	    }
	    if(isset($_COOKIE['remember'])){
	        require_once 'config/config.php';
	        if(!isset($pdo)){
	            global $pdo;
	        }
	        $remember_token = $_COOKIE['remember'];
	        $parts = explode('==', $remember_token);
	        $account->id = $parts[0];
	        $req = $pdo->prepare('SELECT * FROM account WHERE id = ?');
	        $req->execute([$account->id]);
	        $account = $req->fetch();
	        if($account){
	            $expected = $account->id . '==' . $account->remember_token . sha1($account->id . 'ratonlaveurs');
	            if($expected == $remember_token){
	                session_start();
	                $_SESSION['id'] = $account->id;
	                setcookie('remember', $remember_token, time() + 60 * 60 * 24 * 7);
	            } else{
	                setcookie('remember', null, -1);
	            }
	        }else{
	            setcookie('remember', null, -1);
	        }
	    }
	}*/

?>

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
	<h1>Login</h1>

		<div>
			<input type="email" name="email" placeholder="Email" class="email">
		</div>
		<div>
			<input type="password" name="password" placeholder="Mot de passe" class="password">
		</div>

		<!-- if cookie had worked

		<div>
			<input type="checkbox" name="remember"> Se souvenir de moi
		</div>

		-->
		<div>
			<input type="submit" value="Se connecter" class="submit">
		</div>

			<a class="submit1" href="<?= URL ?>signup">Inscription</a>
		


	</form>

</div>

	<?include 'views/partials/footer.php';?>

	<script src="src/js/libs/jquery-2.2.0.min.js"></script>
	<script src="src/js/app/script.js"></script>
	</body>
	</html>

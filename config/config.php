<?php




	session_start();

   define('URL','http://localhost:8888/hetic/planyourmovies/');

	define('SALT','7ag?5ea');

	// Connexion variables
	define('DB_HOST','localhost');
	define('DB_NAME','movies');
	define('DB_USER','root');
	define('DB_PASS','root'); // '' par défaut sur windows

	try
	{
	    // Try to connect to database
	    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

	    // Set fetch mode to object
	    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ); //pdo renvoie des objets
	}
	catch (Exception $e)
	{
	    // Failed to connect
	    die('Cound not connect');
	}

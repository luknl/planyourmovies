<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title><?= $title?></title>
      <link rel="stylesheet" href="<?= URL ?>src/css/style.css">
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
   </head>
   <body>

   <?include 'views/partials/header.php';

      $movie_id = $_GET['id'];

   	$result = file_get_contents('https://api.themoviedb.org/3/movie/'.$movie_id.'?api_key=f6dfa935f34f869f08db46fb66e4e8d1');
   	$result = json_decode($result);

   ?>

<h2><a href="<? echo($result->homepage);?>"><? echo($result->original_title);?></a></h2>

<img src="http://image.tmdb.org/t/p/w500<?echo($result->poster_path);?>" title="<? echo($result->original_title);?> movie poster"/ alt="<? echo($movie->title);?> movie poster" width="200px"/>
<br>
<br>

<i><?echo($result->overview);?></i>

<p><strong>Genre : </strong><?echo($result->genres[0]->name);?></p>

<p><strong>Score : </strong><?echo($result->vote_average);?>/10 (<?echo($result->vote_count);?> votes)</p>

<p><strong>Released year : </strong><?$date = date_create($result->release_date);
echo date_format($date, 'Y');?></p>


<?include 'views/partials/footer.php';?>

</body>
</html>

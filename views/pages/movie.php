<?
$movie_id = $_GET['id'];

$result = file_get_contents('https://api.themoviedb.org/3/movie/'.$movie_id.'?api_key=f6dfa935f34f869f08db46fb66e4e8d1');
$result = json_decode($result);

$minutes = $result->runtime;
$d = floor ($minutes / 1440);
$h = floor (($minutes - $d * 1440) / 60);
$m = $minutes - ($d * 1440) - ($h * 60);

?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title><?= $result->original_title?></title>
      <link rel="stylesheet" href="<?= URL ?>src/css/style.css">
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
   </head>
   <body>

   <?include 'views/partials/header.php';?>

<div class="container-movie">

<img src="http://image.tmdb.org/t/p/w500<?echo($result->poster_path);?>" title="<? echo($result->original_title);?> movie poster"/ width="200px">

<div class="movie-info">
<h2><? echo($result->original_title);?></h2>


<p><strong>Genre : </strong><?echo($result->genres[0]->name);?></p>

<p><strong>Score : </strong><?echo($result->vote_average);?>/10 (<?echo($result->vote_count);?> votes)</p>

<p><strong>Released year : </strong><?$date = date_create($result->release_date);
echo date_format($date, 'Y');?></p>

<?

         require_once('config/simple_html_dom.php');

         $curl = curl_init();
         curl_setopt($curl, CURLOPT_URL, 'http://www.imdb.com/title/'.$result->imdb_id.'/');
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
         $str = curl_exec($curl);
         curl_close($curl);

         $html = str_get_html($str);?>

            <p><strong>Réalisateur : </strong><?echo ($html->find('span .itemprop',0)->innertext);?></p>

            <p><strong>Durée : </strong><?echo "{$h}h {$m}m";?></p>

         <p class="resume"><?echo($result->overview);?></p>
         <a href= <?= 'http://www.imdb.com/title/'.$result->imdb_id.'/' ?> >
         <div class="button">En savoir plus</div></a><

   </div>
</div>

<?include 'views/partials/footer.php';?>
<script src="<?= URL ?>src/js/libs/jquery-2.2.0.min.js"></script>
   <script src="<?= URL ?>src/js/app/script.js"></script>

</body>
</html>

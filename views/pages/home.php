<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <?include_once 'config/config.php';?>
      <title><?= $title?></title>
      <link rel="stylesheet" href="<?= URL ?>src/css/reset.css">
      <link rel="stylesheet" href="<?= URL ?>src/css/owl.carousel.css">
      <link rel="stylesheet" href="<?= URL ?>src/css/style.css">
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
   </head>
   <body>

   <?include 'views/partials/header.php';

   $result = file_get_contents('https://api.themoviedb.org/3/movie/upcoming?api_key=f6dfa935f34f869f08db46fb66e4e8d1');
   $result = json_decode($result);

   $result2 = file_get_contents('https://api.themoviedb.org/3/discover/movie/?api_key=f6dfa935f34f869f08db46fb66e4e8d1');
   $result2 = json_decode($result2);

?>

<!-- </?for(($result->page=1);($result->page)<($result->total_pages);($result->page++)){?>
   <p>Page : </?echo($result->page)?></p> -->


<div class="main-content">
   <div class="today">
   <div class="week">
      <div class="week-date">
      <div class="date">
         <h2>Semaine du <?php echo(strftime("%V"));?></h2>
      </div>
   </div>
      <div class="owl-carousel">
         <?foreach($result->results as $movie) {?>
      <div class="item">
         <?php if(empty($movie->poster_path)): ?>
            <div class="alternative-image"><? echo($movie->original_title);?></div>
         <?php else: ?>
            <a href="<?= URL ?>movie?id=<? echo($movie->id) ?>">
               <img style=" position: relative; z-index: 2;"src="http://image.tmdb.org/t/p/w500<?echo($movie->poster_path);?>" alt="<? echo($movie->original_title);?> movie poster"/>
            </a>
         <?php endif; ?>
      </div>
      <?
}?>

   </div>
   </div>
   </div>
    <div class="populaire">
   <div class="week">
      <div class="week-date">
      <div class="date">
         <h2>Semaine du <?php echo(strftime("%V"));?></h2>
      </div>
   </div>
      <div class="owl-carousel">
         <?foreach($result->results as $movie) {?>
      <div class="item">
         <?php if(empty($movie->poster_path)): ?>
            <div class="alternative-image"><? echo($movie->original_title);?></div>
         <?php else: ?>
            <a href="<?= URL ?>movie?id=<? echo($movie->id) ?>">
               <img style=" position: relative; z-index: 2;"src="http://image.tmdb.org/t/p/w500<?echo($movie->poster_path);?>" alt="<? echo($movie->original_title);?> movie poster"/>
            </a>
         <?php endif; ?>
      </div>
      <?
}?>

   </div>
   </div>
   </div>
   <div class="discover">
   <div class="week">
      <div class="week-date">
      <div class="date">
         <h2>Semaine du <?php echo(strftime("%V"));?></h2>
      </div>
   </div>
      <div class="owl-carousel">
         <?foreach($result->results as $movie) {?>
      <div class="item">
         <?php if(empty($movie->poster_path)): ?>
            <div class="alternative-image"><? echo($movie->original_title);?></div>
         <?php else: ?>
            <a href="<?= URL ?>movie?id=<? echo($movie->id) ?>">
               <img style=" position: relative; z-index: 2;"src="http://image.tmdb.org/t/p/w500<?echo($movie->poster_path);?>" alt="<? echo($movie->original_title);?> movie poster"/>
            </a>
         <?php endif; ?>
      </div>
      <?
}?>

   </div>
   </div>
   </div>




</div>


<?include 'views/partials/footer.php';?>

	<script src="<?= URL ?>src/js/libs/jquery-2.2.0.min.js"></script>
	<script src="<?= URL ?>src/js/libs/owl.carousel.js"></script>
	<script src="<?= URL ?>src/js/libs/dynamics.js"></script>
	<script src="<?= URL ?>src/js/libs/jquery.clickout.js"></script>
	<script src="<?= URL ?>src/js/app/script.js"></script>

</body>
</html>

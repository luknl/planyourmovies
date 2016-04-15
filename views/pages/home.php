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

   $result3 = file_get_contents('http://api.themoviedb.org/3/movie/now_playing?api_key=f6dfa935f34f869f08db46fb66e4e8d1');
   $result3 = json_decode($result3);

?>

<!-- </?for(($result->page=1);($result->page)<($result->total_pages);($result->page++)){?>
   <p>Page : </?echo($result->page)?></p> -->


<div class="main-content">

   <div class="today">
   
   <div class="week">
      <div class="week-date">
      <div class="date">
         <h2>En salle : Semaine du <?php echo(strftime("%V"));?></h2>
      </div>
   </div>
      <div class="owl-carousel">
         <?foreach($result3->results as $movie3) {?>
      <div class="item">
         <?php if(empty($movie3->poster_path)): ?>
            <div class="alternative-image"><? echo($movie3->original_title);?></div>
         <?php else: ?>
            <a href="<?= URL ?>movie?id=<? echo($movie3->id) ?>">
               <img style=" position: relative; z-index: 2;"src="http://image.tmdb.org/t/p/w500<?echo($movie3->poster_path);?>" alt="<? echo($movie3->original_title);?> movie poster"/>
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
         <h2>Sorties à venir</h2>
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
         <h2>Découvrez les films récents</h2>
      </div>
   </div>
      <div class="owl-carousel">
         <?foreach($result2->results as $movie2) {?>
      <div class="item">
         <?php if(empty($movie2->poster_path)): ?>
            <div class="alternative-image"><? echo($movie2->original_title);?></div>
         <?php else: ?>
            <a href="<?= URL ?>movie?id=<? echo($movie2->id) ?>">
               <img style=" position: relative; z-index: 2;"src="http://image.tmdb.org/t/p/w500<?echo($movie2->poster_path);?>" alt="<? echo($movie2->original_title);?> movie poster"/>
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
   <script>
      $(document).ready(function(){
  $(".owl-carousel").owlCarousel();
});

$('.owl-carousel').owlCarousel({
    loop:true,

    nav:true,
    responsive:{
        0:{
            items:1,
            margin:-250
        },
        370:{
            items:2,
            margin:-270
        },
        470:{
            items:2,
            margin:-260
        },
        768:{
            items:2,
            margin:-260
        },
        1024:{
            items:4
        },
        1440:{
            items:6
        }

    }
});
   </script>

</body>
</html>

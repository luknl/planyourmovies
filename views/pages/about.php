<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title><?= $title?></title>
      <link rel="stylesheet" href="<?= URL ?>src/css/style.css">
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
   </head>
   <body>

   <?include 'views/partials/header.php';?>

   <p><?php

   require_once('config/simple_html_dom.php');

   $curl = curl_init();
   curl_setopt($curl, CURLOPT_URL, 'http://www.google.fr/movies?near=paris');
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
   $str = curl_exec($curl);
   curl_close($curl);

   $html = str_get_html($str);

   foreach($html->find('#movie_results .theater') as $div) {
      // print theater and address info
      echo("<h3>");
      echo utf8_encode($div->find('h2 a',0)->innertext.'<br/></h3>');
      //print "Address: ". $div->find('.info',0)->innertext."\n";

      // print all the movies with showtimes

      foreach($div->find('.movie') as $movie) {
      echo ("<p>");
         echo utf8_encode($movie->find('.name a',0)->innertext);
         echo str_replace('VO st Fr' ,'VOSTFR ',"<br>Horaire:    ".$movie->find('.times',0)->innertext.'<br/><br/></p>');
         echo ($movie->find('.img',0));
      }
   }

   // clean up memory
   $html->clear();
   ?>
   </p>

<?include 'views/partials/footer.php';?>
</body>
</html>

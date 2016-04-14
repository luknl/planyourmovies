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

   require_once('config/simple_html_dom.php');

   			$curl = curl_init();
   			curl_setopt($curl, CURLOPT_URL, 'http://ma-filmotheque.fr/en-ce-moment-au-cinema');
   			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   			curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
   			$str = curl_exec($curl);
   			curl_close($curl);

   			$html = str_get_html($str);


   			foreach($html->find('.row') as $div) {?>
   			   <div class='fc-event'><?echo ($div->find('h4 a',0)->innertext);?></div>
   			   <?
   			}?>

   <?
   // clean up memory
   $html->clear();
   ?>

<?include 'views/partials/footer.php';?>
</body>
</html>

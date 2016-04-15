<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?include_once 'config/config.php';?>
        <title>
            <?= $title?>
        </title>
        <link rel="stylesheet" href="<?= URL ?>src/css/style.css">
        <link rel="icon" type="image/ico" href="<?= URL ?>src/img/favicon.ico" alt="favicon" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>

<body>
        <style>
            img:hover{
            	transition: all ease-out 0.3s;
            	transform: scale(1.05,1.05);
            }
        </style>
    <?
         $keyword = str_replace(' ', '+',$_GET['the_search']);

   	  	$result = file_get_contents('https://api.themoviedb.org/3/search/movie?api_key=f6dfa935f34f869f08db46fb66e4e8d1&query='.$keyword.'');
   	   $result = json_decode($result);

   include 'views/partials/header.php';

   ?>
        <div class="main-content" style="background: white;">
            <?
   foreach($result->results as $movie) { ?>
                <div style="display:inline-block;padding-left:100px;padding-top:30px;">
                    <a href="<?= URL ?>movie?id=<? echo($movie->id) ?>">
      <img src="http://image.tmdb.org/t/p/w500<?echo($movie->poster_path);?>" alt="<? echo($movie->title);?> movie poster" title="<? echo($movie->title);?> movie poster" style="width:200px;"/>
         <p style="max-width:200px;padding-top:10px;"><?php echo $movie->original_title ?></p>
         </a>
                </div>
                <?php }?>
        </div>

        <?include 'views/partials/footer.php';?>


            <script src="<?= URL ?>src/js/libs/jquery-2.2.0.min.js"></script>
            <script src="<?= URL ?>src/js/app/script.js"></script>
</body>

</html>

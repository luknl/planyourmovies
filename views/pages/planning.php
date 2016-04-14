<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
			<title><?= $title?></title>
			<link rel="stylesheet" href="<?= URL ?>src/css/style.css">
			<link rel="stylesheet" href="<?= URL ?>src/css/calendar.css">
			<link href='<?= URL ?>calendar/fullcalendar.css' rel='stylesheet' />
			<link href='<?= URL ?>calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
</head>
<body>

	   <?include 'views/partials/header.php';?>

	<div id='wrap'>

		<div id='external-events'>
			<h4>Draggable Events</h4>

			<?

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
			<p>
				<input type='checkbox' id='drop-remove' />
				<label for='drop-remove'>remove after drop</label>
			</p>
		</div>

		<div id='calendar'></div>

		<div style='clear:both'></div>

	</div>

<?
// clean up memory
$html->clear();
include 'views/partials/footer.php';
?>


<script src='<?= URL ?>calendar/lib/moment.min.js'></script>
<script src='<?= URL ?>calendar/lib/jquery.min.js'></script>
<script src='<?= URL ?>calendar/lib/jquery-ui.custom.min.js'></script>
<script src='<?= URL ?>calendar/fullcalendar.min.js'></script>
<script src='<?= URL ?>calendar/fr.js'></script>
<script src='<?= URL ?>src/js/app/calendar.js'></script>

</body>
</html>

<?php
require_once('calendar2/bdd.php');

$sql = "SELECT id, title, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
			<title><?= $title?></title>
			<link rel="stylesheet" href="<?= URL ?>src/css/style.css">
			<link rel="stylesheet" href="<?= URL ?>src/css/calendar.css">
         <link href="<?= URL ?>calendar2/css/bootstrap.min.css" rel="stylesheet">
     	<link href="<?= URL ?>calendar2/css/fullcalendar.css" rel="stylesheet" />
</head>
<body>
   
	   <?include 'views/partials/header.php';?>

	<div id='wrap'>

		<div id='external-events'>
			<h4>Upcoming movies</h4>

			<?

         $result = file_get_contents('https://api.themoviedb.org/3/movie/upcoming?api_key=f6dfa935f34f869f08db46fb66e4e8d1');
         $result = json_decode($result);


			foreach($result->results as $movie) {?>
            <div class='fc-event'><? echo($movie->original_title);?></div>
      <?}?>


			<p>
				<input type='checkbox' id='drop-remove' />
				<label for='drop-remove'>remove after drop</label>
			</p>
		</div>

		<div id='calendar'></div>

      <!-- Modal add-->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="calendar2/addEvent.php">

			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Event</h4>
			  </div>
			  <div class="modal-body">

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>

						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>

			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>



		<!-- Modal edit-->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="calendar2/editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
			  </div>
			  <div class="modal-body">

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>

						</select>
					</div>
				  </div>
				    <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
						  </div>
						</div>
					</div>

				  <input type="hidden" name="id" class="form-control" id="id">


			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

		<!-- <div style='clear:both'></div> -->

	</div>

   <script src="<?= URL ?>calendar2/js/jquery.js"></script>

   <!-- Bootstrap Core JavaScript -->
   <script src="<?= URL ?>calendar2/js/bootstrap.min.js"></script>

   <!-- FullCalendar -->
   <script src="<?= URL ?>calendar2/js/moment.min.js"></script>
   <script src="<?= URL ?>calendar2/js/fullcalendar.min.js"></script>
   <script src="<?= URL ?>calendar2/js/jquery-ui.custom.min.js"></script>
   <script src='<?= URL ?>calendar2/js/fr.js'></script>


   <script>

   $(document).ready(function() {


     $('#external-events .fc-event').each(function() {

         // store data so the calendar knows to render an event upon drop
         $(this).data('event', {
             title: $.trim($(this).text()), // use the element's text as the event title
             stick: true // maintain when user navigates (see docs on the renderEvent method)
         });

         // make the event draggable using jQuery UI
         $(this).draggable({
             zIndex: 999,
             revert: true,      // will cause the event to go back to its
             revertDuration: 0  //  original position after the drag
         });

     });


     $('#calendar').fullCalendar({
        header: {
           left: 'prev,next today',
           center: 'title',
           right: 'month,basicWeek,basicDay'
        },
        defaultDate: '2016-01-12',
        editable: true,
        droppable: true,
        eventLimit: true, // allow "more" link when too many events
        selectable: true,
        selectHelper: true,
        dragRevertDuration: 0,
        drop: function() {
           // is the "remove after drop" checkbox checked?
           if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
           }
        },
        //create event when dragging from external-events div//
        eventDragStop: function( event, jsEvent, ui, view ) {

           if(isEventOverDiv(jsEvent.clientX, jsEvent.clientY)) {
                $('#calendar').fullCalendar('removeEvents', event._id);
                var el = $( "<div class='fc-event'>" ).appendTo( '#external-events-listing' ).text( event.title );
                el.draggable({
                  zIndex: 999,
                  revert: true,
                  revertDuration: 0
                });
                el.data('event', { title: event.title, id :event.id, stick: true });
                console.log(event.title);
                console.log(event.id);
           }
        },
        select: function(start, end) {

           $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
           $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
           $('#ModalAdd').modal('show');
        },
        eventRender: function(event, element) {
           element.bind('dblclick', function() {
              $('#ModalEdit #id').val(event.id);
              $('#ModalEdit #title').val(event.title);
              $('#ModalEdit #color').val(event.color);
              $('#ModalEdit').modal('show');
           });
        },
        eventDrop: function(event, delta, revertFunc) { // si changement de position

           edit(event);

        },
        eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

           edit(event);

        },
        events: [
        <?php foreach($events as $event):

           $start = explode(" ", $event['start']);
           $end = explode(" ", $event['end']);
           if($start[1] == '00:00:00'){
              $start = $start[0];
           }else{
              $start = $event['start'];
           }
           if($end[1] == '00:00:00'){
              $end = $end[0];
           }else{
              $end = $event['end'];
           }
        ?>
           {
              id: '<?php echo $event['id']; ?>',
              title: '<?php echo $event['title']; ?>',
              start: '<?php echo $start; ?>',
              end: '<?php echo $end; ?>',
              color: '<?php echo $event['color']; ?>',
           },
        <?php endforeach; ?>
        ]
     });


            //Grab and select element in the external-events div to delete it//
             var isEventOverDiv = function(x, y) {

                 var external_events = $( '#external-events' );
                 var offset = external_events.offset();
                 offset.right = external_events.width() + offset.left;
                 offset.bottom = external_events.height() + offset.top;

                 // Compare
                 if (x >= offset.left
                     && y >= offset.top
                     && x <= offset.right
                     && y <= offset .bottom) { return true; }
                 return false;

             }


     function edit(event){
        start = event.start.format('YYYY-MM-DD HH:mm:ss');
        if(event.end){
           end = event.end.format('YYYY-MM-DD HH:mm:ss');
        }else{
           end = start;
        }

        id =  event.id;

        Event = [];
        Event[0] = id;
        Event[1] = start;
        Event[2] = end;

        $.ajax({
         url: 'calendar2/editEventDate.php',
         type: "POST",
         data: {Event:Event},
         success: function(rep) {
              if(rep == 'OK'){
                 alert('Saved');
              }else{
                 alert('Could not be saved. try again.');
              }
           }
        });
     }

   });

   </script>

<!-- </?
// clean up memory
$html->clear();
include 'views/partials/footer.php';
?> -->

</body>
</html>

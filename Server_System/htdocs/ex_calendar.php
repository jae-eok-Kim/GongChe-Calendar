<?php  
  include_once('./common.php');
  $result = mysqli_query($conn,"SELECT * FROM gongche WHERE in_Jobs like '%공채%' ");

function set_color($arg_1)
{
    switch ($arg_1) {
    case 1  :return "#f39c12"; //IT yellow
               break;
    case 2  : return "#00a65a"; //사무직 greens
               break;
    case 3  : return "#00c0ef"; //생산직 aqua
               break;
    default    : return "#f56954"; //기타 red
               break;
             }
}

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>공채일정을 한번에</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">


    
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="./css/fullcalendar.min.css">
    <link rel="stylesheet" href="./css/fullcalendar.print.css" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href="./css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="./css/_all-skins.min.css">

    
  </head>
  

      <!-- Content Wrapper. Contains page content -->
    
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            공채달력 시스템
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 공채리스트</a></li>
            <li class="active">공채달력</li>
          </ol>
        </section>

 
              
           
           <div class="col">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->

      

      

     

    <!-- jQuery 2.1.4 -->
    <script src="./js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="./js/bootstrap.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Slimscroll -->
    <script src="./js/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="./js/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./js/demo.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="./js/fullcalendar.min.js"></script>

    <!-- Page specific script -->
<?php
  echo "
    <script>
      $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn t need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element s text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }
        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month'
          },
          buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
          },
          //Random default events
          events: [";

          $n = 1;
                  while($row = mysqli_fetch_array($result)){
                  echo "
                  {\n";
                      echo "title: '" . $row['in_Jobs'] . "',\n";
                      echo "start: " .  "new Date(" .date( 'Y', strtotime($row['published']) ).",".date( 'm', strtotime($row['published']) )."-1,".date( 'd', strtotime($row['published']) ). "),\n";
                      echo "end: " .  "new Date(" .date( 'Y', strtotime($row['deadline_data']) ).",".date( 'm', strtotime($row['deadline_data']) )."-1,".date( 'd', strtotime($row['deadline_data']) ). "),\n";
                      echo "url: '" . $row['company_url'] . "',\n";
                      echo "backgroundColor: '". set_color($row['occupations']) ."',\n";
                      echo " borderColor: '". set_color($row['occupations']) ."'\n";
                    echo "},";
                    $n++;
                    }

          echo "
            {
              title: 'Click for Google',
              start: new Date(y-1, m, 28),
              end: new Date(y-1, m, 29),
              url: 'http://google.com/',
              backgroundColor: '#3c8dbc', //Primary (light-blue)
              borderColor: '#3c8dbc' //Primary (light-blue)
            }";
            echo "
          ],
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css('background-color');
            copiedEventObject.borderColor = $(this).css('border-color');

            // render the event on the calendar
            // the last `true` argument determines if the event 'sticks' (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the 'remove after drop' checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the 'Draggable Events' list
              $(this).remove();
            }

          }
        });

        /* ADDING EVENTS */
        var currColor = '#3c8dbc'; //Red by default
        //Color chooser button
        var colorChooser = $('#color-chooser-btn');
        $('#color-chooser > li > a').click(function (e) {
          e.preventDefault();
          //Save color
          currColor = $(this).css('color');
          //Add color effect to button
          $('#add-new-event').css({'background-color': currColor, 'border-color': currColor});
        });
        $('#add-new-event').click(function (e) {
          e.preventDefault();
          //Get value and make sure it is not null
          var val = $('#new-event').val();
          if (val.length == 0) {
            return;
          }

          //Create events
          var event = $('<div />');
          event.css({'background-color': currColor, 'border-color': currColor, 'color': '#fff'}).addClass('external-event');
          event.html(val);
          $('#external-events').prepend(event);

          //Add draggable funtionality
          ini_events(event);

          //Remove event from text input
          $('#new-event').val('');
        });
      });
    </script>
    ";
    ?>
  </body>
</html>

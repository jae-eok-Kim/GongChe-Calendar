<?php  
  include_once('./common.php');
 


    $result_etc = mysqli_query($conn," SELECT COUNT(*) FROM  `gongche` WHERE `occupations` = 0 ");
    $row = mysqli_fetch_array($result_etc);
    $etc_num =  $row['COUNT(*)'];

    $result_etc = mysqli_query($conn," SELECT COUNT(*) FROM  `gongche` WHERE `occupations` = 1 ");
    $row = mysqli_fetch_array($result_etc);
    $it_num =  $row['COUNT(*)'];

    $result_etc = mysqli_query($conn," SELECT COUNT(*) FROM  `gongche` WHERE `occupations` = 2 ");
    $row = mysqli_fetch_array($result_etc);
    $office_num =  $row['COUNT(*)'];

    $result_etc = mysqli_query($conn," SELECT COUNT(*) FROM  `gongche` WHERE `occupations` = 3 ");
    $row = mysqli_fetch_array($result_etc);
    $blue_collar_num =  $row['COUNT(*)'];

    $result_etc = mysqli_query($conn," SELECT COUNT(*) FROM  `gongche` WHERE `occupations` = 4 ");
    $row = mysqli_fetch_array($result_etc);
    $medical_num =  $row['COUNT(*)'];
    
    //일자별 갯수 계산
    
    $result_etc = mysqli_query($conn," SELECT COUNT(*) FROM  `gongche` WHERE `published` = CURDATE() ");
    $row = mysqli_fetch_array($result_etc);
    $date[1] =  $row['COUNT(*)'];
    $result_etc = mysqli_query($conn," SELECT COUNT(*) FROM  `gongche` WHERE `published` = DATE_SUB(CURDATE(), INTERVAL 1 DAY) ");
    $row = mysqli_fetch_array($result_etc);
    $date[2] =  $row['COUNT(*)'];
    $result_etc = mysqli_query($conn," SELECT COUNT(*) FROM  `gongche` WHERE `published` = DATE_SUB(CURDATE(), INTERVAL 2 DAY) ");
    $row = mysqli_fetch_array($result_etc);
    $date[3] =  $row['COUNT(*)'];
    $result_etc = mysqli_query($conn," SELECT COUNT(*) FROM  `gongche` WHERE `published` = DATE_SUB(CURDATE(), INTERVAL 3 DAY) ");
    $row = mysqli_fetch_array($result_etc);
    $date[4] =  $row['COUNT(*)'];
    $result_etc = mysqli_query($conn," SELECT COUNT(*) FROM  `gongche` WHERE `published` = DATE_SUB(CURDATE(), INTERVAL 4 DAY) ");
    $row = mysqli_fetch_array($result_etc);
    $date[5] =  $row['COUNT(*)'];
    $result_etc = mysqli_query($conn," SELECT COUNT(*) FROM  `gongche` WHERE `published` = DATE_SUB(CURDATE(), INTERVAL 5 DAY) ");
    $row = mysqli_fetch_array($result_etc);
    $date[6] =  $row['COUNT(*)'];
    $result_etc = mysqli_query($conn," SELECT COUNT(*) FROM  `gongche` WHERE `published` = DATE_SUB(CURDATE(), INTERVAL 6 DAY) ");
    $row = mysqli_fetch_array($result_etc);
    $date[7] =  $row['COUNT(*)'];
    $result_etc = mysqli_query($conn," SELECT COUNT(*) FROM  `gongche` WHERE `published` = DATE_SUB(CURDATE(), INTERVAL 7 DAY) ");
    $row = mysqli_fetch_array($result_etc);
    $date[8] =  $row['COUNT(*)'];
    $result_etc = mysqli_query($conn," SELECT COUNT(*) FROM  `gongche` WHERE `published` = DATE_SUB(CURDATE(), INTERVAL 8 DAY) ");
    $row = mysqli_fetch_array($result_etc);
    $date[9] =  $row['COUNT(*)'];
    $result_etc = mysqli_query($conn," SELECT COUNT(*) FROM  `gongche` WHERE `published` = DATE_SUB(CURDATE(), INTERVAL 9 DAY) ");
    $row = mysqli_fetch_array($result_etc);
    $date[10] =  $row['COUNT(*)'];

    //단어 출력
    $result_etc =  mysqli_query($conn,"SELECT `1st_word`,`2st_word`,`3st_word`,`4st_word`,`5st_word`,`6st_word`,`7st_word`,`8st_word`,`9st_word`,`10st_word` FROM `data_analysis` WHERE `analysis_date` = CURDATE() ");
    $row = mysqli_fetch_array($result_etc);
    $key_word[1] =  $row['1st_word'];
    $key_word[2] =  $row['2st_word'];
    $key_word[3] =  $row['3st_word'];
    $key_word[4] =  $row['4st_word'];
    $key_word[5] =  $row['5st_word'];
    $key_word[6] =  $row['6st_word'];
    $key_word[7] =  $row['7st_word'];
    $key_word[8] =  $row['8st_word'];
    $key_word[9] =  $row['9st_word'];
    $key_word[10] =  $row['10st_word'];
    
    $result_etc =  mysqli_query($conn," SELECT `1st_num`,`2st_num`,`3st_num`,`4st_num`,`5st_num`,`6st_num`,`7st_num`,`8st_num`,`9st_num`,`10st_num` FROM `data_analysis` WHERE `analysis_date` = CURDATE() ");
    $row = mysqli_fetch_array($result_etc);
    $key_num[1] =  $row['1st_num'];
    $key_num[2] =  $row['2st_num'];
    $key_num[3] =  $row['3st_num'];
    $key_num[4] =  $row['4st_num'];
    $key_num[5] =  $row['5st_num'];
    $key_num[6] =  $row['6st_num'];
    $key_num[7] =  $row['7st_num'];
    $key_num[8] =  $row['8st_num'];
    $key_num[9] =  $row['9st_num'];
    $key_num[10] =  $row['10st_num'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>데이터 분석</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="./css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="./css/bootswatch.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
    
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">GongcheME!</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">취업사이트 보기<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="http://www.jobkorea.co.kr/" target='_blank'>잡코리아</a></li>
            <li><a href="http://www.saramin.co.kr/" target='_blank'>사람인</a></li>
            <li><a href="http://www.incruit.com/" target='_blank'>인쿠르드</a></li>
            <li class="divider"></li>
            <li><a href="https://www.google.co.kr/search?q=%EC%B7%A8%EC%97%85%EC%82%AC%EC%9D%B4%ED%8A%B8&ie=utf-8&oe=utf-8&gws_rd=cr&ei=fFnNVeLYKoG00gT_nYCQAQ"  target='_blank'>더많은 취업사이트 알아보기</a></li>
          </ul>
        </li>
        <li><a href="./ex_calendar.php" target='_blank'>달력보기</a></li>
        <li><a href="./chart.php">Data Analysis</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Team 준래와 아이들</a></li>
      </ul>
    </div>
  </div>
</nav>
    
    
<!-- Main content -->
        <section class="content">


          <div class="row">


            <div class="col-md-6">
              <!-- DONUT CHART -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">직종 통계</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" style="height:300px"></canvas>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

               <!-- BAR CHART -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">선호하는 단어</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height:300px"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->


            </div><!-- /.col (LEFT) -->


            <div class="col-md-6">
                            <!-- BAR CHART -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">오늘의 키워드</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body" align="center">

                    <img src= <?php echo "'./img/img_".date("Y-m-d").".png'";?> width=auto, height=700 ></img>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (LEFT) -->


            <div class="col-md-12">
              <!-- LINE CHART -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">일별 데이터 변화율</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="lineChart" style="height:250px"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col (LEFT) -->

          </div>

            

        </section><!-- /.content -->



    

      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>


    <!-- jQuery 2.1.4 -->
    <script src="js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="js/bootstrap.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="js/Chart.min.js"></script>
    <!-- FastClick -->
    <script src="js/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="js/demo.js"></script>
    <!-- page script -->


    <script>
      $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

       

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
          {
            value: <?php echo $etc_num; ?>,
            color: '#f56954',
            highlight: '#f56954',
            label: '기타 직종'
          },
          {
            value: <?php echo $it_num; ?>,
            color: '#00a65a',
            highlight: '#00a65a',
            label: 'IT 부서'
          },
          {
            value: <?php echo $office_num; ?>,
            color: '#f39c12',
            highlight: '#f39c12',
            label: '사무직'
          },
          {
            value: <?php echo $blue_collar_num; ?>,
            color: '#00c0ef',
            highlight: '#00c0ef',
            label: '생산직'
          },
          {
            value: <?php echo $medical_num; ?>,
            color: '#3c8dbc',
            highlight: '#3c8dbc',
            label: '의료업'
          },
        ];
        var pieOptions = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke: true,
          //String - The colour of each segment stroke
          segmentStrokeColor: '#fff',
          //Number - The width of each segment stroke
          segmentStrokeWidth: 2,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 50, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps: 100,
          //String - Animation easing effect
          animationEasing: 'easeOutBounce',
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate: true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //String - A legend template
          legendTemplate: '<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);

        //-------------
        //- BAR CHART -
        //-------------

        var barChartData = {
          labels: [<?php echo " '" . $key_word[1] ."', '" . $key_word[2]. "', '" .$key_word[3]. "', '" . $key_word[4]."', '".$key_word[5]. "', '". $key_word[6]."', '".$key_word[7]."', '".$key_word[8]."', '".$key_word[9]."', '".$key_word[10]."' "; ?>],
          datasets: [
            {
              label: 'Digital Goods',
              fillColor: '#00a65a',
              strokeColor: '#00a65a',
              pointColor: '#3b8bba',
              pointStrokeColor: 'rgba(60,141,188,1)',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data: [<?php echo $key_num[1] . "," .$key_num[2]. "," . $key_num[3].",".$key_num[3].",".$key_num[5].",".$key_num[6].",".$key_num[7].",".$key_num[8].",".$key_num[9].",".$key_num[10]; ?>]
            }
          ]
        };


        var barChartCanvas = $('#barChart').get(0).getContext('2d');
        var barChart = new Chart(barChartCanvas);

        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: 'rgba(0,0,0,.05)',
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: '<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);
      });


        //-------------
        //- LINE CHART -
        //--------------
        var lineChartData = {
          labels: [<?php echo " '". date("Y-m-d",strtotime("-9 day")) . " ',' ". date("Y-m-d",strtotime("-8 day")) ." ',' ".date("Y-m-d",strtotime("-7 day"))." ',' ". date("Y-m-d",strtotime("-6 day")) ." ',' " .date("Y-m-d",strtotime("-5 day")). " ',' " .date("Y-m-d",strtotime("-4 day")). " ',' ". date("Y-m-d",strtotime("-3 day")) ." ','". date("Y-m-d",strtotime("-2 day")) ."','". date("Y-m-d",strtotime("-1 day")) ."','". date("Y-m-d") ."' ";?>],
          datasets: [
            {
              label: 'DATA Analysis',
              fillColor: 'rgba(210, 214, 222, 1)',
              strokeColor: 'rgba(210, 214, 222, 1)',
              pointColor: 'rgba(210, 214, 222, 1)',
              pointStrokeColor: '#c1c7d1',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data: [<?php echo  $date[10]." , ". $date[9] ." , ".$date[8]." , ".$date[7]." , ".$date[6]." , ".$date[5]." , ".$date[4]." , ".$date[3]." , ".$date[2]." , ".$date[1] ; ?>]
            },
          ]
        };




        var lineChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: false,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
        };

        var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
        var lineChart = new Chart(lineChartCanvas);
        lineChartOptions.datasetFill = false;
        lineChart.Line(lineChartData, lineChartOptions);
        //-------------
        //- END -
        //--------------

    </script>


    


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootswatch.js"></script>
    
    <!-- jQuery 2.1.4 -->
    <script src="js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="js/bootstrap.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="js/Chart.min.js"></script>
    <!-- FastClick -->
    <script src="js/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="js/demo.js"></script>
    <!-- page script -->
  </body>
</html>

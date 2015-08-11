<?php  
  include_once('./common.php');
  $result = mysqli_query($conn,"SELECT * FROM gongche  ");

function classification($arg_1)
{
    switch ($arg_1) {
    case 1  :return "IT";
               break;
    case 2  : return "사무직";
               break;
    case 3  : return "생산직";
               break;
    default    : return "기타";
               break;
             }
}

function put_date($arg_1){
  if (date("Y",strtotime ("+2 years")) > date( "Y", strtotime($arg_1))) {
    return $arg_1;
  } else {
    return "상시모집";
  }
  
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>공채정보을 한번에! GongchME!</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    
    <link rel="stylesheet" href="./css/bootstrap.css">
   
    <!-- DataTables -->
    <link rel="stylesheet" href="./css/dataTables.bootstrap.css">




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">GongcheME!</a>
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
            <li><a href="https://www.google.co.kr/search?q=%EB%B2%88%EC%97%AD&ie=utf-8&oe=utf-8&gws_rd=cr&ei=hwLJVaD9G8u-0ASBgpKIDw#newwindow=1&q=%EC%B7%A8%EC%97%85%EC%82%AC%EC%9D%B4%ED%8A%B8"  target='_blank'>더많은 취업사이트 알아보기</a></li>
          </ul>
        </li>
        <li><a href="./ex_calendar.php" target='_blank'>달력보기</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Team 준래와 아이들</a></li>
      </ul>
    </div>
  </div>
</nav>

      
      

             <!-- Content Header (Page header) -->
      

        <!-- Main content -->
        
          <?php
            echo '
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">전체 공채일정 보기</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>번호</th>
                        <th>회사명</th>
                        <th>모집내용</th>
                        <th>계시일</th>
                        <th>마감일</th>
                        <th>직종</th>
                      </tr>
                    </thead>
                    <tbody>';

                  $n = 1;
                  while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $n . "</td>";
                      echo "<td>" . $row['job_name'] . "</td>";
                      echo "<td>" ."<a href='" . $row['company_url'] ."' target='_blank'>" . $row['in_Jobs'] ."</a>". "</td>";
                      echo "<td>" . $row['published'] . "</td>";
                      echo "<td>" . put_date($row['deadline_data']) . "</td>";
                     echo "<td>" . classification($row['occupations']) . "</td>";
                    echo "</tr>";
                    $n++;
                    }
                     

                    echo '</tbody>
                    <tfoot>
                      <tr>
                        <th>번호</th>
                        <th>회사명</th>
                        <th>모집내용</th>
                        <th>계시일자</th>
                        <th>마감일자</th>
                        <th>직종</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->';
      mysqli_close($conn);
      ?>
      <footer>
        
      </footer>

      <!-- Control Sidebar -->
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    

    <!-- jQuery 2.1.4 -->
    <script src="./js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="./js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="./js/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="./js/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>

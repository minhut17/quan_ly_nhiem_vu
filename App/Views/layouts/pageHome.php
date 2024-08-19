<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Quantity'],
        ['Nhiệm vụ tổng cộng', <?=$data[0]["totalTask"]?>],
        ['Nhiệm vụ hoàn thành', <?=$data[0]["completed_tasks"]?>],
        ['Nhiệm vụ ưu tiên', <?=$data[0]["priority_tasks"]?>]
      ]);


      var options = {
        title: 'Biểu đồ hoạt động nhiệm vụ',
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    
      }
  </script>
</head>

<body>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   


    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12">
            <div class="container">
              <h2 class="text-center mt-5">BIỂU ĐỒ THỐNG KÊ</h2>
              <div class="mt-3">
                <!-- <div class="text-center" id="myChart" style="width: 1000px;height:500px;"> -->
                  <div class="mx-auto "> 
                   
                     <div id="piechart" style="width: auto;height:500px;"></div>
                  </div>
                </div>
              </div>
            </div>
            <div  class="col-12 text-center ">BIỂU ĐỒ THỐNG KÊ  NHIỆM VỤ</div>
            <!-- /.col -->
          </div>
          <!-- /.row -->


          <!-- /.row -->


        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</body>

</html>



<!-- <html>

<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work', 11],
        ['Eat', 2],
        ['Commute', 2],
        ['Watch TV', 2],
        ['Sleep', 7]
      ]);

      var options = {
        title: 'My Daily Activities'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
</head>

<body>
  <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>

</html> -->
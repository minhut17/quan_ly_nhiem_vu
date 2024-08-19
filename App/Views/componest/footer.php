<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../public/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../public/assets/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../../public/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../../public/assets/plugins/raphael/raphael.min.js"></script>
<script src="../../public/assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../public/assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../public/assets/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../../public/assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../public/assets/dist/js/pages/dashboard2.js"></script>

<!-- //chart -->

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<!-- <script language="javascript">
  document.getElementById('flexCheckIndeterminate').onclick = function (e) {
    var checkboxValue = this.value;
    if (this.checked) {
     
      // Gọi hàm cập nhật trạng thái ở đây
      capNhatTrangThai(checkboxValue);
      //  alert("Bạn vừa chọn " + checkboxValue );
    }
    else {
      alert("Bạn vừa bỏ chọn");
      // Gọi hàm cập nhật trạng thái ở đây
      capNhatTrangThai(checkboxValue);
    }
  };
  function capNhatTrangThai(checkboxValue) {
    $.ajax({
        type: "POST",
        url: "?url=TaskController/updateTask/"+checkboxValue, // Đường dẫn tới tập tin PHP xử lý
        data: { status: "updated" }, // Dữ liệu gửi đi, có thể thay đổi tùy ý
        success: function(response) {
            console.log("Trạng thái đã được cập nhật: " + response);
            // Xử lý kết quả nếu cần thiết
        },
        error: function(xhr, status, error) {
            console.error("Lỗi khi cập nhật trạng thái: " + error);
        }
    });
}
</script> -->
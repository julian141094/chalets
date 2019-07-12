
    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url('assets/backend/plugins/jQuery/jQuery-2.1.4.min.js')?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url('assets/backend/css/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/backend/plugins/fastclick/fastclick.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/backend/js/app.min.js') ?>"></script>
    <!-- Sparkline -->
    <script src="<?=base_url('assets/backend/plugins/sparkline/jquery.sparkline.min.js') ?>"></script>
    <!-- jvectormap -->
    <script src="<?=base_url('assets/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
    <script src="<?=base_url('assets/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?=base_url('assets/backend/plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?=base_url('assets/backend/plugins/chartjs/Chart.min.js') ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <?php if ($index == 'index'): ?>
        <script src="<?=base_url('assets/backend/js/pages/dashboard2.js') ?>"></script>
    <?php endif ?>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('assets/backend/js/demo.js') ?>"></script>
        <!-- DataTables -->
    <script src="<?=base_url('assets/backend/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?=base_url('assets/backend/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>
    
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

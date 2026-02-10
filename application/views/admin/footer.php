      <footer class="main-footer">
        <strong>Copyright &copy; <?=date('Y')?> <a href="#">EQ STUDIO</a>.</strong>
        All rights reserved.
      </footer>
    </div>
    
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="<?=base_url('back_assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/chart.js/Chart.min.js"></script>
    <!-- <script src="<?=base_url('back_assets/')?>plugins/sparklines/sparkline.js"></script> -->
    <!-- <script src="<?=base_url('back_assets/')?>plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
    <script src="<?=base_url('back_assets/')?>plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/moment/moment.min.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/select2/js/select2.full.min.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="<?=base_url('back_assets/')?>js/adminlte.js"></script>
    <!-- <script src="<?=base_url('back_assets/')?>js/demo.js"></script> -->
    <script src="<?=base_url('back_assets/')?>js/pages/dashboard.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="<?=base_url('back_assets/')?>plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?=base_url('back_assets/')?>js/instascan.min.js"></script>
    <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 2000);
    </script>
    <script>
    $(function () {
        $('#table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
            "language" : {"url" : "<?=base_url('back_assets/')?>id.json"}
        });
    });
    $(function () {
        $('#table2').DataTable({
            "paging": false,
            "lengthChange": true,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            "language" : {"url" : "<?=base_url('back_assets/')?>id.json"}
        });
    })
    $('.summernote').summernote();
    $('.select2bs4').select2({theme: 'bootstrap4'});
    </script>
  </body>
</html>
</div>
<!-- ============================================================== -->
<!-- End All Body Main Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<!-- Bootstrap tether Core JavaScript -->
<script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="assets/extra-libs/sparkline/sparkline.js"></script>
<!-- Magnific Popup Javascript -->
<script src="assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="assets/libs/magnific-popup/meg.init.js"></script>
<!--Wave Effects -->
<script src="dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="dist/js/custom.js"></script>
<!-- this page js -->
<!-- <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script> -->
<!-- <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script> -->
<script src="assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="assets/libs/ckeditor/ckeditor.js"></script>
<script src="dist/js/editor.js"></script>

<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
    $('#one_config').DataTable();
    $('#two_config').DataTable();
    $('#three_config').DataTable();
    $('#four_config').DataTable();
    $('#five_config').DataTable();
    $('#six_config').DataTable();
    $('#seven_config').DataTable();
    $('#eight_config').DataTable();
    $('#nine_config').DataTable();

    /****************************************
    *       Editor:- CKEditor             *
    ****************************************/
    getEditor();
    CKEDITOR.disableAutoInline = true;
    CKEDITOR.inline( 'ieditor1' );
    CKEDITOR.inline( 'ieditor2' );
    CKEDITOR.inline( 'ieditor3' );
    CKEDITOR.inline( 'ieditor4' );
    CKEDITOR.inline( 'ieditor5' );
</script>

</body>

</html>
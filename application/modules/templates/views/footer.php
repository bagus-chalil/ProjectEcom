            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by EventTech. Designed and Developed by <a href="https://wrappixel.com">EventTech</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->
            <!-- All Jquery -->
            <!-- ============================================================== -->
            <script src="<?= base_url('assets/') ?>libs/jquery/dist/jquery.min.js"></script>
            <script src="<?= base_url('assets/') ?>libs/popper.js/dist/umd/popper.min.js"></script>
            <script src="<?= base_url('assets/') ?>libs/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- apps -->
            <!-- apps -->
            <script src="<?= base_url('assets/dist/') ?>js/app.min.js"></script>
            <script src="<?= base_url('assets/dist/') ?>js/app.init-menusidebar.js"></script>
            <script src="<?= base_url('assets/dist/') ?>js/app-style-switcher.js"></script>
            <script src="<?= base_url('assets/dist/') ?>js/feather.min.js"></script>
            <script defer src="<?= base_url(); ?>fontawesomefontawesome/js/all.js"></script>
            <!--load all styles -->
            <script src="<?= base_url('assets/dist/') ?>js/sidebarmenu.js"></script>
            <script src="<?= base_url('assets/') ?>libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
            <script src="<?= base_url('assets/') ?>extra-libs/sparkline/sparkline.js"></script>
            <!--Custom JavaScript -->
            <script src="<?= base_url('assets/dist/') ?>js/custom.min.js"></script>
            <!--This page JavaScript -->
            <script src="<?= base_url('assets/') ?>extra-libs/c3/d3.min.js"></script>
            <script src="<?= base_url('assets/') ?>libs/chartist/dist/chartist.min.js"></script>
            <script src="<?= base_url('assets/') ?>libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
            <script src="<?= base_url('assets/') ?>extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
            <script src="<?= base_url('assets/') ?>extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
            <script src="<?= base_url('assets/dist/') ?>js/pages/dashboards/dashboard1.min.js"></script>

            <!--This page plugins -->
            <script src="<?= base_url('assets/') ?>extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="<?= base_url('assets/dist') ?>/js/pages/datatable/datatable-basic.init.js"></script>
            <script src="<?= base_url('assets/dist/') ?>js/sidebarmenu.js "></script>
            <!--Custom Text Area -->
            <script src='https://cdn.tiny.cloud/1/o9jvtg82jk3mnwk6netsfhdkkt1lww4yb5av0euodtj60khx/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
            <script src="<?= base_url('assets/') ?>chosen/chosen.jquery.min.js"></script>

            <script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
            <script>
                CKEDITOR.replace('deskripsi');
                CKEDITOR.replace('deskripsi2');
            </script>
            <script>
                $('.chosen').chosen({
                    width: '100%',

                });
            </script>
            </script>
            <script>
                tinymce.init({
                    selector: 'textarea'
                });
            </script>
            <!-- Date Picker -->
            <script src="<?= base_url('assets/dist/') ?>datetimepicker/DateTimePicker.js "></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
            <script type="text/javascript">
                $(function() {
                    $(".datepicker").datepicker({
                        autoclose: true,
                        todayHighlight: true,
                        format: 'dd-mm-yyyy',
                        language: 'id'
                    });
                });
            </script>
            <script>
                // change filename in placeholder
                $(document).on('change', '.custom-file-input', function(event) {
                    $(this).next('.custom-file-label').html(event.target.files[0].name);
                })
            </script>
            <script>
                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('admin/changeAccess'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/roleAccess/'); ?>" + roleId;
                        }
                    })

                });
            </script>
            </body>

            </html>
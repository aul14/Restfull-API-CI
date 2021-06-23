 <!-- Footer -->

 <footer class="sticky-footer bg-white">
   <div class="container my-auto">
     <div class="copyright text-center my-auto">
       <span>Copyright &copy; Aul Website 2019</span>
     </div>
   </div>
 </footer>
 <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
   <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">Tekan "Keluar" Jika Anda Ingin Keluar Dari Website Ini.</div>
       <div class="modal-footer">
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
         <a class="btn btn-primary" href="<?php echo base_url() ?>auth/logout">Keluar</a>
       </div>
     </div>
   </div>
 </div>

 <!-- Bootstrap core JavaScript-->

 <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script>

 <!-- Page level plugins -->
 <script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>

 <!-- Page level custom scripts -->
 <script src="<?php echo base_url('js/demo/chart-area-demo.js') ?>"></script>
 <script src="<?php echo base_url('js/demo/chart-pie-demo.js') ?>"></script>
 <!-- Page level plugins -->
 <script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/loaders/pace.min.js"></script>

 <script src="<?php echo base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap4.min.js"></script>

 <script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/ui/moment/moment.min.js"></script>
 <script src="<?php echo base_url() ?>assets/calender/js/pignose.calendar.js"></script>

 <script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
 <script>
   tinymce.init({
     selector: 'textarea',
     menubar: '',
     theme: 'modern'
   });
 </script>
 <!-- Page level custom scripts -->
 <script src="<?php echo base_url() ?>js/demo/datatables-demo.js"></script>

 <!-- JavaScript Untuk Search dan Pagination-->
 <script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
 <link rel="stylesheet" href="<?= base_url() ?>assets/datatables/datatables.min.css">
 <script type="text/javascript">
   $(document).ready(function() {
     $('#dataTable').dataTable();
   });
 </script>


 <script type="text/javascript">
   function submit(x) {

     $.ajax({
       type: "POST",
       data: 'id_user=' + x,
       url: '<?php echo base_url() . "user/ambilId" ?>',
       dataType: 'json',
       success: function(hasil) {
         $('[name="user_nama"]').val(hasil[0].user_nama);
         $('[name="user_email"]').val(hasil[0].user_email);
         $('[name="user_hp"]').val(hasil[0].user_hp);
         $('[name="ip_address"]').val(hasil[0].ip_address);
         $('[name="keterangan"]').val(hasil[0].keterangan);
         $('[name="user_register"]').val(hasil[0].user_register);
       }
     });

   }
 </script>

 <script type="text/javascript">
   $(function() {
     function onClickHandler(date, obj) {


       var $calendar = obj.calendar;
       var $box = $calendar.parent().siblings('.box').show();
       var text = 'Anda memilih tanggal ';

       if (date[0] !== null) {
         text += date[0].format('DD MMMM YYYY');
       }

       if (date[0] !== null && date[1] !== null) {
         text += ' ~ ';
       } else if (date[0] === null && date[1] == null) {
         text += 'tidak ada';
       }

       if (date[1] !== null) {
         text += date[1].format('DD MMMM YYYY');
       }

       $box.text(text);
     }

     $('.calendar').pignoseCalendar({
       lang: 'ind',
       select: onClickHandler,
       theme: 'blue' // light, dark, blue
     });
   });
 </script>

 </body>

 </html>
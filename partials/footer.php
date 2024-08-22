

  <!-- JQuery  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>



  <!-- Sweet Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.4/sweetalert2.min.js" integrity="sha512-w4LAuDSf1hC+8OvGX+CKTcXpW4rQdfmdD8prHuprvKv3MPhXH9LonXX9N2y1WEl2u3ZuUSumlNYHOlxkS/XEHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- jQuery Knob Chart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>

    <!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<!-- Tempusdominus Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" ></script>



<!-- overlayScrollbars -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/2.10.0/browser/overlayscrollbars.browser.es6.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="assets/datatables/jquery.dataTables.min.js"></script>
<script src="assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/jszip/jszip.min.js"></script>
<script src="assets/pdfmake/pdfmake.min.js"></script>
<script src="assets/pdfmake/vfs_fonts.js"></script>
<script src="assets/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/signature.js"></script>

<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>


<?php
// DISPLAY SWEET ALERT IF A MESSAGE IS SET IN THE URL

// check for message in the url

if (isset($_GET['msg'])) {
	$msg = $_GET['msg'];
	echo "
        <script>
            $(document).ready(function(){
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: '$msg',
                    showConfirmButton: false,
                    timer: 3000
                });
            })
        </script>
    ";
}

?>

<script>
    $(document).ready(function() {
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $('#enddate').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $("#example1").DataTable();

        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "responsive": true,
        });
  });

  // signature javascript
  var wrapper = document.getElementById("signature-pad");
  var clearButton = wrapper.querySelector("[data-action=clear]");
  var savePNGButton = wrapper.querySelector("[data-action=save-png]");
  var canvas = wrapper.querySelector("canvas");
  var el_note = document.getElementById("note");
  var signaturePad;
  signaturePad = new SignaturePad(canvas);

  clearButton.addEventListener("click", function (event) {
      document.getElementById("note").innerHTML="The signature should be inside box";
      signaturePad.clear();
  });
  savePNGButton.addEventListener("click", function (event){
      if (signaturePad.isEmpty()){
          alert("Please provide signature first.");
          event.preventDefault();
      }else{
          var canvas  = document.getElementById("the_canvas");
          var dataUrl = canvas.toDataURL();
          document.getElementById("signature").value = dataUrl;
      }
  });
  function my_function(){
      document.getElementById("note").innerHTML="";
  }

</script>

</body>
</html>
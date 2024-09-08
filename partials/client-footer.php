<!-- Jquery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  <!-- Sweet Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.4/sweetalert2.min.js" integrity="sha512-w4LAuDSf1hC+8OvGX+CKTcXpW4rQdfmdD8prHuprvKv3MPhXH9LonXX9N2y1WEl2u3ZuUSumlNYHOlxkS/XEHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

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
} elseif (isset($_GET['err_msg'])) {
	$msg = $_GET['err_msg'];
	echo "
        <script>
            $(document).ready(function(){
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: '$msg',
                    showConfirmButton: false,
                    timer: 3000
                });
            })
        </script>
    ";
}

<script>
    $(document).ready(function(){
        //Date picker
        $('#birthdate').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>

</body>
</html>
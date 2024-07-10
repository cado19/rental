    
    
    <!-- JQUERY JS  -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- DATATABLES JS  -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- JQUERY UI JS  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#myTable').DataTable();
            $(function () {
                $("#start_date_picker").datepicker({
                    dateFormat: 'yy-mm-dd'
                });
                $("#end_date_picker").datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            });
        });
    </script>

</body>
</html>
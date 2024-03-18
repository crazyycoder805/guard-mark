<!-- Script Start -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/dt.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/swiper.min.js"></script>
<!--  -->
<!-- Page Specific -->
<script src="assets/js/nice-select.min.js"></script>
<!-- Custom Script -->


<script src="assets/js/customSelect.js"></script>
<script src="assets/js/custom.js"></script>
<?php if ($name == "guard_registration.php" || $name == "registration.php") { ?>
<script src="assets/js/recorder.js"></script>

<?php } ?>
<script>
$(document).ready(function() {
    $('#example1').DataTable();
    $('#example2').DataTable();
    $('#example9').DataTable();

    $("#customer_name").select2();
    $("#booker_name").select2();

    $("#product").select2();
    $("#item_names").select2();
    // $("#company_name").select2();
    $("#last_rate").select2();
    $("#book").select2();


});
</script>

<script src="assets/js/apexchart/apexcharts.min.js"></script>
<script src="assets/js/apexchart/chart.js"></script>


<script>
$(document).ready(e => {


    <?php 
    $date1 = new DateTime(date("Y-m-d"));
    

    foreach ($pdo->read("registration") as $guardd) {
        $date2 = new DateTime($guardd['expiry_date']);
        $dif = $date1->diff($date2);
        $daysCount = $dif->days;
        if ($daysCount <= 1) {
            $pdo->update("registration", ['id'=>$guardd['id'], ['status'=> 'Expired']]);
        }
    }

    ?>
});
</script>
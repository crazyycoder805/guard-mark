<?php 

session_start();
require_once 'assets/includes/pdo.php';


if ($_POST['__FILE__'] == "search_duty") { 
    $duties = "";

    if (!empty($_POST["end_date"])) { 
        $duties = $pdo->customQuery("SELECT * FROM duties WHERE date BETWEEN '{$_POST['start_date']}' AND '{$_POST['end_date']}'");
    } else if (empty($_POST["end_date"])) {
        $duties = $pdo->customQuery("SELECT * FROM duties WHERE date = '{$_POST['start_date']}'");
    } else if (!empty($_POST["booker_name"]) && !empty($_POST['start_date'])) {
        $duties = $pdo->customQuery("SELECT * FROM duties WHERE date = '{$_POST['start_date']}' AND booker_name = {$_POST["booker_name"]}");
    }else if (!empty($_POST["booker_name"]) && !empty($_POST['start_date']) && !empty($_POST['end_date'])) {
        $duties = $pdo->customQuery("SELECT * FROM duties WHERE date BETWEEN '{$_POST['start_date']}' AND '{$_POST['end_date']}' AND booker_name = {$_POST["booker_name"]}");
    }
?>


<table id="search_table" class="table table-striped table-bordered dt-responsive">
    <thead>
        <tr>
            <th>#</th>
            <th>Guard name</th>

            <th>Site name</th>
            <th>Date</th>
            <th>Site registration date</th>
            <th>Time in</th>
            <th>Time out</th>
            <th>Duty hrs</th>
            <th>Pro name</th>
            <th>Site address</th>
            <th>City</th>
            <th>Postal code</th>
            <th>Notes</th>
            <th>Fuel</th>
            <th>Expenses</th>
            <th>Travel</th>
            <th>Lgs</th>
            <th>Company name</th>
            <th>Additional note</th>
            <th>Status</th>

            <th>Created at</th>


    </thead>
    <tbody>
        <?php 
foreach ($duties as $duty) {
    $guard = $pdo->read("registration", ['id'=>$duty['guard_name']]);
    $site = $pdo->read("site_registration", ['id'=>$duty['site_name']]);
?>
        <tr>
            <td><?php echo $duty['id']; ?></td>
            <td><?php echo $guard[0]['firstname'] . " " . $guard[0]['lastname']; ?>
            </td>
            <td><?php echo $site[0]['site_name']; ?></td>
            <td><?php echo $duty['date']; ?></td>
            <td><?php echo $duty['site_registration_date']; ?></td>
            <td><?php echo $duty['time_in']; ?></td>
            <td><?php echo $duty['time_out']; ?></td>
            <td><?php echo $duty['duty_hrs']; ?></td>
            <td><?php echo $duty['pro_name']; ?></td>
            <td><?php echo $duty['site_address']; ?></td>
            <td><?php echo $duty['city']; ?></td>
            <td><?php echo $duty['postal_code']; ?></td>
            <td><?php echo $duty['notes']; ?></td>
            <td><?php echo $duty['fuel']; ?></td>
            <td><?php echo $duty['expenses']; ?></td>
            <td><?php echo $duty['travel']; ?></td>
            <td><?php echo $duty['lgs']; ?></td>
            <td><?php echo $duty['company_name']; ?></td>
            <td><?php echo $duty['additional_note']; ?></td>
            <td><?php echo $duty['status']; ?></td>

            <td><?php echo $duty['created_at']; ?></td>

        </tr>
        <?php } ?>
    </tbody>

</table>



<?php } ?>
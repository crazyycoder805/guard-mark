<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>


<?php 

require_once 'assets/includes/pdo.php';
session_start();

$s = $_GET['s'];
$t = $_GET['t'];

$data = [];

if (!isset($s) || !isset($t)) {
    header('location:site_registration.php');
} else {
    

    if ($t == "site_registration") {
        $data = $pdo->customQuery("SELECT * FROM site_registration WHERE 

        site_name LIKE '%$s%' 
        OR created_at LIKE '%$s%' 
        OR site_name LIKE '%$s%' 
        OR date LIKE '%$s%' 
        OR site_registration_date LIKE '%$s%'
        OR time_in LIKE '%$s%'
        OR time_out LIKE '%$s%'
        OR duty_hrs LIKE '%$s%'
        OR day LIKE '%$s%'
        OR pro_name LIKE '%$s%'
        OR site_address LIKE '%$s%'
        OR city LIKE '%$s%'
        OR postal_code LIKE '%$s%'
        OR notes LIKE '%$s%'
        OR fuel LIKE '%$s%'
        OR expenses LIKE '%$s%'
        OR travel LIKE '%$s%'
        OR lgs LIKE '%$s%'
        OR company_name LIKE '%$s%'
        OR additional_note LIKE '%$s%'
        OR status LIKE '%$s%'
        OR address LIKE '%$s%'
        OR address_2 LIKE '%$s%'
        OR country LIKE '%$s%'
        OR state LIKE '%$s%'
        OR part LIKE '%$s%'
        OR created_at LIKE '%$s%'

        ");
       
    } else if ($t == "registration") {
     
        $data = $pdo->customQuery("SELECT * FROM registration WHERE 

         id LIKE '%$s%'
        OR registration_number LIKE '%$s%'
        OR firstname LIKE '%$s%'
        OR lastname LIKE '%$s%'
        OR dob LIKE '%$s%'
        OR phonenumber LIKE '%$s%'
        OR mobile LIKE '%$s%'
        OR emergency_contact_number LIKE '%$s%'
        OR email LIKE '%$s%'
        OR cnic LIKE '%$s%'
        OR cnic_front_pic LIKE '%$s%'
        OR cnic_back_pic LIKE '%$s%'
        OR pasport LIKE '%$s%'
        OR pasport_front_pic LIKE '%$s%'
        OR pasport_back_pic LIKE '%$s%'
        OR pic LIKE '%$s%'
        OR qualification LIKE '%$s%'
        OR recent_experience LIKE '%$s%'
        OR post_code LIKE '%$s%'
        OR sia_number LIKE '%$s%'
        OR sia_card_pic LIKE '%$s%'
        OR licence_sector LIKE '%$s%'
        OR role LIKE '%$s%'
        OR expiry_date LIKE '%$s%'
        OR licence_status LIKE '%$s%'
        OR reading_test_video LIKE '%$s%'
        OR topic LIKE '%$s%'
        OR topic_answer LIKE '%$s%'
        OR availability LIKE '%$s%'
        OR cnic_expiry LIKE '%$s%'
        OR pasport_expiry LIKE '%$s%'
        OR bank_statement_pdf LIKE '%$s%'
        OR utility_bill_pic LIKE '%$s%'
        OR dvld_licence_pic LIKE '%$s%'
        OR level LIKE '%$s%'
        OR middle_name LIKE '%$s%'
        OR created_at LIKE '%$s%';
");

    } else if ($t == "duty") {
        $data = $pdo->customQuery("SELECT * FROM duties WHERE 
        guard_name LIKE '%$s%' 
        OR
        site_name LIKE '%$s%' 
        OR created_at LIKE '%$s%' 
        OR site_name LIKE '%$s%' 
        OR date LIKE '%$s%' 
        OR site_registration_date LIKE '%$s%'
        OR time_in LIKE '%$s%'
        OR time_out LIKE '%$s%'
        OR duty_hrs LIKE '%$s%'
        OR pro_name LIKE '%$s%'
        OR site_address LIKE '%$s%'
        OR city LIKE '%$s%'
        OR postal_code LIKE '%$s%'
        OR notes LIKE '%$s%'
        OR fuel LIKE '%$s%'
        OR expenses LIKE '%$s%'
        OR travel LIKE '%$s%'
        OR lgs LIKE '%$s%'
        OR company_name LIKE '%$s%'
        OR additional_note LIKE '%$s%'
        OR status LIKE '%$s%'
        OR address LIKE '%$s%'
        OR address_2 LIKE '%$s%'
        OR country LIKE '%$s%'
        OR state LIKE '%$s%'
        OR part LIKE '%$s%'
        OR created_at LIKE '%$s%'

        ");
       
    } else if ($t == "search_duty_search") {

        if (!empty($_GET["ed"])) { 
            $data = $pdo->customQuery("SELECT * FROM duties WHERE date BETWEEN '{$_GET['sd']}' AND '{$_GET['ed']}'");
        } else if (empty($_GET["ed"])) {
            $data = $pdo->customQuery("SELECT * FROM duties WHERE date = '{$_GET['sd']}'");
        } else if (!empty($_GET["g"]) && !empty($_GET["sd"])) {
            $data = $pdo->customQuery("SELECT * FROM duties WHERE date = '{$_GET['sd']}' AND booker_name = {$_GET["g"]}");
        }else if (!empty($_GET["g"]) && !empty($_GET["sd"]) && !empty($_GET['ed'])) {
            $data = $pdo->customQuery("SELECT * FROM duties WHERE date BETWEEN '{$_GET['sd']}' AND '{$_GET['ed']}' AND booker_name = {$_GET["g"]}");
        }
               
    }
}



?>

<body>


    <h2 style="text-align: center;text-decoration: underline;">Report</h2>

    <div style=" display: flex;
        justify-content: space-between;
        ">
        <table style="border-collapse: collapse;">
            <thead>

                <tr>
                    <th>Date : <?php echo date("Y-m-d"); ?></th>
                </tr>
                <tr>
                    <th id="time"></th>
                </tr>
            </thead>
        </table>
    </div>
    <br />

    <?php 
        if ($t == "site_registration") {
        ?>

    <table>
        <thead style="padding: 1px;background-color: grey !important;color: white;">
            <tr>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">#</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Sitename</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">TimeIn</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">TimeOut</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">DutyHrs</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Date</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">SiteRegistrationDate</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">SiteAddress</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Fuel</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Expenses</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Travel</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">LGS</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">CompanyName</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Status</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Address</th>


            </tr>
        </thead>
        <tbody>

            <?php 
                foreach ($data as $d) {
                    
                
            ?>
            <tr>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['id']; ?></td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['site_name']; ?>
                </td>


                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['time_in']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['time_out']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['duty_hrs']; ?>
                </td>

                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['date']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['site_registration_date']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['site_address']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['fuel']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['expenses']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['travel']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['lgs']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['company_name']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['status']; ?>
                </td>

                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['address']; ?>, <?php echo $d['city']; ?>, <?php echo $d['postal_code']; ?>
                </td>



            </tr>
            <?php } ?>

        </tbody>

    </table>


    <?php } else if ($t == "registration") { ?>
    <table>
        <thead style="padding: 1px;background-color: grey !important;color: white;">
            <tr>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">#</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">RegistrationNumber</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Name</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Mobile</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">CNIC</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">CNICExpiry</th>

                <th style="padding-right: 5px; border-bottom: 1px solid black;">Passport</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">PassportExpiry</th>

                <th style="padding-right: 5px; border-bottom: 1px solid black;">Address</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">SIANumber</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Role</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">ExpiryDate</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Availability</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Level</th>
            </tr>
        </thead>

        <tbody>

            <?php 
                foreach ($data as $d) {
                    
                
            ?>
            <tr>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['id']; ?></td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['registration_number']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['firstname'] . " " . $d['middle_name'] . " " . $d['lastname']; ?></td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['mobile']; ?></td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['cnic']; ?></td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['cnic_expiry']; ?></td>

                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['pasport']; ?></td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['pasport_expiry']; ?></td>

                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['address']; ?>,
                    <?php echo $d['state']; ?>, <?php echo $d['city']; ?>, <?php echo $d['post_code']; ?></td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['sia_number']; ?></td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['role']; ?></td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['expiry_date']; ?></td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['availability']; ?></td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['level']; ?></td>


            </tr>
            <?php } ?>

        </tbody>

    </table>
    <?php 
        } else if ($t == "duty") {
        ?>

    <table>
        <thead style="padding: 1px;background-color: grey !important;color: white;">
            <tr>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">#</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Sitename</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">GuardName</th>

                <th style="padding-right: 5px; border-bottom: 1px solid black;">TimeIn</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">TimeOut</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">DutyHrs</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Date</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">SiteRegistrationDate</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">SiteAddress</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Fuel</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Expenses</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Travel</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">LGS</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">CompanyName</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Status</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Address</th>


            </tr>
        </thead>
        <tbody>

            <?php 
                foreach ($data as $d) {
                    $guard = $pdo->read("registration", ['id'=>$d['guard_name']]);
                    $site = $pdo->read("site_registration", ['id'=>$d['site_name']]);
            ?>
            <tr>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['id']; ?></td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $site[0]['site_name']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $guard[0]['firstname'] . " " . $guard[0]['middle_name'] . " " . $guard[0]['lastname']; ?>
                </td>

                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['time_in']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['time_out']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['duty_hrs']; ?>
                </td>

                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['date']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['site_registration_date']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['site_address']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['fuel']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['expenses']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['travel']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['lgs']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['company_name']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['status']; ?>
                </td>

                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['address']; ?>, <?php echo $d['city']; ?>, <?php echo $d['postal_code']; ?>
                </td>



            </tr>
            <?php } ?>

        </tbody>

    </table>


    <?php 
        } else if ($t == "search_duty_search") {
        ?>

    <table>
        <thead style="padding: 1px;background-color: grey !important;color: white;">
            <tr>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">#</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Sitename</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">GuardName</th>

                <th style="padding-right: 5px; border-bottom: 1px solid black;">TimeIn</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">TimeOut</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">DutyHrs</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Date</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">SiteRegistrationDate</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">SiteAddress</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Fuel</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Expenses</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Travel</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">LGS</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">CompanyName</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Status</th>
                <th style="padding-right: 5px; border-bottom: 1px solid black;">Address</th>


            </tr>
        </thead>
        <tbody>

            <?php 
                foreach ($data as $d) {
                    $guard = $pdo->read("registration", ['id'=>$d['guard_name']]);
                    $site = $pdo->read("site_registration", ['id'=>$d['site_name']]);
            ?>
            <tr>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['id']; ?></td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $site[0]['site_name']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $guard[0]['firstname'] . " " . $guard[0]['middle_name'] . " " . $guard[0]['lastname']; ?>
                </td>

                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['time_in']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['time_out']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['duty_hrs']; ?>
                </td>

                <td style="padding-right: 5px;border-bottom: 1px solid black;"><?php echo $d['date']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['site_registration_date']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['site_address']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['fuel']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['expenses']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['travel']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['lgs']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['company_name']; ?>
                </td>
                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['status']; ?>
                </td>

                <td style="padding-right: 5px;border-bottom: 1px solid black;">
                    <?php echo $d['address']; ?>, <?php echo $d['city']; ?>, <?php echo $d['postal_code']; ?>
                </td>



            </tr>
            <?php } ?>

        </tbody>

    </table>


    <?php } ?>



    <script src="assets/js/jquery.min.js"></script>
    <script>
    $(document).ready(e => {
        var currentTime = new Date();

        // Get the current hour, minute, and second
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();
        // Determine if it's AM or PM
        var period = hours < 12 ? "AM" : "PM";

        // Adjust hours for AM/PM format
        hours = hours % 12;
        hours = hours ? hours : 12; // Handle midnight (0 hours)
        const time = `Time : ${hours}:${minutes}:${seconds} ${period}`;
        document.getElementById("time").textContent = time;





    });
    </script>
</body>

</html>
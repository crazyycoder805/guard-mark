<!DOCTYPE html>

<html lang="zxx">
<?php require_once 'assets/includes/head.php'; ?>
<?php

$success = "";
$error = "";
$id = "";

$site_registration = $pdo->read("site_registration");



if (isset($_POST['add_site_registration_btn'])) {
    if (!empty($_POST['site_name']) && !empty($_POST['date']) && !empty($_POST['site_registration_date']) && 
    !empty($_POST['time_in']) && !empty($_POST['time_out']) && !empty($_POST['duty_hrs']) && !empty($_POST['pro_name']) && !empty($_POST['site_address'])
    && !empty($_POST['city']) && !empty($_POST['postal_code']) && !empty($_POST['notes']) && !empty($_POST['fuel']) && !empty($_POST['expenses']) && !empty($_POST['travel']) && !empty($_POST['lgs'])
    && !empty($_POST['company_name']) && !empty($_POST['additional_note']) && !empty($_POST['address']) 
    
    && !empty($_POST['country']) && !empty($_POST['state']) && !empty($_POST['state']) && !empty($_POST['part']) && !empty($_POST['city'])
    ) {
            if ($pdo->create("site_registration", ['site_name' => $_POST['site_name'], 'date' => $_POST['date'], 'site_registration_date' => $_POST['site_registration_date']
            , 'time_in' => $_POST['time_in'], 'time_out' => $_POST['time_out'], 'duty_hrs' => $_POST['duty_hrs'], 
              'pro_name' => $_POST['pro_name'], 'city' => $_POST['city'], 
            'postal_code' => $_POST['postal_code'], 'notes' => $_POST['notes'], 'fuel' => $_POST['fuel'], 'expenses' => $_POST['expenses'], 'travel' => $_POST['travel'], 'lgs' => $_POST['lgs'], 
            'company_name' => $_POST['company_name'], 'additional_note' => $_POST['additional_note'], 'status' => $_POST['status'], 'address_2' => $_POST['address_2'], 'address' => $_POST['address'],
            'country' => $_POST['country'], 'state' => $_POST['state'],

            'part' => $_POST['part']])) {
                $success = "Site added.";
                $pdo->headTo("site_registration.php");
            } else {
                $error = "Something went wrong.";
            }
        
    } else {
        $error = "All fields must be filled.";
    }
} else if (isset($_POST['edit_site_registration_btn'])) {
    if (!empty($_POST['site_name']) && !empty($_POST['date']) && !empty($_POST['site_registration_date']) && 
    !empty($_POST['time_in']) && !empty($_POST['time_out']) && !empty($_POST['duty_hrs']) && !empty($_POST['pro_name']) && !empty($_POST['site_address'])
    && !empty($_POST['postal_code']) && !empty($_POST['notes']) && !empty($_POST['fuel']) && !empty($_POST['expenses']) && !empty($_POST['travel']) && !empty($_POST['lgs'])
    && !empty($_POST['company_name']) && !empty($_POST['additional_note']) && !empty($_POST['country']) && !empty($_POST['state']) && !empty($_POST['state']) && !empty($_POST['part']) && !empty($_POST['city'])) {
        if ($pdo->update("site_registration", ['id' => $_GET['edit_site']], ['site_name' => $_POST['site_name'], 'date' => $_POST['date'], 'site_registration_date' => $_POST['site_registration_date']
        , 'time_in' => $_POST['time_in'], 'time_out' => $_POST['time_out'], 'duty_hrs' => $_POST['duty_hrs'], 
          'pro_name' => $_POST['pro_name'], 'city' => $_POST['city'], 
        'postal_code' => $_POST['postal_code'], 'notes' => $_POST['notes'], 'fuel' => $_POST['fuel'], 'expenses' => $_POST['expenses'], 'travel' => $_POST['travel'], 'lgs' => $_POST['lgs'], 
        'company_name' => $_POST['company_name'], 'additional_note' => $_POST['additional_note'], 'status' => $_POST['status'], 'address_2' => $_POST['address_2'], 'address' => $_POST['address'],
        'country' => $_POST['country'], 'state' => $_POST['state'],

        'part' => $_POST['part']])) {
            $success = "Site updated.";
            $pdo->headTo("site_registration.php");
        } else {
            $error = "Something went wrong. or can't update this because no changes was found";
        }
        
    } else {
        $error = "All fields must be filled.";
    }
} else if (isset($_GET['delete_site'])) {
    if ($pdo->delete("site_registration", $_GET['delete_site'])) {
        $success = "Site deleted.";
        $pdo->headTo("site_registration.php");
    } else {
        $error = "Something went wrong.";
    }
}

if (isset($_GET['edit_site'])) {
    $id = $pdo->read("site_registration", ['id' => $_GET['edit_site']]);
}

?>

<body>
    <?php require_once 'assets/includes/preloader.php'; ?>

    <!-- Main Body -->
    <div class="page-wrapper">

        <!-- Header Start -->
        <?php require_once 'assets/includes/navbar.php'; ?>
        <!-- Sidebar Start -->
        <?php require_once 'assets/includes/sidebar.php'; ?>
        <!-- Container Start -->
        <div class="page-wrapper">
            <div class="main-content">
                <!-- Page Title Start -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <?php
                       
                        if (!empty($success)) {
                        ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                            <?php echo $success; ?>
                        </div>
                        <?php } else if (!empty($error)) { ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                            <?php echo $error; ?>
                        </div>

                        <?php } ?>
                        <div class="page-title-wrapper">
                            <div class="page-title-box">
                                <h4 class="page-title">Site Registration Form</h4>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-link">
                                        <a href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-link active">Site Registration</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- From Start -->
                <div class="from-wrapper">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">

                                <div class="card-body">

                                    <form class="separate-form" method="post">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="site_name" class="col-form-label">Site name</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_site']) ? $id[0]['site_name'] : null;echo isset($_POST['site_name']) ? $_POST['site_name'] : null; ?>"
                                                            class="form-control" name="site_name" type="text"
                                                            placeholder="Enter Site Name" id="site_name">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="date" class="col-form-label">Date</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_site']) ? $id[0]['date'] : null;echo isset($_POST['date']) ? $_POST['date'] : null; ?>"
                                                            class="form-control" name="date" type="date"
                                                            placeholder="Enter Date" id="date">
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="site_registration_date" class="col-form-label">Site
                                                            registration date</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_site']) ? $id[0]['site_registration_date'] : null; echo isset($_POST['site_registration_date']) ? $_POST['site_registration_date'] : null;?>"
                                                            class="form-control" name="site_registration_date"
                                                            type="date" placeholder="Enter Site Registration Date"
                                                            id="site_registration_date">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="time_in" class="col-form-label">Time in</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_site']) ? $id[0]['time_in'] : null;echo isset($_POST['time_in']) ? $_POST['time_in'] : null; ?>"
                                                            class="form-control" name="time_in" type="time"
                                                            placeholder="Enter Time In" id="time_in">
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="time_out" class="col-form-label">Time out</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_site']) ? $id[0]['time_out'] : null;echo isset($_POST['time_out']) ? $_POST['time_out'] : null; ?>"
                                                            class="form-control" name="time_out" type="time"
                                                            placeholder="Enter Time Out" id="time_out">
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="duty_hrs" class="col-form-label">Duty Hrs</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_site']) ? $id[0]['duty_hrs'] : null;echo isset($_POST['duty_hrs']) ? $_POST['duty_hrs'] : null; ?>"
                                                            class="form-control" name="duty_hrs" type="number"
                                                            placeholder="Enter Duty Hrs" id="duty_hrs">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group s-opt">
                                                        <label for="pro_name" class="col-form-label">Site type</label>
                                                        <select class="select2 form-control select-opt" name="pro_name"
                                                            id="pro_name">
                                                            <?php 
                                                        $site_types = ['Site 1', 'Site 2'];
                                                        foreach ($site_types as $site_type) {
                                                            
                                                        ?>
                                                            <option
                                                                <?php echo isset($_GET['edit_site']) && $id[0]['pro_name'] == $site_type ? "selected" : null;echo isset($_POST['site_type']) && $_POST['site_type'] == $site_type ? "selected" : null; ?>
                                                                value="<?php echo $site_type; ?>">
                                                                <?php echo $site_type; ?></option>


                                                            <?php } ?>
                                                        </select>
                                                        <span class="sel_arrow">
                                                            <i class="fa fa-angle-down "></i>
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                            

                                            <div class="border">
                                                <div class="row m-1">
                                                    <div class="col-md">

                                                        <div class="form-group">
                                                            <label for="address" class="col-form-label">Address line
                                                                1</label>
                                                            <textarea class="form-control" placeholder="Address Line 1"
                                                                name="address"
                                                                id="address"><?php echo isset($_GET['edit_site']) ? $id[0]['address'] : null;echo !isset($_GET['edit_site']) && isset($_POST['address']) ? $_POST['address'] : null; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">

                                                        <div class="form-group">
                                                            <label for="address_2" class="col-form-label">Address line
                                                                2 <b>(Optional)</b></label>
                                                            <textarea class="form-control" placeholder="Address Line 2"
                                                                name="address_2"
                                                                id="address_2"><?php echo isset($_GET['edit_site']) ? $id[0]['address_2'] : null;echo !isset($_GET['edit_site']) && isset($_POST['address_2']) ? $_POST['address_2'] : null; ?></textarea>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row m-1">
                                                    <div class="col-md">
                                                        <div class="form-group s-opt">
                                                            <label for="country" class="col-form-label">Country</label>
                                                            <select class="select2 form-control select-opt"
                                                                name="country" id="country">
                                                                <?php 
                                                        $countries = $pdo->read("countries");
                                                        foreach ($countries as $country) {
                                                            
                                                        ?>
                                                                <option
                                                                    <?php echo isset($_GET['edit_site']) && $id[0]['country'] == $country['country'] ? "selected" : null;echo !isset($_GET['edit_site']) && isset($_POST['country']) && $_POST['country'] == $country ? "selected" : null; ?>
                                                                    value="<?php echo $country['country']; ?>">
                                                                    <?php echo $country['country']; ?></option>


                                                                <?php } ?>
                                                            </select>
                                                            <span class="sel_arrow">
                                                                <i class="fa fa-angle-down "></i>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md">
                                                        <div class="form-group s-opt">
                                                            <label for="state" class="col-form-label">County</label>
                                                            <select class="select2 form-control select-opt" name="state"
                                                                id="state">
                                                                <?php 
                                                        $counties = $pdo->read("counties");
                                                        foreach ($counties as $county) {
                                                            
                                                        ?>
                                                                <option
                                                                    <?php echo isset($_GET['edit_site']) && $id[0]['state'] == $county['county'] ? "selected" : null;echo !isset($_GET['edit_site']) && isset($_POST['state']) && $_POST['state'] == $county ? "selected" : null; ?>
                                                                    value="<?php echo $county['county']; ?>">
                                                                    <?php echo $county['county']; ?></option>


                                                                <?php } ?>
                                                            </select>
                                                            <span class="sel_arrow">
                                                                <i class="fa fa-angle-down "></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group s-opt">
                                                            <label for="part" class="col-form-label">Part</label>
                                                            <select class="select2 form-control select-opt" name="part"
                                                                id="part">
                                                                <?php 
                                                        $parts = ['east', 'west', 'north', 'south'];
                                                        foreach ($parts as $part) {
                                                            
                                                        ?>
                                                                <option
                                                                    <?php echo isset($_GET['edit_site']) && $id[0]['part'] == $part ? "selected" : null;echo !isset($_GET['edit_site']) && isset($_POST['part']) && $_POST['part'] == $part ? "selected" : null; ?>
                                                                    value="<?php echo $part; ?>">
                                                                    <?php echo $part; ?></option>


                                                                <?php } ?>
                                                            </select>
                                                            <span class="sel_arrow">
                                                                <i class="fa fa-angle-down "></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="city" class="col-form-label">Town</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['city'] : null;echo !isset($_GET['edit_site']) && isset($_POST['city']) ? $_POST['city'] : null; ?>"
                                                                class="form-control" name="city" type="text"
                                                                placeholder="Enter Town" id="city">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="postal_code" class="col-form-label">Post
                                                                code</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['postal_code'] : null; echo !isset($_GET['edit_site']) && isset($_POST['postal_code']) ? $_POST['postal_code'] : null;?>"
                                                                class="form-control" name="postal_code" type="text"
                                                                placeholder="Enter Post code" id="postal_code">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md">

                                                    <div class="form-group">
                                                        <label for="notes" class="col-form-label">Notes</label>
                                                        <textarea class="form-control" placeholder="Notes" name="notes"
                                                            id="notes"><?php echo isset($_GET['edit_site']) ? $id[0]['notes'] : null;echo isset($_POST['notes']) ? $_POST['notes'] : null; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="fuel" class="col-form-label">Fuel</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_site']) ? $id[0]['fuel'] : null;echo isset($_POST['fuel']) ? $_POST['fuel'] : null; ?>"
                                                            class="form-control" name="fuel" type="text"
                                                            placeholder="Enter Fuel" id="fuel">
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="expenses" class="col-form-label">Expenses</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_site']) ? $id[0]['expenses'] : null;echo isset($_POST['expenses']) ? $_POST['expenses'] : null; ?>"
                                                            class="form-control" name="expenses" type="text"
                                                            placeholder="Enter Expenses" id="expenses">
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="travel" class="col-form-label">Travel</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_site']) ? $id[0]['travel'] : null;echo isset($_POST['travel']) ? $_POST['travel'] : null; ?>"
                                                            class="form-control" name="travel" type="text"
                                                            placeholder="Enter Travel" id="travel">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group s-opt">
                                                        <label for="lgs" class="col-form-label">LGS</label>
                                                        <select class="select2 form-control select-opt" name="lgs"
                                                            id="lgs">
                                                            <?php 
                                                        $lgss = ['Yes', 'No'];
                                                        foreach ($lgss as $lgs) {
                                                            
                                                        ?>
                                                            <option
                                                                <?php echo isset($_GET['edit_site']) && $id[0]['lgs'] == $lgs ? "selected" : null;echo isset($_POST['lgs']) && $_POST['lgs'] == $lgs ? "selected" : null; ?>
                                                                value="<?php echo $lgs; ?>">
                                                                <?php echo $lgs; ?></option>


                                                            <?php } ?>
                                                        </select>
                                                        <span class="sel_arrow">
                                                            <i class="fa fa-angle-down "></i>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="company_name" class="col-form-label">Company
                                                            name</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_site']) ? $id[0]['company_name'] : null;echo isset($_POST['company_name']) ? $_POST['company_name'] : null; ?>"
                                                            class="form-control" name="company_name" type="text"
                                                            placeholder="Enter Company Name" id="company_name">
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group s-opt">
                                                        <label for="status" class="col-form-label">Status</label>
                                                        <select class="select2 form-control select-opt" name="status"
                                                            id="status">
                                                            <?php 
                                                        $statuss = ['Pending', 'Approved'];
                                                        foreach ($statuss as $status) {
                                                            
                                                        ?>
                                                            <option
                                                                <?php echo isset($_GET['edit_site']) && $id[0]['status'] == $status ? "selected" : null;echo isset($_POST['status']) && $_POST['status'] == $status ? "selected" : null; ?>
                                                                value="<?php echo $status; ?>">
                                                                <?php echo $status; ?></option>


                                                            <?php } ?>
                                                        </select>
                                                        <span class="sel_arrow">
                                                            <i class="fa fa-angle-down "></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md">

                                                    <div class="form-group">
                                                        <label for="notes" class="col-form-label">Additional
                                                            note</label>
                                                        <textarea class="form-control" placeholder="Additional Notes"
                                                            name="additional_note"
                                                            id="additional_note"><?php echo isset($_GET['edit_site']) ? $id[0]['additional_note'] : null;echo isset($_POST['additional_note']) ? $_POST['additional_note'] : null; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <button class="btn btn-primary" type="reset">reset</button>
                                                <input
                                                    name="<?php echo isset($_GET['edit_site']) ? "edit_site_registration_btn" : "add_site_registration_btn"; ?>"
                                                    class="btn btn-danger" type="submit">
                                            </div>
                                            <table id="example1"
                                                class="table table-striped table-bordered dt-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Site name</th>
                                                        <th>Date</th>
                                                        <th>Site registration date</th>
                                                        <th>Time in</th>
                                                        <th>Time out</th>
                                                        <th>Duty hrs</th>
                                                        <th>Pro name</th>
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
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                            foreach ($site_registration as $sr) {


                                                            ?>
                                                    <tr>
                                                        <td><?php echo $sr['id']; ?></td>
                                                        <td><?php echo $sr['site_name']; ?></td>
                                                        <td><?php echo $sr['date']; ?></td>
                                                        <td><?php echo $sr['site_registration_date']; ?></td>
                                                        <td><?php echo $sr['time_in']; ?></td>
                                                        <td><?php echo $sr['time_out']; ?></td>
                                                        <td><?php echo $sr['duty_hrs']; ?></td>
                                                        <td><?php echo $sr['pro_name']; ?></td>
                                                        <td><?php echo $sr['city']; ?></td>
                                                        <td><?php echo $sr['postal_code']; ?></td>
                                                        <td><?php echo $sr['notes']; ?></td>
                                                        <td><?php echo $sr['fuel']; ?></td>
                                                        <td><?php echo $sr['expenses']; ?></td>
                                                        <td><?php echo $sr['travel']; ?></td>
                                                        <td><?php echo $sr['lgs']; ?></td>
                                                        <td><?php echo $sr['company_name']; ?></td>
                                                        <td><?php echo $sr['additional_note']; ?></td>
                                                        <td><?php echo $sr['status']; ?></td>

                                                        <td><?php echo $sr['created_at']; ?></td>
                                                        <td>
                                                            <a class="text-success"
                                                                href="site_registration.php?edit_site=<?php echo $sr['id']; ?>">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            &nbsp;&nbsp;&nbsp;
                                                            <a class="text-danger"
                                                                href="site_registration.php?delete_site=<?php echo $sr['id']; ?>">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>

                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <div class="form-group mb-3">
                                                <button id="printbtnstore" class="btn btn-danger" type="button"><i
                                                        class="fa fa-print"></i> Print</button>

                                            </div>
                                        </div>

                                </div>

                            </div>

                            </form>
                        </div>
                    </div>
                </div>
                <?php require_once 'assets/includes/footer.php'; ?>


            </div>

        </div>
    </div>



    <!-- Preview Setting Box -->
    <?php require_once 'assets/includes/settings-sidebar.php'; ?>
    <!-- Preview Setting -->
    <?php require_once 'assets/includes/javascript.php'; ?>

    <script>
    let searchedValue = "";

    $(document).on("#search_anything", "input", e => {
        searchedValue = e.target.value;
    })
    $("#printbtnstore").on("click", e => {
        location.href = `printreport1.php?s=${searchedValue}&t=site_registration`;
    });
    </script>
</body>

</html>
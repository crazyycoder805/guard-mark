<!DOCTYPE html>

<html lang="zxx">
<?php require_once 'assets/includes/head.php'; ?>
<?php


$success = "";
$error = "";
$id = "";


$duties = $pdo->customQuery("SELECT * FROM duties WHERE guard_name = {$_SESSION['guardmark_user_id']} AND status != 'Complete'");

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

                        <!-- <?php
            
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

                        <?php } ?> -->

                        <div id="success" hidden class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                            <?php echo $success; ?>
                        </div>

                        <div id="error" hidden class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                            <?php echo $error; ?>
                        </div>
                        <div class="page-title-wrapper">
                            <div class="page-title-box">
                                <h4 class="page-title">Duties</h4>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-link">
                                        <a href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-link active">Duties</li>
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

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                        <table id="example1" class="table table-striped table-bordered dt-responsive">
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
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                            foreach ($duties as $sr) {
                                                                $guard = $pdo->read("registration", ['id'=>$sr['guard_name']]);
                                                                $duty_hris = $pdo->read("duty_hrs", ['duty_id' =>$sr['id']]);
                                                            ?>
                                                <tr>
                                                    <td><?php echo $sr['id']; ?></td>
                                                    <td><?php echo $guard[0]['firstname'] . " " . $guard[0]['lastname']; ?>
                                                    </td>
                                                    <td><?php echo $sr['site_name']; ?></td>
                                                    <td><?php echo $sr['date']; ?></td>
                                                    <td><?php echo $sr['site_registration_date']; ?></td>
                                                    <td><?php echo $sr['time_in']; ?></td>
                                                    <td><?php echo $sr['time_out']; ?></td>
                                                    <td><?php echo $sr['duty_hrs']; ?></td>
                                                    <td><?php echo $sr['pro_name']; ?></td>
                                                    <td><?php echo $sr['site_address']; ?></td>


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
                                                        <?php 
                                                        if (!empty($duty_hris)) {
                                                        ?>
                                                        <button type="submit" data-si="<?php echo $sr['site_name']; ?>"
                                                            data-i="<?php echo $sr['id']; ?>"
                                                            data-gi="<?php echo $sr['guard_name']; ?>"
                                                            data-postcode="<?php echo $sr['postal_code']; ?>"
                                                            data-city="<?php echo $sr['city']; ?>"
                                                            data-country="<?php echo $sr['country']; ?>"
                                                            data-county="<?php echo $sr['state']; ?>"
                                                            data-address="<?php echo $sr['address']; ?>"  data-s="<?php echo $sr['site_name']; ?>" id="end_duty"
                                                            class="btn btn-danger btn-sm">
                                                            End duty
                                                        </button>
                                                        <?php } else { ?>
                                                        <button type="button" data-si="<?php echo $sr['site_name']; ?>"
                                                            data-i="<?php echo $sr['id']; ?>"
                                                            data-gi="<?php echo $sr['guard_name']; ?>"
                                                            data-postcode="<?php echo $sr['postal_code']; ?>"
                                                            data-city="<?php echo $sr['city']; ?>"
                                                            data-country="<?php echo $sr['country']; ?>"
                                                            data-county="<?php echo $sr['state']; ?>"
                                                            data-address="<?php echo $sr['address']; ?>"  data-s="<?php echo $sr['site_name']; ?>" id="start_duty"
                                                            class="btn btn-success btn-sm">
                                                            Start duty
                                                        </button>
                                                        <?php } ?>
                                                    </td>

                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                        <!-- <button type="button" class="btn btn-primary squer-btn"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalLong">
                                                Simple
                                            </button> -->
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <?php require_once 'assets/includes/footer.php'; ?>


            </div>

        </div>
    </div>
    <!-- 
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal
                        title</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Preview Setting Box -->
    <?php require_once 'assets/includes/settings-sidebar.php'; ?>
    <!-- Preview Setting -->
    <?php require_once 'assets/includes/javascript.php'; ?>
    <script>
    const apiKey = '65eb1845ba6a3694215322xqu7966ee';

    $(document).on("click", "#start_duty", e => {
        $(e.target).prop("disabled", true);
        $(e.target).text("Loading...");

        let postcode = e.target.getAttribute("data-postcode");
        let city = e.target.getAttribute("data-city");
        let country = e.target.getAttribute("data-country");
        let county = e.target.getAttribute("data-county");
        let si = e.target.getAttribute("data-si");
        let gi = e.target.getAttribute("data-gi");
        let i = e.target.getAttribute("data-i");
        let s = e.target.getAttribute("data-s");

        let address = e.target.getAttribute("data-address");
        const encodedPostCode = encodeURIComponent(postcode);
        const encodedCity = encodeURIComponent(city);
        const encodedCountry = encodeURIComponent(country);
        const encodedCounty = encodeURIComponent(county);
        const encodedAddress = encodeURIComponent(address);
        const apiUrl =
            `https://geocode.maps.co/search?street=${encodedAddress}&city=${encodedCity}&state=${encodedCounty}&postalcode=${encodedPostCode}&country=${encodedCountry}&api_key=${apiKey}`;
        console.log(apiUrl);
        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Handle the response data here
                var centerLat = +data[0].lat;
                var centerLon = +data[0].lon;

                console.log(centerLat, centerLon);

                // Given radius in kilometers
                var radius = 1; // 10 kilometers

                // Bearing in degrees (this example uses 360 degrees to make a complete circle)
                var bearing = 360;

                // Calculate coordinates of points around the center point
                // var points = [];
                // for (var i = 0; i < 360; i++) {
                //     var point = calculateDestinationPoint(centerLat, centerLon, radius, i);
                //     points.push(point);
                // }
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLat = position.coords.latitude;
                    var userLon = position.coords.longitude;

                    // Check if the user is within the radius
                    var distance = getDistanceFromLatLonInKm(centerLat, centerLon, userLat,
                        userLon);
                    if (distance <= radius) {




                        $.ajax({
                            type: "POST",
                            url: "data.php",
                            data: {
                                '__FILE__': "dutyAdd",
                                lat: userLat,
                                lon: userLon,
                                gi,
                                si,
                                i,
                                s

                            },
                            success: e => {
                                $("#success").removeAttr("hidden");
                                $("#error").prop("hidden", true);
                                $("#success").text(
                                    "You are within the radius of the specified site address. your job is started, refreshing the page..."
                                );

                                $(e.target).prop("disabled", false);
                                $(e.target).text("Start duty");
                                setTimeout(e => {
                                    $(e.target).prop("disabled",
                                        true);

                                }, 100);
                                setTimeout(e => {
                                    location.href = "guard_duties.php";

                                }, 4000);

                            }
                        });
                    } else {
                        $("#error").removeAttr("hidden");
                        $("#success").prop("hidden", true);

                        $("#error").text(
                            "You are not in the radius of the specified site address. please try again when you are within the radius."
                        );

                        $(e.target).prop("disabled", false);
                        $(e.target).text("Start duty");

                    }
                }, function(error) {
                    console.log("Error getting user's location:", error);
                });
            })
            .catch(error => {
                // Handle errors here
                console.error('There was a problem with the fetch operation:', error);
            });
    });

    // Function to calculate distance between two points using Haversine formula
    function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
        var R = 6371; // Radius of the Earth in kilometers
        var dLat = deg2rad(lat2 - lat1); // deg2rad below
        var dLon = deg2rad(lon2 - lon1);
        var a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c; // Distance in km
        return d;
    }

    function deg2rad(deg) {
        return deg * (Math.PI / 180);
    }

    // Function to calculate new latitude and longitude given a distance and bearing
    function calculateDestinationPoint(lat, lon, distance, bearing) {
        var R = 6371; // Radius of the Earth in kilometers

        var lat1 = deg2rad(lat);
        var lon1 = deg2rad(lon);
        var brng = deg2rad(bearing);

        var lat2 = Math.asin(
            Math.sin(lat1) * Math.cos(distance / R) +
            Math.cos(lat1) * Math.sin(distance / R) * Math.cos(brng)
        );

        var lon2 = lon1 + Math.atan2(
            Math.sin(brng) * Math.sin(distance / R) * Math.cos(lat1),
            Math.cos(distance / R) - Math.sin(lat1) * Math.sin(lat2)
        );

        return {
            latitude: rad2deg(lat2),
            longitude: rad2deg(lon2)
        };
    }

    function rad2deg(rad) {
        return rad * (180 / Math.PI);
    }

    $(document).on("click", "#end_duty", e => {
        $(e.target).prop("disabled", true);
        $(e.target).text("Loading...");

        let postcode = e.target.getAttribute("data-postcode");
        let city = e.target.getAttribute("data-city");
        let country = e.target.getAttribute("data-country");
        let county = e.target.getAttribute("data-county");
        let si = e.target.getAttribute("data-si");
        let gi = e.target.getAttribute("data-gi");
        let i = e.target.getAttribute("data-i");
        let s = e.target.getAttribute("data-s");

        let address = e.target.getAttribute("data-address");
        const encodedPostCode = encodeURIComponent(postcode);
        const encodedCity = encodeURIComponent(city);
        const encodedCountry = encodeURIComponent(country);
        const encodedCounty = encodeURIComponent(county);
        const encodedAddress = encodeURIComponent(address);
        const apiUrl =
            `https://geocode.maps.co/search?street=${encodedAddress}&city=${encodedCity}&state=${encodedCounty}&postalcode=${encodedPostCode}&country=${encodedCountry}&api_key=${apiKey}`;
        console.log(apiUrl);
        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Handle the response data here
                var centerLat = +data[0].lat;
                var centerLon = +data[0].lon;

                console.log(centerLat, centerLon);

                // Given radius in kilometers
                var radius = 1; // 10 kilometers

                // Bearing in degrees (this example uses 360 degrees to make a complete circle)
                var bearing = 360;

                // Calculate coordinates of points around the center point
                // var points = [];
                // for (var i = 0; i < 360; i++) {
                //     var point = calculateDestinationPoint(centerLat, centerLon, radius, i);
                //     points.push(point);
                // }
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLat = position.coords.latitude;
                    var userLon = position.coords.longitude;

                    // Check if the user is within the radius
                    var distance = getDistanceFromLatLonInKm(centerLat, centerLon, userLat,
                        userLon);
                    if (distance <= radius) {




                        $.ajax({
                            type: "POST",
                            url: "data.php",
                            data: {
                                '__FILE__': "dutyEnd",
                                lat: userLat,
                                lon: userLon,
                                gi,
                                si,
                                i,
                                s

                            },
                            success: e => {
                                $("#success").removeAttr("hidden");
                                $("#error").prop("hidden", true);
                                $("#success").text(
                                    "You are within the radius of the specified site address. your job is finished, refreshing the page..."
                                );

                                setTimeout(e => {
                                    location.href = "guard_duties.php";

                                }, 4000);

                            }
                        });
                    } else {
                        $("#error").removeAttr("hidden");
                        $("#success").prop("hidden", true);

                        $("#error").text(
                            "You are not in the radius of the specified site address. please try again when you are within the radius."
                        );

                        $(e.target).prop("disabled", false);
                        $(e.target).text("End duty");

                    }
                }, function(error) {
                    console.log("Error getting user's location:", error);
                });
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    })
    </script>
</body>

</html>
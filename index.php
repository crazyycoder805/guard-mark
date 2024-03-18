<!DOCTYPE html>

<html lang="zxx">
<?php 
require_once 'assets/includes/head.php'; 

?>



<body>

    <div class="ad-auth-wrapper">

        <div class="ad-auth-box">

            <div class="row align-items-center">
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

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="ad-auth-img">
                        <img src="assets/images/auth-img1.png" alt="" />
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="ad-auth-content">
                        <form method="post">
                            <a href="index-2.html" class="ad-auth-logo">
                                <img src="assets/images/ovalfox/logo.png" alt="" />
                            </a>


                            <h2><span class="primary">Hello,</span>Welcome!</h2>
                            <p>Please Choose Where You Want To Go</p>
                            <div class="ad-auth-form">
                                <div class="ad-auth-feilds mb-30">
                                    <a href="registration.php" class="btn btn-lg btn-danger col-12">Admin</a>

                                </div>
                                <div class="ad-auth-feilds">
                                    <a href="guard_registration.php" class="btn btn-lg btn-success col-12">Guard registration</a>

                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <div class="ad-notifications ad-error">
                <p><span>Duhh!</span>Something Went Wrong</p>
            </div>
        </div>
    </div>
</body>

</html>
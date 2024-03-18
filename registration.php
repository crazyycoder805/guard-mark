<!DOCTYPE html>

<html lang="zxx">
<?php require_once 'assets/includes/head.php'; ?>
<?php

  function generateCombinedArray() {
    $lowercase_alphabets = range('a', 'z');
    
    $uppercase_alphabets = range('A', 'Z');
    
    $numbers = range(1, 10);
    
    $combined_array = array_merge($lowercase_alphabets, $uppercase_alphabets, $numbers);
    
    return $combined_array;
}

function getRandomElementFromArray($array) {
    $random_index = rand(0, 5) . $array[rand(0, 5)]. $array[rand(0, 5)]. $array[rand(5, 10)]. $array[rand(20, 10)]. $array[rand(10, 20)]. 
    $array[rand(5, 10)]. $array[rand(20, 10)]. $array[rand(0, 5)];
    
    return $random_index;
}

$combined_array = generateCombinedArray();

$random_element = getRandomElementFromArray($combined_array);


$success = "";
$error = "";
$id = "";

$registration = $pdo->read("registration");
$topics = $pdo->read("topics");
$audio_test = $pdo->read("audio_test");

$random_topic = $topics[rand(0, count($topics) -1)];
$random_line = $audio_test[rand(0, count($audio_test) -1)];


$duty = [];
$day = "";


if (isset($_POST['availability']) && isset($_POST['day'])) {


    foreach ($_POST['day'] as $akey => $avalue) {
        if (!empty($_POST['availability'][$akey])) {
            switch ($akey) {
                case 0:
                    $duty[$_POST['availability'][$akey]] = $avalue;
                    break;
                case 1:
                    $duty[$_POST['availability'][$akey]]  = $avalue;
                    break;
                case 2:
                    $duty[$_POST['availability'][$akey]]  = $avalue;
                    break;
                case 3:
                    $duty[$_POST['availability'][$akey]]  = $avalue;
                    break;
                case 4:
                    $duty[$_POST['availability'][$akey]]  = $avalue;
                    break;
                case 5:
                    $duty[$_POST['availability'][$akey]]  = $avalue;
                    break;
                case 6:
                    $duty[$_POST['availability'][$akey]]  = $avalue;
                    break;
            }
        
        }
    }

    $day = json_encode($duty);
  

}
$cnic_front_pic_result = '';
$cnic_back_pic_result = '';
$pasport_front_pic_result = '';
$pasport_back_pic_result = '';

$pic_result = '';
$sia_card_pic_result = '';
$reading_test_video_result = '';
$bank_statement_pdf_result = '';
$utility_bill_pic_result = '';
$dvld_licence_pic_result = '';
function searchArrayKeys($array, $searchKey, $parentKey = null) {
    $results = [];

    foreach ($array as $key => $value) {
        $currentKey = $parentKey !== null ? $parentKey . '.' . $key : $key;

        if ($key === $searchKey) {
            $results[] = $currentKey;
        }

        if (is_array($value)) {
            $results = array_merge($results, searchArrayKeys($value, $searchKey, $currentKey));
        }
    }

    return $results;
}
if (isset($_POST['add_registration_btn'])) {
    if (
    !empty($_POST['firstname']) && 
    !empty($_POST['lastname']) && 
    !empty($_POST['dob']) && 

    !empty($_POST['phonenumber']) && 
    !empty($_POST['mobile']) && 
    !empty($_POST['emergency_contact_number']) && 
    !empty($_POST['email']) && 
    !empty($_POST['pasport']) && 
    !empty($_FILES['pasport_front_pic']['tmp_name'])  && 
    !empty($_FILES['pic']['tmp_name']) && 
    !empty($_POST['address']) && 
    !empty($_POST['address_2']) && 
    !empty($_POST['country']) && 
    !empty($_POST['part']) && 
    !empty($_POST['pasport_expiry']) && 

    !empty($_POST['qualification']) && 
    !empty($_POST['recent_experience']) && 
    !empty($_POST['city']) && 

    !empty($_POST['post_code']) && 
    !empty($_POST['sia_number']) && 
    !empty($_FILES['sia_card_pic']['tmp_name']) && 

    !empty($_POST['licence_sector']) && 
    !empty($_POST['role']) && 
    !empty($_POST['expiry_date']) && 

    !empty($_POST['licence_status']) && 
    !empty($_FILES['reading_test_video']['tmp_name']) && 
    !empty($_POST['topic']) && 

    !empty($_POST['topic_answer']) && 
    !empty($_POST['availability']) && 
    !empty($_POST['day']) && 
    !empty($_POST['state']) && 
    !empty($_POST['middle_name'])) {
        if ($pdo->validateInput($_POST['phonenumber'], 'phone')) {
            if ($pdo->validateInput($_POST['mobile'], 'phone')) {
                if ($pdo->validateInput($_POST['emergency_contact_number'], 'phone')) {
                    if ($pdo->validateInput($_POST['email'], 'email')) {
                            if (!$pdo->isDataInserted("registration", ['phonenumber'=>$_POST['phonenumber']])) {
                                if (!$pdo->isDataInserted("registration", ['mobile'=>$_POST['mobile']])) {
                                    if (!$pdo->isDataInserted("registration", ['emergency_contact_number'=>$_POST['emergency_contact_number']])) {
                                        if (!$pdo->isDataInserted("registration", ['email'=>$_POST['email']])) {
                                            if (!$pdo->isDataInserted("registration", ['pasport'=>$_POST['pasport']])) {
                                                if (!$pdo->isDataInserted("registration", ['pasport'=>$_POST['pasport']])) {
                                                    if (strlen($_POST['pasport']) == 10) {
                                                        if (strlen($_POST['topic_answer']) >= 300 && strlen($_POST['topic_answer']) <= 500) {

                                                            if (!empty($_FILES['cnic_front_pic']['tmp_name'])) {
                                                                $cnic_front_pic_result = $pdo2->upload('cnic_front_pic', 'assets/guardmark/cnic_front_pics');
                                                            }
                                                            if (!empty($_FILES['cnic_back_pic']['tmp_name'])) {
                                                                $cnic_back_pic_result = $pdo2->upload('cnic_back_pic', 'assets/guardmark/cnic_back_pics');
                                                            }
                                                            if (!empty($_FILES['pasport_back_pic']['tmp_name'])) {
                                                                $pasport_back_pic_result = $pdo2->upload('pasport_back_pic', 'assets/guardmark/pasport_back_pics');
                                                            }             
                                                            if (!empty($_FILES['dvld_licence_pic']['tmp_name'])) {
                                                                $dvld_licence_pic_result = $pdo2->upload('dvld_licence_pic', 'assets/guardmark/dvld_licence_pics');
                                                            }   
                                                            
                                                            $bank_statement_pdf_result = $pdo2->upload('bank_statement_pdf', 'assets/guardmark/bank_statement_pdfs', null, true, ['application/pdf', 'application/x-pdf', 'text/pdf', 'text/x-pdf']);
                            
                                                            $pasport_front_pic_result = $pdo2->upload('pasport_front_pic', 'assets/guardmark/pasport_front_pics');
                            
                                                            $pic_result = $pdo2->upload('pic', 'assets/guardmark/user_pics');
                                                            $sia_card_pic_result = $pdo2->upload('sia_card_pic', 'assets/guardmark/sia_card_pics');
                                                            $utility_bill_pic_result = $pdo2->upload('utility_bill_pic', 'assets/guardmark/utility_bill_pics');
                                                            $reading_test_video_result = $pdo2->upload('reading_test_video', 'assets/guardmark/reading_test_videos', null, true, ['audio/mpeg', 'audio/mp3', 'audio/wav', 'audio/ogg', 'video/webm']);
                                                            
                                                            
                                                            if (!$pasport_front_pic_result) {
                                                                $error = "Pasport front image error.";
                            
                                                            }  else if (!$pic_result) {
                                                                $error = "Picutre error.";
                            
                                                            } else if (!$sia_card_pic_result) {
                                                                $error = "Sia card image error.";
                            
                                                            }  else if (!$bank_statement_pdf_result) {
                                                                $error = "Bank statement pdf error.";
                            
                                                            }  else if (!$utility_bill_pic_result) {
                                                                $error = "Utility bill image error.";
                                                            }  else {
                                                                if ($idCreated = $pdo->create("registration", ['firstname' => $_POST['firstname'],
                                                                'registration_number'=>$random_element, 
                                                                'lastname' => $_POST['lastname'],
                                                                'dob' => $_POST['dob'],
                                                                'phonenumber' => $_POST['phonenumber'],
                                                                'mobile' => $_POST['mobile'],
                                                                'emergency_contact_number' => $_POST['emergency_contact_number'],
                                                                'email' => $_POST['email'],
                                                                'cnic' => $_POST['cnic'],
                                                                'cnic_front_pic' => !empty($cnic_front_pic_result['filename']) ? $cnic_front_pic_result['filename'] : '',
                                                                'cnic_back_pic' => !empty($cnic_back_pic_result['filename']) ? $cnic_back_pic_result['filename'] : '',
                                                                'pasport' => $_POST['pasport'],
                                                                'pasport_front_pic' => $pasport_front_pic_result['filename'],
                                                                'pasport_back_pic' => !empty($pasport_back_pic_result['filename']) ? $pasport_back_pic_result['filename'] : '',
                                                                'pic' => $pic_result['filename'],
                                                                'address' => $_POST['address'],
                                                                'qualification' => $_POST['qualification'],
                                                                'recent_experience' => $_POST['recent_experience'],
                                                                'city' => $_POST['city'],
                                                                'post_code' => $_POST['post_code'],
                                                                'sia_number' => $_POST['sia_number'],
                                                                'sia_card_pic' => $sia_card_pic_result['filename'],
                                                                'licence_sector' => $_POST['licence_sector'],
                                                                'role' => $_POST['role'],
                                                                'expiry_date' => $_POST['expiry_date'],
                                                                'licence_status' => $_POST['licence_status'],
                                                                'reading_test_video' => $reading_test_video_result['filename'],
                                                                'topic' => $_POST['topic'],
                                                                'topic_answer' => $_POST['topic_answer'],
                                                                'state' => $_POST['state'],
                                                                'level' => 0,
                                                                'cnic_expiry' => $_POST['cnic_expiry'],
                                                                'pasport_expiry' => $_POST['pasport_expiry'],
                                                                'bank_statement_pdf' =>!empty($bank_statement_pdf_result['filename']) ? $bank_statement_pdf_result['filename'] : '',
                                                                'utility_bill_pic' =>!empty($utility_bill_pic_result['filename']) ? $utility_bill_pic_result['filename'] : '',
                                                                'dvld_licence_pic' =>!empty($dvld_licence_pic_result['filename']) ? $dvld_licence_pic_result['filename'] : '',
                                                                'address_2' => $_POST['address_2'],
                                                                'country' => $_POST['country'],
                                                                'part' => $_POST['part'],
                                                                'availability' => $day,
                                                                'middle_name' =>$_POST['middle_name'],
                                                                'status' => $_POST['status']]) && $pdo->create("access", ['user_id'=>$idCreated])
                                                                ) {
                                                                    $success = "Thank you, your application has been submited successfuly. once it is approved you will receive and email confirmation. Refresh the page or it will automatically refresh after 5 seconds";
                                                                    $pdo->headTo("registration.php", 5000);
                                                                } else {
                                                                    $error = "Something went wrong.";
                            
                                                                }
                                                            }
                                                        } else {
                                                            $error = "Topic answer should be greater than 300 letters & less than 500 letters.";
                    
                                                        }
                                                            
                                                           
                                                    } else {
                                                        $error = "Passport length is greater than 10.";
                                                    }
                                                } else {
                                                    $error = "Sia number is already registrated.";
                    
                                                }
                                            } else {
                                                $error = "Pasport number is already registrated.";
                
                                            }
                                        } else {
                                            $error = "Email is already registrated.";
            
                                        }
                                    } else {
                                        $error = "Kin contact number is already registrated.";
        
                                    }
                                } else {
                                    $error = "Mobile number is already registrated.";
    
                                }
                            } else {
                                $error = "Phone number is already registrated.";

                            }
                            
                       
                    } else {
                        $error = "Email is not in correct form.";
                    }
                } else {
                    $error = "Emergency contact number is not in correct form.";
                }
            } else {
                $error = "Mobile number is not in correct form.";
            }
        } else {
            $error = "Phone number is not in correct form.";
        }
    } else {
        $error = "Some fields are compulsary to fill.";
    }
} else if (isset($_POST['edit_registration_btn'])) {
    if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['dob']) && 
    !empty($_POST['phonenumber']) && !empty($_POST['mobile']) && !empty($_POST['emergency_contact_number']) && 
    !empty($_POST['email']) && 
    !empty($_POST['pasport']) && !empty($_POST['address']) && 
    !empty($_POST['qualification']) && !empty($_POST['recent_experience']) && !empty($_POST['city']) && 
    !empty($_POST['post_code']) && !empty($_POST['sia_number']) && 
    !empty($_POST['licence_sector']) && !empty($_POST['role']) && !empty($_POST['expiry_date']) && 
    !empty($_POST['licence_status']) && !empty($_POST['topic']) && 
    !empty($_POST['topic_answer']) && !empty($_POST['availability'])  && !empty($_POST['middle_name'])
    && !empty($_POST['state']) 
    && !empty($_POST['address_2']) 
    && !empty($_POST['country']) 
    && !empty($_POST['part']) 
    && !empty($_POST['day'])
    
    && !empty($_POST['pasport_expiry'])) {
 


        if (!empty($_FILES['cnic_front_pic']['tmp_name'])) {
            $cnic_front_pic_result = $pdo2->upload('cnic_front_pic', 'assets/guardmark/cnic_front_pics');
        }
        if (!empty($_FILES['cnic_back_pic']['tmp_name'])) {
            $cnic_back_pic_result = $pdo2->upload('cnic_back_pic', 'assets/guardmark/cnic_back_pics');
        }
        if (!empty($_FILES['pasport_front_pic']['tmp_name'])) {
            $pasport_front_pic_result = $pdo2->upload('pasport_front_pic', 'assets/guardmark/pasport_front_pics');
        }
        if (!empty($_FILES['pasport_back_pic']['tmp_name'])) {
            $pasport_back_pic_result = $pdo2->upload('pasport_back_pic', 'assets/guardmark/pasport_back_pics');
        }
        if (!empty($_FILES['pic']['tmp_name'])) {
            $pic_result = $pdo2->upload('pic', 'assets/guardmark/user_pics');
        }
        if (!empty($_FILES['sia_card_pic']['tmp_name'])) {
            $sia_card_pic_result = $pdo2->upload('sia_card_pic', 'assets/guardmark/sia_card_pics');
        }
        if (!empty($_FILES['reading_test_video']['tmp_name'])) {
            $reading_test_video_result = $pdo2->upload('reading_test_video', 'assets/guardmark/reading_test_videos', null, true, ['audio/mpeg', 'audio/mp3', 'audio/wav', 'audio/ogg', 'video/webm']);
        }
        if (!empty($_FILES['dvld_licence_pic']['tmp_name'])) {
            $dvld_licence_pic_result = $pdo2->upload('dvld_licence_pic', 'assets/guardmark/dvld_licence_pics');
        }  
        if (!empty($_FILES['bank_statement_pdf']['tmp_name'])) {
            $bank_statement_pdf_result = $pdo2->upload('bank_statement_pdf', 'assets/guardmark/bank_statement_pdfs', null, true, ['application/pdf', 'application/x-pdf', 'text/pdf', 'text/x-pdf']);
        }
        if (!empty($_FILES['utility_bill_pic']['tmp_name'])) {
            $utility_bill_pic_result = $pdo2->upload('utility_bill_pic', 'assets/guardmark/utility_bill_pics');
        }
        if ($pdo->validateInput($_POST['phonenumber'], 'phone')) {
            if ($pdo->validateInput($_POST['mobile'], 'phone')) {
                if ($pdo->validateInput($_POST['emergency_contact_number'], 'phone')) {
                    if ($pdo->validateInput($_POST['email'], 'email')) {
                            if (!$pdo->isDataInsertedUpdate("registration", ['phonenumber'=>$_POST['phonenumber']])) {
                                if (!$pdo->isDataInsertedUpdate("registration", ['mobile'=>$_POST['mobile']])) {
                                    if (!$pdo->isDataInsertedUpdate("registration", ['emergency_contact_number'=>$_POST['emergency_contact_number']])) {
                                        if (!$pdo->isDataInsertedUpdate("registration", ['email'=>$_POST['email']])) {
                                            if (!$pdo->isDataInsertedUpdate("registration", ['pasport'=>$_POST['pasport']])) {
                                                if (!$pdo->isDataInsertedUpdate("registration", ['pasport'=>$_POST['pasport']])) {
                                                    if (strlen($_POST['pasport']) == 10) {
                                                        if (strlen($_POST['topic_answer']) >= 300 && strlen($_POST['topic_answer']) <= 500) {
                                                            if ($pdo->update("registration", ['id' => $_GET['edit_site']], [
                                                                'firstname' => $_POST['firstname'],
                                                                'lastname' => $_POST['lastname'],
                                                                'dob' => $_POST['dob'],
                                                                'phonenumber' => $_POST['phonenumber'],
                                                                'mobile' => $_POST['mobile'],
                                                                'emergency_contact_number' => $_POST['emergency_contact_number'],
                                                                'email' => $_POST['email'],
                                                                'cnic' => $_POST['cnic'],
                                                                'cnic_front_pic' => !empty($cnic_front_pic_result['filename']) ? $cnic_front_pic_result['filename'] : $pdo->read("registration", ['id'=>$_GET['edit_site']])[0]['cnic_front_pic'],
                                                                'cnic_back_pic' => !empty($cnic_back_pic_result['filename']) ? $cnic_back_pic_result['filename'] : $pdo->read("registration", ['id'=>$_GET['edit_site']])[0]['cnic_back_pic'],
                                                                'pasport' => $_POST['pasport'],
                                                                'pasport_front_pic' => !empty($pasport_front_pic_result['filename']) ? $pasport_front_pic_result['filename'] : $pdo->read("registration", ['id'=>$_GET['edit_site']])[0]['pasport_front_pic'],
                                                                'pasport_back_pic' => !empty($pasport_back_pic_result['filename']) ? $pasport_back_pic_result['filename'] : $pdo->read("registration", ['id'=>$_GET['edit_site']])[0]['pasport_back_pic'],
                                                                'pic' => !empty($pic_result['filename']) ? $pic_result['filename'] : $pdo->read("registration", ['id'=>$_GET['edit_site']])[0]['pic'],
                                                                'address' => $_POST['address'],
                                                                'qualification' => $_POST['qualification'],
                                                                'recent_experience' => $_POST['recent_experience'],
                                                                'city' => $_POST['city'],
                                                                'post_code' => $_POST['post_code'],
                                                                'sia_number' => $_POST['sia_number'],
                                                                'sia_card_pic' => !empty($sia_card_pic_result['filename']) ? $sia_card_pic_result['filename'] : $pdo->read("registration", ['id'=>$_GET['edit_site']])[0]['sia_card_pic'],
                                                                'licence_sector' => $_POST['licence_sector'],
                                                                'role' => $_POST['role'],
                                                                'expiry_date' => $_POST['expiry_date'],
                                                                'licence_status' => $_POST['licence_status'],
                                                                'reading_test_video' => !empty($reading_test_video_result['filename']) ? $reading_test_video_result['filename'] : $pdo->read("registration", ['id'=>$_GET['edit_site']])[0]['reading_test_video'],
                                                                'topic' => $_POST['topic'],
                                                                'topic_answer' => $_POST['topic_answer'],
                                                                'state' => $_POST['state'],
                                                                'cnic_expiry' => $_POST['cnic_expiry'],
                                                                'pasport_expiry' => $_POST['pasport_expiry'],
                                                                'bank_statement_pdf' =>!empty($bank_statement_pdf_result['filename']) ? $bank_statement_pdf_result['filename'] : $pdo->read("registration", ['id'=>$_GET['edit_site']])[0]['bank_statement_pdf'],
                                                                'utility_bill_pic' =>!empty($utility_bill_pic_result['filename']) ? $utility_bill_pic_result['filename'] : $pdo->read("registration", ['id'=>$_GET['edit_site']])[0]['utility_bill_pic'],
                                                                'dvld_licence_pic' =>!empty($dvld_licence_pic_result['filename']) ? $dvld_licence_pic_result['filename'] : $pdo->read("registration", ['id'=>$_GET['edit_site']])[0]['dvld_licence_pic'],
                                                                'address_2' => $_POST['address_2'],
                                                                'country' => $_POST['country'],
                                                                'part' => $_POST['part'],
                                                                'level' => $_POST['level'],
                                                                'status' => $_POST['status'],
                                                                'middle_name' =>$_POST['middle_name'],

                                                                'availability' => $day])
                                                            ) {
                                                                $success = "Registration updated.";
                                                                $pdo->headTo("registration.php");
                                                            } else {
                                                                $error = "Something went wrong. or can't update this because no changes was found";
                                                            }
                                                        } else {
                                                            $error = "Topic answer should be greater than 300 letters & less than 500 letters.";
                    
                                                        }
                                                            
                                                           
                                                    } else {
                                                        $error = "Passport length is greater than 10.";
                                                    }
                                                } else {
                                                    $error = "Sia number is already registrated.";
                    
                                                }
                                            } else {
                                                $error = "Pasport number is already registrated.";
                
                                            }
                                        } else {
                                            $error = "Email is already registrated.";
            
                                        }
                                    } else {
                                        $error = "Kin contact number is already registrated.";
        
                                    }
                                } else {
                                    $error = "Mobile number is already registrated.";
    
                                }
                            } else {
                                $error = "Phone number is already registrated.";

                            }
                            
                     
                    } else {
                        $error = "Email is not in correct form.";
                    }
                } else {
                    $error = "Emergency contact number is not in correct form.";
                }
            } else {
                $error = "Mobile number is not in correct form.";
            }
        } else {
            $error = "Phone number is not in correct form.";
        }
    } else {
        $error = "All fields must be filled.";
    }
} else if (isset($_GET['delete_site'])) {
    if ($pdo->delete("registration", $_GET['delete_site'])) {
        $success = "Registration deleted.";
        $pdo->headTo("registration.php");
    } else {
        $error = "Something went wrong.";
    }
}
$days;
$newDays = "";
if (!empty(json_decode($day))) {
    $newDays = json_decode($day);
    $newDays = get_object_vars($newDays);
}
if (isset($_GET['edit_site'])) {
    $id = $pdo->read("registration", ['id' => $_GET['edit_site']]);
    $days = json_decode($id[0]['availability']);
    $newDays = json_decode($id[0]['availability']);
    $newDays = get_object_vars($newDays);
}



?>


<body>
    <?php require_once 'assets/includes/preloader.php'; ?>

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
                                <h4 class="page-title">Registration Form</h4>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-link">
                                        <a href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-link active">Registration</li>
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
                                    <form class="separate-form" method="post" enctype="multipart/form-data">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h3>Personel Information:</h3>
                                            <br />
                                            <div class="border">
                                                <div class="row m-1">
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="firstname" class="col-form-label">First
                                                                name</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['firstname'] : null;echo !isset($_GET['edit_site']) && isset($_POST['firstname']) ? $_POST['firstname'] : null; ?>"
                                                                class="form-control" name="firstname" type="text"
                                                                placeholder="Enter First Name" id="firstname">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="middle_name" class="col-form-label">Middle
                                                                name</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['middle_name'] : null;echo isset($_POST['middle_name']) ? $_POST['middle_name'] : null; ?>"
                                                                class="form-control" name="middle_name" type="text"
                                                                placeholder="Enter Middle Name" id="middle_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="lastname" class="col-form-label">Last
                                                                name</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['lastname'] : null;echo !isset($_GET['edit_site']) && isset($_POST['lastname']) ? $_POST['lastname'] : null; ?>"
                                                                class="form-control" name="lastname" type="text"
                                                                placeholder="Enter Last Name" id="lastname">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="dob" class="col-form-label">Date of
                                                                birth</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['dob'] : null;echo !isset($_GET['edit_site']) && isset($_POST['dob']) ? $_POST['dob'] : null; ?>"
                                                                class="form-control" name="dob" type="date"
                                                                placeholder="Enter Date Of Birth" id="dob">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="pic" class="col-form-label">Picture</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['pic'] : null; ?>"
                                                                class="form-control" name="pic" type="file"
                                                                placeholder="Enter pic" id="pic">
                                                            <?php 
                                                            if (isset($_GET['edit_site'])) {
                                                            ?>
                                                            Previous image:
                                                            <br />
                                                            <img width="100" height="100"
                                                                src="assets/guardmark/user_pics/<?php echo  isset($_GET['edit_site']) ? $id[0]['pic'] : null; ?>"
                                                                alt="" />
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row m-1">
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="phonenumber" class="col-form-label">Phone
                                                                number</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['phonenumber'] : null;echo !isset($_GET['edit_site']) && isset($_POST['phonenumber']) ? $_POST['phonenumber'] : null; ?>"
                                                                class="form-control" name="phonenumber" type="tel"
                                                                placeholder="Enter Phone Number" id="phonenumber">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="mobile" class="col-form-label">Mobile
                                                                number</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['mobile'] : null;echo !isset($_GET['edit_site']) && isset($_POST['mobile']) ? $_POST['mobile'] : null; ?>"
                                                                class="form-control" name="mobile" type="tel"
                                                                placeholder="Enter Mobile Number" id="mobile">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="emergency_contact_number"
                                                                class="col-form-label">Next of
                                                                kin contact number</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['emergency_contact_number'] : null;echo !isset($_GET['edit_site']) && isset($_POST['emergency_contact_number']) ? $_POST['emergency_contact_number'] : null; ?>"
                                                                class="form-control" name="emergency_contact_number"
                                                                type="tel"
                                                                placeholder="Enter Next of kin contact number"
                                                                id="emergency_contact_number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="email" class="col-form-label">Email</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['email'] : null;echo !isset($_GET['edit_site']) && isset($_POST['email']) ? $_POST['email'] : null; ?>"
                                                                class="form-control" name="email" type="tel"
                                                                placeholder="Enter Email" id="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="password"
                                                                class="col-form-label">Password</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['password'] : null;echo !isset($_GET['edit_site']) && isset($_POST['password']) ? $_POST['password'] : null; ?>"
                                                                class="form-control" name="password" type="password"
                                                                placeholder="Enter password" id="password">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h3 class="mt-2">Experience & Qualification:</h3>
                                            <br />
                                            <div class="border">
                                                <div class="row m-1">


                                                    <div class="col-md">

                                                        <div class="form-group">
                                                            <label for="qualification"
                                                                class="col-form-label">Qualification</label>
                                                            <textarea class="form-control" placeholder="Qualification"
                                                                name="qualification"
                                                                id="qualification"><?php echo isset($_GET['edit_site']) ? $id[0]['qualification'] : null;echo !isset($_GET['edit_site']) && isset($_POST['qualification']) ? $_POST['qualification'] : null; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="recent_experience"
                                                                class="col-form-label">Security
                                                                experience</label>
                                                            <textarea class="form-control"
                                                                placeholder="Security experience"
                                                                name="recent_experience"
                                                                id="recent_experience"><?php echo isset($_GET['edit_site']) ? $id[0]['recent_experience'] : null;echo !isset($_GET['edit_site']) && isset($_POST['recent_experience']) ? $_POST['recent_experience'] : null; ?></textarea>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="mt-2">Documents:</h3>
                                            <br />
                                            <div class="border">
                                                <div class="row m-1">
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="cnic" class="col-form-label">BRPN <b>(If
                                                                    Applicable)</b></label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['cnic'] : null;echo !isset($_GET['edit_site']) && isset($_POST['cnic']) ? $_POST['cnic'] : null; ?>"
                                                                class="form-control" name="cnic" type="text"
                                                                placeholder="Enter BRPN" id="cnic">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="cnic_front_pic" class="col-form-label">BRPN
                                                                front
                                                                image <b>(If Applicable)</b></label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['cnic_front_pic'] : null; ?>"
                                                                class="form-control" name="cnic_front_pic" type="file"
                                                                placeholder="Enter BRPN front pic" id="cnic_front_pic">
                                                            <?php 
                                                            if (isset($_GET['edit_site'])) {
                                                            ?>
                                                            Previous image:
                                                            <br />
                                                            <img width="100" height="100"
                                                                src="assets/guardmark/cnic_front_pics/<?php echo  isset($_GET['edit_site']) ? $id[0]['cnic_front_pic'] : null; ?>"
                                                                alt="" />
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="cnic_back_pic" class="col-form-label">BRPN back
                                                                image <b>(If Applicable)</b></label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['cnic_back_pic'] : null; ?>"
                                                                class="form-control" name="cnic_back_pic" type="file"
                                                                placeholder="Enter BRPN back pic" id="cnic_back_pic">
                                                            <?php 
                                                            if (isset($_GET['edit_site'])) {
                                                            ?>
                                                            Previous image:
                                                            <br />
                                                            <img width="100" height="100"
                                                                src="assets/guardmark/cnic_back_pics/<?php echo  isset($_GET['edit_site']) ? $id[0]['cnic_back_pic'] : null; ?>"
                                                                alt="" />
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="cnic_expiry" class="col-form-label">BRPN expiry
                                                                <b>(If
                                                                    Applicable)</b></label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['cnic_expiry'] : null; ?>"
                                                                class="form-control" name="cnic_expiry" type="date"
                                                                placeholder="Enter BRPN expiry" id="cnic_expiry">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row m-1">
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="pasport" class="col-form-label">Pasport</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['pasport'] : null;echo !isset($_GET['edit_site']) && isset($_POST['pasport']) ? $_POST['pasport'] : null; ?>"
                                                                class="form-control" name="pasport" type="text"
                                                                placeholder="Enter Pasport" id="pasport">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="pasport_front_pic"
                                                                class="col-form-label">Pasport
                                                                front
                                                                image</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['pasport_front_pic'] : null; ?>"
                                                                class="form-control" name="pasport_front_pic"
                                                                type="file" placeholder="Enter CNIC front pic"
                                                                id="pasport_front_pic">
                                                            <?php 
                                                            if (isset($_GET['edit_site'])) {
                                                            ?>
                                                            Previous image:
                                                            <br />
                                                            <img width="100" height="100"
                                                                src="assets/guardmark/pasport_front_pics/<?php echo  isset($_GET['edit_site']) ? $id[0]['pasport_front_pic'] : null; ?>"
                                                                alt="" />
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="pasport_back_pic" class="col-form-label">Pasport
                                                                visa image <b>(If
                                                                    Only)</b></label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['pasport_back_pic'] : null; ?>"
                                                                class="form-control" name="pasport_back_pic" type="file"
                                                                placeholder="Enter Pasport visa pic"
                                                                id="pasport_back_pic">
                                                            <?php 
                                                            if (isset($_GET['edit_site'])) {
                                                            ?>
                                                            Previous image:
                                                            <br />
                                                            <img width="100" height="100"
                                                                src="assets/guardmark/pasport_back_pics/<?php echo  isset($_GET['edit_site']) ? $id[0]['pasport_back_pic'] : null; ?>"
                                                                alt="" />
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="pasport_expiry" class="col-form-label">Pasport
                                                                expiry</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['pasport_expiry'] : null;echo !isset($_GET['edit_site']) && isset($_POST['pasport_expiry']) ? $_POST['pasport_expiry'] : null; ?>"
                                                                class="form-control" name="pasport_expiry" type="date"
                                                                placeholder="Enter Pasport expiry" id="pasport_expiry">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row m-1">
                                                    <h3><i style="text-decoration: underline;">All utility Bill & Bank
                                                            Statement
                                                            must be dated within 3 Months*</i></h3>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="bank_statement_pdf" class="col-form-label">Bank
                                                                statement pdf <b>(PDF)</b></label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['bank_statement_pdf'] : null; ?>"
                                                                class="form-control" name="bank_statement_pdf"
                                                                type="file" placeholder="Enter Bank Statement pdf"
                                                                id="bank_statement_pdf">
                                                            <?php 
                                                            if (isset($_GET['edit_site'])) {
                                                            ?>
                                                            Previous pdf:
                                                            <br />
                                                            <a target="_blank" style="color: blue;"
                                                                href="assets/guardmark/bank_statement_pdfs/<?php echo  isset($_GET['edit_site']) ? $id[0]['bank_statement_pdf'] : null; ?>"
                                                                alt="">Open</a>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="utility_bill_pic" class="col-form-label">Utility
                                                                bill
                                                                image</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['utility_bill_pic'] : null; ?>"
                                                                class="form-control" name="utility_bill_pic" type="file"
                                                                placeholder="Enter Utility Bill pic"
                                                                id="utility_bill_pic">
                                                            <?php 
                                                            if (isset($_GET['edit_site'])) {
                                                            ?>
                                                            Previous image:
                                                            <br />
                                                            <img width="100" height="100"
                                                                src="assets/guardmark/utility_bill_pics/<?php echo  isset($_GET['edit_site']) ? $id[0]['utility_bill_pic'] : null; ?>"
                                                                alt="" />
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="dvld_licence_pic" class="col-form-label">DVLD
                                                                licence
                                                                image <b>(If
                                                                    Applicable)</b></label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['dvld_licence_pic'] : null; ?>"
                                                                class="form-control" name="dvld_licence_pic" type="file"
                                                                placeholder="Enter DVLD licence pic"
                                                                id="dvld_licence_pic">
                                                            <?php 
                                                            if (isset($_GET['edit_site'])) {
                                                            ?>
                                                            Previous image:
                                                            <br />
                                                            <img width="100" height="100"
                                                                src="assets/guardmark/dvld_licence_pics/<?php echo  isset($_GET['edit_site']) ? $id[0]['dvld_licence_pic'] : null; ?>"
                                                                alt="" />
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h3 class="mt-2">Address:</h3>
                                            <br />
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
                                                                2</label>
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
                                                            <label for="post_code" class="col-form-label">Post
                                                                code</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['post_code'] : null; echo !isset($_GET['edit_site']) && isset($_POST['post_code']) ? $_POST['post_code'] : null;?>"
                                                                class="form-control" name="post_code" type="text"
                                                                placeholder="Enter Post code" id="post_code">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="mt-1">SIA Licence:</h3>
                                            <br />
                                            <div class="border">
                                                <div class="row m-1">
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="sia_number" class="col-form-label">Sia
                                                                number</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['sia_number'] : null;echo !isset($_GET['edit_site']) && isset($_POST['sia_number']) ? $_POST['sia_number'] : null; ?>"
                                                                class="form-control" name="sia_number" type="text"
                                                                placeholder="Enter Sia number" id="sia_number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="sia_card_pic" class="col-form-label">Sia card
                                                                picture</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['sia_card_pic'] : null; ?>"
                                                                class="form-control" name="sia_card_pic" type="file"
                                                                placeholder="Enter sia_card_pic" id="sia_card_pic">
                                                            <?php 
                                                            if (isset($_GET['edit_site'])) {
                                                            ?>
                                                            Previous image:
                                                            <br />
                                                            <img width="100" height="100"
                                                                src="assets/guardmark/sia_card_pics/<?php echo  isset($_GET['edit_site']) ? $id[0]['sia_card_pic'] : null; ?>"
                                                                alt="" />
                                                            <?php } ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row m-1">
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="licence_sector" class="col-form-label">Licence
                                                                sector</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['licence_sector'] : null;echo !isset($_GET['edit_site']) && isset($_POST['licence_sector']) ? $_POST['licence_sector'] : null; ?>"
                                                                class="form-control" name="licence_sector" type="text"
                                                                placeholder="Enter licence sector" id="licence_sector">
                                                        </div>
                                                    </div>

                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="expiry_date" class="col-form-label">Expiry
                                                                date</label>
                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['expiry_date'] : null;echo !isset($_GET['edit_site']) && isset($_POST['expiry_date']) ? $_POST['expiry_date'] : null; ?>"
                                                                class="form-control" name="expiry_date" type="date"
                                                                placeholder="Enter Expiry date" id="expiry_date">
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group s-opt">
                                                            <label for="licence_status" class="col-form-label">Licence
                                                                status</label>
                                                            <select class="select2 form-control select-opt"
                                                                name="licence_status" id="licence_status">
                                                                <?php 
                                                        $licence_statuss = ['Active', 'Non-Active'];
                                                        foreach ($licence_statuss as $licence_status) {
                                                            
                                                        ?>
                                                                <option
                                                                    <?php echo isset($_GET['edit_site']) && $id[0]['licence_status'] == $licence_status ? "selected" : null;echo !isset($_GET['edit_site']) && isset($_POST['licence_status']) && $_POST['licence_status'] == $licence_status ? "selected" : null; ?>
                                                                    value="<?php echo $licence_status; ?>">
                                                                    <?php echo $licence_status; ?></option>


                                                                <?php } ?>
                                                            </select>
                                                            <span class="sel_arrow">
                                                                <i class="fa fa-angle-down "></i>
                                                            </span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row m-1">
                                                    <div class="col-md">
                                                        <div class="form-group s-opt">
                                                            <label for="role" class="col-form-label">Role</label>
                                                            <select class="select2 form-control select-opt" name="role"
                                                                id="role">
                                                                <?php 
                                                        $roles = ['Frontline', 'Non-Frontline'];
                                                        foreach ($roles as $role) {
                                                            
                                                        ?>
                                                                <option
                                                                    <?php echo isset($_GET['edit_site']) && $id[0]['role'] == $role ? "selected" : null;echo !isset($_GET['edit_site']) && isset($_POST['role']) && $_POST['role'] == $role ? "selected" : null; ?>
                                                                    value="<?php echo $role; ?>">
                                                                    <?php echo $role; ?></option>


                                                                <?php } ?>
                                                            </select>
                                                            <span class="sel_arrow">
                                                                <i class="fa fa-angle-down "></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="form-group s-opt">
                                                            <label for="sector" class="col-form-label">Sector</label>
                                                            <select class="select2 form-control select-opt"
                                                                name="sector" id="sector">
                                                                <?php 
                                                        $sectors = ['(DS) Door Supervision', '(SG) Security Guarding', '(CCTV) CCTV', '(CP) Close Protection'];
                                                        foreach ($sectors as $sector) {
                                                            
                                                        ?>
                                                                <option
                                                                    <?php echo isset($_GET['edit_site']) && $id[0]['sector'] == $sector ? "selected" : null;echo !isset($_GET['edit_site']) && isset($_POST['sector']) && $_POST['sector'] == $sector ? "selected" : null; ?>
                                                                    value="<?php echo $sector; ?>">
                                                                    <?php echo $sector; ?></option>


                                                                <?php } ?>
                                                            </select>
                                                            <span class="sel_arrow">
                                                                <i class="fa fa-angle-down "></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="mt-2">Test:</h3>
                                            <br />
                                            <div class="border">
                                                <div class="row m-1">

                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <h4>Record audio, speaking this line:
                                                                <i
                                                                    style="text-decoration: underline;"><?php echo $random_line['details']; ?></i>
                                                            </h4>
                                                            <br />
                                                            <label for="audio" class="col-form-label">Record audio
                                                                here and upload after it's downloaded*</label>
                                                            <div class="display"></div>
                                                            <div class="controllers"></div>
                                                            <label for="reading_test_video"
                                                                class="col-form-label">Reading
                                                                test audio upload</label>

                                                            <input
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['reading_test_video'] : null; ?>"
                                                                class="form-control" name="reading_test_video"
                                                                type="file" placeholder="Enter Reading test video"
                                                                id="reading_test_video">
                                                            <?php 
                    if (isset($_GET['edit_site'])) {
                    ?>
                                                            Previous audio:
                                                            <br />
                                                            <audio controls>
                                                                <source
                                                                    src="assets/guardmark/reading_test_videos/<?php echo  isset($_GET['edit_site']) ? $id[0]['reading_test_video'] : null; ?>"
                                                                    type="audio/mp3">
                                                                Your browser does not support the audio element.
                                                            </audio>

                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <br />
                                                <div class="row m-1" hidden>
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="topic" class="col-form-label">Toimage</label>
                                                            <input hidden
                                                                value="<?php echo isset($_GET['edit_site']) ? $id[0]['topic'] : $random_topic['topic']; ?>"
                                                                class="form-control" name="topic" type="text"
                                                                placeholder="Enter topic" id="topic">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row m-1">
                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <h4>Write a topic on* : <i
                                                                    style="text-decoration: underline;"><?php echo $random_topic['topic']; ?></i>
                                                            </h4>
                                                            <br>
                                                            <label for="topic_answer" class="col-form-label">Topic
                                                                answer</label>
                                                            <textarea maxlength="500" minlength="300"
                                                                class="form-control" placeholder="Topic"
                                                                name="topic_answer"
                                                                id="topic_answer"><?php echo isset($_GET['edit_site']) ? $id[0]['topic_answer'] : null;echo !isset($_GET['edit_site']) && isset($_POST['topic_answer']) ? $_POST['topic_answer'] : null; ?></textarea>
                                                            <span class="text-muted">Characets limit min*: <i>300</i> -
                                                                max*:
                                                                <i>500</i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row m-1">

                                                    <div class="col-md">
                                                        <div class="form-group">
                                                            <label for="availability"
                                                                class="col-form-label">Availability</label>
                                                            <div class="d-md-flex flex-md-row">
                                                                <div class="checkbox ml-2">
                                                                    <input id="monday"
                                                                        <?php echo isset($_GET['edit_site']) && !empty(searchArrayKeys($newDays, "monday")) ? "checked" : null;echo !isset($_GET['edit_site']) && isset($_POST['day']) && !empty(searchArrayKeys($newDays, "monday")) ? "checked" : null; ?>
                                                                        name="availability[]" value="monday"
                                                                        type="checkbox">
                                                                    <label for="monday">Monday</label>
                                                                    <select name="day[]" id="day1">
                                                                        <?php 
                                                                $daytimes = ['Day', 'Night', 'Both'];
                                                                foreach ($daytimes as $day) {
                                                                    
                                                                ?>
                                                                        <option
                                                                            <?php echo isset($_GET['edit_site'])  && !empty($newDays['monday'])  && $newDays['monday'] == $day ? "selected" : null;echo !isset($_GET['edit_site']) && isset($_POST['day']) && !empty($newDays['monday']) && $newDays['monday'] == $day ? "selected" : null; ?>
                                                                            value="<?php echo $day; ?>">
                                                                            <?php echo $day; ?></option>


                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="checkbox ml-2">
                                                                    <input id="tuesday"
                                                                        <?php echo isset($_GET['edit_site'])  && !empty(searchArrayKeys($newDays, "tuesday")) ? "checked" : null;echo !isset($_GET['edit_site']) && isset($_POST['day']) && !empty(searchArrayKeys($newDays, "tuesday")) ? "checked" : null; ?>
                                                                        name="availability[]" value="tuesday"
                                                                        type="checkbox">
                                                                    <label for="tuesday">Tuesday</label>
                                                                    <select name="day[]" id="day2">
                                                                        <?php 
                                                                foreach ($daytimes as $day) {
                                                                    
                                                                ?>
                                                                        <option
                                                                            <?php echo isset($_GET['edit_site']) && !empty($newDays['tuesday']) && $newDays['tuesday'] == $day ? "selected" : null;echo !isset($_GET['edit_site']) && isset($_POST['day']) && !empty($newDays['tuesday']) && $newDays['tuesday'] == $day ? "selected" : null; ?>
                                                                            value="<?php echo $day; ?>">
                                                                            <?php echo $day; ?></option>


                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="checkbox ml-2">
                                                                    <input id="wednesday"
                                                                        <?php echo isset($_GET['edit_site']) && !empty(searchArrayKeys($newDays, "wednesday")) ? "checked" : null;echo !isset($_GET['edit_site']) && isset($_POST['day']) && !empty(searchArrayKeys($newDays, "wednesday")) ? "checked" : null; ?>
                                                                        name="availability[]" value="wednesday"
                                                                        type="checkbox">
                                                                    <label for="wednesday">Wednesday</label>
                                                                    <select name="day[]" id="day3">
                                                                        <?php 
                                                                foreach ($daytimes as $day) {
                                                                    
                                                                ?>
                                                                        <option
                                                                            <?php echo isset($_GET['edit_site']) && !empty($newDays['wednesday']) && $newDays['wednesday'] == $day ? "selected" : null;echo !isset($_GET['edit_site']) && isset($_POST['day']) && !empty($newDays['wednesday']) && $newDays['wednesday'] == $day ? "selected" : null; ?>
                                                                            value="<?php echo $day; ?>">
                                                                            <?php echo $day; ?></option>


                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="checkbox ml-2">
                                                                    <input id="thursday"
                                                                        <?php echo isset($_GET['edit_site']) && !empty(searchArrayKeys($newDays, "thursday")) ? "checked" : null;echo !isset($_GET['edit_site']) && isset($_POST['day']) && !empty(searchArrayKeys($newDays, "thursday")) ? "checked" : null; ?>
                                                                        name="availability[]" value="thursday"
                                                                        type="checkbox">
                                                                    <label for="thursday">Thursday</label>
                                                                    <select name="day[]" id="day4">
                                                                        <?php 
                                                                foreach ($daytimes as $day) {
                                                                    
                                                                ?>
                                                                        <option
                                                                            <?php echo isset($_GET['edit_site']) && !empty($newDays['thursday']) && $newDays['thursday'] == $day ? "selected" : null;echo !isset($_GET['edit_site']) && isset($_POST['day']) && !empty($newDays['thursday']) && $newDays['thursday'] == $day ? "selected" : null; ?>
                                                                            value="<?php echo $day; ?>">
                                                                            <?php echo $day; ?></option>


                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="checkbox ml-2">
                                                                    <input id="friday"
                                                                        <?php echo isset($_GET['edit_site']) && !empty(searchArrayKeys($newDays, "friday")) ? "checked" : null;echo !isset($_GET['edit_site']) && isset($_POST['day']) && !empty(searchArrayKeys($newDays, "friday")) ? "checked" : null; ?>
                                                                        name="availability[]" value="friday"
                                                                        type="checkbox">
                                                                    <label for="friday">Friday</label>
                                                                    <select name="day[]" id="day5">
                                                                        <?php 
                                                                foreach ($daytimes as $day) {
                                                                    
                                                                ?>
                                                                        <option
                                                                            <?php echo isset($_GET['edit_site']) && !empty($newDays['friday']) && $newDays['friday'] == $day ? "selected" : null;echo !isset($_GET['edit_site']) && isset($_POST['day']) && !empty($newDays['friday']) && $newDays['friday'] == $day ? "selected" : null;  ?>
                                                                            value="<?php echo $day; ?>">
                                                                            <?php echo $day; ?></option>


                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="checkbox ml-2">
                                                                    <input id="saturday"
                                                                        <?php echo isset($_GET['edit_site']) && !empty(searchArrayKeys($newDays, "saturday")) ? "checked" : null;echo !isset($_GET['edit_site']) && isset($_POST['day']) && !empty(searchArrayKeys($newDays, "saturday")) ? "checked" : null; ?>
                                                                        name="availability[]" value="saturday"
                                                                        type="checkbox">
                                                                    <label for="saturday">Saturday</label>
                                                                    <select name="day[]" id="day6">
                                                                        <?php 
                                                                foreach ($daytimes as $day) {
                                                                    
                                                                ?>
                                                                        <option
                                                                            <?php echo isset($_GET['edit_site']) && !empty($newDays['saturday']) && $newDays['saturday'] == $day ? "selected" : null; echo !isset($_GET['edit_site']) && isset($_POST['day']) && !empty($newDays['saturday']) && $newDays['saturday'] == $day ? "selected" : null;?>
                                                                            value="<?php echo $day; ?>">
                                                                            <?php echo $day; ?></option>


                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="checkbox ml-2">
                                                                    <input id="sunday"
                                                                        <?php echo isset($_GET['edit_site']) && !empty(searchArrayKeys($newDays, "sunday")) ? "checked" : null;echo !isset($_GET['edit_site']) && isset($_POST['day']) && !empty(searchArrayKeys($newDays, "sunday")) ? "checked" : null; ?>
                                                                        name="availability[]" value="sunday"
                                                                        type="checkbox">
                                                                    <label for="sunday">Sunday</label>
                                                                    <select name="day[]" id="day7">
                                                                        <?php 
                                                                foreach ($daytimes as $day) {
                                                                    
                                                                ?>
                                                                        <option
                                                                            <?php echo isset($_GET['edit_site']) && !empty($newDays['sunday']) && $newDays['sunday'] == $day ? "selected" : null;  echo isset($_POST['day']) && !empty($newDays['sunday']) && $newDays['sunday'] == $day ? "selected" : null;?>
                                                                            value="<?php echo $day; ?>">
                                                                            <?php echo $day; ?></option>


                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row m-1">
                                                    <div class="col-md">

                                                        <div class="form-group s-opt">
                                                            <label for="level" class="col-form-label">Level</label>
                                                            <select class="select2 form-control select-opt" name="level"
                                                                id="level">
                                                                <?php
                                                                    $levels = array();

                                                                    for ($i = 0; $i <= 100; $i++) {
                                                                        $levels[] = $i;
                                                                    }
                                                                    foreach ($levels as $level) {


                                                                    ?>
                                                                <option
                                                                    <?php echo isset($_GET['edit_site']) && $id[0]['level'] == $level ? "selected" : null; ?>
                                                                    value="<?php echo $level; ?>">
                                                                    <?php echo $level; ?></option>
                                                                <?php } ?>

                                                            </select>
                                                            <span class="sel_arrow">
                                                                <i class="fa fa-angle-down "></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">

                                                        <div class="form-group s-opt">
                                                            <label for="status" class="col-form-label">Status</label>
                                                            <select class="select2 form-control select-opt"
                                                                name="status" id="status">
                                                                <?php
                                                                    $statuss = ['Verified', 'Pending'];

                                                                    foreach ($statuss as $status) {


                                                                    ?>
                                                                <option
                                                                    <?php echo isset($_GET['edit_site']) && $id[0]['status'] == $status ? "selected" : null;echo !isset($_GET['edit_site']) && isset($_POST['status']) && $_POST['status'] == $status ? "selected" : null; ?>
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
                                            </div>

                                            <div class="form-group mb-3 mt-3">
                                                <button class="btn btn-primary" type="reset">reset</button>
                                                <input
                                                    name="<?php echo isset($_GET['edit_site']) ? "edit_registration_btn" : "add_registration_btn"; ?>"
                                                    class="btn btn-danger" type="submit">
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="card" style="overflow: scroll; height: 500px;">

                                                        <div class="card-body">

                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <table id="example1"
                                                                    class="table table-striped table-bordered dt-responsive">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Registration number</th>
                                                                            <th>First name</th>
                                                                            <th>Last name</th>

                                                                            <th>Date of birth</th>
                                                                            <th>Phone number</th>
                                                                            <th>Mobile</th>
                                                                            <th>Next kin contact number</th>
                                                                            <th>Email</th>
                                                                            <th>BRPN</th>
                                                                            <th>BRPN front image</th>
                                                                            <th>BRPN back image</th>
                                                                            <th>BRPN expiry</th>

                                                                            <th>Pasport</th>
                                                                            <th>Pasport front image</th>
                                                                            <th>Pasport back image</th>
                                                                            <th>Pasport expiry</th>
                                                                            <th>Bank statement pdf</th>
                                                                            <th>Utility bill image</th>
                                                                            <th>DVLD licence image</th>

                                                                            <th>Pciture</th>
                                                                            <th>Address line 1</th>
                                                                            <th>Address line 2</th>


                                                                            <th>Qualification</th>
                                                                            <th>Guard experience</th>

                                                                            <th>Country</th>
                                                                            <th>County</th>

                                                                            <th>Part</th>
                                                                            <th>Town</th>

                                                                            <th>Post code</th>
                                                                            <th>Sia number</th>
                                                                            <th>Sia card image</th>

                                                                            <th>Licence sector</th>
                                                                            <th>Role</th>
                                                                            <th>Expiry date</th>
                                                                            <th>Licence status</th>
                                                                            <th>Sector</th>

                                                                            <th>Reading test audio</th>
                                                                            <th>Toimage</th>
                                                                            <th>Topic answer</th>
                                                                            <th>Availability</th>
                                                                            <th>Level</th>

                                                                            <th>Status</th>

                                                                            <th>Created at</th>
                                                                            <th>Actions</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                foreach ($registration as $sr) {


                                                                ?>
                                                                        <tr>
                                                                            <td><?php echo $sr['id']; ?></td>
                                                                            <td><?php echo $sr['registration_number']; ?>
                                                                            </td>
                                                                            <td><?php echo $sr['firstname']; ?></td>
                                                                            <td><?php echo $sr['lastname']; ?></td>
                                                                            <td><?php echo $sr['dob']; ?></td>
                                                                            <td><?php echo $sr['phonenumber']; ?></td>
                                                                            <td><?php echo $sr['mobile']; ?></td>
                                                                            <td><?php echo $sr['emergency_contact_number']; ?>
                                                                            </td>
                                                                            <td><?php echo $sr['email']; ?></td>
                                                                            <td><?php echo $sr['cnic']; ?></td>

                                                                            <td><img width="100" height="50"
                                                                                    src="assets/guardmark/cnic_front_pics/<?php echo $sr['cnic_front_pic']; ?>"
                                                                                    alt="" /></td>
                                                                            <td><img width="100" height="50"
                                                                                    src="assets/guardmark/cnic_back_pics/<?php echo $sr['cnic_back_pic']; ?>"
                                                                                    alt="" /></td>
                                                                            <td><?php echo $sr['cnic_expiry']; ?></td>

                                                                            <td><?php echo $sr['pasport']; ?></td>
                                                                            <td><img width="100" height="50"
                                                                                    src="assets/guardmark/pasport_front_pics/<?php echo $sr['pasport_front_pic']; ?>"
                                                                                    alt="" /></td>
                                                                            <td><img width="100" height="50"
                                                                                    src="assets/guardmark/pasport_back_pics/<?php echo $sr['pasport_back_pic']; ?>"
                                                                                    alt="" /></td>
                                                                            <td><?php echo $sr['pasport_expiry']; ?>
                                                                            </td>
                                                                            <td><a target="_blank" style="color: blue;"
                                                                                    href="assets/guardmark/bank_statement_pdfs/<?php echo $sr['bank_statement_pdf']; ?>"
                                                                                    alt="">Open</a>
                                                                            </td>
                                                                            <td><img width="100" height="50"
                                                                                    src="assets/guardmark/utility_bill_pics/<?php echo $sr['utility_bill_pic']; ?>"
                                                                                    alt="" /></td>
                                                                            <td><img width="100" height="50"
                                                                                    src="assets/guardmark/dvld_licence_pics/<?php echo $sr['dvld_licence_pic']; ?>"
                                                                                    alt="" /></td>
                                                                            <td><img width="100" height="50"
                                                                                    src="assets/guardmark/user_pics/<?php echo $sr['pic']; ?>"
                                                                                    alt="" /></td>
                                                                            <td><?php echo $sr['address']; ?></td>
                                                                            <td><?php echo $sr['address_2']; ?></td>
                                                                            <td><?php echo $sr['qualification']; ?></td>
                                                                            <td><?php echo $sr['recent_experience']; ?>
                                                                            </td>


                                                                            <td><?php echo $sr['country']; ?></td>
                                                                            <td><?php echo $sr['state']; ?></td>
                                                                            <td><?php echo $sr['part']; ?></td>
                                                                            <td><?php echo $sr['city']; ?></td>

                                                                            <td><?php echo $sr['post_code']; ?></td>
                                                                            <td><?php echo $sr['sia_number']; ?></td>
                                                                            <td><img width="100" height="50"
                                                                                    src="assets/guardmark/sia_card_pics/<?php echo $sr['sia_card_pic']; ?>"
                                                                                    alt="" /></td>

                                                                            <td><?php echo $sr['licence_sector']; ?>
                                                                            </td>
                                                                            <td><?php echo $sr['role']; ?></td>
                                                                            <td><?php echo $sr['expiry_date']; ?></td>
                                                                            <td><?php echo $sr['licence_status']; ?>
                                                                            </td>
                                                                            <td><?php echo $sr['sector']; ?>
                                                                            </td>
                                                                            <td><audio controls>
                                                                                    <source
                                                                                        src="assets/guardmark/reading_test_videos/<?php echo $sr['reading_test_video']; ?>"
                                                                                        type="audio/mp3">
                                                                                    Your browser does not support the
                                                                                    audio
                                                                                    element.
                                                                                </audio></td>
                                                                            <td><?php echo $sr['topic']; ?></td>
                                                                            <td><?php echo $sr['topic_answer']; ?></td>
                                                                            <td><?php echo $sr['availability']; ?></td>
                                                                            <td><?php echo $sr['level']; ?></td>

                                                                            <td><?php echo $sr['status']; ?></td>

                                                                            <td><?php echo $sr['created_at']; ?></td>
                                                                            <td>
                                                                                <a class="text-success"
                                                                                    href="registration.php?edit_site=<?php echo $sr['id']; ?>">
                                                                                    <i class="fa fa-edit"></i>
                                                                                </a>
                                                                                &nbsp;&nbsp;&nbsp;
                                                                                <a class="text-danger"
                                                                                    href="registration.php?delete_site=<?php echo $sr['id']; ?>">
                                                                                    <i class="fa fa-trash"></i>
                                                                                </a>
                                                                            </td>

                                                                        </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                                <div class="form-group mb-3">
                                                                    <button id="printbtnstore" class="btn btn-danger"
                                                                        type="button"><i class="fa fa-print"></i>
                                                                        Print</button>

                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>

                        </div>
                    </div>
                    <?php require_once 'assets/includes/footer.php'; ?>

                </div>



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
        location.href = `printreport1.php?s=${searchedValue}&t=registration`;
    });
    </script>

</body>

</html>
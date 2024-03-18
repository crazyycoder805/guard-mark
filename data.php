<?php
session_start();

require_once 'assets/includes/pdo.php';


if ($_POST['__FILE__'] == "duitesSiteName") {
    $site = $pdo->read("site_registration", ['id' => $_POST['site'], 'status'=>"Approved"]);
    $guards = "";
    
    if (!empty($_POST['site'])) {
        
        $guards = $pdo->customQuery("SELECT * FROM registration

        
            WHERE registration.status != 'Expired' AND registration.status = 'Verified' AND NOT EXISTS(SELECT * FROM duties WHERE registration.id = duties.id AND duties.status != 'Completed') AND availability LIKE '%".date("l", strtotime($site[0]['date']))."%'");
        

       

        if (isset($_POST['county_search']) && $_POST['county_search'] == "checked") {
            $guards = $pdo->customQuery("SELECT * FROM registration
            
            
            WHERE registration.status != 'Expired' AND registration.status = 'Verified' AND NOT EXISTS(SELECT * FROM duties WHERE registration.id = duties.id AND duties.status != 'Completed') AND state = '{$site[0]['state']}' AND availability LIKE '%".date("l", strtotime($site[0]['date']))."%'");

            echo json_encode([
                $site[0]['date'], 
                $site[0]['site_registration_date'], 
                $site[0]['time_in'],
                $site[0]['time_out'], 
                $site[0]['duty_hrs'], 
                $site[0]['pro_name'], 
                $site[0]['site_address'], 
                $site[0]['city'], 
                $site[0]['postal_code'], 
                $site[0]['notes'], 
                $site[0]['fuel'], 
                $site[0]['expenses'], 
                $site[0]['travel'], 
                $site[0]['lgs'], 
                $site[0]['company_name'], 
                $site[0]['status'], 
                $site[0]['additional_note'],
                $guards,  
                $site[0]['address'],
                $site[0]['address_2'],
                $site[0]['country'],
                $site[0]['state'],
                $site[0]['part'],
                $site[0]['city'],
                $site[0]['postal_code']]);
        } else if (isset($_POST['county_search']) && $_POST['county_search'] == "unchecked")  {
            $guards = $pdo->customQuery("SELECT * FROM registration

            
                WHERE registration.status != 'Expired' AND registration.status = 'Verified' AND NOT EXISTS(SELECT * FROM duties WHERE registration.id = duties.id AND duties.status != 'Completed') AND availability LIKE '%".date("l", strtotime($site[0]['date']))."%'");
            
    
           
            echo json_encode([
                $site[0]['date'], 
                $site[0]['site_registration_date'], 
                $site[0]['time_in'],
                $site[0]['time_out'], 
                $site[0]['duty_hrs'], 
                $site[0]['pro_name'], 
                $site[0]['site_address'], 
                $site[0]['city'], 
                $site[0]['postal_code'], 
                $site[0]['notes'], 
                $site[0]['fuel'], 
                $site[0]['expenses'], 
                $site[0]['travel'], 
                $site[0]['lgs'], 
                $site[0]['company_name'], 
                $site[0]['status'], 
                $site[0]['additional_note'],
                $guards,  
                $site[0]['address'],
                $site[0]['address_2'],
                $site[0]['country'],
                $site[0]['state'],
                $site[0]['part'],
                $site[0]['city'],
                $site[0]['postal_code']]);
        }
    
    } else {
        echo json_encode([]);
    }
    
    
} else if ($_POST['__FILE__'] == "dutyAdd") {
    date_default_timezone_set('Europe/London');

    $currentDate = date("Y-m-d");

    // Getting the current time
    $currentTime = date("H:i:s");
    $pdo->create("duty_hrs", ["lat" =>$_POST['lat'], "lon" =>$_POST['lon']
    
    , "guard_name_id" =>$_POST['gi']
    , "site_name_id" =>$_POST['si']
    , "time_in" =>$currentTime
    , "date" =>$currentDate
    , "duty_id" =>$_POST['i']

    ]);

    $pdo->update("site_registration", ['id' => $_POST['s']], ['status' => 'In Progress']);
    $pdo->update("duties", ['id' => $_POST['i']], ['status' => 'In Progress']);

}else if ($_POST['__FILE__'] == "dutyEnd") {
    date_default_timezone_set('Europe/London');

    $currentDate = date("Y-m-d");

    // Getting the current time
    $currentTime = date("H:i:s");
    $pdo->create("duty_hrs", ["lat" =>$_POST['lat'], "lon" =>$_POST['lon']
    
    , "guard_name_id" =>$_POST['gi']
    , "site_name_id" =>$_POST['si']
    , "time_out" =>$currentTime
    , "date" =>$currentDate
    , "duty_id" =>$_POST['i']

    ]);
    
    $pdo->update("site_registration", ['id' => $_POST['s']], ['status' => 'Complete']);
    $pdo->update("duties", ['id' => $_POST['i']], ['status' => 'Complete']);
}
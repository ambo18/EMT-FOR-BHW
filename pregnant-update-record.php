<?php include 'server/server.php' ?>
<?php
    $id = $_POST['id'];
    $p_name = strtoupper($_POST['p_name']);
    $birthdate = strtoupper($_POST['birthdate']);
    $age = strtoupper($_POST['age']);
    $p_guardian_name = strtoupper($_POST['p_guardian_name']);
    $address = strtoupper($_POST['address']);
    $lmp = strtoupper($_POST['lmp']);
    $edd = strtoupper($_POST['edd']);
    $allergies = strtoupper($_POST['allergies']);
    $bloodtype = strtoupper($_POST['bloodtype']);
    $rhfactor = strtoupper($_POST['rhfactor']);
    $sbp = strtoupper($_POST['sbp']);
    $dbp = strtoupper($_POST['dbp']);



    $query = "UPDATE tbl_pregnant 
                SET p_name  ='$p_name',
                    birthdate  ='$birthdate', 
                    age        ='$age',
                    p_guardian_name  ='$p_guardian_name',
                    address    ='$address',
                    lmp     ='$lmp',
                    edd     ='$edd',
                    allergies     ='$allergies',
                    bloodtype     ='$bloodtype',
                    rhfactor     ='$rhfactor',
                    sbp     ='$sbp',
                    dbp      ='$dbp'
             WHERE id='$id'";
               
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to update record!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully updated record!';
        $_SESSION['success'] = 'success';
    }
    header('location: pregnant.php');
?>
<?php include 'server/server.php' ?>
<?php
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


    $query = "INSERT INTO tbl_pregnant (p_name, 
                                        birthdate, 
                                        age,
                                        p_guardian_name, 
                                        address,
                                        lmp,
                                        edd,
                                        allergies,
                                        bloodtype,
                                        rhfactor, 
                                        sbp,
                                        dbp)
                VALUES ('$p_name',
                        '$birthdate',
                        '$age',
                        '$p_guardian_name',
                        '$address',
                        '$lmp',
                        '$edd',
                        '$allergies',
                        '$bloodtype',
                        '$rhfactor',
                        '$sbp',
                        '$dbp')";
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add record!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully added record!';
        $_SESSION['success'] = 'success';
    }
    header('location: pregnant.php');
?>
<?php include 'server/server.php' ?>
<?php
    $p_name = strtoupper($_POST['p_name']);
    $name_parent = strtoupper($_POST['name_parent']);
    $address = strtoupper($_POST['address']);
    $birthdate = strtoupper($_POST['birthdate']);
    $age = strtoupper($_POST['age']);
    $gender = strtoupper($_POST['gender']);
    $vitamin = strtoupper($_POST['vitamin']);
    $phone = strtoupper($_POST['phone']);
    $remarks = strtoupper($_POST['remarks']);


    $query = "INSERT INTO tbl_distribution_of_vitamin (p_name, 
                                        name_parent, 
                                        address, 
                                        birthdate, 
                                        age, 
                                        gender,
                                        vitamin,
                                        phone,
                                        remarks)
                VALUES ('$p_name',
                        '$name_parent',
                        '$address',
                        '$birthdate',
                        '$age',
                        '$gender',
                        '$vitamin',
                        '$phone',
                        '$remarks')";
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add patient record!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully added patient record!';
        $_SESSION['success'] = 'success';
    }
    header('location: vitamin.php');
?>
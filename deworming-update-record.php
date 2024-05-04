<?php include 'server/server.php' ?>
<?php
    $id = $_POST['id'];
    $p_name = strtoupper($_POST['p_name']);
    $name_parent = strtoupper($_POST['name_parent']);
    $address = strtoupper($_POST['address']);
    $birthdate = strtoupper($_POST['birthdate']);
    $age = strtoupper($_POST['age']);
    $gender = strtoupper($_POST['gender']);
    $date = strtoupper($_POST['date']);
    $typeofdeworming = strtoupper($_POST['typeofdeworming']);
    $phone = strtoupper($_POST['phone']);
    $remarks = strtoupper($_POST['remarks']);



    $query = "UPDATE tbl_deworming 
                SET p_name  ='$p_name',
                    name_parent ='$name_parent',
                    address = '$address',
                    birthdate  ='$birthdate',
                    age        ='$age', 
                    gender     ='$gender',
                    date  ='$date',
                    typeofdeworming ='$typeofdeworming',
                    remarks ='$remarks',
                    phone      ='$phone'
             WHERE id='$id'";

    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to update resident!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully updated resident!';
        $_SESSION['success'] = 'success';
    }
    header('location: deworming.php');
?>
<?php include 'server/server.php' ?>
<?php
    $id = $_POST['id'];
    $p_name = strtoupper($_POST['p_name']);
    $name_parent = strtoupper($_POST['name_parent']);
    $address = strtoupper($_POST['address']);
    $birthdate = strtoupper($_POST['birthdate']);
    $age = strtoupper($_POST['age']);
    $gender = strtoupper($_POST['gender']);
    $weight = strtoupper($_POST['weight']);
    $height = strtoupper($_POST['height']);
    $nutritional_status = strtoupper($_POST['nutritional_status']);
    $date = strtoupper($_POST['date']);
    $phone = strtoupper($_POST['phone']);
    $remarks = strtoupper($_POST['remarks']);



    $query = "UPDATE tbl_operation_timbang 
                SET p_name  ='$p_name',
                    name_parent ='$name_parent',
                    address    ='$address',
                    birthdate  ='$birthdate', 
                    age        ='$age',
                    gender     ='$gender',
                    weight     ='$weight',
                    height      ='$height',
                    nutritional_status='$nutritional_status',
                    date= '$date',
                    phone  ='$phone',
                    remarks='$remarks'
             WHERE id='$id'";
               
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to update resident!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully updated resident!';
        $_SESSION['success'] = 'success';
    }
    header('location: childrens-records.php');
?>
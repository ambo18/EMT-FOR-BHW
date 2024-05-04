<?php include 'server/server.php' ?>
<?php
    $p_name = strtoupper($_POST['p_name']);
    $name_parent = strtoupper($_POST['name_parent']);
    $address = strtoupper($_POST['address']);
    $birthdate = strtoupper($_POST['birthdate']);
    $age = strtoupper($_POST['age']);
    $gender = strtoupper($_POST['gender']);
    $vitamin = strtoupper($_POST['vitamin']);
    $dateofdisofvitamin = strtoupper($_POST['dateofdisofvitamin']);
    $phone = strtoupper($_POST['phone']);
    $remarks = strtoupper($_POST['remarks']);

    // Check if the p_name already exists in tbl_children_information
    $query_check = "SELECT * FROM tbl_children_information WHERE p_name = ?";
    $stmt_check = $conn->prepare($query_check);
    $stmt_check->bind_param("s", $p_name);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // Patient already has a record
        $_SESSION['message'] = 'Patient already has a record!';
        $_SESSION['success'] = 'danger';
        header('location: childrens-records.php');
        exit(); // Stop further execution
    }

    // Insert data into tbl_children_information
    $query_child = "INSERT INTO tbl_children_information (p_name, name_parent, address, birthdate, age, gender, phone)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_child = $conn->prepare($query_child);
    $stmt_child->bind_param("sssssss", $p_name, $name_parent, $address, $birthdate, $age, $gender, $phone);
    $result_child = $stmt_child->execute();

    // Insert remaining data into tbl_distribution_of_vitamin
    $query_vitamin = "INSERT INTO tbl_distribution_of_vitamin (p_name, vitamin, dateofdisofvitamin, remarks)
                VALUES (?, ?, ?, ?)";
    $stmt_vitamin = $conn->prepare($query_vitamin);
    $stmt_vitamin->bind_param("ssss", $p_name, $vitamin, $dateofdisofvitamin, $remarks);
    $result_vitamin = $stmt_vitamin->execute();

    // Insert remaining data into tbl_deworming
    $query_deworming = "INSERT INTO tbl_deworming (p_name) VALUES (?)";
    $stmt_deworming = $conn->prepare($query_deworming);
    $stmt_deworming->bind_param("s", $p_name);
    $result_deworming = $stmt_deworming->execute();
    
    // Insert remaining data into tbl_operation_timbang
    $query_timbang = "INSERT INTO tbl_operation_timbang (p_name) VALUES (?)";
    $stmt_timbang = $conn->prepare($query_timbang);
    $stmt_timbang->bind_param("ssssss", $p_name);
    $result_timbang = $stmt_timbang->execute();
    
    // Check if both inserts were successful
    if($result_child && $result_vitamin){
        $_SESSION['message'] = 'Successfully added record!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Failed to add record!';
        $_SESSION['success'] = 'danger';
    }
    
    header('location: childrens-records.php');
?>

<?php include 'server/server.php' ?>
<?php
    $id = $_POST['id'];
    $p_name = strtoupper($_POST['p_name']);
    $name_parent = strtoupper($_POST['name_parent']);
    $address = strtoupper($_POST['address']);
    $birthdate = strtoupper($_POST['birthdate']);
    $age = strtoupper($_POST['age']);
    $gender = strtoupper($_POST['gender']);
    $phone = strtoupper($_POST['phone']);

    // Deworming details
    $dateofdeworming = strtoupper($_POST['dateofdeworming']);
    $typeofdeworming = strtoupper($_POST['typeofdeworming']);
    $remarks_deworming = strtoupper($_POST['remarks_deworming']);

    // Operation Timbang details
    $weight = strtoupper($_POST['weight']);
    $height = strtoupper($_POST['height']);
    $nutritional_status = strtoupper($_POST['nutritional_status']);
    $dateofopertimbang = strtoupper($_POST['dateofopertimbang']);
    $remarks_timbang = strtoupper($_POST['remarks_timbang']);

    // Distribution of Vitamin Details
    $vitamin = strtoupper($_POST['vitamin']);
    $dateofdisofvitamin = strtoupper($_POST['dateofdisofvitamin']);
    $remarks_vitamin = strtoupper($_POST['remarks_vitamin']);

    // Update record in tbl_children_information
    $query1 = "UPDATE tbl_children_information 
                SET p_name = ?, 
                    name_parent = ?, 
                    address = ?, 
                    birthdate = ?, 
                    age = ?, 
                    gender = ?, 
                    phone = ?
             WHERE id = ?";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("sssssssi", $p_name, $name_parent, $address, $birthdate, $age, $gender, $phone, $id);
    $stmt1->execute();

    // Update record in tbl_deworming
    $query2 = "UPDATE tbl_deworming 
                SET p_name = ?, 
                    dateofdeworming = ?, 
                    typeofdeworming = ?, 
                    remarks = ?
             WHERE p_name = ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("sssss", $p_name, $dateofdeworming, $typeofdeworming, $remarks_deworming, $p_name);
    $stmt2->execute();

    // Update record in tbl_operation_timbang
    $query3 = "UPDATE tbl_operation_timbang 
                SET p_name = ?, 
                    weight = ?, 
                    height = ?, 
                    nutritional_status = ?, 
                    dateofopertimbang = ?, 
                    remarks = ?
             WHERE p_name = ?";
    $stmt3 = $conn->prepare($query3);
    $stmt3->bind_param("sssssss", $p_name, $weight, $height, $nutritional_status, $dateofopertimbang, $remarks_timbang, $p_name);
    $stmt3->execute();

    // Update record in tbl_distribution_of_vitamin
    $query4 = "UPDATE tbl_distribution_of_vitamin 
                SET p_name = ?, 
                    vitamin = ?, 
                    dateofdisofvitamin = ?, 
                    remarks = ?
             WHERE p_name = ?";
    $stmt4 = $conn->prepare($query4);
    $stmt4->bind_param("sssss", $p_name, $vitamin, $dateofdisofvitamin, $remarks_vitamin, $p_name);
    $stmt4->execute();

    // Check if all queries executed successfully
    if ($stmt1 && $stmt2 && $stmt3 && $stmt4) {
        $_SESSION['message'] = 'Successfully updated resident!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Failed to update resident!';
        $_SESSION['success'] = 'danger';
    }

    header('location: childrens-records.php');
?>

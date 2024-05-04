<?php include 'server/server.php' ?>
<?php 
    $id = $_GET["id"];

    $query4 = "SELECT * FROM tbl_children_information WHERE id='$id'";
    
    $result4 = $conn->query($query4);

    $mergedRecords = array();
    while($row4 = $result4->fetch_assoc()){
        $mergedRecords[] = $row4; 
        $p_name = $row4['p_name']; // Assign p_name here
    }

    // Retrieving data from tbl_deworming
    $query = "SELECT * FROM tbl_deworming WHERE p_name=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $p_name);
    $stmt->execute();
    $result = $stmt->get_result();

    $resident = array();
	while($row = $result->fetch_assoc()){
		$resident[] = $row; 
	}

    // Retrieving data from tbl_distribution_of_vitamin
    $query2 = "SELECT * FROM tbl_distribution_of_vitamin WHERE p_name=?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("s", $p_name);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    $resident2 = array();
	while($row2 = $result2->fetch_assoc()){
		$resident2[] = $row2; 
	}

    // Retrieving data from tbl_operation_timbang
    $query3 = "SELECT * FROM tbl_operation_timbang WHERE p_name=?";
    $stmt3 = $conn->prepare($query3);
    $stmt3->bind_param("s", $p_name);
    $stmt3->execute();
    $result3 = $stmt3->get_result();

    $resident3 = array();
	while($row3 = $result3->fetch_assoc()){
		$resident3[] = $row3; 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Residents - Masili Health Service System</title>
</head>
<body>
	<div class="wrapper">
		<?php include 'templates/main-header.php' ?>
		<?php include 'templates/sidebar.php' ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row mt--2">
						<div class="col-md-12">
							<?php include 'templates/loading_screen.php' ?>
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">
											<h1>
                                            <a href="childrens-records.php" class="text-primary">RECORD</a> > <strong class="text-default">UPDATE</strong></h1>
										</div>
									</div>
								</div>
								<div class="card-body">
                                    <?php foreach($mergedRecords as $row4): ?>
                                        <form method="POST" action="childrens-records-update-action.php">
                                            <div class="card-head-row">
                                                <div style="text-align: center;">
                                                    <h2>
                                                        Patient Information
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="p_name">Patient Name</label>
                                                        <input type="text" class="form-control mb-1" id="p_name" name="p_name" value="<?= ucwords($row4['p_name']) ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name_parent">Parent Name</label>
                                                        <input type="text" class="form-control mb-1" id="name_parent" name="name_parent" value="<?= ucwords($row4['name_parent']) ?>" required>
                                                    </div>
													<div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control mb-1" id="address" name="address" value="<?= ucwords($row4['address']) ?>" required>
                                                    </div>
													<div class="form-group">
                                                        <label for="phone">Contact No.</label>
                                                        <input type="text" maxlength="11" onkeyup="numbersOnly(this)" class="form-control" id="phone" name="phone" value="<?= ucwords($row4['phone']) ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label>
                                                        <select class="form-control" id="gender" name="gender" value="<?= ucwords($row4['gender']) ?>" required>
                                                            <option selected="true" disabled="disabled">--</option>
                                                            <option value="MALE" <?="MALE" == $row4['gender'] ? ' selected="selected"' : '';?>>MALE</option>
                                                            <option value="FEMALE" <?="FEMALE" == $row4['gender'] ? ' selected="selected"' : '';?>>FEMALE</option>
                                                        </select>
                                                    </div>
													<div class="form-group">
                                                        <label>Birthdate</label>
                                                        <input type="date" class="form-control" name="birthdate" id="date" value="<?= ucwords($row4['birthdate']) ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="age">Age</label>
                                                        <input type="number" class="form-control" id="age" name="age" value="<?= ucwords($row4['age']) ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                        <?php foreach($resident as $row): ?>	
                                            <div class="card-head-row">
                                                <div style="text-align: center;">
                                                    <h2>
                                                        Deworming Details
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
													<div class="form-group">
                                                        <label for="dateofdeworming">Date</label>
                                                        <input type="date" class="form-control" id="phone" name="dateofdeworming" value="<?= ucwords($row['dateofdeworming']) ?>">
                                                    </div>
													<div class="form-group">
                                                        <label for="typeofdeworming">Type</label>
                                                        <input type="text" class="form-control mb-1" id="typeofdeworming" name="typeofdeworming" value="<?= isset($row['typeofdeworming']) ? ucwords($row['typeofdeworming']) : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
													<div class="form-group">
                                                        <label for="remarks_deworming">Remarks</label>
                                                        <input type="text" class="form-control mb-1" id="remarks_deworming" name="remarks_deworming" value="<?= isset($row['remarks']) ? ucwords($row2['remarks']) : '' ?>">
                                                    </div>
                                                    <input type="hidden" name="id" value="<?= ucwords($row['id']) ?>">
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                        <?php foreach($resident3 as $row3): ?>	
                                            <div class="card-head-row">
                                                <div style="text-align: center;">
                                                    <h2>
                                                        Operation Timbang Details
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
														<label for="weight">Weight (kg)</label>
														<input type="number" class="form-control" id="weight" name="weight" value="<?= ucwords($row3['weight']) ?>">
													</div>	
													<div class="form-group">
														<label for="height">Height (cm)</label>
														<input type="number" class="form-control" id="height" name="height" value="<?= ucwords($row3['height']) ?>">
													</div>
													<div class="form-group">
														<label for="nutritional_status">Nutritional Status</label>
														<select class="form-control" id="nutritional_status" name="nutritional_status" value="<?= ucwords($row['nutritional_status']) ?>">
															<option selected="true" disabled="disabled">--</option>
															<option value="NORMAL" <?="NORMAL" == $row3['nutritional_status'] ? ' selected="selected"' : '';?>>NORMAL</option>
															<option value="UNDERNUTRITION" <?="UNDERNUTRITION" == $row3['nutritional_status'] ? ' selected="selected"' : '';?>>UNDERNUTRITION</option>
															<option value="OVERNUTRITION" <?="OVERNUTRITION" == $row3['nutritional_status'] ? ' selected="selected"' : '';?>>OVERNUTRITION</option>
														</select>
													</div>
                                                </div>
                                                <div class="col-md-6">
													<div class="form-group">
                                                        <label>Date</label>
                                                        <input type="date" class="form-control" name="dateofopertimbang" id="dateofopertimbang" value="<?= ucwords($row3['dateofopertimbang']) ?>">
                                                    </div>
													<div class="form-group">
                                                    	<label for="remarks_timbang">Remarks</label>
                                                    	<input type="text" class="form-control" id="remarks_timbang" name="remarks_timbang" value="<?= isset($row3['remarks']) ? ucwords($row3['remarks']) : '' ?>">
                                                	</div>	
                                                    <input type="hidden" name="id" value="<?= ucwords($row3['id']) ?>">
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                        <?php foreach($resident2 as $row2): ?>
                                            <div class="card-head-row">
                                                <div style="text-align: center;">
                                                    <h2>
                                                        Distribution of Vitamin Details
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
														<label for="vitamin">Vitamin</label>
														<input type="text" class="form-control" id="vitamin" name="vitamin" value="<?= isset($row2['vitamin']) ? ucwords($row2['vitamin']) : '' ?>">
													</div>	
													<div class="form-group">
                                                        <label>Date</label>
                                                        <input type="date" class="form-control" name="dateofdisofvitamin" id="dateofdisofvitamin" value="<?= ucwords($row2['dateofdisofvitamin']) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
													<div class="form-group">
                                                    	<label for="remarks_vitamin">Remarks</label>
                                                    	<input type="text" class="form-control" id="remarks_vitamin" name="remarks_vitamin" value="<?= isset($row2['remarks']) ? ucwords($row2['remarks']) : '' ?>">
                                                	</div>	
                                                    <input type="hidden" name="id" value="<?= ucwords($row2['id']) ?>">
                                                </div>
                                            </div>									
											<div class="card-head-row">
												<div style="text-align: center;">
													<div class="form-group">
                                                    	<button type="submit" class="btn btn-primary mt-2 mb-2">Update</button>
                                                	</div>
												</div>
											</div>
                                        </form>
                                    <?php endforeach ?>
								</div>
								<!-- end of medicine table -->
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Main Footer -->
			<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->
			
		</div>
	</div>
	
	<?php include 'templates/footer.php' ?>
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>
	<style>
		.text-primary, .text-primary a{
			color: #1c9790 !important;
		}

		.btn-primary, .btn-primary:hover, .btn-primary:focus, .btn-primary:disabled{
			background: #1c9790 !important;
			border-color: #1c9790 !important;
		}

        .text-primary:hover, .text-primary a:hover{
			color: #1c9790 !important;
		}
	</style>
</body>
</html>
<?php include 'server/server.php' ?>
<?php 
    $id = $_GET["id"];
	$query = "SELECT * FROM tbl_pregnant WHERE id='$id'";
    $result = $conn->query($query);

    $resident = array();
	while($row = $result->fetch_assoc()){
		$resident[] = $row; 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Blood Pressure - Electronic Management Tool For HBW</title>
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
                                            <a href="pregnant.php" class="text-primary">RECORD</a> > <strong class="text-default">UPDATE</strong></h1>
										</div>
									</div>
								</div>
								<div class="card-body">
                                    <?php foreach($resident as $row): ?>
                                        <form method="POST" action="pregnant-update-record.php">
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
                                                        <label for="p_name">Name</label>
                                                        <input type="text" class="form-control mb-1" id="p_name" name="p_name" value="<?= ucwords($row['p_name']) ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Birthdate</label>
                                                        <input type="date" class="form-control" name="birthdate" id="date" value="<?= ucwords($row['birthdate']) ?>" required>
                                                    </div>
													<div class="form-group">
                                                        <label for="age">Age</label>
                                                        <input type="number" class="form-control" id="age" name="age" value="<?= ucwords($row['age']) ?>" required>
                                                    </div>
													<div class="form-group">
                                                        <label for="p_guardian_name">Guardian Name</label>
                                                        <input type="text" class="form-control mb-1" id="p_guardian_name" name="p_guardian_name" value="<?= ucwords($row['p_guardian_name']) ?>" required>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control mb-1" id="address" name="address" value="<?= ucwords($row['address']) ?>" required>
                                                    </div>
													<div class="form-group">
                                                        <label>Date of Last Menstrual Period</label>
                                                        <input type="date" class="form-control" name="lmp" id="lmp" value="<?= ucwords($row['lmp']) ?>" required>
                                                    </div>
													<div class="form-group">
                                                        <label>Estimated Due Date</label>
                                                        <input type="date" class="form-control" name="edd" id="edd" value="<?= ucwords($row['edd']) ?>" required>
                                                    </div>													                                                   													                                                  
                                                </div>
                                                <div class="col-md-6">
													<div class="form-group">
                                                        <label for="allergies">Allergies</label>
                                                        <input type="text" class="form-control mb-1" id="allergies" name="allergies" value="<?= ucwords($row['allergies']) ?>" required>
                                                    </div>
													<div class="form-group">
                                                        <label for="bloodtype">Blood Type</label>
                                                        <input type="text" class="form-control mb-1" id="bloodtype" name="bloodtype" value="<?= ucwords($row['bloodtype']) ?>" required>
                                                    </div> 
													<div class="form-group">
                                                        <label for="rhfactor">RH Factor</label>
                                                        <select class="form-control" id="rhfactor" name="rhfactor" value="<?= ucwords($row['rhfactor']) ?>" required>
                                                            <option selected="true" disabled="disabled">--</option>
                                                            <option value="POSITIVE" <?="POSITIVE" == $row['rhfactor'] ? ' selected="selected"' : '';?>>POSITIVE</option>
                                                            <option value="NEGATIVE" <?="NEGATIVE" == $row['rhfactor'] ? ' selected="selected"' : '';?>>NEGATIVE</option>
                                                        </select>
                                                    </div>                                               	
													<div class="form-group">
														<label for="sbp">Systolic Blood Pressure</label>
														<input type="number" class="form-control" id="sbp" name="sbp" value="<?= ucwords($row['sbp']) ?>" required>
													</div>	
													<div class="form-group">
														<label for="dbp">Diastolic Blood Pressure</label>
														<input type="number" class="form-control" id="dbp" name="dbp" value="<?= ucwords($row['dbp']) ?>" required>
													</div>	
                                                    <input type="hidden" name="id" value="<?= ucwords($row['id']) ?>">
                                                </div>
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
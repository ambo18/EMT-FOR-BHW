<?php include 'server/server.php' ?>
<?php 
	$query = "SELECT * FROM tbl_deworming ORDER BY id DESC";
    $result = $conn->query($query);

    $resident = array();
	while($row = $result->fetch_assoc()){
		$resident[] = $row; 
	}

	$query1 = "SELECT * FROM tbl_operation_timbang ORDER BY id DESC";
    $result1 = $conn->query($query1);

    $resident1 = array();
	while($row1 = $result1->fetch_assoc()){
		$resident1[] = $row1; 
	}

	$query3 = "SELECT * FROM tbl_distribution_of_vitamin ORDER BY id DESC";
    $result3 = $conn->query($query3);

    $resident3 = array();
	while($row3 = $result3->fetch_assoc()){
		$resident3[] = $row3; 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Deworming - Electronic Management Tool For HBW</title>
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
						<!-- action alert -->
						<?php if(isset($_SESSION['message'])): ?>
							<div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
								<?php echo $_SESSION['message']; ?>
							</div>
						<?php unset($_SESSION['message']); ?>
						<?php endif ?>
						<!-- end of action alert -->
                        <?php include 'templates/loading_screen.php' ?>
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
                                        <?php if(isset($_SESSION['username']) && $_SESSION['role']!='resident'): ?>
                                        <div class="card-tools" style="margin-left: 660px;">
                                                <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #FFFFFF;">Add Record</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="deworming-add.php">Deworming</a>
                                                    <a class="dropdown-item" href="oper-timbang-add.php">Operation Timbang</a>
                                                    <a class="dropdown-item" href="vitamin-add.php">Distribution Of Vitamin</a>
                                                </div>
                                            
                                        </div>
                                        <div class="card-tools">
                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">Export Records</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" onclick="Export()">Deworming Records</a>
                                                <a class="dropdown-item" onclick="Export2()">Operation Timbang Records</a>
                                                <a class="dropdown-item" onclick="Export3()">Distribution Of Vitamin Records</a>
                                            </div>
                                        </div>
                                        <?php endif?>
									</div>
								</div>
							</div>
                            <div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title text-primary">
											<h1>Deworming Records</h1>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="tblResident" class="display table">
											<thead>
												<tr class="text-primary">
													<th scope="col">Patient Name</th>
													<th scope="col">Parent Name</th>
													<th scope="col">Age</th>
													<th scope="col">Gender</th>
                                                    <th scope="col">Date</th>
													<th scope="col">Type</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
											<?php if(!empty($resident)): ?>
												<?php $no=1; foreach($resident as $row): ?>
													<tr>
														<td>
															<div class="avatar avatar-sm">
																<span class="avatar-title rounded-circle border border-white" style="background-color: lightseagreen"><?= ucwords(strtoupper($row['p_name'][0])) ?></span>
															</div>
															<?= ucwords(strtoupper($row['p_name'])) ?>
														</td>
														<td><?= $row['name_parent'] ?></td>
														<td><?= $row['age'] ?></td>
														<td><?= $row['gender'] ?></td>
														<td><?= $row['dateofdeworming'] ?></td>
														<td><?= $row['typeofdeworming'] ?></td>
														<td>
															<a href="deworming-update.php?id=<?= $row['id'] ?>" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Update">
																<i class="fa fa-edit mr-2"></i>
															</a>
														</td>
													</tr>
												<?php $no++; endforeach ?>
											<?php endif ?>

											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="card">
                                <div class="card-header">
									<div class="card-head-row">
										<div class="card-title text-primary">
											<h1>Operation Timbang Records</h1>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="tblResident2" class="display table">
											<thead>
												<tr class="text-primary">
													<th scope="col">Patient Name</th>
													<th scope="col">Parent Name</th>
													<th scope="col">Weight</th>
                                                    <th scope="col">Height</th>
													<th scope="col">Age</th>
													<th scope="col">Date</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
											<?php if(!empty($resident1)): ?>
												<?php $no1=1; foreach($resident1 as $row1): ?>
													<tr>
														<td>
															<div class="avatar avatar-sm">
																<span class="avatar-title rounded-circle border border-white" style="background-color: lightseagreen"><?= ucwords(strtoupper($row1['p_name'][0])) ?></span>
															</div>
															<?= ucwords(strtoupper($row1['p_name'])) ?>
														</td>
														<td><?= $row1['name_parent'] ?></td>
														<td><?= $row1['weight'] ?></td>
														<td><?= $row1['height'] ?></td>
														<td><?= $row1['age'] ?></td>
														<td><?= $row1['dateofopertimbang'] ?></td>
														<td>
															<a href="oper-timbang-update.php?id=<?= $row1['id'] ?>" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Update">
																<i class="fa fa-edit mr-2"></i>
															</a>
														</td>
													</tr>
												<?php $no1++; endforeach ?>
											<?php endif ?>

											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title text-primary">
											<h1>Distribution of Vitamin Records</h1>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="tblResident3" class="display table">
											<thead>
												<tr class="text-primary">
													<th scope="col">Patient Name</th>
													<th scope="col">Parent Name</th>
													<th scope="col">Birthdate</th>
													<th scope="col">Age</th>
                                                    <th scope="col">Vitamin</th>
													<th scope="col">Date</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
											<?php if(!empty($resident3)): ?>
												<?php $no3=1; foreach($resident3 as $row3): ?>
													<tr>
														<td>
															<div class="avatar avatar-sm">
																<span class="avatar-title rounded-circle border border-white" style="background-color: lightseagreen"><?= ucwords(strtoupper($row3['p_name'][0])) ?></span>
															</div>
															<?= ucwords(strtoupper($row3['p_name'])) ?>
														</td>
														<td><?= $row3['name_parent'] ?></td>
														<td><?= $row3['birthdate'] ?></td>
														<td><?= $row3['age'] ?></td>
														<td><?= $row3['vitamin'] ?></td>
														<td><?= $row3['dateofdisofvitamin'] ?></td>
														<td>
															<a href="vitamin-update.php?id=<?= $row3['id'] ?>" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Update">
																<i class="fa fa-edit mr-2"></i>
															</a>
														</td>
													</tr>
												<?php $no++; endforeach ?>
											<?php endif ?>

											</tbody>
										</table>
									</div>
								</div>
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
    <script>
        $(document).ready(function() {
            $('#tblResident').DataTable();
			$('#tblResident2').DataTable();
			$('#tblResident3').DataTable();
        });

        function Export(){
			// should have policy like 2 weeks retention of records and scope for export to csv
			var conf = confirm("Export Deworming Records to CSV?");
			var stmt = "SELECT p_name,name_parent,address,birthdate,age,gender,dateofdeworming,typeofdeworming,phone,remarks FROM tbl_deworming";
			var tblHeader = 'Patient Name,Parent Name,Address,Birth Date,Age,Gender,Date Of Deworming,Type Of Deworming,Contact Number,Remarks';
			var fileName = "Deworming Records";
			if(conf){
				window.open(`export.php?query=${stmt}&tblHeader=${tblHeader}&fileName=${fileName}`, '_blank');
			}
		}

        function Export2(){
			// should have policy like 2 weeks retention of records and scope for export to csv
			var conf = confirm("Export Operation Timbang Records to CSV?");
			var stmt = "SELECT p_name,name_parent,address,birthdate,age,gender,weight,height,nutritional_status, dateofopertimbang,phone,remarks FROM tbl_operation_timbang";
			var tblHeader = 'Patient Name,Parent Name,Address,Birth Date,Age,Gender,Weight,Height,Nutritional Status,Date,Contact Number,Remarks';
			var fileName = "Operation Timbang Records";
			if(conf){
				window.open(`export.php?query=${stmt}&tblHeader=${tblHeader}&fileName=${fileName}`, '_blank');
			}
		}

        function Export3(){
			// should have policy like 2 weeks retention of records and scope for export to csv
			var conf = confirm("Export Distribution of Vitamin to CSV?");
			var stmt = "SELECT p_name,name_parent,address,birthdate,age,gender,vitamin,phone,remarks FROM tbl_operation_timbang";
			var tblHeader = 'Patient Name,Parent Name,Address,Birth Date,Age,Gender,Vitamin,Contact Number,Remarks';
			var fileName = "Distribution Of Vitamin Records";
			if(conf){
				window.open(`export.php?query=${stmt}&tblHeader=${tblHeader}&fileName=${fileName}`, '_blank');
			}
		}
    </script>
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
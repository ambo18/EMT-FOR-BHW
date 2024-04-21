<?php include 'server/server.php' ?>
<?php 	
	// total deworming records
	$stmtDewormingTotal 	= "SELECT COUNT(*) AS count FROM tbl_deworming";
    $dewormingTotal 	= $conn->query($stmtDewormingTotal);
	$totalDeworming = $dewormingTotal->fetch_assoc();

	// total operation timbang records
	$stmtOperTimTotal 	= "SELECT COUNT(*) AS count FROM tbl_operation_timbang";
    $OperTimTotal 	= $conn->query($stmtOperTimTotal);
	$totalOperTim = $OperTimTotal->fetch_assoc();

	// total medicine available
	$stmtMedicine = "SELECT generic_name, SUM(quantity) AS total_quantity_medicine FROM tbl_medicine GROUP BY generic_name";
    $resultMedicine = $conn->query($stmtMedicine);
	
	// total medical supply available
	$stmtMedicalSupplyAvailable 	= "SELECT supply_name, SUM(quantity) AS total_quantity_supply FROM tbl_medical_supply GROUP BY supply_name";
    $resultSupply 	= $conn->query($stmtMedicalSupplyAvailable);

	// total distribution of vitamins records
	$stmtDisVitTotal 	= "SELECT COUNT(*) AS count FROM tbl_distribution_of_vitamin";
    $DisVitTotal 	= $conn->query($stmtDisVitTotal);
	$totalDisVit = $DisVitTotal->fetch_assoc();

	// total of blood presure records
	$stmtBloodPressureTotal 	= "SELECT COUNT(*) AS count FROM tbl_bp";
    $BloodPressureTotal 	= $conn->query($stmtBloodPressureTotal);
	$totalBloodPressure = $BloodPressureTotal->fetch_assoc();

	// total of pregnant records
	$stmtPregnantTotal 	= "SELECT COUNT(*) AS count FROM tbl_pregnant";
    $PregnantTotal 	= $conn->query($stmtPregnantTotal);
	$totalPregnant = $PregnantTotal->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<style>
		.row {
			overflow-x: auto;
		}
	</style>
	<title>Dashboard - Electronic Management Tool For Barangay Health Workers</title>
</head>
<body>
	<div class="wrapper">
		<?php include 'templates/main-header.php' ?>
		<?php include 'templates/sidebar.php' ?>
		
		<div class="main-panel">
			<div class="content">
				<div class="page-inner mt--2">
					
					<!-- login alert -->
					<?php if(isset($_SESSION['message'])): ?>
						<div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
							<?php echo $_SESSION['message']; ?>
						</div>
					<?php unset($_SESSION['message']); ?>
					<?php endif ?>
					<!-- end of login alert -->
					
					
					<!-- analytics -->
						<h3>Medical Consumables</h3>
						<div class="row">
							<div class="d-flex p-3 flex-row ">
								<?php while ($row = $resultMedicine->fetch_assoc()): ?>
								<div class="card text-center mr-3" style="width: 15rem;">
									<div class="card-header card-info">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $row['total_quantity_medicine']; ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title">
											<strong><?php echo $row['generic_name']; ?></strong>
										</h5>
										<p class="card-text">Total no. of <?php echo $row['generic_name']; ?> available in the barangay.</p>
										<a href="medicine.php" class="btn btn-info btn-sm">View Details</a>
									</div>
								</div>
								<?php endwhile; ?>
								<?php while ($row = $resultSupply->fetch_assoc()): ?>
								<div class="card text-center mr-3" style="width: 15rem;">
									<div class="card-header card-warning">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $row['total_quantity_supply']; ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title text-default">
											<strong><?php echo $row['supply_name']; ?></strong>
										</h5>
										<p class="card-text">Total no. of <?php echo $row['supply_name']; ?> available in the barangay.</p>
										<a href="supplies.php" class="btn btn-warning btn-sm">View Details</a>
									</div>
								</div>
								<?php endwhile; ?>
							</div>
						</div>

						<h3>For Children</h3>
						<div class="row">
							<div class="d-flex p-3 flex-row ">
								<div class="card text-center mr-3" style="width: 15rem;">
									<div class="card-header card-default">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalDisVit['count']>0?$totalDisVit['count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title text-default">
											<strong>DISTRIBUTION OF VITAMINS RECORDS</strong>
										</h5>
										<p class="card-text">Total no. of distribution of vitamins in the barangay.</p>
										<a href="vitamin.php" class="btn btn-default btn-sm">View Details</a>
									</div>
								</div>
								<div class="card text-center mr-3 " style="width: 15rem;">
									<div class="card-header card-success">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalDeworming['count']?$totalDeworming['count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title">
											<strong>DEWORMING RECORDS</strong>
										</h5>
										<p class="card-text">Total no. of deworming records in the barangay.</p>
										<a href="deworming.php" class="btn btn-success btn-sm">View Details</a>
									</div>
								</div>
								<div class="card text-center mr-3 " style="width: 15rem;">
									<div class="card-header card-danger">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalOperTim['count']?$totalOperTim['count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title">
											<strong>OPERATION TIMBANG RECORDS</strong>
										</h5>
										<p class="card-text">Total no. of operation timbang records in the barangay.</p>
										<a href="oper-timbang.php" class="btn btn-danger btn-sm">View Details</a>
									</div>
								</div>
							</div>
						</div>
						
						<h3>For Adult</h3>
						<di class="row">
							<div class="d-flex p-3 flex-row ">
								<div class="card text-center mr-3 " style="width: 15rem;">
									<div class="card-header card-primary">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalBloodPressure['count']?$totalBloodPressure['count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title">
											<strong>BLOOD PRESSURE RECORDS</strong>
										</h5>
										<p class="card-text">Total no. of blood pressure records in the barangay.</p>
										<a href="bp.php" class="btn btn-primary btn-sm">View Details</a>
									</div>
								</div>
							</div>
						</di>

						<h3>For Pregnants</h3>
						<div class="row">
							<div class="d-flex p-3 flex-row">
								<div class="card text-center mr-3 " style="width: 15rem;">
									<div class="card-header card-secondary">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalPregnant['count']?$totalPregnant['count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title">
											<strong>PREGNANT RECORDS</strong>
										</h5>
										<p class="card-text">Total no. of pregnant records in the barangay.</p>
										<a href="pregnant.php" class="btn btn-secondary btn-sm">View Details</a>
									</div>
								</div>
							</div>
						</div>

					<!-- end of analytics -->


				</div>
			</div>
			<!-- Main Footer -->
				<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->
		</div>
		
	</div>
	<?php include 'templates/footer.php' ?>
</body>
</html>
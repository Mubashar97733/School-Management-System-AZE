<?php include("src/include/function.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
	<link rel="stylesheet" href="crc/plugins/simple-datatables/style.css">


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
</head>

<?php
if(isset($_SESSION['name'])){
	?>
	<body>
	<?php
		include("src/include/preloader.php");
		include("src/include/header.php");
	?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<?php
							$data = array("Students", "Home", "dashboard.php", "Student List");
							breadcrumb($data);
							?>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary" href="create-student.php" role="button">
									New Admission
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Responsive tables Start -->
				<div class="pd-20 card-box mb-30">
					<h5 class="h4 text-blue mb-20 pt-20 pb-20 text-center">Students Record</h5>
					<div class="tab">
						<ul class="nav nav-tabs nav-fill" role="tablist">
							<?php
							for ($i = -2; $i <= 8; $i++) {
							?>
								<li class="nav-item">
									<a class="nav-link text-blue <?php if ($i == -2) {
																		echo "active";
																	} ?>" data-toggle="tab" href="#<?php echo classes($i); ?>" role="tab" aria-selected="true"><?php echo classes($i); ?></a>
								</li>
							<?php
							}
							?>
						</ul>
						<div class="tab-content">
							<?php
							for ($i = -2; $i <= 8; $i++) {
							?>
								<div class="tab-pane fade <?php if ($i == -2) {
																echo "active show";
															} ?>" id="<?php echo classes($i); ?>" role="tabpanel">
									<div class="pd-20">
										<div class="table-responsive pt-30">
											<?php
											$condition = array(
												"st_campus" => $_SESSION["campus"],
												"st_class" => classes($i)
											);
											$data = display_where("student", $condition);
											if ($data) {
											?>
												<table class="table table-hover data-table">
													<thead>
														<tr>
															<th scope="col">No</th>
															<th scope="col">Name</th>
															<th scope="col">Status</th>
															<th scope="col">Action</th>
														</tr>
													</thead>
													<tbody class="user-table">
														<?php
														$no = 1;
														foreach ($data as $result) {
														?>
															<tr class="<?php echo $result['st_id']; ?>">
																<th><?php echo $no;
																	$no++; ?></th>
																<td><?php echo $result['st_name']; ?></td>
																<td><?php echo $result['st_phone']; ?></td>
																<td><?php echo $result['st_sex']; ?></td>
																<td>
																	<div class="dropdown">
																		<a class="btn btn-info dropdown-toggle" href="#" role="button" data-toggle="dropdown">
																			Action
																		</a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a href="student-fee.php?fee=<?php echo $result['st_id']; ?>" class="dropdown-item">Fee Table</a>
																			<?php
																			if ($result['st_leave_status'] == "0") {
																			?>
																				<a href="create-student.php?edit-student=<?php echo $result['st_id']; ?>" class="dropdown-item">Edit</a>
																				<a href="create-student.php?leave-student=<?php echo $result['st_id']; ?>" class="dropdown-item">Leave</a>
																			<?php
																			}
																			?>
																		</div>
																	</div>

																</td>
															</tr>
														<?php
														}
														?>
													</tbody>
												</table>
											<?php
											} else {
												echo '<div class="alert alert-danger text-center py-4">';
												echo 'No Student Found of ' . classes($i);
												echo '</div>';
											}
											?>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<!-- Responsive tables End -->
			</div>
			<?php include("src/include/footer.php"); ?>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/scripts/custom.js"></script>
	<script src="src/plugins/simple-datatables.js"></script>
	<script src="src/scripts/sweetalert.js"></script>
	<!-- Datatable Setting js -->
</body>
<?php
}else{
	include("login.php");
}
?>

</html>
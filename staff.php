<?php include ("src/include/function.php"); ?>

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
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
		rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
</head>

<body>
	<?php
	if (isset($_SESSION['name'])) {
		include("src/include/preloader.php");
		include ("src/include/header.php");
		?>
		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<?php
								$data = array("Staff", "Home", "dashboard.php", "Staff's List");
								breadcrumb($data);
								?>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
									<a class="btn btn-primary" href="create-staff.php" role="button">
										Add New Staff
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Responsive tables Start -->
					<div class="pd-20 card-box mb-30">
						<div class="clearfix mb-20 pt-3 pb-3 text-center">
							<h4 class="text-blue h4">Staff's List</h4>
						</div>
						<div class="" id="user_data">
							<?php
							$condition = array(
								"s_campus" => $_SESSION["campus"]
							);
							$data = display_where("staff", $condition);
							if ($data) {
								?>
								<table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline">
									<thead>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Name</th>
											<th scope="col">Status</th>
											<th scope="col">Phone</th>
											<th scope="col">Gender</th>
											<th scope="col">Pay</th>
											<th scope="col">Education</th>
											<th scope="col">Post</th>
											<th scope="col">Joining Date</th>
											<th scope="col">Leave Date</th>
											<th scope="col">Leave Reason</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody class="user-table">
										<?php
										$no = 1;
										foreach ($data as $result) {
											?>
											<tr class="<?php echo $result['s_id']; ?>">
												<th><?php echo $no;
												$no++; ?></th>
												<td><?php echo $result['s_name']; ?></td>
												<td><?php if($result['s_leave_status']=="0"){ ?><span class="badge badge-success">Active</span><?php }else{ ?><span class="badge badge-danger">Leave</span><?php } ?></td>
												<td><?php echo $result['s_phone']; ?></td>
												<td><?php echo $result['s_sex']; ?></td>
												<td><?php echo $result['s_pay']; ?></td>
												<td><?php echo $result['s_edu']; ?></td>
												<td><span class="badge <?php staff_post_badge($result['s_post']) ?>"><?php echo staff_post($result['s_post']); ?></span>
												</td>
												<td><?php echo $result['s_join_date']; ?></td>
												<td><?php if ($result['s_leave_date'] == NULL) {
													echo "****";
												} else {
													echo $result['s_leave_date'];
												} ?>
												</td>
												<td><?php if ($result['s_leave_reason'] == NULL) {
													echo "****";
												} else {
													echo $result['s_leave_reason'];
												} ?>
												</td>
												<td>
													<div class="dropdown">
														<a class="btn btn-info dropdown-toggle" href="#" role="button"
															data-toggle="dropdown">
															Action
														</a>
														<div class="dropdown-menu dropdown-menu-right">
															<a href="staff-salery.php?salery=<?php echo $result['s_id']; ?>"
																class="dropdown-item">Salery Table</a>
															<?php
															if($result['s_leave_status']=="0"){
																?>
																<a href="staff-salery.php?pay-salery=<?php echo $result['s_id']; ?>"
																class="dropdown-item">Pay Salery</a>
																<a href="create-staff.php?edit-staff=<?php echo $result['s_id']; ?>"
																class="dropdown-item">Edit</a>
																<a href="create-staff.php?leave-staff=<?php echo $result['s_id']; ?>"
																class="dropdown-item">Leave </a>
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
							}else{
								?>
								<div class="alert alert-danger text-center p-4">
									<stronge style="font-weight: 600;">No Record Found!</stronge>
								</div>
								<?php
							}
							?>
						</div>
					</div>
					<!-- Responsive tables End -->
				</div>
				<?php include ("src/include/footer.php"); ?>
			</div>
		</div>
		<?php
	} else {
		include ("src/include/404.php");
	}
	?>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/scripts/custom.js"></script>
	<script src="src/scripts/sweetalert.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script></body>
</body>

</html>
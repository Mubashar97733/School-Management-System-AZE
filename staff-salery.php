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
		include("src/include/header.php");
		if (isset($_REQUEST['salery'])) {
			$salery = $_REQUEST['salery'];
			$con = array(
				"s_id" => $salery
			);
			$staff = display_where("staff", $con);
			$staff_detail = "";
			if ($staff) {
				foreach ($staff as $staff) {
					$staff_detail = $staff;
				}
			}
			?>
			<div class="main-container">
				<div class="pd-ltr-20 xs-pd-20-10">
					<div class="min-height-200px">
						<div class="page-header">
							<?php include("src/include/staff-salery-head.php"); ?>
						</div>
						<!-- Responsive tables Start -->
						<div class="pd-20 card-box mb-30">
							<div class="clearfix mb-20 pt-3 pb-3 text-center">
								<h3 class="text-primary h3"><?php echo $staff_detail['s_name'] . "'s Salery From (" . month($staff_detail['s_join_month']) . "-" . $staff_detail['s_join_year'] . ") to (";
															if ($staff_detail['s_leave_date'] == NULL) {
																echo date('F-Y') . ")";
															} else {
																echo month($staff_detail['s_leave_month']) . "-" . $staff_detail['s_leave_year'] . ")";
															}; ?></h3>
							</div>
							<div class="" id="user_data">
								<?php
								$condition = array(
									"s_id" => $salery,
									"sp_campus" => $_SESSION['campus'],

								);
								$data = display_where("staff_pay", $condition);
								if ($data) {
								?>
									<table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline" data-order='[[ 0, "desc" ]]' data-page-length='25'>
										<thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col">Name</th>
												<th scope="col">Status</th>
												<th scope="col">Salery Month</th>
												<th scope="col">Payable Amount</th>
												<th scope="col">Pay</th>
												<th scope="col">Dectution</th>
												<th scope="col">Reason</th>
												<th scope="col">Date</th>
												<?php
												if (!$staff_detail['s_leave_status']) {
													echo '<th scope="col">Action</th>';
												}
												?>
											</tr>
										</thead>
										<tbody class="user-table">
											<?php
											$no = 1;
											foreach ($data as $result) {
											?>
												<tr class="<?php echo $result['sp_id']; ?>">
													<th><?php echo $no;
														$no++; ?></th>
													<td><?php echo $staff_detail['s_name']; ?></td>
													<td><?php if ($staff_detail['s_leave_status'] == "0") { ?><span class="badge badge-success">Active</span><?php } else { ?><span class="badge badge-danger">Leave</span><?php } ?></td>
													<td><span class="badge badge-warning"><?php echo month($result['sp_month']) . "-" . $result['sp_year']; ?></span></td>
													<td><?php echo $result['sp_payable']; ?></td>
													<td><?php echo $result['sp_pay']; ?></td>
													<td><?php echo $result['sp_det']; ?></td>
													<td><?php echo $result['sp_det_reason']; ?></td>
													<td><?php echo $result['sp_date']; ?></td>
													<?php
													if (!$staff_detail['s_leave_status']) {
													?>
														<td>
															<div class="dropdown">
																<a class="btn btn-info dropdown-toggle" href="#" role="button" data-toggle="dropdown">
																	Action
																</a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a href="pay-salery.php?edit-salery=<?php echo $result['sp_id']; ?>" class="dropdown-item">Edit</a>
																	<a href="#" onclick="delete_staff_pay(<?php echo $result['sp_id']; ?>)" class="dropdown-item text-danger">Delete</a>
																</div>
															</div>
														</td>
													<?php
													}
													?>
												</tr>
											<?php
											}
											?>
										</tbody>
									</table>
								<?php
								} else {
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
					<?php include("src/include/footer.php"); ?>
				</div>
			</div>
			<?php
		} else if (isset($_REQUEST['pay-salery'])) {
			$salery = array(
				"s_id" => $_REQUEST['pay-salery']
			);
			$staff = display_where("staff", $salery);
			$staff_detail = "";
			if ($staff) {
				foreach ($staff as $staff) {
					$staff_detail = $staff;
				}
			}
			?>
			<div class="main-container">
				<div class="pd-ltr-20 xs-pd-20-10">
					<div class="min-height-200px">
						<!-- <div class="page-header">
							<?php include("src/include/staff-salery-head.php"); ?>
						</div> -->
						<!-- Responsive tables Start -->
						<div class="pd-20 card-box mb-30">
							<div class="clearfix">
								<div class="text-center pb-3">
									<h4 class="text-blue h4 pt-3">Staff Pay (<?php echo $staff_detail["s_name"]; ?>)</h4>
									<p class="mb-30"></p>
								</div>
							</div>
							<form id="pay_staff" method="post">
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Name</label>
											<div class="col-sm-12 col-md-9">
												<input type="text" class="form-control" value="<?php echo $staff_detail['s_name']; ?>" disabled required>
											</div>
										</div>
										<div class="form-group row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Salery</label>
											<div class="col-sm-12 col-md-9">
												<input type="number"  value="<?php echo $staff_detail['s_pay']; ?>" class="form-control sp_payable" disabled required>
											</div>
										</div>
										<div class="form-group row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Amount Paid</label>
											<div class="col-sm-12 col-md-9">
												<input type="number" min="0" max="<?php echo $staff_detail['s_pay']; ?>" class="form-control sp_pay" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Detucted Amount</label>
											<div class="col-sm-12 col-md-9">
												<input type="number" min="0" max="<?php echo $staff_detail['s_pay']; ?>" class="form-control sp_det" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Detuction Reason</label>
											<div class="col-sm-12 col-md-9">
												<input type="text" class="form-control sp_det_reason" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Date</label>
											<div class="col-sm-12 col-md-9">
												<input type="date" value="<?php echo date('d-m-Y'); ?>" class="form-control sp_date" disabled required>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 text-center">
										<div class="leave_staff"></div>
										<button type="submit" class="btn btn-primary">Resign</button>
									</div>
								</div>
							</form>
							<script>
								const ls = document.getElementById('leave_staff');
								ls.addEventListener('submit', (event) => {
									event.preventDefault();
									leave_staff(<?php echo $result['s_id']; ?>);
								})
							</script>
						</div>
						<!-- Responsive tables End -->
					</div>
					<?php include("src/include/footer.php"); ?>
				</div>
			</div>
			<?php
		} else if (isset($_REQUEST['edit-salery'])) {
			echo "Edit Salery";
		}
	} else {
		include("src/include/404.php");
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
	<script src="vendors/scripts/datatable-setting.js"></script>
</body>
</body>

</html>
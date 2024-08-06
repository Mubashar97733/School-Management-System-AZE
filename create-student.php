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
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
</head>

<body>
	<?php
	if (isset($_SESSION['name'])) {
		include ("src/include/preloader.php");
		include ("src/include/header.php");
		?>
		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<?php
								$data = array("Staff", "Home", "dashboard.php", "Add New Staff");
								breadcrumb($data);
								?>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
									<a class="btn btn-primary" href="staff.php" role="button">
										Staff List
									</a>
								</div>
							</div>
						</div>
					</div>

					<!-- Input Validation Start -->
					<?php
					if (isset($_REQUEST['edit-staff'])) {
						$condition = array(
							's_id' => $_REQUEST['edit-staff'],
							's_campus' => $_SESSION['campus'],
						);
						$data = display_where('staff', $condition);
						if ($data) {
							foreach ($data as $result) {
								?>
								<div class="pd-20 card-box mb-30">
									<div class="clearfix">
										<div class="text-center pb-3">
											<h4 class="text-blue h4 pt-3">Edit Student</h4>
											<p class="mb-30"></p>
										</div>
									</div>
									<form id="edit_staff" method="post">
										<div class="row">
											<div class="col-md-6 col-sm-12">
												<div class="form-group row">
													<label class="form-control-label col-sm-12 col-md-3 col-form-label">Name</label>
													<div class="col-sm-12 col-md-9">
														<input type="text" class="form-control s_name" required
															value="<?php echo $result['s_name']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="form-control-label col-sm-12 col-md-3 col-form-label">Phone</label>
													<div class="col-sm-12 col-md-9">
														<input type="number" class="form-control s_phone" required
														value="<?php echo $result['s_phone']; ?>">
													</div>
												</div>
												<div class="form-group  row">
													<label class="form-control-label col-sm-12 col-md-3 col-form-label">Gender</label>
													<div class="col-sm-12 col-md-9">
														<select name="" id="" class="form-control s_sex" required>
															<option value="Male" <?php if($result['s_sex']=="Male"){ echo "selected"; } ?>>Male</option>
															<option value="Female" <?php if($result['s_sex']=="Female"){ echo "selected"; } ?>>Female</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="form-control-label col-sm-12 col-md-3 col-form-label">Joining
														Date</label>
													<div class="col-sm-12 col-md-9">
														<input type="date" class="form-control s_join_date" required value="<?php echo $result['s_join_date']; ?>">
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="form-group row">
													<label class="form-control-label col-sm-12 col-md-3 col-form-label">Pay</label>
													<div class="col-sm-12 col-md-9">
														<input type="number" class="form-control s_pay" required value="<?php echo $result['s_pay']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label
														class="form-control-label col-sm-12 col-md-3 col-form-label">Education</label>
													<div class="col-sm-12 col-md-9">
														<select name="" id="" class="form-control s_edu" required>
															<option value="" selected disabled>Select One</option>
															<option value="Middle" <?php if($result['s_edu']=="Middle"){ echo "selected"; } ?>>Middle</option>
															<option value="Matric" <?php if($result['s_edu']=="Matric"){ echo "selected"; } ?>>Matric</option>
															<option value="Inter" <?php if($result['s_edu']=="Inter"){ echo "selected"; } ?>>Inter</option>
															<option value="Graduation" <?php if($result['s_edu']=="Graduation"){ echo "selected"; } ?>>Graduation</option>
															<option value="Masters" <?php if($result['s_edu']=="Masters"){ echo "selected"; } ?>>Masters</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="form-control-label col-sm-12 col-md-3 col-form-label">Job Post</label>
													<div class="col-sm-12 col-md-9">
														<select name="" id="" class="form-control s_post" required>
															<option value="" selected disabled>Select One</option>
															<option value="Principal" <?php if($result['s_post']=="Principal"){ echo "selected"; } ?>>Principal</option>
															<option value="Vice Principal" <?php if($result['s_post']=="Vice Principal"){ echo "selected"; } ?>>Vice Principal</option>
															<option value="Head Teacher" <?php if($result['s_post']=="Head Teacher"){ echo "selected"; } ?>>Head Teacher</option>
															<option value="Teacher" <?php if($result['s_post']=="Teacher"){ echo "selected"; } ?>>Teacher</option>
															<option value="Coordinator" <?php if($result['s_post']=="Coordinator"){ echo "selected"; } ?>>Coordinator</option>
															<option value="Guard" <?php if($result['s_post']=="Guard"){ echo "selected"; } ?>>Guard</option>
															<option value="Sweeper" <?php if($result['s_post']=="Sweeper"){ echo "selected"; } ?>>Sweeper</option>
															<option value="Helper" <?php if($result['s_post']=="Helper"){ echo "selected"; } ?>>Helper</option>
															<option value="Mad" <?php if($result['s_post']=="Mad"){ echo "selected"; } ?>>Mad</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="form-control-label col-sm-12 col-md-3 col-form-label">Joining Time</label>
													<div class="col-sm-12 col-md-9">
														<select name="" id="" class="form-control s_joining" required>
															<option value="" selected disabled>Select One</option>
															<option value="1st Time" <?php if($result['s_joining']=="1st Time"){ echo "selected"; } ?>>1st Time</option>
															<option value="2nd Time" <?php if($result['s_joining']=="2nd Time"){ echo "selected"; } ?>>2nd Time</option>
															<option value="3rd Time" <?php if($result['s_joining']=="3rd Time"){ echo "selected"; } ?>>3rd Time</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12 text-center">
												<div class="edit_staff"></div>
												<button type="submit" class="btn btn-primary">Edit</button>
											</div>
										</div>
									</form>
									<script>
										const es = document.getElementById('edit_staff');
										es.addEventListener('submit', (event) => {
											event.preventDefault();
											edit_staff(<?php echo $result['s_id']; ?>);
										})
									</script>
								</div>
								<?php
							}
						}
					} else {
						?>
						<div class="pd-20 card-box mb-30">
							<div class="clearfix">
								<div class="text-center pb-3">
									<h4 class="text-blue h4 pt-3">Add Student</h4>
									<p class="mb-30"></p>
								</div>
							</div>
							<form id="create_student-short" method="post">
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Name</label>
											<div class="col-sm-12 col-md-9">
												<input type="text" class="form-control st_name" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Phone</label>
											<div class="col-sm-12 col-md-9">
												<input type="number" class="form-control st_phone" required>
											</div>
										</div>
										<div class="form-group  row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Gender</label>
											<div class="col-sm-12 col-md-9">
												<select name="" id="" class="form-control st_sex" required>
													<option value="Male">Male</option>
													<option value="Female" selected>Female</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Pay</label>
											<div class="col-sm-12 col-md-9">
												<input type="number" class="form-control s_pay" required placeholder="5000">
											</div>
										</div>
										<div class="form-group row">
											<label
												class="form-control-label col-sm-12 col-md-3 col-form-label">Class</label>
											<div class="col-sm-12 col-md-9">
												<select name="" id="" class="form-control s_edu" required>
													<option value="" selected disabled>Select One</option>
													<?php
													for($i=-2; $i<=8; $i++){
														echo '<option value='.classes($i).'>'.classes($i).'</option>';
													}
													?>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Job Post</label>
											<div class="col-sm-12 col-md-9">
												<select name="" id="" class="form-control s_post" required>
													<option value="" selected disabled>Select One</option>
													<option value="Principal">Principal</option>
													<option value="Vice Principal">Vice Principal</option>
													<option value="Head Teacher">Head Teacher</option>
													<option value="Teacher">Teacher</option>
													<option value="Coordinator">Coordinator</option>
													<option value="Guard">Guard</option>
													<option value="Sweeper">Sweeper</option>
													<option value="Helper">Helper</option>
													<option value="Mad">Mad</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Joining Time</label>
											<div class="col-sm-12 col-md-9">
												<select name="" id="" class="form-control s_joining" required>
													<option value="" selected disabled>Select One</option>
													<option value="1st Time">1st Time</option>
													<option value="2nd Time">2nd Time</option>
													<option value="3rd Time">3rd Time</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 text-center">
										<div class="create_staff"></div>
										<button type="submit" class="btn btn-primary">Create</button>
									</div>
								</div>
							</form>
							<script>
								const cs = document.getElementById('create_staff');
								cs.addEventListener('submit', (event) => {
									event.preventDefault();
									create_staff();
								})
							</script>
						</div>
						<?php
					}
					?>
					<!-- Input Validation End -->
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
</body>

</html>
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


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
</head>
<?php
if (isset($_SESSION['name'])) {
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
								$data = array("Users", "Home", "dashboard.php", "Add New User");
								breadcrumb($data);
								?>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
									<a class="btn btn-primary" href="user.php" role="button">
										User List
									</a>
								</div>
							</div>
						</div>
					</div>

					<!-- Input Validation Start -->
					<?php
					if (isset($_REQUEST['edit-user'])) {
						$condition = array(
							'u_id' => $_REQUEST['edit-user'],
							'u_campus' => $_SESSION['campus'],
						);
						$data = display_where('user', $condition);
						if ($data) {
							foreach ($data as $result) {
								?>
								<div class="pd-20 card-box mb-30">
									<div class="clearfix">
										<div class="text-center pb-3">
											<h4 class="text-blue h4 pt-3">Edit User</h4>
											<p class="mb-30"></p>
										</div>
									</div>
									<form id="edit_user" method="post">
										<div class="row">
											<div class="col-md-6 col-sm-12">
												<div class="form-group row">
													<label class="form-control-label col-sm-12 col-md-3 col-form-label">Name</label>
													<div class="col-sm-12 col-md-9">
														<input type="text" class="form-control u_name" required value="<?php echo $result['u_name']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="form-control-label col-sm-12 col-md-3 col-form-label">Phone</label>
													<div class="col-sm-12 col-md-9">
														<input type="number" class="form-control u_phone" required value="<?php echo $result['u_phone']; ?>">
													</div>
												</div>
												<div class="form-group  row">
													<label class="form-control-label col-sm-12 col-md-3 col-form-label">Gender</label>
													<div class="col-sm-12 col-md-9">
														<select name="" id="" class="form-control u_sex">
															<option value="Male" <?php if ($result['u_sex'] == "Male") { echo "selected"; } ?>>Male</option>
															<option value="Female" <?php if ($result['u_sex'] == "Female") { echo "selected"; } ?>>Female</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="form-group row">
													<label class="form-control-label col-sm-12 col-md-3 col-form-label">Status</label>
													<div class="col-sm-12 col-md-9">
														<select name="" id="" class="form-control u_status">
															<?php
															$select_option = display("user_status");
															foreach($select_option as $select_options){
																?>
																<option value="<?php echo $select_options['us_id']; ?>" <?php if ($result['u_status'] == $select_options['us_id']) { echo "selected"; } ?>><?php echo $select_options['us_status']; ?></option>
																<?php
															}
															?>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="form-control-label col-sm-12 col-md-3 col-form-label">Username</label>
													<div class="col-sm-12 col-md-9">
														<input type="text" class="form-control u_un" required value="<?php echo $result['u_un']; ?>">
													</div>
												</div>
												<div class="form-group  row">
													<label class="form-control-label col-sm-12 col-md-3 col-form-label">Password</label>
													<div class="col-sm-12 col-md-9">
														<input type="password" class="form-control u_pass" required value="<?php echo $result['u_pass']; ?>">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12 text-center">
												<div class="edit_user"></div>
												<button type="submit" class="btn btn-primary">Edit</button>
											</div>
										</div>
									</form>
									<script>
										const eu = document.getElementById('edit_user');
										eu.addEventListener('submit', (event) => {
											event.preventDefault();
											edit_user(<?php echo $result['u_id']; ?>);
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
									<h4 class="text-blue h4 pt-3">Add User</h4>
									<p class="mb-30"></p>
								</div>
							</div>
							<form id="create_user" method="post">
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Name</label>
											<div class="col-sm-12 col-md-9">
												<input type="text" class="form-control u_name" required placeholder="Mubashar Ahmad">
											</div>
										</div>
										<div class="form-group row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Phone</label>
											<div class="col-sm-12 col-md-9">
												<input type="number" class="form-control u_phone" required placeholder="03048616865">
											</div>
										</div>
										<div class="form-group  row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Gender</label>
											<div class="col-sm-12 col-md-9">
												<select name="" id="" class="form-control u_sex">
													<option value="" selected disabled>Select One</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Status</label>
											<div class="col-sm-12 col-md-9">
												<select name="" id="" class="form-control u_status">
													<option value="" selected disabled>Select One</option>
													<?php
													$status_option = display('user_status');
													foreach ($status_option as $status_options) {
													?>
														<option value="<?php echo $status_options['us_id']; ?>"><?php echo $status_options['us_status']; ?></option>
													<?php
													}
													?>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Username</label>
											<div class="col-sm-12 col-md-9">
												<input type="text" class="form-control u_un" required placeholder="mubashar123">
											</div>
										</div>
										<div class="form-group  row">
											<label class="form-control-label col-sm-12 col-md-3 col-form-label">Password</label>
											<div class="col-sm-12 col-md-9">
												<input type="password" class="form-control u_pass" required placeholder="*********">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 text-center">
										<div class="create_user"></div>
										<button type="submit" class="btn btn-primary">Create</button>
									</div>
								</div>
							</form>
							<script>
								const cu = document.getElementById('create_user');
								cu.addEventListener('submit', (event) => {
									event.preventDefault();
									create_user();
								})
							</script>
						</div>
					<?php
					}
					?>
					<!-- Input Validation End -->
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
		<script src="src/scripts/sweetalert.js"></script>
	</body>

<?php
} else {
	include("login.php");
}
?>

</html>
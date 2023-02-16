<?= $this->extend('management/default_layout') ?>

<?= $this->section('content') ?>
<!-- page content -->
<div class="right_col" role="main">
<div class="clearfix"></div>
	<div class="row" >
		<div class="offset-2 col-md-8 ">
			<div class="x_panel">
				<div class="x_title">
					<h2>Add Student</h2>
					
					<div class="clearfix"></div>
				</div>
				<div class="x_content ">
					<?php if (session()->getFlashdata('errors')) { ?>
						<div class="alert alert-danger col-md-12" role="alert">
							<?php foreach (session()->getFlashdata('errors') as $error) : ?>
								<i class="fa fa-times"></i> <?= esc($error) ?>
								<br>
							<?php endforeach ?>
						</div>
					<?php } else if (session()->getFlashdata('success')) { ?>
						<div class="alert alert-success col-md-12" role="alert">
							<i class="fa fa-check"></i> <?= session()->getFlashdata('success') ?>
						</div>
					<?php } ?>
					<br />
					<form class="form-horizontal form-label-left" action="<?= base_url('saveStudent/') ?>" method="post">

                    <div class="form-group  ">
                        <label for="fullname">Fullname</label>
							<div class=""> 
								<input type="text" class="form-control" name="fullname" id="fullname" required >
							</div>
						</div>

                        <div class="form-group  ">
                        <label for="registration_number">Regsitration Number</label>
							<div class=""> 
								<input type="text" class="form-control" name="registration_number" id="registration_number" required >
							</div>
						</div>

                        <div class="form-group  ">
                        <label for="email">Email</label>
							<div class=""> 
								<input type="email" class="form-control" name="email" id="email" required >
							</div>
						</div>

                        <div class="form-group  ">
                        <label for="phone">Department</label>
							<div class=""> 
								<input type="text" class="form-control" name="department" id="department" required >
							</div>
						</div>

                    <div class="form-group  ">
                        <label for="level">Level</label>
							<div class="">
                            <select name="level" id="level" class="form-control"  required>
									<option value="">Select Level</option>
                                        <option value="1" >1</option>
                                        <option value="2" >2</option>
                                        <option value="3" >3</option>
                            </select>
							</div>
						</div>

                        <div class="form-group  ">
                        <label for="session_fee">Session Fee</label>
							<div class="">
                            <select name="session_fee" id="session_fee" class="form-control"  required>
									<option value="">Select Status</option>
                                        <option value="Paid" >Paid</option>
                                        <option value=" Not Paid" >Not Paid</option>
                            </select>
							</div>
						</div>


						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="">

								<button type="reset" class="btn btn-primary">Reset</button>
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /top tiles -->
<?= $this->endSection() ?>
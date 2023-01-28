<?= $this->extend('management/default_layout') ?>

<?= $this->section('content') ?>
<!-- page content -->
<div class="right_col" role="main">

  <div class="row" style="display: inline-block;">

    <!-- <div class="x_content">
    <h5></h5>
  </div> -->

    <div class="form-group">
      <input type="email" name="email" class="form-control" id="student_email" placeholder="Student Application Email" />
    </div>

    <div class="form-group">
      <button class=" btn btn-info" id="get_student" >Get Student</button>
    </div>


    <div class="x_content">
      <?php if (session()->getFlashdata('errors')) { ?>
        <div class="alert alert-danger col-md-12" role="alert">
          <?php foreach (session()->getFlashdata('errors') as $error) : ?>
            <i class="fa fa-times"></i> <?= esc($error) ?>
            <br>
          <?php endforeach; ?>
        </div>
      <?php } elseif (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success col-md-12" role="alert">
          <i class="fa fa-check"></i> <?= session()->getFlashdata('success') ?>
        </div>
      <?php } ?>
      <p>
        <hr />
      </p>
    </div>

    <p>

    <div class="col-md-3 col-sm-3  profile_left">
      <div class="profile_img">
        <div id="crop-avatar">
          <!-- Current avatar -->
          <img class="img-responsive avatar-view" src="" alt="Student Passport Photo" style="width:100%;" title="Change the avatar">
        </div>
      </div>
      <h3 id="student_name_area"></h3>

      <ul class="list-unstyled user_data">
        <li><i class="fa fa-at user-profile-icon"></i> <span id="registration_number_area"></span>
        </li>

        <li>
          <i class="fa fa-user user-profile-icon"></i><span id="phone_area"></span>
        </li>

        <li class="m-top-xs">

          <!-- The acceptance of the applicant has been revoked 
                                 
                                  -->
        </li>
      </ul>

    </div>


  </div>


</div>


<!-- /page content -->

<?= $this->endSection() ?>

<?= $this->section('endOfPageScripts') ?>

<script>
		$("#get_student").click(function(){
			alert("Hello");
			// $.post("<?= url_to('loginChecker')  ?>",
			// {
			// 	email: document.getElementById('login_email').value,
			// 	password: document.getElementById('login_password').value,
			// },
			// function(data, status){
			// 	const obj = JSON.parse(data);
			// 	if (obj.status === 'error') {
			// 		$('#login_message_area').html('');
			// 		$('#login_message_area').html("<div class='alert alert-danger'><i class='fa fa-times'></i> "+obj.error_message+"</div>");
			// 		$('#login_password').val('');
			// 		//alert("Data: " + data + "\nStatus: " + status);
			// 	} else if (obj.status === 'success') {
			// 		$('#login_message_area').html('');
			// 		$('#login_message_area').html("<div class='alert alert-success'><i class='fa fa-times'></i> "+obj.success_message+"</div>");

			// 		var url = "<?= url_to('studentDashboard') ?>";
      //     			$(location).attr('href',url);
			// 	}
			// });
		});
	</script>

<?= $this->endSection() ?>
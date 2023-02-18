<?= $this->extend('management/default_layout') ?>

<?= $this->section('content') ?>
  <!-- page content -->
<div class="right_col" role="main">

<div class="row" style="display: inline-block;">

  <!-- <div class="x_content">
    <h5></h5>
  </div> -->

  <div class="x_content">
    <h4><?= $student->fullname ?></h4>
  </div>


  <div class="x_content">
  <?php if (session()->getFlashdata('errors')) { ?>
          <div class="alert alert-danger col-md-12" role="alert">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
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
                                   <img class="img-responsive avatar-view" src="<?php echo is_file('uploads/students/passport_' .$student->id .'_.jpg')? base_url('uploads/staffs/passport_'.$student->id .'_.jpg'): base_url('images/avatar.png'); ?>" alt="Staff Passport Photo" style="width:100%;" title="Change the avatar">
                               </div>
                           </div>
                           <h3><?= $student->first_name ?> <?= $student->last_name ?></h3>

                           <ul class="list-unstyled user_data">
                               <li><i class="fa fa-at user-profile-icon"></i> <?= $student->registration_number ?>
                               </li>

                               <li>
                                   <i class="fa fa-user user-profile-icon"></i> <?= $student->phone ?>
                               </li>

                               <li class="m-top-xs">

                                   <!-- The acceptance of the applicant has been revoked 
                                 
                                  -->
                               </li>
                           </ul>

                       </div>
                       <div class="col-md-9 col-sm-9 "> 
                           <div class="" role="tabpanel" data-example-id="togglable-tabs">
                               <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                   <li role="presentation" class=""><a href="#tab_content1" id="basic-info-tab" role="tab" data-toggle="tab" aria-expanded="true">Basic Info</a>
                                   </li>
                                   <li role="presentation" class=""><a href="#tab_content2" role="tab" id="credentials-tab" data-toggle="tab" aria-expanded="false">Next Of Kin</a>
                                   </li>
                                   <li role="presentation" class=""><a href="#tab_content3" role="tab" id="actions-tab" data-toggle="tab" aria-expanded="false">Actios</a>
                                   </li>
                               </ul>
                               </ul>
                               <div id="myTabContent" class="tab-content">
                                   <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="basic-info-tab">
                                   <br>
                                       <dl class="dl-horizontal">
                                           <dt>Date of Birth</dt>
                                           <dd><?= $student->date_of_birth ?></dd>
                                           <dt>Email</dt>
                                           <dd><?= $student->email ?></dd>
                                           <dt>Phone Number</dt>
                                           <dd><?= $student->phone ?></dd>
                                           <dt>Gender</dt>
                                           <dd><?= $student->gender ?></dd>
                                           <dt>Current Address</dt>
                                           <dd><?= $student->address ?></dd>
                                           <dt>Indigeneship</dt>
                                           <dd><?= $student->indigeneship ?></dd>
                                           <dt>Local Government</dt>
                                           <dd><?= $student->local_government ?></dd>
                                           <dt>Ward</dt>
                                           <dd><?= $student->ward ?></dd>
                                           <dt>Religion</dt>
                                           <dd><?= $student->religion ?></dd>
                                           <dt>Marital Status</dt>
                                           <dd><?= $student->marital_status ?></dd>
                                           
                                       </dl>


                                   </div>
                                   <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="credentials-tab">
                                   <br>
                                       <!-- start user projects -->
                                       <dl class="dl-horizontal">
                                           <dt>Next of Kin Name</dt>
                                           <dd><?= $student->next_of_kin_name ?></dd>
                                           <dt>Next of Kin Phone Phone Number</dt>
                                           <dd><?= $student->next_of_kin_phone ?></dd>
                                           <dt>Next of Kin Address</dt>
                                           <dd><?= $student->next_of_kin_address ?></dd>
                                           <dt>Relationship with Next of Kin</dt>
                                           <dd><?= $student->next_of_kin_relation ?></dd>
                                           <dt>Next of Kin Email</dt>
                                           <dd><?= $student->next_of_kin_email ?></dd>
       
                                           
                                           
                                       </dl>
                                       <!-- end user projects -->

                                   </div>

                                   <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="actions-tab">
                                   <br>
                                       <!-- start user projects -->
                                      <p>
                                        <h6>All Students Actions</h6>
                                        <ul>
                                            <li>Acceptance Fees - <?= $acceptance_fee->status ?></li>
                                            <li>Medical Fees -  <?= $medical_fee->status ?></li>
                                        </ul>
                                        <?php if ($steps->stage == null && auth()->user()->inGroup('bursary')) { ?>
                                             <a href="<?= base_url('confirmAcceptanceAndMedicalFees/'.$student->id) ?>" class="btn btn-success" >Confirm Acceptance And Medical Payments</a> 
                                        <?php } ?>
                                        <?php if ($steps->stage == "Confirmed Medical and Acceptance Fees By Bursary" && auth()->user()->inGroup('admission')) { ?>
                                        <form action="<?= base_url('saveJambInfo') ?>" method="POST">
                                            <input type="text" name="jamb_number" class="form-control" placeholder="JAMB Number" />
                                            <input type="number" name="jamb_score"  class="form-control" placeholder="JAMB Score" />

                                          <select name="indigeneship" class="form-control"required>
                                            <option value="" >Select Indigeneship</option>
                                            <option value="Kano Indigene" >Kano Indigene</option>
                                            <option value="Non-Kano Indigene" >Non-Kano Indigene</option>
                                          </select>

                                            <input type="hidden" name="id" value="<?= $student->id ?>" />
                                           
                                            <input type="checkbox" name="cleared" class="checkbox" required> Check This Box and Click Submit if All Credentials Are Cleared. Otherwise Do Nothing
                                           <br>
                                           <br>
                                            <button type="submit"class="btn btn-info" >Submit</button>
                                        </form>
                                        <?php } ?>
                                      </p>
                                       <!-- end user projects -->

                                   </div>

                               </div>
                           </div>
                       </div>

</div>


</div>
<!-- /page content -->
<?= $this->endSection() ?>
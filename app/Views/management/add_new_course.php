<?= $this->extend('management/default_layout') ?>

<?= $this->section('content') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
        <div class="offset-2 col-md-8 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add New Course</h2>

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
                    <form class="form-horizontal form-label-left" action="<?= base_url('saveNewCourse/') ?>" method="post">

                        <div class="form-group  ">
                            <label for="course_title">Course Title</label>
                            <div class="">
                                <input type="text" class="form-control" name="course_title" id="course_title" required>
                            </div>
                        </div>

                        <div class="form-group  ">
                            <label for="course_code">Course code</label>
                            <div class="">
                                <input type="text" class="form-control" name="course_code" id="course_code" required>
                            </div>
                        </div>

                        <?php if (auth()->user()->inGroup('department')) { ?>
                            <input type="hidden" name="department" value="<?= auth()->user()->department ?>" />
                        <?php } else if (auth()->user()->inGroup('superadmin')) { ?>
                            <div class="form-group ">
                            <label for="session_fee">Department</label>
                                <div class="">
                                    <select name="department" id="department" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="" >Select Department</option>
                                        <option value="Community Health" >Community Health</option>
                                        <option value="Pharmacy" >Pharmacy</option>
                                        <option value="Dental" >Dental</option>
                                        <option value="Medical Laboratory" >Medical Laboratory</option>
                                        <option value="Medical Imaging" >Medical Imaging</option>
                                        <option value="Health Information Management" >Health Information Management</option>
                                        <option value="Public Health" >Public Health</option>
                                        <option value="Medical Statistics" >Medical Statistics</option>
                                        <option value="Epidemiology" >Epidemiology</option>
                                        <option value="Computer Science" >Computer Science</option>
                                        <option value="Environmental" >Environmental</option>
                                        <option value="Biomedical Engineering" >Biomedical Engineering</option>
                                        <option value="Prosthetic & Orthotic" >Prosthetic & Orthotic</option>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>

            <div class="form-group  ">
                <label for="course_year">Course Year/Level</label>
                <div class="">
                    <select name="course_year" id="course_year" class="form-control" required>
                        <option value="">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>

            <div class="form-group  ">
                <label for="credit_units">Credit Units</label>
                <div class="">
                    <select name="credit_units" id="credit_units" class="form-control" required>
                        <option value="">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
            </div>


            <input type="hidden" name="level" value="1" />
            <input type="hidden" name="is_new" value="YES" />


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
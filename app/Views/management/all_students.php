<?= $this->extend('management/default_layout') ?>

<?= $this->section('content') ?>
<!-- page content -->

<div class="right_col" role="main">
<div class="clearfix"></div>
	<div class="row" >
    <div class="col-md-12 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
          <br>
          <h3>All Students</h3>

          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Settings 1</a>
                <a class="dropdown-item" href="#">Settings 2</a>
              </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">
          <?php if (session()->getFlashdata('errors')) { ?>
            <div class="alert alert-danger " role="alert">
              <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                <i class="fa fa-times"></i> <?= esc($error) ?>
                <br>
              <?php endforeach; ?>
            </div>
          <?php } elseif (session()->getFlashdata('success')) { ?>
            <div class="alert alert-success " role="alert">
              <i class="fa fa-check"></i> <?= session()->getFlashdata(
                                            'success'
                                          ) ?>
            </div>
          <?php } ?>

          <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
         
          <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr class="headings">
                  <th class="column-title">Fullname </th>
                  <th class="column-title">Email </th>
                  <th class="column-title">Registration Number</th>
                  <th class="column-title">Department</th>
                  <th class="column-title">Level</th>
                  <th class="column-title">Session Fee</th>
                  <th class="column-title">View Student</th>
                  <?php if (auth()->user()->inGroup('superadmin')) { ?>
                    <th class="column-title">Edit</th>
                  <?php } ?>
                  <?php if (auth()->user()->inGroup('superadmin')) { ?>
                    <th class="column-title">Delete</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($students as $student) : ?>
                  <tr>
                    <td><?= $student->fullname ?></td>
                    <td><?= $student->email ?></td>
                    <td><?= $student->registration_number ?></td>
                    <td><?= $student->department ?></td>
                    <td><?= $student->level ?></td>
                    <td><?= $student->session_fee ?></td>
                    <td>

                    <a href="<?= base_url('student/'.$student->id) ?>"  class="btn btn-success" ><i class="fa fa-user"></i></i></a>

                    </td>
                   

                    <?php if (auth()->user()->inGroup('superadmin')) { ?>
                      <td>
                      <a href="<?= base_url('editStudent/'.$student->id) ?>" class="btn btn-info" ><i class="fa fa-edit"></i></i></a>
                      </td>
                    <?php } ?>
                  

                    <?php if (auth()->user()->inGroup('superadmin')) { ?>
                    <td>
                    <a href="<?= base_url('deleteStudent/'.$student->id) ?>" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger" ><i class="fa fa-times"></i></i></a>
                    </td>
                    <?php } ?>

                  
                  </tr>
                <?php endforeach; ?>

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>

</div>
<!-- /page content -->
<?= $this->endSection() ?>
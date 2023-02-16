<?= $this->extend('student/default_layout') ?>

<?= $this->section('content') ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="x_panel">
            <div class="x_title">
                <h2>My Information <small> Passport</small></h2>
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


                <div class="col-md-8 center-margin">
                    <form class="form-horizontal form-label-left" action="<?= base_url('savePassport') ?>" enctype="multipart/form-data" method="post">

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

                        <div class="form-group row">
                            <label>Image</label>
                            <input type="file" name="passport" class="form-control" placeholder="Passport">
                        </div>

                        <br />

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>



            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?= $this->endSection() ?>
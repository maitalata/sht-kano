<?= $this->extend('management/default_layout') ?>

<?= $this->section('content') ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="" >
          <div class="tile_count" style="display:block;width:100%;" >

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

            <div class="col-lg-3 col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Works</span>
              <div class="count">2500</div>
              <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Total Earnings</span>
              <div class="count">$215.50</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
              <div class="count red">2,500</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">4,567</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>

          </div>
        </div>
          <!-- /top tiles -->
<?= $this->endSection() ?>

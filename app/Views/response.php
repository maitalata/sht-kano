<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

      <!-- Font Awesome -->
  <link href="<?= base_url('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="containe m-2 p-2r">

        <div class="col-6 offset-3">
            <div class="row text-center">
                <img class="mb-4" src="<?= base_url('images/sht_kano_logo_no_border.jpg') ?>" alt="" style="width:100px;height:75px;margin:auto;">
                <?php if (session()->getFlashdata('errors')) { ?>
                    <div class="alert alert-danger col-md-12">
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <i class="fa fa-times"></i> <?= esc($error) ?>
                            <br>
                        <?php endforeach; ?>
                    </div>
                <?php } elseif (session()->getFlashdata('success')) { ?>
                    <div class="alert alert-success col-md-12">
                        <i class="fa fa-check"></i> <?= session()->getFlashdata('success') ?>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
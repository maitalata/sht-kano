<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Signin Template · Bootstrap v5.0</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('css/bootstrap5.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('css/setup.css') ?>" rel="stylesheet" />

  <!-- Font Awesome -->
  <link href="<?= base_url('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form action="<?= base_url('savePassword') ?>" method="post">
      <img class="mb-4" src="<?= base_url('images/sht_kano_logo_no_border.jpg') ?>" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Student Password Setup</h1>

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

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= $student->fullname ?>" readonly>
        <label for="floatingInput">Student Name</label>
      </div>

      <input type="hidden" name="student" value="<?= $student->student ?>" />

      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= $student->email ?>" readonly>
        <label for="floatingInput">Student Email</label>
      </div>

      <hr>

      <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <label for="Password">Password</label>
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm Password">
        <label for="confirm">Confirm Password</label>
      </div>


      <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
      
    </form>
  </main>



</body>

</html>
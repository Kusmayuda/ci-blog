<?php

if ($this->session->userdata('level') !== null) {
  if ($this->session->userdata('level') === "admin") :
    redirect('admin/index');
  elseif ($this->session->userdata('level') === "penulis") :
    redirect('penulis/index');
  endif;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $judul ?></title>

  <!-- Boostrap -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">

  <!-- Jquery -->
  <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>

</head>

<body>
  <div class="container-fluid">
    <div class="row justify-content-center mt-5">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header text-center">
            Login Admin
          </div>
          <div class="card-body">
            <?= form_open('proseslogin_admin'); ?>
            <?php if ($this->session->flashdata('pesan') !== null) : ?>
              <div class="alert alert-danger">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            <?php endif; ?>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="username" placeholder="Username" autofocus autocomplete="off" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" placeholder="******" required>
            </div>
            <button class="btn btn-success btn-block">Login</button>

            <?= form_close(''); ?>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
</body>

</html>
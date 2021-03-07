<div class="container-fluid">
  <div class="row mt-5">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header text-center">
          Kelola Kategori
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($kategori as $kat) : ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $kat->nama ?></td>
                    <td>
                      <a class="btn btn-danger" href="">Hapus</a>
                      <a class="btn btn-warning" href="">Edit</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header text-center">
          Tambah Kategori
        </div>
        <div class="card-body">
          <?= form_open(''); ?>
          <div class="form-grup">
            <label>Nama</label>
            <input type="text" name="name" placeholder="Nama Kategori" required class="form-control">
          </div>
          <br>
          <button class="btn btn-success btn-block"><i class="fa fa-plus"></i>Tambah Kategori</button>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
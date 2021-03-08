<div class="container-fluid">
  <?php if ($this->session->flashdata('pesan') !== null) : ?>
    <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
      <strong><?= $this->session->flashdata('pesan'); ?></strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

  <?php endif; ?>
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
                      <a class="btn btn-danger" href="<?= base_url('hapus/kategori/' . $kat->id); ?>">Hapus</a>
                      <a class="btn btn-warning" href="javascript:void(0)" data-toggle="modal" data-target="#editModal<?= $kat->id ?>">Edit</a>
                    </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="editModal<?= $kat->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <?= form_open('edit/kategori/' . $kat->id); ?>
                        <div class="modal-body">
                          <div class="form-grup">
                            <label>Nama</label>
                            <input type="text" name="nama" placeholder="Nama Kategori" required class="form-control" value="<?= $kat->nama ?>">
                          </div>
                          <br>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i>Edit Kategori</button>
                        </div>
                        <?= form_close(); ?>
                      </div>
                    </div>
                  </div>
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
          <?= form_open('tambah/kategori'); ?>
          <div class="form-grup">
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Nama Kategori" required class="form-control">
          </div>
          <br>
          <button class="btn btn-success btn-block"><i class="fa fa-plus"></i>Tambah Kategori</button>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
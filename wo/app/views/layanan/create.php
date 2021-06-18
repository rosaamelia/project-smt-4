  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Layanan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url; ?>/layanan/simpanLayanan" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nama Layanan</label>
                    <input type="text" class="form-control" placeholder="masukkan nama layanan..." name="nama">
                  </div>
                  <div class="form-group">
                    <label >Stok</label>
                    <input type="text" class="form-control" placeholder="masukkan stok layanan..." name="stok">
                  </div>
                  <div class="form-group">
                    <label >Harga</label>
                    <input type="text" class="form-control" placeholder="masukkan harga layanan..." name="harga">
                  </div>
                  <div class="form-group">
                    <label >Kategori</label>
                    <select class="form-control" name="id_kategori">
                        <option value="">Pilih</option>
                         <?php foreach ($data['kategori'] as $row) :?>
                        <option value="<?= $row['id']; ?>"><?= $row['nama_kategori']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <label >Mitra</label>
                  <select class="form-control" name="id_mitra">
                        <option value="">Pilih</option>
                         <?php foreach ($data['mitra'] as $row) :?>
                        <option value="<?= $row['id_mitra']; ?>"><?= $row['nama']; ?></option>
                      <?php endforeach; ?>
                    </select>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
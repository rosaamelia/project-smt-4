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
              <form role="form" action="<?= base_url; ?>/layanan/updateLayanan" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_layanan" value="<?= $data['layanan']['id_layanan']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nama Layanan</label>
                    <input type="text" class="form-control" placeholder="masukkan nama layanan..." name="nama" value="<?= $data['layanan']['nama'];?>">
                  </div>
                  <div class="form-group">
                    <label >Stok</label>
                    <input type="text" class="form-control" placeholder="masukkan stok layanan..." name="stok" value="<?= $data['layanan']['stok'];?>">
                  </div>
                  <div class="form-group">
                    <label >Harga</label>
                    <input type="text" class="form-control" placeholder="masukkan harga layanan..." name="harga" value="<?= $data['layanan']['harga'];?>">
                  </div>
                  
                  <div class="form-group">
                    <label >Kategori</label>
                    <select class="form-control" name="id_kategori">
                         <?php foreach ($data['kategori'] as $row) :?>
                        <option value="<?= $row['id']; ?>" <?php if($data['layanan']['id_kategori'] == $row['id']) { echo "selected"; } ?>><?= $row['nama_kategori']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Mitra</label>
                    <select class="form-control" name="id_mitra">
                         <?php foreach ($data['mitra'] as $row) :?>
                        <option value="<?= $row['id_mitra']; ?>" <?php if($data['layanan']['id_mitra'] == $row['id_mitra']) { echo "selected"; } ?>><?= $row['nama']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
           
           
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
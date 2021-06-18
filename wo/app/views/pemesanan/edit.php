  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Pemesanan</h1>
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
              <form role="form" action="<?= base_url; ?>/pemesanan/updatePemesanan" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_pemesanan" value="<?= $data['pemesanan']['id_pemesanan']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Tanggal Pemesanan</label>
                    <input type="text" class="form-control" placeholder="masukkan tanggal pemesanan..." name="tanggal_pemesanan" value="<?= $data['pemesanan']['tanggal_pemesanan'];?>">
                  </div>
                  <div class="form-group">
                    <label >Alamat acara</label>
                    <input type="text" class="form-control" placeholder="masukkan alamat acara..." name="alamat_acara" value="<?= $data['pemesanan']['alamat_acara'];?>">
                  </div>
                  <div class="form-group">
                    <label >Jadwal acara</label>
                    <input type="text" class="form-control" placeholder="masukkan jadwal acara..." name="jadwal_acara" value="<?= $data['pemesanan']['jadwal_acara'];?>">
                  </div>
                  <div class="form-group">
                    <label >Metode pembayaran</label>
                    <input type="text" class="form-control" placeholder="masukkan metode pembayaran..." name="metode_pembayaran" value="<?= $data['pemesanan']['metode_pembayaran'];?>">
                  </div>
                  <div class="form-group">
                    <label >Status</label>
                    <input type="text" class="form-control" placeholder="masukkan status..." name="status" value="<?= $data['pemesanan']['status'];?>">
                  </div>
                 
                  </div>
                  <div class="form-group">
                    <label >Layanan</label>
                    <select class="form-control" name="id_layanan">
                         <?php foreach ($data['layanan'] as $row) :?>
                        <option value="<?= $row['id_layanan']; ?>" <?php if($data['pemesanan']['id_layanan'] == $row['id_layanan']) { echo "selected"; } ?>><?= $row['nama_layanan']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Customer</label>
                    <select class="form-control" name="id_customer">
                         <?php foreach ($data['customer'] as $row) :?>
                        <option value="<?= $row['id_customer']; ?>" <?php if($data['pemesanan']['id_customer'] == $row['id_customer']) { echo "selected"; } ?>><?= $row['nama']; ?></option>
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
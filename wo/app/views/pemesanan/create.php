  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman pemesanan</h1>
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
              <form role="form" action="<?= base_url; ?>/Pemesanan/simpanPemesanan" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Tanggal Pemesanan</label>
                    <input type="date" class="form-control" placeholder="masukkan tanggal pemesanan..." name="tanggal_pemesanan">
                  </div>
                  <div class="form-group">
                    <label >Alamat acara</label>
                    <input type="text" class="form-control" placeholder="masukkan alamat acara..." name="alamat_acara">
                  </div>
                  <div class="form-group">
                    <label >jadwal acara</label>
                    <input type="date" class="form-control" placeholder="masukkan jadwal acara..." name="jadwal_acara">
                  </div>
                  <div class="form-group">
                    <label >Metode Pembayaran</label>
                    <input type="text" class="form-control" placeholder="masukkan metode pembayaran..." name="metode_pembayaran">
                  </div>
                  <div class="form-group">
                    <label >status</label>
                    <input type="text" class="form-control" placeholder="masukkan status..." name="status">
                  </div>
                  <label >Layanan</label>
                  <select class="form-control" name="id_layanan">
                        <option value="">Pilih</option>
                         <?php foreach ($data['layanan'] as $row) :?>
                        <option value="<?= $row['id_layanan']; ?>"><?= $row['nama_layanan']; ?></option>
                      <?php endforeach; ?>
                    </select>

                </div>
                <div class="form-group">
                    <label >Customer</label>
                    <select class="form-control" name="id_customer">
                        <option value="">Pilih</option>
                         <?php foreach ($data['customer'] as $row) :?>
                        <option value="<?= $row['id_customer']; ?>"><?= $row['nama']; ?></option>
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
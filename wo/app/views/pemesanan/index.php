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
<div class="row">
    <div class="col-sm-12">
      <?php
        Flasher::Message();
      ?>
    </div>
  </div>
      <!-- Default box -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title'] ?></h3> <div class="btn-group float-right"><a href="<?= base_url; ?>/pemesanan/tambah" class="btn float-right btn-xs btn btn-primary">Tambah layanan</a></div>
        </div>
        <div class="card-body">
        
      <form action="<?= base_url; ?>/pemesanan/cari" method="post">
 <div class="row mb-3">
    <div class="col-lg-6">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="" name="key" >
    <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
          <a class="btn btn-outline-danger" href="<?= base_url; ?>/pemesanan" >Reset</a>
    </div>
  </div>

  </div>
</div>
    </form>
          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tanggal pemesanan</th>
                      <th>Alamat acara</th>
                      <th>Jadwal acara</th>
                      <th>Metode pembayaran</th>
                      <th>status</th>
                      <th>Nama Layanan</th>
                      <th>Nama Customer</th>
                     
                      
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?> 
                    <?php foreach ($data['pemesanan'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['tanggal_pemesanan'];?></td>
                      <td><?= $row['alamat_acara'];?></td>
                      <td><?= $row['jadwal_acara'];?></td>
                      <td><?= $row['metode_pembayaran'];?></td>
                      <td><?= $row['status'];?></td>
                      <td><?= $row['nama_layanan'];?></td>
                      <td><?= $row['nama_customer'];?></td>
                      
                      <td>
                        <a href="<?= base_url; ?>/pemesanan/edit/<?= $row['id_pemesanan'] ?>" class="badge badge-info">Edit</a> <a href="<?= base_url; ?>/pemesanan/hapus/<?= $row['id_pemesanan'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                      </td>
                    </tr>
                    <?php $no++; endforeach; ?>
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


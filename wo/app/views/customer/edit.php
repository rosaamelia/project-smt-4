  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Customer</h1>
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
              <form role="form" action="<?= base_url; ?>/customer/updateCustomer" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_customer" value="<?= $data['customer']['id_customer']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nama</label>
                    <input type="text" class="form-control" placeholder="masukkan nama customer..." name="nama" value="<?= $data['customer']['nama'];?>">
                  </div>
                  <div class="form-group">
                    <label >Alamat</label>
                    <input type="text" class="form-control" placeholder="masukkan alamat customer..." name="alamat" value="<?= $data['customer']['alamat'];?>">
                  </div>
                  <div class="form-group">
                    <label >Email</label>
                    <input type="text" class="form-control" placeholder="masukkan email customer..." name="email" value="<?= $data['customer']['email'];?>">
                  </div>
                  <div class="form-group">
                    <label >Telepon</label>
                    <input type="text" class="form-control" placeholder="masukkan telepon customer..." name="telepon" value="<?= $data['customer']['telepon'];?>">
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
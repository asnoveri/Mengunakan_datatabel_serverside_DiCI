    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul?></h1>
        </div>

        <!-- Content Row -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">  
                <?= $this->session->flashdata('pesanaddop');?>
                <?php if(validation_errors()){?>
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?= validation_errors();?>
                        </div>
                <?php  } ?>
            <h5 class="m-0 font-weight-bold text-secondary">List Sekretaris</h5>
            </div>
            <div class="card-body">
            <!-- <button type="button" class="btn btn-primary mb-3" id="aad_user" data-toggle="modal" data-target="#tbhuser">
            Tambah Sekretaris
            </button> -->
                <div class="row">  
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabl_sekre">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Pegawai</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>                
            </div>
        </div>    
    </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->



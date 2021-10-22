 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <?= $title ?>
             <small></small>
         </h1>
         <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
             ><?= $title ?>
         </ol>
     </section>

     <!-- isi konten -->
     <!-- Main content -->
     <section class="content">
         <div class="row">
             <div class="col-xs-12">
                 <div class="box">

                     <div class="box">
                         <div class="box-header">
                             <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Kategori</a>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                             <table id="example1" class="table table-striped" style="font-size:13px;">
                                 <thead>
                                     <tr>
                                         <th style="width:100px;">#</th>
                                         <th>Kategori</th>
                                         <th style="text-align:right;">Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 0;
                                        foreach ($kategori as $i) :
                                            $no++;
                                            $kategori_id = $i['kategori_id'];
                                            $kategori_nama = $i['kategori_nama'];

                                        ?>
                                         <tr>
                                             <td><?php echo $no; ?></td>
                                             <td><?php echo $kategori_nama; ?></td>

                                             <td style="text-align:right;">
                                                 <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $kategori_id; ?>"><span class="fa fa-pencil"></span></a>
                                                 <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $kategori_id; ?>"><span class="fa fa-trash"></span></a>
                                             </td>
                                         </tr>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>
                         </div>
                         <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                 </div>
                 <!-- /.col -->
             </div>
             <!-- /.row -->
     </section>

     <!-- tutup konten -->
 </div>
 <!-- /.content-wrapper -->

 <!--Modal Add kategori-->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                 <h4 class="modal-title" id="myModalLabel">Add Kategori</h4>
             </div>
             <form class="form-horizontal" action="<?= base_url() ?>admin/tambah-kategori" method="post" enctype="multipart/form-data">
                 <div class="modal-body">

                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Kategori</label>
                         <div class="col-sm-7">
                             <input type="text" name="namakategori" class="form-control" id="inputUserName" placeholder="Kategori" required>
                         </div>
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                 </div>
             </form>
         </div>
     </div>
 </div>




 <?php foreach ($kategori as $i) :
        $kategori_id = $i['kategori_id'];
        $kategori_nama = $i['kategori_nama'];
    ?>
     <!--Modal Edit Pengguna-->
     <div class="modal fade" id="ModalEdit<?php echo $kategori_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                     <h4 class="modal-title" id="myModalLabel">Edit Kategori</h4>
                 </div>
                 <form class="form-horizontal" action="<?= base_url() ?>admin/edit-kategori" method="post" enctype="multipart/form-data">
                     <div class="modal-body">
                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Kategori</label>
                             <div class="col-sm-7">
                                 <input type="hidden" name="id_kategori" value="<?php echo $kategori_id; ?>" />
                                 <input type="text" name="namakategori" class="form-control" id="inputUserName" value="<?php echo $kategori_nama; ?>" placeholder="Kategori" required>
                             </div>
                         </div>

                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 <?php endforeach; ?>





 <?php foreach ($kategori as $i) :
        $kategori_id = $i['kategori_id'];
        $kategori_nama = $i['kategori_nama'];
    ?>
     <!--Modal Edit Pengguna-->
     <div class="modal fade" id="ModalHapus<?php echo $kategori_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                     <h4 class="modal-title" id="myModalLabel">Hapus Kategori</h4>
                 </div>
                 <form class="form-horizontal" action="<?= base_url() ?>admin/hapus-kategori" method="post" enctype="multipart/form-data">
                     <div class="modal-body">
                         <input type="hidden" name="kategori_id" value="<?php echo $kategori_id; ?>" />
                         <p>Apakah Anda yakin mau menghapus Pengguna <b><?php echo $kategori_nama; ?></b> ?</p>

                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 <?php endforeach; ?>
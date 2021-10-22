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
                             <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add File</a>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body table-responsive">
                             <table id="example1" class="table table-striped" style="font-size:13px;">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Nama File</th>
                                         <th>Tanggal Post</th>
                                         <th>Oleh</th>
                                         <th>Download</th>
                                         <th style="text-align:right;">Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 0;
                                        foreach ($download as $i) :
                                            $no++;
                                        ?>
                                         <tr>
                                             <td><?php echo $no ?></td>
                                             <td><a href="<?php echo base_url() . 'admin/file-download/' .  $i['file_id']; ?>"><?php echo $i['file_judul'] ?></a></td>
                                             <td><?php echo $i['file_tanggal'] ?></td>
                                             <td><?php echo $i['file_oleh'] ?></td>
                                             <td><?php echo $i['file_download'] ?></td>
                                             <td style="text-align:right;">
                                                 <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $i['file_id'] ?>"><span class="fa fa-pencil"></span></a>
                                                 <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $i['file_id'] ?>"><span class="fa fa-trash"></span></a>
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
 <!--Modal Add Pengguna-->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                 <h4 class="modal-title" id="myModalLabel">Add File</h4>
             </div>
             <form class="form-horizontal" action="<?php echo base_url() . 'admin/tambah-download' ?>" method="post" enctype="multipart/form-data">
                 <div class="modal-body">

                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                         <div class="col-sm-7">
                             <input type="text" name="xjudul" class="form-control" id="inputUserName" placeholder="Judul" required>
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                         <div class="col-sm-7">
                             <textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..." required></textarea>
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Oleh</label>
                         <div class="col-sm-7">
                             <input type="text" name="xoleh" class="form-control" id="inputUserName" placeholder="Oleh" required>
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">File</label>
                         <div class="col-sm-7">
                             <input type="file" name="filefoto" required>
                             NB: file harus bertype pdf|doc|docx|ppt|pptx|zip. ukuran maksimal 2,7 MB.
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




 <?php foreach ($download as $i) :
        $id = $i['file_id'];
        $judul = $i['file_judul'];
        $deskripsi = $i['file_deskripsi'];
        $oleh = $i['file_oleh'];
        $file = $i['file_data'];
    ?>
     <!--Modal Edit Pengguna-->
     <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                     <h4 class="modal-title" id="myModalLabel">Edit File</h4>
                 </div>
                 <form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-download' ?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">

                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                             <div class="col-sm-7">
                                 <input type="hidden" name="kode" value="<?php echo $id; ?>">
                                 <input type="hidden" name="file" value="<?php echo $file; ?>">
                                 <input type="text" name="xjudul" class="form-control" value="<?php echo $judul; ?>" id="inputUserName" placeholder="Judul" required>
                             </div>
                         </div>
                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                             <div class="col-sm-7">
                                 <textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..." required><?php echo $deskripsi; ?></textarea>
                             </div>
                         </div>
                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Oleh</label>
                             <div class="col-sm-7">
                                 <input type="text" name="xoleh" class="form-control" value="<?php echo $oleh; ?>" id="inputUserName" placeholder="Oleh" required>
                             </div>
                         </div>
                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">File</label>
                             <div class="col-sm-7">
                                 <input type="file" name="filefoto">
                                 NB: file harus bertype pdf|doc|docx|ppt|pptx|zip. ukuran maksimal 2,7 MB.
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

 <?php foreach ($download as $i) :
        $id = $i['file_id'];
        $judul = $i['file_judul'];
        $file = $i['file_data'];

    ?>
     <!--Modal Hapus Pengguna-->
     <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                     <h4 class="modal-title" id="myModalLabel">Hapus File</h4>
                 </div>
                 <form class="form-horizontal" action="<?php echo base_url() . 'admin/hapus-download' ?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">
                         <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                         <input type="hidden" name="file" value="<?php echo $file; ?>">
                         <p>Apakah Anda yakin mau menghapus file <b><?php echo $judul; ?></b> ?</p>

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
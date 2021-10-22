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
                                         <th>Gambar</th>
                                         <th>Album</th>
                                         <th>Tanggal</th>
                                         <th>Author</th>
                                         <th>Jumlah</th>
                                         <th style="text-align:right;">Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 0;
                                        foreach ($album as $i) :
                                            $no++;
                                        ?>
                                         <tr>
                                             <td><?php echo $no ?></td>
                                             <td><img src="<?php echo base_url() . 'assets/images/album/' . $i['album_cover']; ?>" style="width:80px;"></td>
                                             <td><?php echo $i['album_nama']; ?></td>
                                             <td><?php echo $i['album_tanggal']; ?></td>
                                             <td><?php echo $i['album_author']; ?></td>
                                             <td><?php echo $i['album_count']; ?></td>
                                             <td style="text-align:right;">
                                                 <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $i['album_id']; ?>"><span class="fa fa-pencil"></span></a>
                                                 <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $i['album_id']; ?>"><span class="fa fa-trash"></span></a>
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
                 <h4 class="modal-title" id="myModalLabel">Add Album</h4>
             </div>
             <form class="form-horizontal" action="<?php echo base_url() . 'admin/tambah-album' ?>" method="post" enctype="multipart/form-data">
                 <div class="modal-body">

                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Nama Album</label>
                         <div class="col-sm-7">
                             <input type="text" name="xnama_album" class="form-control" id="inputUserName" placeholder="Nama Album" required>
                         </div>
                     </div>

                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Cover Album</label>
                         <div class="col-sm-7">
                             <input type="file" name="filefoto" required />
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

 <!--Modal Edit Album-->
 <?php foreach ($album as $i) :
        $album_id = $i['album_id'];
        $album_nama = $i['album_nama'];

        $album_author = $i['album_author'];
        $album_cover = $i['album_cover'];
        $album_jumlah = $i['album_count'];
    ?>

     <div class="modal fade" id="ModalEdit<?php echo $album_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                     <h4 class="modal-title" id="myModalLabel">Edit Album</h4>
                 </div>
                 <form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-album' ?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">
                         <input type="hidden" name="kode" value="<?php echo $album_id; ?>" />
                         <input type="hidden" value="<?php echo $album_cover; ?>" name="gambar">
                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Nama Album</label>
                             <div class="col-sm-7">
                                 <input type="text" name="xnama_album" class="form-control" value="<?php echo $album_nama; ?>" id="inputUserName" placeholder="Nama Album" required>
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Cover Album</label>
                             <div class="col-sm-7">
                                 <input type="file" name="filefoto" />
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
 <?php endforeach; ?>
 <!--Modal Edit Album-->

 <?php foreach ($album as $i) :
        $album_id = $i['album_id'];
        $album_nama = $i['album_nama'];

        $album_author = $i['album_author'];
        $album_cover = $i['album_cover'];
        $album_jumlah = $i['album_count'];
    ?>
     <!--Modal Hapus Pengguna-->
     <div class="modal fade" id="ModalHapus<?php echo $album_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                     <h4 class="modal-title" id="myModalLabel">Hapus Album</h4>
                 </div>
                 <form class="form-horizontal" action="<?php echo base_url() . 'admin/hapus-album' ?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">
                         <input type="hidden" name="kode" value="<?php echo $album_id; ?>" />
                         <input type="hidden" value="<?php echo $album_cover; ?>" name="gambar">
                         <p>Apakah Anda yakin mau menghapus Album <b><?php echo $album_nama; ?></b> ?</p>

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
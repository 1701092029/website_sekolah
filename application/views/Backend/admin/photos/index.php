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
                                         <th>Judul</th>
                                         <th>Tanggal</th>
                                         <th>Album</th>
                                         <th>Author</th>
                                         <th style="text-align:right;">Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 0;
                                        foreach ($photos as $i) :
                                            $no++;
                                        ?>
                                         <tr>
                                             <td><?php echo $no ?></td>
                                             <td><img src="<?php echo base_url() . 'assets/images/album/galeri/' . $i['galeri_gambar']; ?>" style="width:80px;"></td>
                                             <td><?php echo $i['galeri_judul']; ?></td>
                                             <td><?php echo $i['galeri_tanggal']; ?></td>
                                             <td><?php echo $i['galeri_album_nama']; ?></td>
                                             <td><?php echo $i['galeri_author']; ?></td>
                                             <td style="text-align:right;">
                                                 <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $i['galeri_id']; ?>"><span class="fa fa-pencil"></span></a>
                                                 <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $i['galeri_id']; ?>"><span class="fa fa-trash"></span></a>
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
                 <h4 class="modal-title" id="myModalLabel">Add Photo</h4>
             </div>
             <form class="form-horizontal" action="<?php echo base_url() . 'admin/tambah-photos' ?>" method="post" enctype="multipart/form-data">
                 <div class="modal-body">

                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                         <div class="col-sm-7">
                             <input type="text" name="xjudul" class="form-control" id="inputUserName" placeholder="Judul" required>
                         </div>
                     </div>

                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Album</label>
                         <div class="col-sm-7">

                             <select class="form-control" name="xalbum" style="width: 100%;" required>
                                 <option value="">-Pilih-</option>
                                 <?php
                                    $no = 0;
                                    foreach ($album as $a) :
                                        $no++;
                                        $alb_id = $a['album_id'];
                                        $alb_nama = $a['album_nama'];

                                    ?>
                                     <option value="<?php echo $alb_id; ?>"><?php echo $alb_nama; ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                     </div>

                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
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
 <?php foreach ($photos as $i) :
        $galeri_id = $i['galeri_id'];
        $galeri_judul = $i['galeri_judul'];
        $galeri_tanggal = $i['galeri_tanggal'];
        $galeri_author = $i['galeri_author'];
        $galeri_gambar = $i['galeri_gambar'];
        $galeri_album_id = $i['galeri_album_id'];

    ?>

     <div class="modal fade" id="ModalEdit<?php echo $galeri_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                     <h4 class="modal-title" id="myModalLabel">Edit Photo</h4>
                 </div>
                 <form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-photos' ?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">
                         <input type="hidden" name="kode" value="<?php echo $galeri_id; ?>" />
                         <input type="hidden" value="<?php echo $galeri_gambar; ?>" name="gambar">
                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                             <div class="col-sm-7">
                                 <input type="text" name="xjudul" class="form-control" value="<?php echo $galeri_judul; ?>" id="inputUserName" placeholder="Judul" required>
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Album</label>
                             <div class="col-sm-7">

                                 <select class="form-control" name="xalbum" style="width: 100%;" required>
                                     <option value="">-Pilih-</option>
                                     <?php
                                        foreach ($album as $a) {
                                            $alb_id = $a['album_id'];
                                            $alb_nama = $a['album_nama'];
                                            if ($galeri_album_id == $alb_id)
                                                echo "<option value='$alb_id' selected>$alb_nama</option>";
                                            else
                                                echo "<option value='$alb_id'>$alb_nama</option>";
                                        } ?>
                                 </select>
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
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



 <?php foreach ($photos as $i) :
        $galeri_id = $i['galeri_id'];
        $galeri_gambar = $i['galeri_gambar'];
        $galeri_album_id = $i['galeri_album_id'];

    ?>
     <!--Modal Hapus Pengguna-->
     <div class="modal fade" id="ModalHapus<?php echo $galeri_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                     <h4 class="modal-title" id="myModalLabel">Hapus Photo</h4>
                 </div>
                 <form class="form-horizontal" action="<?php echo base_url() . 'admin/hapus-photos' ?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">
                         <input type="hidden" name="kode" value="<?php echo $galeri_id; ?>" />
                         <input type="hidden" value="<?php echo $galeri_gambar; ?>" name="gambar">
                         <!-- <input type="hidden" value="<?php echo $galeri_album_id; ?>" name="album"> -->
                         <p>Apakah Anda yakin mau menghapus Galeri dengan kode <b><?php echo $galeri_id; ?></b> ?</p>

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
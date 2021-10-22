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
     <section class="content">
         <div class="row">
             <div class="col-xs-12">
                 <div class="box">

                     <div class="box">
                         <div class="box-header">
                             <a class="btn btn-success btn-flat" href="<?php echo base_url() . 'admin/tambah-berita' ?>"><span class="fa fa-plus"></span> Post Tulisan</a>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                             <table id="example1" class="table table-striped" style="font-size:13px;">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>Gambar</th>
                                         <th>Judul</th>
                                         <th>Tanggal</th>
                                         <th>Author</th>
                                         <th>Baca</th>
                                         <th>Kategori</th>
                                         <th style="text-align:right;">Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 0;
                                        foreach ($berita as $i) :
                                            $no++; ?>
                                         <tr>
                                             <td><?= $no ?></td>
                                             <td><img src="<?php echo base_url() . 'assets/images/berita/' . $i['tulisan_gambar']; ?>" style="width:90px;"></td>
                                             <td><?php echo $i['tulisan_judul']; ?></td>

                                             <td><?php echo $i['tulisan_tanggal']; ?></td>
                                             <td><?php echo $i['tulisan_author']; ?></td>
                                             <td><?php echo $i['tulisan_views']; ?></td>
                                             <td><?php echo $i['katnam']; ?></td>
                                             <td style="text-align:right;">
                                                 <a class="btn" href="<?php echo base_url() . 'admin/edit-berita/' . $i['tulisan_id']; ?>"><span class="fa fa-pencil"></span></a>
                                                 <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $i['tulisan_id']; ?>"><span class="fa fa-trash"></span></a>
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

 <!--Modal Hapus Pengguna-->
 <?php foreach ($berita as $i) :
        $tulisan_id = $i['tulisan_id'];
        $tulisan_judul = $i['tulisan_judul'];
        $tulisan_gambar = $i['tulisan_gambar'];
    ?>
     <div class="modal fade" id="ModalHapus<?php echo $tulisan_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                     <h4 class="modal-title" id="myModalLabel">Hapus Berita</h4>
                 </div>
                 <form class="form-horizontal" action="<?php echo base_url() . 'admin/hapus-berita' ?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">
                         <input type="hidden" name="id_tulisan" value="<?php echo $tulisan_id; ?>" />
                         <input type="hidden" value="<?php echo $tulisan_gambar; ?>" name="gambar">
                         <p>Apakah Anda yakin mau menghapus Posting <b><?php echo $tulisan_judul; ?></b> ?</p>

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
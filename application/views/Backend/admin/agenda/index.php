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
                             <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Agenda</a>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body table-responsive">
                             <table id="example1" class="table table-striped" style="font-size:13px;">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th style="width:100px;">Upload</th>
                                         <th>Agenda</th>
                                         <th>Tanggal</th>
                                         <th>Tempat</th>
                                         <th>Waktu</th>
                                         <th>Author</th>
                                         <th style="text-align:right;">Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 0;
                                        foreach ($agenda as $i) :
                                            $no++;
                                        ?>
                                         <tr>
                                             <td><?php echo $no ?></td>
                                             <td><?php echo $i['tanggal'] ?></td>
                                             <td><?php echo $i['agenda_nama'] ?></td>
                                             <td><?php echo $i['agenda_mulai'] ?> s/d <?php echo $i['agenda_mulai'] ?></td>
                                             <td><?php echo $i['agenda_tempat'] ?></td>
                                             <td><?php echo $i['agenda_waktu'] ?></td>
                                             <td><?php echo $i['agenda_author'] ?></td>
                                             <td style="text-align:right;">
                                                 <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $i['agenda_id'] ?>"><span class="fa fa-pencil"></span></a>
                                                 <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $i['agenda_id'] ?>"><span class="fa fa-trash"></span></a>
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
                 <h4 class="modal-title" id="myModalLabel">Add Agenda</h4>
             </div>
             <form class="form-horizontal" action="<?php echo base_url() . 'admin/tambah-agenda' ?>" method="post" enctype="multipart/form-data">
                 <div class="modal-body">

                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Nama Agenda</label>
                         <div class="col-sm-7">
                             <input type="text" name="xnama_agenda" class="form-control" id="inputUserName" placeholder="Nama Agenda" required>
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                         <div class="col-sm-7">
                             <textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..." required></textarea>
                         </div>
                     </div>

                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Mulai</label>
                         <div class="col-sm-7">
                             <div class="input-group date">
                                 <div class="input-group-addon">
                                     <i class="fa fa-calendar"></i>
                                 </div>
                                 <input type="date" class="form-control" name="xmulai" id="xmulai" required>

                             </div>
                         </div>
                         <!-- /.input group -->
                     </div>
                     <!-- /.form group -->

                     <!-- Date range -->
                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Selesai</label>
                         <div class="col-sm-7">
                             <div class="input-group date">
                                 <div class="input-group-addon">
                                     <i class="fa fa-calendar"></i>
                                 </div>
                                 <input type="date" class="form-control" name="xselesai" id="xselesai" required>
                             </div>
                         </div>
                         <!-- /.input group -->
                     </div>
                     <!-- /.form group -->
                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Tempat</label>
                         <div class="col-sm-7">
                             <input type="text" name="xtempat" class="form-control" id="inputUserName" placeholder="Tempat" required>
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Waktu</label>
                         <div class="col-sm-7">
                             <input type="text" name="xwaktu" class="form-control" id="inputUserName" placeholder="Contoh: 10.30-11.00 WIB" required>
                         </div>
                     </div>

                     <div class="form-group">
                         <label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
                         <div class="col-sm-7">
                             <textarea class="form-control" name="xketerangan" rows="2" placeholder="Keterangan ..."></textarea>
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





 <?php foreach ($agenda as $i) :
        $agenda_id = $i['agenda_id'];
        $agenda_nama = $i['agenda_nama'];
        $agenda_deskripsi = $i['agenda_deskripsi'];
        $agenda_mulai = $i['agenda_mulai'];
        $agenda_selesai = $i['agenda_selesai'];
        $agenda_tempat = $i['agenda_tempat'];
        $agenda_waktu = $i['agenda_waktu'];
        $agenda_keterangan = $i['agenda_keterangan'];
        $agenda_author = $i['agenda_author'];
        $tangal = $i['tanggal'];
    ?>
     <!--Modal Edit Pengguna-->
     <div class="modal fade" id="ModalEdit<?php echo $agenda_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                     <h4 class="modal-title" id="myModalLabel">Edit Agenda</h4>
                 </div>
                 <form class="form-horizontal" action="<?php echo base_url() . 'admin/edit-agenda' ?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">

                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Nama Agenda</label>
                             <div class="col-sm-7">
                                 <input type="hidden" name="id_agenda" value="<?php echo $agenda_id; ?>">
                                 <input type="text" name="xnama_agenda" class="form-control" value="<?php echo $agenda_nama; ?>" id="inputUserName" placeholder="Nama Agenda" required>
                             </div>
                         </div>
                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                             <div class="col-sm-7">
                                 <textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..." required><?php echo $agenda_deskripsi; ?></textarea>
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Mulai</label>
                             <div class="col-sm-7">
                                 <div class="input-group date">
                                     <div class="input-group-addon">
                                         <i class="fa fa-calendar"></i>
                                     </div>
                                     <input type="date" class="form-control" value="<?php echo $agenda_mulai; ?>" name="xmulai" id="xmulai" required>
                                 </div>
                             </div>
                             <!-- /.input group -->
                         </div>
                         <!-- /.form group -->

                         <!-- Date range -->
                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Selesai</label>
                             <div class="col-sm-7">
                                 <div class="input-group date">
                                     <div class="input-group-addon">
                                         <i class="fa fa-calendar"></i>
                                     </div>

                                     <input type="date" class="form-control" value="<?php echo $agenda_selesai; ?>" name="xselesai" id="xselesai" required>
                                 </div>
                             </div>
                             <!-- /.input group -->
                         </div>
                         <!-- /.form group -->
                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Tempat</label>
                             <div class="col-sm-7">
                                 <input type="text" name="xtempat" class="form-control" value="<?php echo $agenda_tempat; ?>" id="inputUserName" placeholder="Tempat" required>
                             </div>
                         </div>
                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Waktu</label>
                             <div class="col-sm-7">
                                 <input type="text" name="xwaktu" class="form-control" value="<?php echo $agenda_waktu; ?>" id="inputUserName" placeholder="Contoh: 10.30-11.00 WIB" required>
                             </div>
                         </div>

                         <div class="form-group">
                             <label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
                             <div class="col-sm-7">
                                 <textarea class="form-control" name="xketerangan" rows="2" placeholder="Keterangan ..."><?php echo $agenda_keterangan; ?></textarea>
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


 <?php foreach ($agenda as $i) :
        $agenda_id = $i['agenda_id'];
        $agenda_nama = $i['agenda_nama'];
    ?>
     <!--Modal Hapus Pengguna-->
     <div class="modal fade" id="ModalHapus<?php echo $agenda_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                     <h4 class="modal-title" id="myModalLabel">Hapus Agenda</h4>
                 </div>
                 <form class="form-horizontal" action="<?php echo base_url() . 'admin/agenda/hapus' ?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">
                         <input type="hidden" name="id_agenda" value="<?php echo $agenda_id; ?>" />
                         <p>Apakah Anda yakin mau menghapus <b><?php echo $agenda_nama; ?></b> ?</p>

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
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
                         <!-- /.box-header -->
                         <div class="box-body">
                             <table id="example1" class="table table-striped" style="font-size:12px;">
                                 <thead>
                                     <tr>
                                         <th style="width:70px;">#Tanggal</th>
                                         <th>Nama</th>
                                         <th>Email</th>
                                         <th>Pesan</th>
                                         <th style="text-align:right;">Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 0;
                                        foreach ($data as $i) :
                                            $no++;
                                            $inbox_id = $i['inbox_id'];
                                            $inbox_nama = $i['inbox_nama'];
                                            $inbox_email = $i['inbox_email'];
                                            $inbox_msg = $i['inbox_pesan'];
                                            $tanggal = $i['tanggal'];
                                        ?>
                                         <tr>
                                             <td><?php echo $tanggal; ?></td>
                                             <td><?php echo $inbox_nama; ?></td>
                                             <td><?php echo $inbox_email; ?></td>
                                             <td><?php echo $inbox_msg; ?></td>
                                             <td style="text-align:right;">
                                                 <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $inbox_id; ?>"><span class="fa fa-trash"></span></a>
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
     <!-- /.content -->
     <!-- Main content -->

     <!-- tutup konten -->
 </div>
 <!-- /.content-wrapper -->



 <?php foreach ($data as $i) :
        $inbox_id = $i['inbox_id'];
        $inbox_nama = $i['inbox_nama'];
        $inbox_email = $i['inbox_email'];
        $inbox_msg = $i['inbox_pesan'];
        $tanggal = $i['tanggal'];
    ?>
     <!--Modal Hapus Pengguna-->
     <div class="modal fade" id="ModalHapus<?php echo $inbox_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                     <h4 class="modal-title" id="myModalLabel">Hapus Agenda</h4>
                 </div>
                 <form class="form-horizontal" action="<?php echo base_url() . 'admin/hapus-inbox' ?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">
                         <input type="hidden" name="kode" value="<?php echo $inbox_id; ?>" />
                         <p>Apakah Anda yakin mau menghapus data ini?</p>

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
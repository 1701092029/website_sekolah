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
             <li class="active"><?= $title ?></li>
         </ol>
     </section>

     <!-- isi konten -->

     <section class="content">

         <!-- SELECT2 EXAMPLE -->
         <div class="box box-default">
             <div class="box-header with-border">
                 <h3 class="box-title">Buat Berita</h3>
             </div>

             <form action="<?php echo base_url() . 'admin/simpan-berita' ?>" method="post" enctype="multipart/form-data">

                 <!-- /.box-header -->
                 <div class="box-body">
                     <div class="row">
                         <div class="col-md-10">
                             <input type="text" name="judul" class="form-control" placeholder="Judul berita atau artikel" required />
                         </div>
                         <!-- /.col -->
                         <div class="col-md-2">
                             <div class="form-group">
                                 <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
                                 <!-- /.form-group -->
                             </div>
                             <!-- /.col -->
                         </div>
                         <!-- /.row -->
                     </div>
                     <!-- /.box-body -->

                 </div>
         </div>
         <!-- /.box -->

         <div class="row">
             <div class="col-md-8">

                 <div class="box box-danger">
                     <div class="box-header">
                         <h3 class="box-title">Berita</h3>
                     </div>
                     <div class="box-body">

                         <textarea id="ckeditor" name="isi" required></textarea>

                     </div>
                     <!-- /.box-body -->
                 </div>
                 <!-- /.box -->

             </div>
             <!-- /.col (left) -->
             <div class="col-md-4">
                 <div class="box box-primary">
                     <div class="box-header">
                         <h3 class="box-title">Pengaturan Lainnya</h3>
                     </div>
                     <div class="box-body">

                         <div class="form-group">
                             <label>Kategori</label>
                             <select class="form-control select2" name="kategori" style="width: 100%;" required>
                                 <option value="">-Pilih-</option>
                                 <?php foreach ($kategori as $i) :  ?>
                                     <option value="<?= $i['kategori_id'] ?>">-<?= $i['kategori_nama'] ?>-</option>
                                 <?php endforeach; ?>

                             </select>
                         </div>

                         <div class="form-group">
                             <label>Gambar</label>
                             <input type="file" name="filefoto" style="width: 100%;" required>
                         </div>
                         <!-- /.form group -->
                         <div class="form-group">
                             <label>
                                 <input type="checkbox" class="minimal" name="ximgslider" value="1">
                                 Tampilkan pada Image Slider
                             </label>
                         </div>

                     </div>
                     <!-- /.box-body -->
                 </div>
                 <!-- /.box -->
                 </form>

                 <!-- /.box -->
             </div>
             <!-- /.col (right) -->
         </div>
         <!-- /.row -->

     </section>



 </div>
<!-- Content Seciton -->






<!-- News Updates -->

<div class="clear"></div>
<!-- Gallery -->
<div class="gallery">
    <div class="gallery_top">
        <div class="gallery_heading">
            <h2>Gallery Photo</h2>
        </div>
        <div class="select_gallery">

        </div>
        <div class="clear"></div>
    </div>
    <!-- Col1 -->
    <?php
    $b = $galeri->row_array();
    // var_dump($b);
    // die;
    ?>
    <div class="categorydiv">
        <ul>
            <li><a href="<?php echo base_url() . 'galeri' ?>">Semua</a></li>
            <?php
            foreach ($album->result_array() as $i) {
                $alb_id = $i['album_id'];
                $alb_nama = $i['album_nama'];

            ?>

                <li><a href="<?php echo base_url() . 'galeri/album?kode_album=' . $alb_id; ?>" class=""><?php echo $alb_nama; ?></a></li>

            <?php } ?>

        </ul>


    </div>

    <div class="thumbdiv">
        <ul>
            <?php
            foreach ($galeri->result_array() as $a) {
                $id = $a['galeri_id'];
                $judul = $a['galeri_judul'];
                $gambar = $a['galeri_gambar'];

            ?>
                <li><a href="<?php echo base_url() . 'assets/images/album/galeri/' . $gambar ?>" rel="galleryimg" class="galleryimg" title="<?php echo $judul; ?>"><img width="108" height="101" src="<?php echo base_url() . 'assets/images/album/galeri/' . $gambar ?>" alt="" /></a></li>
            <?php } ?>
        </ul>
        <div class="hdiv">&nbsp;</div>
        <div class="pginaiton pad9">
            <ul>
                <li><?php echo $page; ?></li>
            </ul>
        </div>
    </div>

</div>

<div class="clear"></div>
</div>
<div class="clear"></div>

</div>
</div>
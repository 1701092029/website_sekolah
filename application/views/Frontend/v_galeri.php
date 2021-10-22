<!-- Content Seciton -->
<div id="content_section">
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
        <div class="categorydiv">
            <ul>
                <li><a class="" href="<?php base_url() . 'galeri' ?>">Semua</a></li>
                <?php
                foreach ($data->result_array() as $i) {
                    $alb_id = $i['album_id'];
                    $alb_nama = $i['album_nama'];

                ?>
                    <li><a href="<?php echo base_url() . 'galeri/album?kode_album=' . $alb_id; ?>"><?php echo $alb_nama; ?></a></li>
                <?php } ?>
            </ul>


        </div>

        <div class="thumbdiv">
            <ul>
                <?php
                foreach ($all_galeri->result_array() as $a) {
                    $id = $a['galeri_id'];
                    $judul = $a['galeri_judul'];
                    $gambar = $a['galeri_gambar'];
                    // var_dump($gambar);
                    // die;

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
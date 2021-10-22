<div class="col2">
    <div class="ads">
        <a href="#"><img src="<?php echo base_url() . 'template/images/poster.png' ?>" alt="" /></a>
    </div>
    <!-- Blog guru dan Siswa Baru -->
    <div class="rtab">
        <div class="tab_navigation">
            <ul>
                <li><a href="#rtab2">Guru Baru</a> </li>
            </ul>
        </div>


        <div class="rtab_content" id="rtab2" style="display:none;">
            <ul>
                <?php
                $data_siswa = $this->db->query("SELECT * FROM tbl_guru ORDER BY guru_id DESC LIMIT 4");
                foreach ($data_siswa->result_array() as $i) :
                    $nip = $i['guru_nip'];
                    $nama = $i['guru_nama'];
                    $mapel = $i['guru_mapel'];
                    $photo = $i['guru_photo'];


                ?>
                    <li>
                        <?php if (empty($photo)) : ?>
                            <div class="thumb"><a href="#"><img width="40" height="40" src="<?php echo base_url() . 'assets/images/guru/user_blank.png'; ?>" alt="" /></a></div>
                        <?php else : ?>
                            <div class="thumb"><a href="#"><img width="40" height="40" src="<?php echo base_url() . 'assets/images/guru/' . $photo; ?>" alt="" /></a></div>
                        <?php endif; ?>
                        <div class="description">
                            <h6><a href="#"><?php echo $nama; ?></a></h6>
                            <p><a href="#" class="gray"><?php echo $mapel; ?></a></p>
                        </div>
                    </li>
                <?php endforeach; ?>

            </ul>
            <div class="clear"></div>
        </div>

    </div>
    <!-- Our College Gallery -->
    <div class="college_gallery">
        <div style="background-color:#fffdd9;height:35px;font-size:16px;border-bottom:1px solid #ccc;">
            <h4 style="padding-top:5px;padding-left:9px;">Gallery Photo</h4>
        </div>
        <ul>
            <?php
            foreach ($galeri->result_array() as $g) {
                $galeri_id = $g['galeri_id'];
                $galeri_judul = $g['galeri_judul'];
                $galeri_tanggal = $g['tanggal'];
                $galeri_author = $g['galeri_author'];
                $galeri_gambar = $g['galeri_gambar'];
                $galeri_album_id = $g['galeri_album_id'];
                $galeri_album_nama = $g['album_nama'];

            ?>
                <li>
                    <div class="thumb"><a href="<?php echo base_url() . 'galeri' ?>"><img width="40" height="40" src="<?php echo base_url() . 'assets/images/album/galeri/' . $galeri_gambar; ?>" alt="" /></a></div>
                    <div class="description">
                        <h6><a href="<?php echo base_url() . 'galeri' ?>"><?php echo $galeri_judul; ?></a></h6>
                        <a class="gray" href="#"><em><?php echo 'Tanggal ' . $galeri_tanggal; ?></em></a>
                    </div>
                </li>
            <?php } ?>

        </ul>
    </div>
    <div class="clear"></div>
    <!--col2 ends -->
</div>
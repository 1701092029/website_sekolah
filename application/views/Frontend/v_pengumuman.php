<div id="content_section">

    <div class="clear"></div>
    <!-- Col1 -->
    <div class="col1">
        <!-- Banner -->
        <div id="banner1">
            <a href="#"><img src="<?php echo base_url() . 'template/images/newsbanner.gif' ?>" alt="" /></a>
            <div class="heading">
                <h1>Guru M-Sekolah</h1>
            </div>
        </div>

        <!-- Content Heading -->
        <div id="content2">
            <h2 class="pad8">Pengumuman Terbaru</h2>
            <div class='col-md-4'>
                <div class="top_search">
                    <div class="advance_search"><a href="#"></a></div>
                    <form action="<?= base_url() ?>pengumuman" method="POST">
                        <ul>
                            <li><input type="text" name="keyword_berita" placeholder="Cari Pengumuman" /></li>
                            <li><button type="submit" name="submit" class="search">Search</button></li>
                        </ul>
                    </form>
                </div>
            </div>
            <!-- Blog Listing -->
            <ul class="listing">
                <?php
                $no = 0;
                foreach ($data->result_array() as $i) :
                    $no++;
                    $id = $i['pengumuman_id'];
                    $judul = $i['pengumuman_judul'];
                    $deskripsi = $i['pengumuman_deskripsi'];
                    $author = $i['pengumuman_author'];
                    $tanggal = $i['pengumuman_tanggal'];

                ?>
                    <li>
                        <div class="thumb"><a href=""><img width="126" height="106" src="<?php echo base_url() . 'template/images/pengumuman.png' ?>" alt="" /></a></div>
                        <div class="description">
                            <h6><a href="" class="colr"><?php echo $judul; ?></a></h6>
                            <?php echo $deskripsi; ?>
                            <div class="clear"></div>
                            <div class="info">
                                <span class="postedby">Di Post Oleh: <?php echo $author; ?></span>
                                <span class="lastupdte">Tanggal: <i><?php echo $tanggal; ?></i></span>

                            </div>
                        </div>
                        <div class="clear"></div>
                    </li>
                <?php endforeach; ?>

            </ul>
            <div class="clear"></div>
            <!-- pagination Listing -->
            <div class="pginaiton pad9">
                <ul>
                    <li><?php echo $page; ?></li>

                </ul>
            </div>
            <div class="clear"></div>
        </div>


        <div class="clear"></div>
    </div>
    <!-- Col2 -->
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

        <!-- Post New  Blog  -->
        <div class="course_right">
            <div class="crheading">
                <h5 style="margin-left: 20px;">Post Terbaru</h5>
            </div>
            <ul>
                <?php
                $query = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_img_slider='0' ORDER BY tulisan_id DESC limit 7");
                foreach ($query->result_array() as $n) :
                    $berita_id = $n['tulisan_id'];
                    $berita_judul = $n['tulisan_judul'];
                    $berita_isi = $n['tulisan_isi'];
                    $berita_tgl = $n['tanggal'];
                    $berita_kategori = $n['tulisan_kategori_nama'];
                    $berita_gambar = $n['tulisan_gambar'];
                    $berita_author = $n['tulisan_author'];

                ?>
                    <li>
                        <div class="thumb"><a href="<?php echo base_url() . 'berita/berita_detail/' . $berita_id; ?>"><img width="32" height="32" src="<?php echo base_url() . 'assets/images/berita/' . $berita_gambar; ?>" alt="" /></a></div>
                        <div class="description">
                            <h6 style="margin-left: 5px;"><a href="<?php echo base_url() . 'berita/berita_detail/' . $berita_id; ?>"><?php echo $berita_judul; ?></a></h6>
                            <a class="gray1" href="#" style="margin-left: 5px;"><?php echo $berita_tgl; ?> </a>
                        </div>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>

        <div class="clear"></div>
        <!--col2 ends -->
    </div>
    <div class="clear"></div>
</div>
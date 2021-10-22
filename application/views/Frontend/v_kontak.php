<div id="content_section">

    <div class="clear"></div>
    <!-- Col1 -->
    <div class="col1">
        <!-- Banner -->
        <br>

        <!-- Content Heading -->
        <h3>
            <center>DENAH LOKASI SMPN 2 NAN SABARIS</center> <br>
        </h3>
        <!--  -->


        <div class="clear"></div>
    </div>
    <div id="content_section">

        <div class="clear"></div>
        <!-- Col1 -->
        <div class="col1">


            <div class="clear"></div>
            <!-- Note -->

            <div class="clear"></div>

            <div class="contactblock">
                <!-- Contact block  -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31916.322225359774!2d100.16330524597171!3d-0.6764238771795512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4e6aab0ea014f%3A0x1c2c16d5dca4bc30!2sSmp%20N%202%20Nan%20Sabaris!5e0!3m2!1sid!2sid!4v1628671617777!5m2!1sid!2sid" width="696" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>

                <div class="clear"></div>
            </div>
            <div class="contactblock">

                <?php echo $this->session->flashdata('msg'); ?>

                <div class="block1">
                    <h5>Kirim Pesan</h5>
                    <form action="<?php echo base_url() . 'kontak/kirim-pesan' ?>" method="post">
                        <ul class="inquiry">
                            <li><input name="xnama" type="text" placeholder="Nama" required /></li>
                            <li><input name="xemail" type="email" placeholder="Email" required /></li>
                            <li><input name="xkontak" type="text" placeholder="Kontak Person" required /></li>

                            <li>
                                <textarea rows="0" cols="0" name="xpesan" class="txtarea" placeholder="Tinggalkan Pesan disini" required></textarea>
                            </li>

                        </ul>
                        <div class="action">
                            <button class="btn1 left" type="submit">Kirim</button>
                    </form>
                </div>
            </div>
            <div class="block2">
                <!-- Visit Address -->
                <h5>Alamat</h5>
                <div class="mailingaddress">
                    <p>Jl. Tengku Sidi, Sinur, Kec. Nan Sabaris</p>
                    <p>Kab.Padang Pariaman,</p>
                    <p>Sumatera Barat</p>
                </div>
                <div class="teleno colr">(+62) 831-9343-5809</div>
                <div class="emailaddress">
                    <a href="#">smp2nansabaris@gmail.com</a>
                    <a href="#">www.smpn2nansabaris.com</a>
                </div>

            </div>

            <div class="clear"></div>
        </div>
        <div class="clear"></div>


        <div class="clear"></div>
        <!-- col1 ends -->
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
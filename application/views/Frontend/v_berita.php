<?php
function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}

?>

<!--  -->
<div id="content_section">
    <!-- News Updates -->

    <div class="clear"></div>
    <!-- Col1 -->
    <div class="col1">
        <!-- Banner -->
        <div id="banner1">
            <a href="#"><img src="<?php echo base_url() . 'template/images/newsbanner.gif' ?>" alt="" /></a>
            <div class="heading">
                <h1>Berita / Artikel</h1>
            </div>
        </div>

        <!-- Content Heading -->
        <div id="content2">
            <div class="row">
                <div class='col-md-4'>
                    <h2 class="pad6">
                        <h1>Berita / Artikel</h1>
                    </h2>
                </div>
                <div class='col-md-4'>
                    <div class="top_search">
                        <div class="advance_search"><a href="#"></a></div>
                        <form action="<?= base_url() ?>berita" method="POST">
                            <ul>
                                <li><input type="text" name="keyword_berita" placeholder="Cari Berita" /></li>
                                <li><button type="submit" name="submit" class="search">Search</button></li>
                            </ul>
                        </form>
                    </div>
                </div>

            </div>
            <!-- Blog Listing -->
            <ul class="listing">
                <?php
                $no = 0;
                foreach ($data->result_array() as $i) :
                    $no++;
                    $tulisan_id = $i['tulisan_id'];
                    $tulisan_judul = $i['tulisan_judul'];
                    $tulisan_isi = $i['tulisan_isi'];
                    $tulisan_tanggal = $i['tulisan_tanggal'];
                    $tulisan_author = $i['tulisan_author'];
                    $tulisan_gambar = $i['tulisan_gambar'];
                    $tulisan_views = $i['tulisan_views'];
                    $kategori_id = $i['tulisan_kategori_id'];
                    $kategori_nama = $i['tulisan_kategori_nama'];

                ?>
                    <li>
                        <div class="thumb"><a href="<?php echo base_url() . 'detail-berita/' . $tulisan_id; ?>"><img width="126" height="106" src="<?php echo base_url() . 'assets/images/berita/' . $tulisan_gambar; ?>" alt="" /></a></div>
                        <div class="description">
                            <h6><a href="<?php echo base_url() . 'detail-berita/' . $tulisan_id; ?>" class="colr"><?php echo $tulisan_judul; ?></a></h6>
                            <?php echo limit_words($tulisan_isi, 30) . '...' ?>
                            <div class="clear"></div>
                            <div class="info">
                                <span class="postedby">Di Post Oleh: <?php echo $tulisan_author; ?></span>
                                <span class="lastupdte"> Tanggal:<i><?php echo $tulisan_tanggal; ?></i></span>
                                <span class="comments">Dibaca: <strong><?php echo $tulisan_views; ?></strong> Kali</span>
                                <a class="moreinfo" href="<?php echo base_url() . 'berita/berita_detail/' . $tulisan_id; ?>">Baca Selengkapnya</a>
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


        <!-- Recent Blog Top Rating -->

        <div class="course_right">
            <div class="crheading">
                <h5 style="margin-left: 20px;">Post Populer</h5>
            </div>
            <ul>
                <?php
                $query = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_img_slider='0' ORDER BY tulisan_views DESC limit 5");
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
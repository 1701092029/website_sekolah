<?php
function limit_words($string, $word_limit)
{
    $words = explode(" ", $string);
    return implode(" ", array_splice($words, 0, $word_limit));
}

?>
<?php
$b = $data->row_array();
?>

<div id="content_section">
    <!-- News Updates -->

    <div class="clear"></div>
    <!-- Col1 -->
    <div class="col1">
        <!-- Banner -->

        <!-- Content Links -->

        <!-- Content Heading -->
        <div id="content2">
            <!-- Blog Detail -->
            <div class="blog_detail">
                <a href="#"><img class="" src="<?php echo base_url() . 'assets/images/berita/' . $b['tulisan_gambar']; ?>" alt="" /></a>
                <div class="bloginfo">
                    <h5><?php echo $b['tulisan_judul']; ?> </h5>
                    <div class="info info1">
                        <span class="postedby">Di Post Oleh: <?php echo $b['tulisan_author']; ?></span>
                        <span class="lastupdte">Tanggal: <i><?php echo $b['tanggal']; ?></i></span>
                        <span class="comments">Di Baca<strong><?php echo $b['tulisan_views']; ?></strong> kali</a></span>

                    </div>
                    <div class="clear"></div>
                </div>
                <?php echo $b['tulisan_isi']; ?>

            </div>

            <div class="clear"></div>

        </div>
        <div class="clear"></div>
    </div>
    <!-- Col2 -->
    <div class="col2">
        <div class="ads">
            <a href="#"><img src="<?php echo base_url() . 'template/images/ads.png' ?>" alt="" /></a>
        </div>
        <!-- Post New  Blog  -->
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
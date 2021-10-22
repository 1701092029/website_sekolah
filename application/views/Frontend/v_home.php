<?php
function limit_words($string, $word_limit)
{
  $words = explode(" ", $string);
  return implode(" ", array_splice($words, 0, $word_limit));
}


?>
<!-- Content Seciton -->
<div id="content_section">
  <!-- News Updates -->
  <div class="clear"></div>
  <!-- Col1 -->
  <div class="col1">
    <!-- Banner -->
    <div id="banner">
      <div id="slider2">
        <?php
        foreach ($brt->result_array() as $br) {
          $berita_id = $br['tulisan_id'];
          $berita_judul = $br['tulisan_judul'];
          $berita_isi = $br['tulisan_isi'];
          $berita_kategori = $br['tulisan_kategori_nama'];
          $berita_gambar = $br['tulisan_gambar'];
          $berita_author = $br['tulisan_author'];

        ?>
          <div class="contentdiv">
            <a href="#"><img src="<?php echo base_url() . 'assets/images/berita/' . $berita_gambar; ?>" alt="" /></a>
            <div class="banner_des">
              <h4><?php echo $berita_judul; ?> </h4>
              <?php echo limit_words($berita_isi, 15) . '...'; ?>
            </div>
          </div>
        <?php } ?>



      </div>
      <div id="paginate-slider2" class="pagination">
      </div>
      <script type="text/javascript" src="<?php echo base_url() . 'template/js/slider.js' ?>"></script>

    </div>

    <!-- Content Heading -->
    <div class="content_heading">
      <div class="heading">
        <h2>SMP 2 Nan Sabaris</h2>
      </div>

    </div>
    <p class="text">
      Website SMP 2 Nan Sabaris adalah website yang dibangun untuk sekolah untuk menunjang transparasi informasi dan promosi sekolah SMP 2 Nan Sabaris.
    <p>Dengan terbitnya Website Sekolah SMP 2 Nan Sabaris, berharap : Peningkatan layanan pendidikan kepada siswa, orangtua, dan masyarakat pada umumnya semakin meningkat. Sebaliknya orangtua dapat mengakses informasi tentang kegiatan akademik dan non akademik putra - puterinya di sekolah ini. Dengan fasilitas ini Siswa dapat mengakses berbagai informasi pembelajaran dan informasi akademik.</p>
    </p>
    <div class="clear"></div>
    <!-- Content Block -->
    <div class="contentblock">
      <!-- Tabs -->
      <div class="tabwrapper">
        <div class="tabs_links">
          <ul>
            <li><a href="#tab1">Berita</a></li>
            <li><a href="#tab2">Pengumuman</a></li>
            <li><a href="#tab3">Agenda</a></li>

          </ul>
        </div>
        <div class="tab_content" id="tab1" style="display:none">
          <ul>

            <?php
            foreach ($berita->result_array() as $n) {
              $berita_id = $n['tulisan_id'];
              $berita_judul = $n['tulisan_judul'];
              $berita_isi = $n['tulisan_isi'];
              $berita_tgl = $n['tanggal'];
              $berita_kategori = $n['tulisan_kategori_nama'];
              $berita_gambar = $n['tulisan_gambar'];
              $berita_author = $n['tulisan_author'];

            ?>
              <li>
                <div class="thumb">
                  <a href="<?php echo base_url() . 'berita/berita_detail/' . $berita_id; ?>"><img width="53" height="53" src="<?php echo base_url() . 'assets/images/berita/' . $berita_gambar; ?>" alt=" " /></a>
                </div>
                <div class="descripton">
                  <h6><a href="<?php echo base_url() . 'berita/berita_detail/' . $berita_id; ?>"><?php echo $berita_judul; ?></a></h6>
                  <em>(Tanggal <?php echo $berita_tgl; ?> | by <?php echo $berita_author; ?>)</em>
                </div>
              </li>
            <?php } ?>

          </ul>
          <div class="clear"></div>
        </div>

        <div class="tab_content" id="tab2" style="display:none">
          <ul>
            <?php
            $no = 0;
            foreach ($pengumuman->result_array() as $p) :
              $no++;
              $id = $p['pengumuman_id'];
              $judul = $p['pengumuman_judul'];
              $deskripsi = $p['pengumuman_deskripsi'];
              $author = $p['pengumuman_author'];
              $tanggal = $p['tanggal'];

            ?>

              <li>
                <div class="thumb">
                  <a href="<?php echo base_url() . 'pengumuman' ?>"><img width="60" height="60" src="<?php echo base_url() . 'template/images/pengumuman.png' ?>" alt=" " /></a>
                </div>
                <div class="descripton">
                  <h6><a href="<?php echo base_url() . 'pengumuman' ?>"><?php echo $judul; ?></a></h6>
                  <em>(Posted on <?php echo $tanggal; ?>)</em>
                  <p> <?php echo limit_words($deskripsi, 10) . '...'; ?></p>

                </div>
              </li>
            <?php endforeach; ?>

          </ul>
          <div class="clear"></div>
        </div>

        <div class="tab_content" id="tab3" style="display:none">
          <ul>
            <?php
            $no = 0;
            foreach ($agenda->result_array() as $g) :
              $no++;
              $agenda_id = $g['agenda_id'];
              $agenda_nama = $g['agenda_nama'];
              $agenda_deskripsi = $g['agenda_deskripsi'];
              $agenda_mulai = $g['agenda_mulai'];
              $agenda_selesai = $g['agenda_selesai'];
              $agenda_tempat = $g['agenda_tempat'];
              $agenda_waktu = $g['agenda_waktu'];
              $agenda_keterangan = $g['agenda_keterangan'];
              $agenda_author = $g['agenda_author'];
              $tanggal = $g['tanggal'];

            ?>
              <li>
                <div class="thumb">
                  <a href="<?php echo base_url() . 'agenda' ?>"><img width="60" height="60" src="<?php echo base_url() . 'template/images/agenda.png' ?>" alt=" " /></a>
                </div>
                <div class="descripton">
                  <h6><a href="<?php echo base_url() . 'agenda' ?>"><?php echo $agenda_nama; ?></a></h6>
                  <em>(Posted on <?php echo $tanggal; ?>)</em>
                  <p><?php echo limit_words($agenda_deskripsi, 10) . '...' ?></p>

                </div>
              </li>
            <?php endforeach; ?>
            <li>

          </ul>
          <div class="clear"></div>
        </div>



      </div>
      <!-- Search Course -->

      <div class="search_course">
        <h4>Download</h4>
        Silahkan download file terbaru berikut:
        <div class="box">
          <div class="apply_now">
            <a class="aply_now" href="#">Download</a>

          </div>
          <!-- Degree Type -->
          <div class="degree_type"><br />
            <ul>
              <?php
              $no = 0;
              foreach ($download->result_array() as $d) :
                $no++;
                $id = $d['file_id'];
                $judul = $d['file_judul'];
                $deskripsi = $d['file_deskripsi'];
                $oleh = $d['file_oleh'];
                $tanggal = $d['tanggal'];
                $download = $d['file_download'];
                $file = $d['file_data'];
              ?>

                <li> <span><a href="<?php echo base_url() . 'download/get_file/' . $id; ?>"><?php echo $judul; ?></a></span> <a class="btn right" href="<?php echo base_url() . 'download/get_file/' . $id; ?>">Download</a></li>
              <?php endforeach; ?>


            </ul>
          </div>

          <div class="clear"></div>

          <!-- apply now -->
          <div class="apply_now">
            <a class="aply_now" href="#"></a>
            <a class="find_out_how" href="<?php echo base_url() . 'download' ?>">Lihat Semua</a>
          </div>
        </div>

      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <!-- col1 ends -->
  </div>
  <!--  -->
  <!-- sidebar -->

  <?php $this->load->view('Frontend/Template/sidebar'); ?>
  <!--  -->

  <?php $this->load->view('Frontend/Template/slider'); ?>
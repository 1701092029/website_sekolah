<?php


class Admin_model extends CI_model
{

    ///KATEGORI BACKEND

    //pengguna
    function get_all_pengguna()
    {
        $hsl = $this->db->query("SELECT * FROM user");
        return $hsl;
    }

    //berita kategori

    function get_all_kategori()
    {
        $hsl = $this->db->query("select * from tbl_kategori");
        return $hsl->result_array();
    }

    //berita
    function get_all_berita()
    {
        $hsl = $this->db->query("select tbl_tulisan.*,tbl_kategori.kategori_nama as katnam  from tbl_tulisan,tbl_kategori where tbl_tulisan.tulisan_kategori_id = tbl_kategori.kategori_id order by tulisan_tanggal desc");
        return $hsl->result_array();
    }

    function get_all_berita_id($id)
    {
        $hsl = $this->db->query("select * from tbl_tulisan where tulisan_id='$id'");
        return $hsl->row_array();
    }

    // agenda

    function get_all_agenda()
    {
        $hsl = $this->db->query("select *,DATE_FORMAT(agenda_tanggal,'%d/%m/%Y') AS tanggal from tbl_agenda order by agenda_tanggal desc");
        return $hsl->result_array();
    }

    // pegnumuman

    function get_all_pengumuman()
    {
        $hsl = $this->db->query("select * from tbl_pengumuman order by pengumuman_tanggal desc");
        return $hsl->result_array();
    }

    // download
    function get_all_download()
    {
        $hsl = $this->db->query("select * from tbl_files order by file_tanggal desc");
        return $hsl->result_array();
    }

    function get_file_byid($id)
    {
        $hsl = $this->db->query("SELECT file_id,file_judul,file_deskripsi,DATE_FORMAT(file_tanggal,'%d/%m/%Y') AS tanggal,file_oleh,file_download,file_data FROM tbl_files WHERE file_id='$id'");
        return $hsl;
    }
    //album
    function get_all_album()
    {
        $hsl = $this->db->query("select * from tbl_album order by album_tanggal desc");
        return $hsl->result_array();
    }
    //photos
    function get_all_photos()
    {
        $hsl = $this->db->query("SELECT tbl_galeri.*, tbl_album.album_nama as galeri_album_nama  from tbl_galeri,tbl_album  where tbl_album.album_id=tbl_galeri.galeri_album_id order by tbl_galeri.galeri_tanggal desc");
        return $hsl->result_array();
    }
    //guru

    function get_all_guru()
    {
        $hsl = $this->db->query("select * from tbl_guru order by guru_tgl_input desc");
        return $hsl->result_array();
    }

    // inbox
    function get_all_inbox()
    {
        $hsl = $this->db->query("SELECT tbl_inbox.*,DATE_FORMAT(inbox_tanggal,'%d %M %Y') AS tanggal FROM tbl_inbox ORDER BY inbox_tanggal DESC");
        return $hsl;
    }
    function hapus_kontak($kode)
    {
        $hsl = $this->db->query("DELETE FROM tbl_inbox WHERE inbox_id='$kode'");
        return $hsl;
    }
    function update_status_kontak()
    {
        $hsl = $this->db->query("UPDATE tbl_inbox SET inbox_status='0'");
        return $hsl;
    }


    ///FRONTEND

    // A.GALERI
    function get_galeri_home()
    {
        $hsl = $this->db->query("SELECT tbl_galeri.*,DATE_FORMAT(galeri_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_galeri join tbl_album on galeri_album_id=album_id ORDER BY galeri_id DESC limit 4");
        return $hsl;
    }

    function get_galeri_by_album_id($idalbum)
    {
        $hsl = $this->db->query("SELECT tbl_galeri.*,DATE_FORMAT(galeri_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_galeri join tbl_album on galeri_album_id=album_id where galeri_album_id='$idalbum' ORDER BY galeri_id DESC");
        return $hsl;
    }



    //Front-End
    function get_berita_slider()
    {
        $hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_img_slider='1' ORDER BY tulisan_id DESC");
        return $hsl;
    }
    function get_berita_home()
    {
        $hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_img_slider='0' ORDER BY tulisan_id DESC limit 3");
        return $hsl;
    }

    function berita_perpage($limit, $offset, $keyword_berita = null)
    {

        // $sql = "SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY tulisan_id DESC limit $limit,$offset and if($keyword_berita) (tulisan_judul like %$keyword_berita%)";
        // $result = $this->db->query($sql);
        // return $result;
        // var_dump($result);
        // die;

        if ($keyword_berita) {
            $this->db->like('tulisan_judul', $keyword_berita);
        }
        $this->db->order_by('tulisan_id', 'DESC');
        return $this->db->get('tbl_tulisan', $limit, $offset);
        // $hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY tulisan_id DESC limit $offset,$limit");
        // return $hsl;
    }

    function berita()
    {
        $hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY tulisan_id DESC");
        return $hsl;
    }
    function get_berita_by_kode($kode)
    {
        $hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_id='$kode'");
        return $hsl;
    }

    function cari_berita($keyword)
    {
        $hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan WHERE tulisan_judul LIKE '%$keyword%'");
        return $hsl;
    }




    //Front-end pengumuman
    function get_pengumuman_home()
    {
        $hsl = $this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author FROM tbl_pengumuman ORDER BY pengumuman_id DESC limit 3");
        return $hsl;
    }

    function pengumuman()
    {
        $hsl = $this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author FROM tbl_pengumuman ORDER BY pengumuman_id DESC");
        return $hsl;
    }

    function pengumumantot()
    {
        $hsl = $this->db->query("SELECT * FROM tbl_pengumuman");
        return $hsl;
    }
    function pengumuman_perpage($limit, $offset, $keyword_berita = null)
    {
        // $hsl = $this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author FROM tbl_pengumuman ORDER BY pengumuman_id DESC limit $offset,$limit");
        // return $hsl;

        if ($keyword_berita) {
            $this->db->like('pengumuman_judul', $keyword_berita);
        }
        $this->db->order_by('pengumuman_id', 'DESC');
        return $this->db->get('tbl_pengumuman', $limit, $offset);
    }



    //front-end agenda
    function get_agenda_home()
    {
        $hsl = $this->db->query("SELECT tbl_agenda.*,DATE_FORMAT(agenda_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_agenda ORDER BY agenda_id DESC limit 3");
        return $hsl;
    }
    function agenda()
    {
        $hsl = $this->db->query("SELECT tbl_agenda.*,DATE_FORMAT(agenda_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_agenda ORDER BY agenda_id DESC");
        return $hsl;
    }
    function agenda_perpage($limit, $offset, $keyword_berita = null)
    {

        if ($keyword_berita) {
            $this->db->like('agenda_nama', $keyword_berita);
        }
        $this->db->order_by('agenda_id', 'DESC');
        return $this->db->get('tbl_agenda', $limit, $offset);
    }

    //Front-end file
    function get_files_home()
    {
        $hsl = $this->db->query("SELECT file_id,file_judul,file_deskripsi,DATE_FORMAT(file_tanggal,'%d/%m/%Y') AS tanggal,file_oleh,file_download,file_data FROM tbl_files ORDER BY file_id DESC limit 7");
        return $hsl;
    }


    //frontend-pengunjung
    function set_pengunjung($user_ip)
    {
        $hsl = $this->db->query("INSERT INTO tbl_pengunjung (pengunjung_ip) VALUES ('$user_ip')");
        return $hsl;
    }

    function statistik_pengujung()
    {
        $query = $this->db->query("SELECT DATE_FORMAT(pengunjung_tanggal,'%d') AS tgl,COUNT(pengunjung_ip) AS jumlah FROM tbl_pengunjung WHERE MONTH(pengunjung_tanggal)=MONTH(CURDATE()) GROUP BY DATE(pengunjung_tanggal)");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function simpan_user_agent($user_ip, $agent)
    {
        $hsl = $this->db->query("INSERT INTO tbl_pengunjung (pengunjung_ip,pengunjung_perangkat) VALUES('$user_ip','$agent')");
        return $hsl;
    }

    function cek_ip($user_ip)
    {
        $hsl = $this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_ip='$user_ip' AND DATE(pengunjung_tanggal)=CURDATE()");
        return $hsl;
    }

    // guru
    //front-end
    function guru()
    {
        $hsl = $this->db->query("SELECT * FROM tbl_guru");
        return $hsl;
    }
    function guru_perpage($limit, $offset, $keyword_berita = null)
    {

        if ($keyword_berita) {
            $this->db->like('guru_nama', $keyword_berita);
        }
        $this->db->order_by('guru_id', 'DESC');
        return $this->db->get('tbl_guru', $limit, $offset);

        // if ($keyword_berita) {
        //     $hsl = $this->db->query("SELECT * FROM tbl_guru and guru_nama LIKE '%$keyword_berita%' and limit $offset,$limit");
        //     return $hsl;
        // } else {
        //     $hsl = $this->db->query("SELECT * FROM tbl_guru limit $offset,$limit");
        //     return $hsl;
        // }
    }

    function get_all_galeri_front()
    {
        $hsl = $this->db->query("SELECT tbl_galeri.*,DATE_FORMAT(galeri_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_galeri join tbl_album on galeri_album_id=album_id ORDER BY galeri_id DESC");
        return $hsl;
    }

    function get_all_album_front($limit, $offset)
    {
        // $hsl = $this->db->query("SELECT tbl_album.*,DATE_FORMAT(album_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_album ORDER BY album_id DESC");
        // return $hsl;

        $hsl = $this->db->query("SELECT tbl_album.*,DATE_FORMAT(album_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_album ORDER BY album_id ASC limit $offset,$limit");
        return $hsl;

        // $this->db->order_by('album_id', 'ASC');
        // return $this->db->get('tbl_album', $limit, $offset);
    }

    function get_galeri_by_album_id_front($idalbum)
    {
        $hsl = $this->db->query("SELECT tbl_galeri.*,DATE_FORMAT(galeri_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_galeri join tbl_album on galeri_album_id=album_id where galeri_album_id='$idalbum' ORDER BY galeri_id DESC");
        return $hsl;
    }
    function jum_album()
    {
        $hsl = $this->db->query("SELECT * FROM tbl_album");
        return $hsl;
    }

    function get_all_files()
    {
        $hsl = $this->db->query("SELECT file_id,file_judul,file_deskripsi,DATE_FORMAT(file_tanggal,'%d/%m/%Y') AS tanggal,file_oleh,file_download,file_data FROM tbl_files ORDER BY file_id DESC");
        return $hsl;
    }


    function get_all_files_front($limit, $offset, $keyword_berita = null)
    {

        if ($keyword_berita) {
            $this->db->like('file_judul', $keyword_berita);
        }
        $this->db->order_by('file_tanggal', 'DESC');
        return $this->db->get('tbl_files', $limit, $offset);
    }

    // kontak frontend
    function kirim_pesan($nama, $email, $kontak, $pesan)
    {
        $hsl = $this->db->query("INSERT INTO tbl_inbox(inbox_nama,inbox_email,inbox_kontak,inbox_pesan) VALUES ('$nama','$email','$kontak','$pesan')");
        return $hsl;
    }
}

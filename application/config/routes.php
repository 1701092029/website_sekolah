    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    /*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method

*/

    //FRONTEND
    $route['Login/halaman-login'] = 'auth/index';



    $route['Pengaduan/halaman-dashboard'] = 'frontend/index';
    $route['Pengaduan/halaman-pengaduan'] = 'frontend/pengaduan_index';
    $route['Pengaduan/cari-pengaduan'] = 'frontend/pengaduan_cari';
    $route['Pengaduan/cek_pengaduan'] = 'frontend/cek_pengaduan';
    $route['Pengaduan/tambah-pengaduan'] = 'frontend/tambah_pengaduan';
    $route['Pengaduan/dashbord'] = 'frontend/index';


    $route['Pengaduan/halaman-cekpengaduan'] = 'frontend/cekpengaduan_index';
    $route['Pengaduan/data-pengaduan'] = 'frontend/cekdata_pengaduan';
    $route['Pengaduan/data-lengkappengaduan'] = 'frontend/datalengkap_cari';



    ///SUPER ADMIN
    $route['masterdata/petugas'] = 'admin/petugas';
    $route['masterdata/edit-petugas/(:any)'] = 'admin/editpetugas/$1';
    $route['masterdata/konfirmasi-petugas'] = 'admin/konfirmasi_petugas';
    $route['masterdata/resetpass-petugas'] = 'admin/resetpasswordpetugas';

    $route['masterdata/pelanggan'] = 'admin/index_pelanggan';
    $route['masterdata/tambah-pelanggan'] = 'admin/tambah_pelanggan';
    $route['masterdata/edit-pelanggan/(:any)'] = 'admin/editpelanggan/$1';
    $route['masterdata/hapus-pelanggan/(:any)'] = 'admin/hapuspelanggan/$1';

    $route['masterdata/pengaduan'] = 'admin/index_pengaduan';
    $route['masterdata/edit-pengaduan/(:any)/(:any)'] = 'admin/editpengaduan/$1/$2';
    $route['masterdata/hapus-pengaduan/(:any)'] = 'admin/hapuspengaduan/$1';


    ///PETUGAS
    $route['Petugas/index'] = 'Petugas';
    $route['Petugas/pengaduan'] = 'Petugas/index_pengaduan';
    $route['petugas/edit-pengaduan/(:any)/(:any)'] = 'petugas/editpengaduan/$1/$2';
    $route['Petugas/hapus-pengaduan/(:any)'] = 'Petugas/hapus_pengaduan/$1';

    $route['Petugas/pelanggan'] = 'petugas/index_pelanggan';
    $route['petugas/tambah-pelanggan'] = 'petugas/tambah_pelanggan';
    $route['petugas/edit-pelanggan/(:any)'] = 'petugas/editpelanggan/$1';


    $route['petugas/akun'] = 'petugas/akun';
    // $route['petugas/edit-petugas/(:any)'] = 'petugas/editpetugas/$1';
    $route['petugas/perbarui-petugas'] = 'petugas/perbaruipasswordpetugas';



    //ADMIN
    $route['admin'] = 'admin/Admin/index';

    $route['admin/kategori'] = 'admin/Kategori/index';
    $route['admin/tambah-kategori'] = 'admin/Kategori/tambah';
    $route['admin/edit-kategori'] = 'admin/Kategori/edit';
    $route['admin/hapus-kategori'] = 'admin/Kategori/hapus';

    $route['admin/list-berita'] = 'admin/Berita/index';
    $route['admin/tambah-berita'] = 'admin/Berita/tambah';
    $route['admin/simpan-berita'] = 'admin/Berita/simpan';
    $route['admin/edit-berita/(:any)'] = 'admin/Berita/edit/$1';
    $route['admin/update-berita'] = 'admin/Berita/simpanedit';
    $route['admin/hapus-berita'] = 'admin/Berita/hapus_berita';


    $route['admin/list-agenda'] = 'admin/Agenda/index';
    $route['admin/tambah-agenda'] = 'admin/Agenda/tambah';
    $route['admin/edit-agenda'] = 'admin/Agenda/edit';
    $route['admin/hapus-agenda'] = 'admin/Agenda/hapus';

    $route['admin/list-pengumuman'] = 'admin/Pengumuman/index';
    $route['admin/tambah-pengumuman'] = 'admin/Pengumuman/tambah';
    $route['admin/edit-pengumuman'] = 'admin/Pengumuman/edit';
    $route['admin/hapus-pengumuman'] = 'admin/Pengumuman/hapus';


    $route['admin/list-download'] = 'admin/Download/index';
    $route['admin/file-download/(:any)'] = 'admin/Download/file_download/$1';
    $route['admin/tambah-download'] = 'admin/Download/tambah';
    $route['admin/edit-download'] = 'admin/Download/edit';
    $route['admin/hapus-download'] = 'admin/Download/hapus';

    $route['admin/list-album'] = 'admin/Album/index';
    $route['admin/tambah-album'] = 'admin/Album/tambah';
    $route['admin/edit-album'] = 'admin/Album/edit';
    $route['admin/hapus-album'] = 'admin/Album/hapus';


    $route['admin/list-photos'] = 'admin/Photos/index';
    $route['admin/tambah-photos'] = 'admin/Photos/tambah';
    $route['admin/edit-photos'] = 'admin/Photos/edit';
    $route['admin/hapus-photos'] = 'admin/Photos/hapus';


    $route['admin/list-guru'] = 'admin/Guru/index';
    $route['admin/tambah-guru'] = 'admin/Guru/tambah';
    $route['admin/edit-guru'] = 'admin/Guru/edit';
    $route['admin/hapus-guru'] = 'admin/Guru/hapus';


    $route['admin/inbox'] = 'admin/Inbox/index';
    $route['admin/hapus-inbox'] = 'admin/Inbox/hapus';


    $route['admin/pengguna'] = 'admin/Pengguna/index';
    $route['admin/tambah-pengguna'] = 'admin/Pengguna/tambah';
    $route['admin/edit-pengguna'] = 'admin/Pengguna/edit';
    $route['admin/hapus-pengguna'] = 'admin/Pengguna/hapus';
    $route['admin/reset-pengguna/(:any)'] = 'admin/Pengguna/reset/$1';




    ///FRONTEND
    $route['home'] = 'frontend/Home/index';
    $route['kata-sambutan'] = 'frontend/kata_sambutan/index';
    $route['visi-misi'] = 'frontend/visi_misi/index';
    $route['guru'] = 'frontend/guru/index';
    $route['berita'] = 'frontend/Berita/index';
    $route['detail-berita/(:any)'] = 'frontend/Berita/berita_detail/$1';
    $route['pengumuman'] = 'frontend/Pengumuman/index';
    $route['agenda'] = 'frontend/Agenda/index';
    $route['tentang'] = 'frontend/Tentang/index';
    $route['galeri'] = 'frontend/Galeri/index';
    $route['galeri/album'] = 'frontend/Galeri/album';
    $route['download'] = 'frontend/Download/index';
    $route['kontak'] = 'frontend/Kontak/index';
    $route['kontak/kirim-pesan'] = 'frontend/Kontak/kirim_pesan';








    $route['default_controller'] = 'Home';
    $route['404_override'] = '';
    $route['translate_uri_dashes'] = FALSE;

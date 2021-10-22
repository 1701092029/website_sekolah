<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= $title ?></title>
    <!-- Stylesheet -->
    <link rel="shorcut icon" type="text/css" href="<?php echo base_url() . 'assets/images/favicon.png' ?>">
    <link href="<?php echo base_url() . 'template/css/style.css' ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'template/css/ddsmoothmenu.css' ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'template/css/jquery.fancybox-1.3.4.css' ?>" media="screen" />
    <!-- Javascript -->
    <script src="<?php echo base_url() . 'template/js/jquery.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'template/js/ddsmoothmenu.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'template/js/contentslider.js' ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'template/js/jcarousellite_1.0.1.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'template/js/jquery.easing.1.1.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'template/js/cufon-yui.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'template/js/DIN_500.font.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'template/js/menu.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'template/js/tabs.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'template/js/jquery.mousewheel-3.0.4.pack.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'template/js/jquery.fancybox-1.3.4.pack.js' ?>"></script>



</head>

<body>
    <div id="bg">
        <!-- Wapper Sec -->
        <div id="wrapper_sec">
            <!-- masterhead -->
            <div id="masterhead">
                <!-- Logo -->
                <div class="logo"><a href="<?php echo base_url() . '' ?>"><img src="<?php echo base_url() . 'template/images/LOGO_PNG1.png' ?>" alt="" /></a></div>
                <!-- masterhead Right Section -->
                <div class="topright_sec">
                    <!-- top navigation -->
                    <div class="topnavigation">
                        <ul>
                            <li class="first">&nbsp;</li>
                            <li><a href="#">HP/WA. (+62) 831-9343-5809</a></li>
                            <li><a href="#">Email: smp2nansabaris@gmail.com</a></li>
                            <li><a class="nobg" href="#">Jl. Tengku Sidi, Sinur, Kec. Nan Sabaris, Kab.Padang Pariaman, Sumatera Barat</a></li>
                            <li class="last">&nbsp;</li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                    <!-- top search -->
                    <div class="top_search">
                        <div class="advance_search"><a href="#"></a></div>
                        <form action="<?= base_url() ?>berita" method="POST">
                            <ul>
                                <li><input type="text" name="keyword_berita" placeholder="Cari Berita" /></li>
                                <li><button type="submit" name="submit" class="search">Search</button></li>
                            </ul>
                        </form>

                    </div>
                    <div class="clear"> </div>
                </div>
                <div class="clear"></div>
                <!-- Navigation -->
                <div class="navigation">
                    <div id="smoothmenu1" class="ddsmoothmenu">
                        <ul>
                            <li class="first">
                                <?php if ($title == 'Home') : ?>
                                    <a class="selected" href="<?php echo base_url() . 'home' ?>">Home</a>
                                <?php else : ?>
                                    <a href="<?php echo base_url() . 'home' ?>">Home</a>
                                <?php endif ?>
                            </li>
                            <li>
                                <?php if ($title == 'Kata Sambutan' || $title == 'Visi Misi') : ?>
                                    <a class="selected" href="#">Profil</a>
                                <?php else : ?>
                                    <a href="#">Profil</a>
                                <?php endif ?>
                                <!-- Sub Menu level 1 -->
                                <ul>
                                    <li><a href="<?php echo base_url() . 'kata-sambutan' ?>">Kata Sambutan</a></li>
                                    <li><a href="<?php echo base_url() . 'visi-misi' ?>">Visi Misi</a></li>

                                </ul>
                            </li>
                            <li>
                                <?php if ($title == 'Guru') : ?>
                                    <a class="selected" href="<?php echo base_url() . 'guru' ?>">Guru</a>
                                <?php else : ?>
                                    <a href="<?php echo base_url() . 'guru' ?>">Guru</a>
                                <?php endif ?>
                            </li>

                            <li><a href="<?php echo base_url() . 'berita' ?>">Berita</a> </li>
                            <li><a href="<?php echo base_url() . 'pengumuman' ?>">Pengumuman</a></li>
                            <li><a href="<?php echo base_url() . 'agenda' ?>">Agenda</a></li>
                            <li><a href="<?php echo base_url() . 'galeri' ?>">Gallery</a> </li>
                            <li><a href="<?php echo base_url() . 'download' ?>">Download</a> </li>

                            <li><a href="<?php echo base_url() . 'kontak' ?>" class="last">Hubungi Kami</a></li>

                        </ul>
                    </div>
                    <!-- navigation ends -->
                    <div class="clear"></div>
                </div>
            </div>
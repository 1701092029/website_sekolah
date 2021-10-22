<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">Menu Utama</li>
                    <li class="active">
                        <a href="<?= base_url() ?>admin">
                            <i class="fa fa-home"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                                <small class="label pull-right"></small>
                            </span>
                        </a>
                    </li>
                    <?php if ($user['role_id'] == 1 || $user['role_id'] == 2) : ?>
                        <li class="treeview ">
                            <a href="#">
                                <i class="fa fa-newspaper-o"></i>
                                <span>Berita</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url() ?>admin/list-berita"><i class="fa fa-list"></i> List Berita</a></li>
                                <li><a href="<?= base_url() ?>admin/tambah-berita"><i class="fa fa-thumb-tack"></i> Post Berita</a></li>
                                <li><a href="<?= base_url() ?>admin/kategori"><i class="fa fa-wrench"></i> Kategori</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="<?= base_url() ?>admin/list-agenda">
                                <i class="fa fa-calendar"></i> <span>Agenda</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right"></small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>admin/list-pengumuman">
                                <i class=" fa fa-volume-up"></i> <span>Pengumuman</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right"></small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>admin/list-download">
                                <i class="fa fa-download"></i> <span>Download</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right"></small>
                                </span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-camera"></i>
                                <span>Gallery</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url() ?>admin/list-album"><i class="fa fa-clone"></i> Album</a></li>
                                <li><a href="<?= base_url() ?>admin/list-photos"><i class="fa fa-picture-o"></i> Photos</a></li>
                            </ul>
                        </li>
                    <?php endif ?>
                    <?php if ($user['role_id'] == 1  || $user['role_id'] != 2) : ?>
                        <li>
                            <a href="<?= base_url() ?>admin/pengguna">
                                <i class="fa fa-users"></i> <span>Pengguna</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right"></small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>admin/list-guru">
                                <i class="fa fa-graduation-cap"></i> <span>Data Guru</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right"></small>
                                </span>
                            </a>
                        </li>



                        <li>
                            <a href="<?= base_url() ?>admin/inbox">
                                <i class="fa fa-envelope"></i> <span>Inbox</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-green"></small>
                                </span>
                            </a>
                        </li>
                    <?php endif ?>

                    <li>
                        <a href="<?php echo base_url() . 'auth/logout' ?>">
                            <i class="fa fa-sign-out"></i> <span>Sign Out</span>
                            <span class="pull-right-container">
                                <small class="label pull-right"></small>
                            </span>
                        </a>
                    </li>


                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
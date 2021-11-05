<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin') ?>">
                <div class="sidebar-brand-icon ">
                    <i class="far fa-lightbulb"></i>
                </div>
                <div class="sidebar-brand-text mx-2">RUMAH INOVASI <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MASTER
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li <?=$this->uri->segment(2) == 'data_event' || $this->uri->segment(2) == '' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?php echo base_url('admin/data_event') ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span><strong>Event</strong></span></a>
            </li>
            <li <?=$this->uri->segment(2) == 'data_subevent' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?php echo base_url('admin/data_subevent') ?>">
                    <i class="fas fa-fw fa-stream"></i>
                    <span><strong>Sub Event</strong></span></a>
            </li>
            <li <?=$this->uri->segment(2) == 'data_user' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?php echo base_url('admin/data_user') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span><strong>User</strong></span></a>
            </li>
            <li <?=$this->uri->segment(2) == 'data_penilai' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?php echo base_url('admin/data_penilai') ?>">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span><strong>Penilai</strong></span></a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/data_bidang') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span><strong>Bidang</strong></span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                INDIKATOR
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <!--  <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Makalah</span></a>
            </li> -->
            <li <?=$this->uri->segment(2) == 'data_inovasi' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?php echo base_url('admin/data_inovasi') ?>">
                    <i class="fas fa-fw fa-lightbulb"></i>
                    <span><strong>Inovasi</strong></span></a>
            </li>
            <li <?=$this->uri->segment(2) == 'data_nominator' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?php echo base_url('admin/data_nominator') ?>">
                    <i class="fas fa-fw fa-list-ol"></i>
                    <span><strong>Nominator</strong></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <div class="sidebar-heading">
                INOVASI
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li <?=$this->uri->segment(2) == 'data_riwayat' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?php echo base_url('admin/data_riwayat') ?>">
                    <i class="fas fa-fw fa-history"></i>
                    <span><strong>Riwayat</strong></span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="sidebar-heading">
                PENILAIAN
            </div>
            <li <?=$this->uri->segment(2) == 'data_verifikasi' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?php echo base_url('admin/data_verifikasi') ?>">
                    <i class="fas fa-fw fa-check"></i>
                    <span><strong>Verifikasi</strong></span></a>
            </li>
            <li <?=$this->uri->segment(2) == 'nominator' ? 'class="nav-item active"' : 'class="nav-item"'?>>
                <a class="nav-link" href="<?php echo base_url('admin/nominator') ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span><strong>Nominator</strong></span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <!-- <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div> -->
                    </form>

                    <!-- Topbar Navbar -->
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <ul class="na navbar-nav navbar-right">
                        <?php if ($this->session->userdata('nama')) { ?>
                            <li>
                                <div class="mt-1">Selamat Datang <b>[<?php echo $this->session->userdata('nama') ?>]</b></div>
                            </li>
                            <li class="ml-2">
                                <div title="Logout" class="btn btn-sm btn-circle btn-outline-primary " data-toggle="modal" data-target="#logout"><i class="fas fa-power-off"></i></div>
                            </li>
                        <?php } else { ?>
                            <li><?php echo anchor('login', 'Login'); ?></li>

                        <?php } ?>

                    </ul>

                    </ul>

                    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">LOGOUT</h5>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin akan keluar ?</p>

                                    <div class="modal-footer">
                                        <?php echo anchor('login/logout', '<div class="btn btn-primary btn">Keluar</div>') ?>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </nav>
                <!-- End of Topbar -->
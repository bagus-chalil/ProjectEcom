        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- -->

                        <?php 
                         $role_id=$this->session->userdata('role_id');
                         $queryMenu="Select `user_menu`.`id`,`menu`
                                    FROM `user_menu` JOIN `user_access_menu`
                                    ON `user_menu`.`id`=`user_access_menu`.`menu_id`
                                    WHERE `user_access_menu`.`role_id`=$role_id
                                    ORDER BY `user_access_menu`.`menu_id` ASC
                                    ";
                        $menu = $this->db->query($queryMenu)->result_array();
                         ?>


                        <?php foreach ($menu as $m) :?>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu"><?= $m['menu']?></span></li>
                        
                        <?php
                            $menuId = $m['id'];
                            $querySubMenu="Select*
                                            FROM `user_sub_menu` 
                                            WHERE `menu_id`=$menuId
                                            AND `is_active`=1
                            "; 
                        $subMenu = $this->db->query($querySubMenu)->result_array();
                        ?>

                        <?php foreach ($subMenu as $sm) : ?>
                            
                            <li class="sidebar-item"> <a class="sidebar-link" href="<?= base_url($sm['url'])?>"
                                aria-expanded="false"><i class="<?= $sm['icon'] ?>"></i><span
                                    class="hide-menu"><?= $sm['title'] ?>
                                </span></a>
                            </li>

                        <?php endforeach ?>

                        <?php endforeach ?>


                        <!-- <li class="sidebar-item"> <a class="sidebar-link" href="ticket-list.html"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Kategori Event
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="fas fa-table"></i><span
                                    class="hide-menu">Tabel Event </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="form-inputs.html" class="sidebar-link"><span
                                            class="hide-menu"> Create Event
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="form-input-grid.html" class="sidebar-link"><span
                                            class="hide-menu"> Show Event
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="app-calendar.html"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">Calendar</span></a></li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="sidebar-link sidebar-link">Pembayaran</span></li> 
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="ui-cards.html"
                                aria-expanded="false"><i class="fas fa-table"></i><span
                                    class="hide-menu">List Pembayaran
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="ui-cards.html"
                                aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span
                                    class="hide-menu">Verifikasi
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Paket User </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="form-inputs.html" class="sidebar-link"><span
                                            class="hide-menu"> Create Price
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="form-input-grid.html" class="sidebar-link"><span
                                            class="hide-menu"> Show Price
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Blog</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="../../docs/docs.html"
                                aria-expanded="false"><i class="far fa-plus-square"></i><span
                                    class="hide-menu">Create Blog</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Authentication</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?=base_url('profil/Profil') ?>"
                                aria-expanded="false"><i class="fas fa-user"></i><span
                                    class="hide-menu">My Profile
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                                href="authentication-register1.html" aria-expanded="false"><i data-feather="lock"
                                    class="feather-icon"></i><span class="hide-menu">Register
                                </span></a>
                        </li>-->
                        <li class="list-divider"></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?=base_url('Login/logout')?>"
                                aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                                    class="hide-menu">Logout</span></a></li>
                        <li class="list-divider"></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
                        <?php
                        //ubah timezone menjadi jakarta
                        date_default_timezone_set("Asia/Jakarta");

                        //ambil jam dan menit
                        $jam = date('H:i');

                        //atur salam menggunakan IF
                        if ($jam > '05:30' && $jam < '10:00') {
                            $salam = 'Pagi';
                        } elseif ($jam >= '10:00' && $jam < '15:00') {
                            $salam = 'Siang';
                        } elseif ($jam < '18:00') {
                            $salam = 'Sore';
                        } else {
                            $salam = 'Malam';
                        }

                        //tampilkan pesan
                        echo 'Selamat ' . $salam;

                        ?>
                        <?= $user['name'];?>
                        </h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html"><?= $title?></a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                        <h3 class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                        <?php
                        //ubah timezone menjadi jakarta
                        date_default_timezone_set("Asia/Jakarta");

                        //ambil jam dan menit
                        $tanggal = date('d F Y');

                        //tampilkan pesan
                        echo $tanggal;

                        ?>
                        </h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
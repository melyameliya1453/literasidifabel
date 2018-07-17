<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <?php if ($data2["pp_user"] == '') { ?>
                        <a  href="<?php echo home_base_url(); ?>assets/img/user/user.png">
                            <img src="<?php echo home_base_url(); ?>assets/img/user/user.png">
                        </a>

                    <?php } else { ?>

                        <a  href="<?php echo home_base_url(); ?>assets/img/user/<?php echo $data2["pp_user"];?>">
                            <img src="<?php echo home_base_url(); ?>assets/img/user/<?php echo $data2["pp_user"];?>">
                        </a>
                    <?php }  ?>

                    <div class="inner-text">
                        <i>Selamat Datang</i>, <br>

                        <a style="color: #2eb2ff; text-decoration: none;" href="<?php echo home_base_url() ?>template/with-session.php?p=user&user=<?php echo $data2["user_user"];?>">
                            <?php echo $data2["nama_user"];?>
                        </a>

                        <br>

                        <div style="margin-top: 10px;">
                            <?php if ($data2["status_user"] == 'Online') { ?>
                                <small><div class="btn-circle on"></div> Sedang Online</small>
                            <?php } elseif ($data2["status_user"] == 'Offline') { ?>
                                <small><div class="btn-circle off"></div> Offline</small>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </li>

            <li>
                <a title="Halaman Utama"  href="<?php echo home_base_url() ?>template/with-session.php"><i class="fa fa-home "></i>Beranda</a>
            </li>

            <li>
                <a href="#" title="Tentang Saya"><i class="fa fa-user "></i>Profil Akun <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a title="Profil Saya" href="<?php echo home_base_url() ?>template/with-session.php?p=user&user=<?php echo $data2["user_user"];?>">
                            <i class="fa fa-smile-o"></i>Profil
                        </a>
                    </li>
                    <li>
                        <a title="Pengaturan Akun" href="<?php echo home_base_url() ?>template/with-session.php?p=edit&profil=<?php echo $data2["user_user"];?>">
                            <i class="fa fa-gears"></i>Pengaturan
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" title="Tentang Saya"><i class="fa fa-building-o"></i>Kelas <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo home_base_url() ?>template/with-session.php?p=jenis_kelas">
                            <i class="fa fa-suitcase"></i> Data Kelas Difabel
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo home_base_url() ?>template/with-session.php?p=anggota_kelas">
                            <i class="fa fa-users"></i> Anggota Kelas
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" title="Tentang Saya"><i class="fa fa-th-list "></i>Forum <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo home_base_url() ?>template/with-session.php?p=posting&profil=<?php echo $data2["user_user"];?>">
                            <i class="fa fa-pencil"></i>Buat Topik
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo home_base_url() ?>template/with-session.php?p=user&user=<?php echo $data2["user_user"];?>#post">
                            <i class="fa fa-list-alt"></i>Daftar Topik Bahasan
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
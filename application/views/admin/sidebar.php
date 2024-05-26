  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <!-- <div class="pull-left image">
          <img src="<?= base_url('assets/dist/img/codechamplogo1.png') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div> -->
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <!-- Menu Home -->
        <li <?= $this->uri->segment(1) == 'home' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i>
            <span>Home</span>
          </a>
        </li>


        <!-- Dashboard ADMIN -->
        <?php if ($this->session->userdata('role') == 1) { ?>


          <li <?= $this->uri->segment(1) == 'tutor' ? 'class="active"' : '' ?>>
            <a href="<?php echo base_url('tutor'); ?>"><i class="fa fa-circle-o"></i>
              <span>Data Tutor</span>
            </a>
          </li>
          <li <?= $this->uri->segment(1) == 'user' ? 'class="active"' : '' ?>>
            <a href="<?php echo base_url('user'); ?>"><i class="fa fa-circle-o"></i> 
              <span>Data Pengguna</span>
            </a>
          </li>
          <li <?= $this->uri->segment(1) == 'soal_materi' ? 'class="active"' : '' ?>>
            <a href="<?php echo base_url('soal_materi'); ?>"><i class="fa fa-circle-o"></i>
              <span>Kelola Soal Materi</span>
            </a>
          </li>
          <li <?= $this->uri->segment(1) == 'peserta' ? 'class="active"' : '' ?>>
            <a href="<?php echo base_url('peserta'); ?>"><i class="fa fa-circle-o"></i>
              <span>Kelola Peserta Kursus</span>
            </a>
          </li>
          <li <?= $this->uri->segment(1) == 'hasil_materi' ? 'class="active"' : '' ?>>
            <a href="<?php echo base_url('hasil_kursus'); ?>"><i class="fa fa-circle-o"></i>
              <span>Hasil Pengerjaan Materi</span>
            </a>
          </li>
          <!-- <li <?= $this->uri->segment(1) == 'utilitas' ? 'class="active"' : '' ?>>
            <a href="<?php echo base_url('utilitas'); ?>"><i class="fa fa-gears"></i>
              <span>Utilities</span>
            </a>
          </li> -->




          <!-- Dashboard Tutor -->
        <?php } else if ($this->session->userdata('role') == 2) { ?>


          <li class="treeview <?= $this->uri->segment(1) == 'soal' || $this->uri->segment(1) == 'soal_materi' ? 'active' : '' ?>">

          <li <?= $this->uri->segment(1) == 'soal_materi' ? 'class="active"' : '' ?>>
            <a href="<?php echo base_url('soal_materi'); ?>"><i class="fa fa-circle-o"></i> Kelola Soal Materi</a>
          </li>

          </li>

        <?php } ?>

        <li <?= $this->uri->segment(1) == 'password' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('password'); ?>"><i class="fa fa-lock"></i>
            <span>Ganti Password</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url('auth/logout'); ?>"><i class="fa fa-power-off"></i>
            <span>Keluar Akun</span>
          </a>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
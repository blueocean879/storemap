

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url('admin');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="/public/images/mappr-icon@1x.svg"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="/public/images/mappr-logo1x.svg"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?= ucwords($this->session->userdata('username')); ?></span>  <ion-icon ios="ios-arrow-down" md="ios-arrow-down"></ion-icon>
            </a>
            <ul class="dropdown-menu">

              <!-- Menu Body -->
              <li class="user-body">
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?= site_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
                <div class="pull-left">
                  <a href="<?= base_url('profile'); ?>" class="btn btn-default btn-flat">profile</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>

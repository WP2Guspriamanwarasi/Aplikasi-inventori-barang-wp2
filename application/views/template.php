
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | DataTables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition skin-green sidebar-mini <?=$this->uri->segment(1) == 'sale' ? 'sedebar-coolapse' :null ?>">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="<?=base_url('dashboard')?>" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
        <div class="navbar-custom-menu">
          <ul class=" nav navbar-nav">
            <!--user account-->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?=base_url()?>assets/dist/img/TOKOH.png" class="user-image"
                    class="user-panel mt-3 pb-3 mb-3 d-flex"
                    class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light"><?=$this->fungsi->user_login()->username?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="<?=base_url()?>assets/dist/img/tokohp.png" class=" img-circle">
                  <p><?=$this->fungsi->user_login()->name?>
                    <small><?=$this->fungsi->user_login()->address?></small>
                  </p>
                </li>
                
                <li class ="user-footer">
                  <div class="float-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>

                  <div class="float-right">
                    <a href="<?=site_url('auth/logout')?>" class ="btn btn-flat bg-red">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?=base_url()?>assets/dist/img/tokohp.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TOKO KITA</span>
    </a>  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <ul class="sidebar -menu" data-widget="tree">
          <li class ="header"></li>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?=site_url('dashboard')?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p>
            </a>
          </li>    
          <li class="nav-item has-treeview">
            <a href="<?=site_url('supplier')?>" class="nav-link">
              <i class="nav-icon fa fa-truck"></i><p>Suppliers</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=site_url('customer')?>" class="nav-link">
              <i class="nav-icon fa fa-users"></i><p>Customers</p>
            </a>
          </li>

          <li class="nav-item has-treeview <?=$this->uri->segment(1) == 'categories' || $this->uri->segment(1) == 'units' || $this->uri->segment(1) == 'items' ? 'active' : ''?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li <?=$this->uri->segment(1) == 'categories' ? 'class"active"' : ''?> >
                <a href="<?=site_url('categories')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p></a>
              </li>
              <li <?=$this->uri->segment(1) == 'units' ? 'class"active"' : ''?>>
                <a href="<?=site_url('units')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Units</p></a>
              </li>
              <li <?=$this->uri->segment(1) == 'items' ? 'class"active"' : ''?>>
                <a href="<?=site_url('items')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Items</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?=$this->uri->segment(1) == 'stock' ? 'active' :''?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Transaction
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item <?=$this->uri->segment(1)== 'stock' && $this->uri->segment(2) == 'in' ? 'class="active"' : ''?>">
                <a href="<?=site_url('stock/in')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>stock in</p>
                </a>
              </li>
              <li class="nav-item <?=$this->uri->segment(1)== 'stock' && $this->uri->segment(2) == 'out' ? 'class="active"' : ''?>">
                <a href="<?=site_url('stock/out')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>stock out</p>
                </a>
              </li>
            </ul>
          </li> 
          <?php if($this->fungsi->user_login()->level == 1) { ?>
          <li class="header"> SETTINGS</li>
          <li class="nav-item has-treeview">
            <a href="<?=site_url('user')?>" class="nav-link">
              <i class="nav-icon fa fa-user"></i><p>Users</p></a></li>
          <?php } ?>
          </ul>
        </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper">
    <?php echo $contents ?>
  </div>
<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
  </div>
  <strong> Selamat datang DITOKO KITA  , Kami akan melayani anda dengan SEPENUH HATI</strong>
</footer>
<aside class="control-sidebar control-sidebar-dark">
</aside>




  <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?=base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?=base_url()?>assets/dist/js/demo.js"></script>
  <!-- page script -->
  
  <script>
  $(document).ready(function() {
    $('table').DataTable()
  })
  </script>

</body>
</html>

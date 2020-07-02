<?php
require '../models/modelAdmin.php';
$admin=new modelAdmin();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../asset/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="index.php" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </nav>

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../asset/dist/img/Almamater copy (1).jpg" class="img-circle" alt=" ">
        </div>
        <div class="pull-left info">
          <p>Ahmad Fatih Mauliddion</p>
          <a href="index.php"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-star"></i> <span>Manage Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="sedangTayang.php"><i class="fa fa-calendar-o"></i> Sedang Tayang</a></li>
            <li class="active"><a href="dataCustomer.php"><i class="fa fa-file"></i> Data Customer</a></li>
            <li class="active"><a href="dataAdmin.php"><i class="fa fa-file"></i> Data Admin</a></li>
          </ul>
          <li><a href="registerAdmin.php"><i class="fa fa-edit"></i> Registrasi</a></li>
          <li class="active treeview">
          <li><a href="transaksi.php"><i class="fa fa-money"></i> Booking</a></li>
          <li><a href="pembayaran.php"><i class="fa fa-money"></i> Pembayaran</a></li>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a href="index.php">
      <a href="index.php"><i class="fa fa-mail-reply-all"></i>  BACK</a><p></p>
      <h1>
        Dashboard
        <small>Data Dan Registrasi Admin</small>
      </h1>  

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Admin</h3>
            </div>
            <div class="box-footer">
              <i><a href="registerAdmin.php"><button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Registrasi Admin Baru</button></a></i>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Admin</th>
                  <th>Nama</th>
                  <th>Password</th>
                  <th>No Telpon</th>
                  <th>Alamat</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  <?php
                  /*require '../models/modelAdmin.php';
                  $objadmin=new modelAdmin();
                  $objadmin->select();
                  $dataadmin=$objadmin->getData();*/
                  $dataadmin=$admin->select();
                  $admin->setIdbaru();
                  foreach ($dataadmin as $key)
                  {
                  ?>

                <tr>
                  <td><?php echo $key['ID_ADMIN']; ?></td>
                  <td><?php echo $key['NAMA']; ?></td>
                  <td><?php echo $key['PASSWORD']; ?></td>
                  <td><?php echo $key['NO_TELP']; ?></td>
                  <td><?php echo $key['ALAMAT']; ?></td>
                  <td>
                    
                    <a type="submit" class="btn btn-social-icon" title="edit"><i class="fa fa-edit" data-toggle="modal" href="#mymodal<?php echo $key['ID_ADMIN']; ?> "></i></a> 
                    <a type="submit" class="btn btn-social-icon" title="hapus" href="../proses/prosesAdmin.php?aksi=hapus&hapusidadmin=<?php echo $key['ID_ADMIN'];?>" ><i class="fa fa-trash"></i></a> 
                  </td>
                </tr>


        <div class="modal fade" id="mymodal<?php echo $key['ID_ADMIN']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data Admin</h4>
              </div>
              <div class="modal-body">
                <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="../proses/prosesAdmin.php?aksi=edit" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">ID Admin</label>
                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="editidadmin"  name="editidadmin" value="<?php echo $key['ID_ADMIN']; ?>">
                  </div>
                  <br></br>
                </div>

                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="editnama" name="editnama" value="<?php echo $key['NAMA']; ?>">
                  </div>
                  <br></br>
                </div>

                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="editpassword" name="editpassword" value="<?php echo $key['PASSWORD']; ?>">
                  </div>
                  <br></br>
                </div>
                
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">No Telp</label>
                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="editnotelp" name="editnotelp" value="<?php echo $key['NO_TELP']; ?>">
                  </div>
                  <br></br>
                </div>
                
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="editalamat" name="editalamat" value="<?php echo $key['ALAMAT']; ?>">
                  </div>
                  <br></br>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
            <!-- /.modal-content -->
      

                    <?php
                    }
                    ?>

                </tfoot>
              </table>
            </div>
        <!-- /.modal-pop up -->
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Registrasi Admin Baru</h4>
              </div>
              <div class="modal-body">
                <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="../proses/prosesAdmin.php?aksi=tambah" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">ID Admin</label>
                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="inputidadmin" name="inputid_admin" value="<?php echo $admin->getIdbaru(); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="inputnama" name="inputnama">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputpassword" name="inputpassword">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">No Telp</label>
                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="inputnotelp" name="inputnotelp">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="inputalamat" name="inputalamat">
                  </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </div>
            </form>


          </div>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">

  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../asset/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
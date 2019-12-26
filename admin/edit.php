<?php 

include ('inc/function.php');
$connect = connect();

$sql = 'SELECT * FROM products WHERE product_id = "'.$_GET["product_id"].'"';
$res = mysqli_query($connect, $sql) or die(mysqli_error($connect));
if(mysqli_affected_rows($connect)>0){
  while ($row = mysqli_fetch_assoc($res)) {
    $product_name = $row["product_name"];
    $product_price = $row["product_price"];
    $product_pprice = $row["product_pprice"];
    $product_cat = $row["product_cat"];
    $product_quantity = $row["product_quantity"];
    $product_sku = $row["product_sku"];
    $product_upc = $row["product_upc"];
    $product_partNumber = $row["product_partNumber"];
    $product_desc = $row["product_desc"];
  }
}
else
{
  // no one found
  echo "<h1>404 Error No User found</h1>";
  exit();
}

if(isset($_POST["save"])) // checkes if the submit button is clicked
{ $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_pprice = $_POST["product_pprice"];
    $product_cat = $_POST["product_cat"];
    $product_quantity = $_POST["product_quantity"];
    $product_sku = $_POST["product_sku"];
    $product_upc = $_POST["product_upc"];
    $product_partNumber = $_POST["product_partNumber"];
    $product_desc = $_POST["product_desc"];

  

  $update_query = 'UPDATE products SET product_name="'.$product_name.'", product_price="'.$product_price.'", product_pprice="'.$product_pprice.'", product_cat="'.$product_cat.'", product_quantity="'.$product_quantity.'", product_sku="'.$product_sku.'", product_upc="'.$product_upc.'", product_partNumber="'.$product_partNumber.'", product_desc="'.$product_desc.'" WHERE product_id = "'.$_GET["product_id"].'"';

  $res = mysqli_query($connect, $update_query) or die(mysqli_error($connect));
  if(mysqli_affected_rows($connect) > 0)
  {
    echo "<script>alert('Success');</script>";
    header("Location: view.php");
  
  }
  else
  {
    $msg = '<p style="font-size:12px; font-weight:bold; colour: red; background:white; padding: 8px; width: 100%; border: dash thin red;">An error occured. Please check your internet connection and try again</p>';

  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'inc/top.php' ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <data></data><div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">ADD NEW PRODUCT</div>
                      <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
          </div>

          <!-- Content Row -->

            <div class="container-fluid">

          <!-- Page Heading -->
 <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">ADD PRODUCTS!</h1>
                  </div>
                  <form class="user" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Product name</label>
                      <input type="text" name="product_name" class="form-control form-control-user" value="<?php echo $product_name; ?>">
                    </div>
                    <div class="form-group">
                      <label>Product price</label>

                      <input type="text" name="product_price" class="form-control form-control-user" value="<?php echo $product_price; ?>">                    </div>
                    <div class="form-group">
                      <label>Product previous price</label>

                      <input type="text" name="product_pprice" class="form-control form-control-user" value="<?php echo $product_pprice; ?>">
                    </div>
                    <div class="form-group">
                      <label>Product category</label>
                      <input type="text" name="product_cat" class="form-control form-control-user" value="<?php echo $product_cat; ?>">
                    </div>
                    <div class="form-group">
                      <label>Product quantity</label>
                      <input type="text" name="product_quantity" class="form-control form-control-user" value="<?php echo $product_quantity; ?>">                    </div>
                    <div class="form-group">
                      <label>Product sku</label>
                      <input type="text" name="product_sku" class="form-control form-control-user" value="<?php echo $product_sku; ?>">                    </div>
                    <div class="form-group">
                      <label>Product upc</label>
                      <input type="text" name="product_upc" class="form-control form-control-user" value="<?php echo $product_upc; ?>">                    </div>
                    <div class="form-group">
                      <label>Product part number</label>
                      <input type="text" name="product_partNumber" class="form-control form-control-user" value="<?php echo $product_partNumber; ?>">
                    </div>
                    <div class="form-group">
                      <label>Product description</label>
                      <input type="text" name="product_desc" class="form-control form-control-user" value="<?php echo $product_desc; ?>">
                    <!-- <div class="form-group">
                    <label>Item Image</label>
                    <input type="file" name="item_image" required="">
                    </div>  -->
                     
                    <hr>
                    <hr>
                    <button name="save" type="submit" class="btn btn-primary btn-user btn-block">Save</button>
                    
                    
                    
                    
                    <hr>
                    
                  </form>
                  <hr>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>



        </div>
       
          <!-- Content Row -->
         

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->

  

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

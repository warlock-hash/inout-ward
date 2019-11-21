<?php
session_start();
require "../app/manager/manager.php";
if(isset($_REQUEST['ITSC-loginService']) && $_SESSION['REMARKS'] == "DIR_LOGIN"){

//    if(!empty($_POST['username']) && !empty($_POST['password'])){
        //ini_set('session.use_trans_sid', true);
//        $username=isValidData($_POST['username']);
//        $password=isValidData($_POST['password']);

        $obj=getUserInfo($_SESSION['USER_ID']);
//        print_r($obj);
//        exit(0);
        if ($obj!=null){

            $_SESSION['Member_obj']=$obj;
            header("Location: ../admin/mainPanel.php");
        }
//    }
}

if (isset($_SESSION['Member_obj'])){
    header("Location: ../admin/mainPanel.php");
}
?>
<?php
if(isset($_REQUEST['submit'])){

    if(!empty($_POST['username']) && !empty($_POST['password'])){
        //ini_set('session.use_trans_sid', true);
        $username=isValidData($_POST['username']);
        $password=md5(isValidData($_POST['password']));
        $obj=isValidAdmin($username,$password);
//        print_r($obj);
//        exit(0);
        if ($obj!=null){
            $_SESSION['Member_obj']=$obj;
            header("Location: ../admin/mainPanel.php");
        }else{
            $obj = isValidSuperAdmin($username,$password);
            if ($obj != null){
                $_SESSION['Member_obj']=$obj;
                header("Location: ../admin/mainPanel.php");
            }
        }
    }
}
?>

<?php
    require "../includes/header.php";
?>
<!--  Nav Bar-->
<?php
    require "../includes/nav_bar.php";
?>
<!--  MAIN BOBY -->
   <div class="main main-raised">
    <div class="section section-tabs">
      <div class="container-fluid">
        <!--                nav tabs	             -->
       
          <div class="row">
           <div class="col-lg-4"></div>
            <div class="col-md-6 col-lg-4">
              
              <!-- Tabs with icons on Card   -->

                <div class="card card-login">
                    <form class="form" method="post" action="index.php">
                        <div class="card-header card-header-primary text-center">
                            <h3 class="card-title">Login</h3>
                        </div>

                        <div class="card-body">
               <span class="bmd-form-group">
                 <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Username" name="username" required>
                </div></span>
                            <span class="bmd-form-group"><div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div></span>
                        </div>
                        <div>
                            <?php
                            //                if(!isset($_POST['submit'])){?>
                            <?php
                            if ( isset($_POST['submit']) && !isset($_SESSION['Member_obj'])){
                                ?>

                                <div class="alert alert-danger">
                                    <div class="container">
                                        <div class="alert-icon">
                                            <i class="material-icons">error_outline</i>
                                        </div>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                        </button>
                                        <b>Invalid Username OR Password:</b>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="footer text-center">
                            <input class="btn btn-primary btn-link btn-wd btn-lg" type="submit" value="Login" name="submit">

                        </div>


                    </form>
                </div>
              <!-- End Tabs with icons on Card -->
            </div>
            
<!--            <div class="col-lg-2 hidden-md hidden-sm"></div>-->
            <!-- <div class="col-md-6">
              <!-- Tabs with icons on Card -->

              <!-- End Tabs with icons on Card -->
            </div> 
          </div>
        </div>
      </div>
    
</div>

<!-- Footer -->
<?php
    require "../includes/footer.php";
?>
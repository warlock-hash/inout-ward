 <div class="card card-login">
            <form class="form" method="post" action="login.php">
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
                    if ( isset($_POST['submit']) && !isset($_SESSION['admin_id'])){
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
                 <div class="footer text-center">
               <a href="forget_password.php">
                <input class="btn btn-primary btn-link btn-wd btn-lg" value="Forget Password" name="submit">
                </a>
              </div>

            </form>
          </div>
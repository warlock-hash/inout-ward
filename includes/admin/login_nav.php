
<body class="login-page sidebar-collapse">

<button hidden id=modal-alert class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal">
                  Click
                <div class="ripple-container"></div></button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="alert-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <p id="alert-message">
          </p>
        </div>
        <div class="modal-footer">
       
          <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
<nav class="navbar navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
   
    <div class="container">
      <div class="navbar-translate">
         <a  href="#" style="color:black;">
            <img src="../public/assets/icon/usindh_icon.ico" alt="">

            University of Sindh <small> <?= $project_name;?></small>
            </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      
       <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../public/index.php" onclick="">
              <span class="glyphicon glyphicon-home"></span> Home
            </a>
          </li>
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">apps</i> Programs
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a target="_new" href="../pdfs/PhdRules.pdf"  class="dropdown-item">
                  <span class="glyphicon glyphicon-education"></span> <i class="material-icons"></i>PHD
              </a>
              <a target="_new" href="../pdfs/PhdRules.pdf"  class="dropdown-item">
                <span class="glyphicon glyphicon-education"></span> <i class="material-icons"></i> MPhil/MS
              </a>
              
            </div>
          </li>
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="glyphicon glyphicon-book"></i>  View
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a target="_new" href="../pdfs/generalinstructions.pdf" class="dropdown-item">
                  <span class="glyphicon glyphicon-download-alt"></span> <i class="material-icons"></i>General Instructions
              </a>
              <a href="entry_test_result.php" class="dropdown-item">
                <span class="glyphicon glyphicon-download-alt"></span> <i class="material-icons"></i> Check Entry Test Result
              </a>
              <a target="_new" href="../pdfs/requirements.pdf" class="dropdown-item">
                <span class="glyphicon glyphicon-download-alt"></span> <i class="material-icons"></i> Requirements
              </a>
              <a target="_new" href="../pdfs/feestructure.pdf" class="dropdown-item">
                <span class="glyphicon glyphicon-download-alt"></span> <i class="material-icons"></i> Fees Structure
              </a>
              <a target="_new" href="../pdfs/VC-Message.pdf" class="dropdown-item">
                <span class="glyphicon glyphicon-envelope"></span> <i class="material-icons"></i> Vice Chansler Message
              </a>
              <a target="_new" href="../pdfs/MSMPhil-Rules.pdf" class="dropdown-item">
                <span class="glyphicon glyphicon-download-alt"></span> <i class="material-icons"></i> Ms/M.Phil Rules
              </a>
              <a target="_new" href="../pdfs/PhdRules.pdf" class="dropdown-item">
                <span class="glyphicon glyphicon-download-alt"></span> <i class="material-icons"></i> PHD Rules
              </a>
              <a target="_new"  href="../pdfs/catalogue2019.pdf" class="dropdown-item">
                <span class="glyphicon glyphicon-download-alt"></span> <i class="material-icons"></i> Cateloge 2019
              </a>

              
            </div>
          </li>

         <li class="nav-item">
            <a class="nav-link" href="about.php" onclick="">
              <span class="glyphicon glyphicon-exclamation-sign"></span> About
            </a>
          </li>
          <?php 
            if( !isset($_SESSION['login_id'])){
               
            ?>
           <li class="nav-item">
            <a class="nav-link" href="../admin/index.php" onclick="">
              <span class="glyphicon glyphicon-exclamation-sign"></span> Admin
            </a>
          </li>
          <?php 
            }
            if( isset($_SESSION['login_id'])){
               
            ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php" onclick="">
              <span class="glyphicon glyphicon-log-out"></span> Logout
            </a>
          </li>
          <?php
            }
        ?>
        </ul>
      </div>
    </div>
  </nav>
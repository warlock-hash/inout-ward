
<body class="login-page sidebar-collapse">
<nav class="navbar navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">

    <div class="container">
        <div class="navbar-translate">
            <a  href="../public/index.php" style="color:black;">
                <img src="assets/icon/usindh_icon.ico" alt="">

                University of Sindh <small> Inward & Outward System</small>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <li class="nav-item" style="display: block">
            <?php
                if (isset($_SESSION['Member_obj'])){
                    ?>
                    <a class="nav-link" href="../admin/logout.php" onclick="">
                        <span class="glyphicon glyphicon-exclamation-sign"></span> Logout
                    </a>
            <?php
                }
            ?>
        </li>


    </div>
</nav>
<div style="height:25vh"></div>
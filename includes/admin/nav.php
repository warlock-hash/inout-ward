 <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="../admin/mainPanel.php"><img class="main-logo" src="../includes/admin/assets/img/logo/logo_2.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
<div class="header-advance-area" >
            <div class="header-top-area" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                               
                        <?php
                        foreach($nav_values as $nav_value){
                        if($nav_value['is_submenu']==0){
                        ?>
                        <li class="nav-item"><a href="<?=$nav_value['link'];?>" class="nav-link"><?=$nav_value['value'];?></a>
                        <?php
                            }else if($nav_value['is_submenu']==1){
                            ?>
                            
                                 <li class="nav-item dropdown res-dis-nn">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><?=$nav_value['value'];?> <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                    <div role="menu" class="dropdown-menu animated zoomIn">               
                                               
                               <?php 
                                    foreach($side_bar_value['sub_menu'] as $sub_menu){
                                    ?>
                                    <a href="<?=$sub_menu['link'];?>" class="dropdown-item"><?=$sub_menu['value'];?></a>
                                    
                               
                                <?php
                                    }
                                ?>
                            </div>
                                                </li>
                            <?php
                                }
                            }
                        ?>
                                               
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
<!--                                                -->
                                                <li class="nav-item">
                                                    <a href="../admin/logout.php">
                                                        Logout
                                                        <i class="" aria-hidden="true"></i>
                                                        <span class=""></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        
                                        
                                        
                                         
                        <?php 
                        foreach($side_bar_values as $side_bar_value){
                        if($side_bar_value['is_submenu']==0){
                        ?>
                        <li><a href="<?=$side_bar_value['link'];?>"><?=$side_bar_value['value'];?></a></li>
                        <?php
                            }else if($side_bar_value['is_submenu']==1){
                            ?>
                            <li><a data-toggle="collapse" data-target="#Charts" href="#"><?=$side_bar_value['value'];?> <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                
                                               
                               <?php 
                                    foreach($side_bar_value['sub_menu'] as $sub_menu){
                                    ?>
                                    <li><a href="<?=$sub_menu['link'];?>"><?=$sub_menu['value'];?></a></li>
                               
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
                            <?php
                                }
                            }
                        ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->

<!--
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Dashboard V.1</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
-->

        </div>
        <a id="priamry_modal_btn" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalalert" hidden>Primary</a>
         <div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-body">
                                        <i class="educate-icon educate-checked modal-check-pro"></i>
                                        <h2 id="priamry_modal_title">Awesome!</h2>
                                        <p id="priamry_modal_msg">The Modal plugin is a dialog box/popup window that is displayed on top of the current page</p>
                                    </div>
                                    <div class="modal-footer" id="add_btn">
                                        <a data-dismiss="modal" href="#">Cancel</a>
                                    
<!--                                        <a href="#">Process</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
             <a id="image_modal_btn" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#ImageModalalert" hidden>Primary</a>
         <div id="ImageModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-body">
                                        <i class="educate-icon educate-checked modal-check-pro"></i>
                                        <h2 id="image_modal_title">Awesome!</h2>
<!--                                        <p id="image_modal_msg"><img src="../images/admins_profile/admin_profile1.jpg" alt=""></p>-->
                                    </div>
                                    <div class="modal-footer" id="add_btn">
                                        <a data-dismiss="modal" href="#">Cancel</a>
                                    
<!--                                        <a href="#">Process</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <script>
    function alertMsg(title,msg){
        document.getElementById("priamry_modal_title").innerHTML= title;
        document.getElementById("priamry_modal_msg").innerHTML= msg;
        document.getElementById("priamry_modal_btn").click();
        
        
    }
    function alertImage(title,path){
        document.getElementById("image_modal_title").innerHTML= title;
        document.getElementById("image_modal_msg").innerHTML= "<img src='"+path+"' alt=''>";
        document.getElementById("image_modal_btn").click();    
    }
    function alertConfirm(title,msg,id){
        document.getElementById("priamry_modal_msg").innerHTML= msg;
        document.getElementById("priamry_modal_title").innerHTML= title;
          id = "'"+id+"'";
          document.getElementById("add_btn").innerHTML = "<a data-dismiss=\"modal\" href=\"#\">Cancel</a><a href='#' data-dismiss='modal' onclick=\"submitConfirm("+id+")\" id='confirm_btn'>Process</a>";
        document.getElementById("priamry_modal_btn").click();
        
        
    }
    function submitConfirm(id){
      document.getElementById(id).click(); 
    }
       
</script>

        
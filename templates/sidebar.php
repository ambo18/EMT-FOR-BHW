<?php // function to get the current page name
function PageName() {
  return substr( $_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"],"/") +1);
}

$current_page = PageName();
?>
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            
            <ul class="nav nav-primary">
                <!-- dashboard -->
                <li class="nav-item <?= $current_page=='dashboard.php' || $current_page=='dashboard_announcement_detail.php' ? 'active' : null ?>">
                    <a href="dashboard.php" >
                        <i class="fas"><img style="width: 30px; height: 30px;" src="icon/dashboard.png"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- end of dashboard -->


                <!-- medical consumables -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">MEDICAL CONSUMABLES</h4>
                </li>
                        <!-- medicine -->
                        <li class="nav-item <?= $current_page=='medicine.php' || $current_page=='medicine_add_form.php'  || $current_page=='medicine_update_form.php' ? 'active' : null ?>">
                            <a href="medicine.php" >
                                <i class="fas"><img style="width: 30px; height: 30px;" src="icon/medicine.png"></i>
                                <p>Medicine</p>
                            </a>
                        </li>
                        <!-- medical supplies -->
                        <li class="nav-item <?= $current_page=='supplies.php' || $current_page=='supplies_update_form.php' || $current_page=='supplies_add_form.php' ? 'active' : null ?>">
                            <a href="supplies.php" >
                                <i class="fas"><img style="width: 30px; height: 30px;" src="icon/medical.png"></i>
                                <p>Medical Supplies</p>
                            </a>
                        </li>
                <!-- end of medical consumables -->


                
                
                <!-- reocords -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">FOR CHILDREN</h4>
                </li>
                        <li class="nav-item <?= $current_page=='childrens-records.php' || $current_page=='childrens-records-update.php' || $current_page=='deworming-add.php' || $current_page=='oper-timbang-add.php' || $current_page=='vitamin-add.php' ? 'active' : null ?>">
                            <a href="childrens-records.php" >
                            <i class="fas"><img style="width: 30px; height: 30px;" src="icon/records.png"></i>          
                                <p>Records</p>
                            </a>
                        </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">FOR ADULT</h4>
                </li>
                        <li class="nav-item <?= $current_page=='bp.php' || $current_page=='bp-add.php' || $current_page=='bp-update.php' ? 'active' : null ?>">
                            <a href="bp.php" >
                            <i class="fas"><img style="width: 30px; height: 30px;" src="icon/bp.png"></i>
                                <p>Blood Pressure</p>
                            </a>
                        </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">FOR PREGNANTS</h4>
                </li>
                        <li class="nav-item <?= $current_page=='pregnant.php' || $current_page=='pregnant-add.php' || $current_page=='pregnant-update.php' ? 'active' : null ?>">
                            <a href="pregnant.php" >
                            <i class="fas"><img style="width: 30px; height: 30px;" src="icon/pregnant.png"></i>
                                <p>Pregnants</p>
                            </a>
                        </li>
           
                <!-- system maintenance -->
                <?php if(isset($_SESSION['username']) && $_SESSION['role']=='system-maintenance'): ?>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">SYSTEM MAINTENANCE</h4>
                </li>
                        <!-- manage users -->
                        <li class="nav-item <?= $current_page=='manage-user.php' || $current_page=='manage_user_add_form.php' ? 'active': null ?>">
                            <a href="manage-user.php" >
                                <i class="fa"><img style="width: 30px; height: 30px;" src="icon/management.png"></i>
                                <p>Manage Users</p>
                            </a>
                        </li>
                        <?php endif ?>
                <!-- end of system maintenance -->


                <!-- sign out -->
                <li class="nav-item" style="margin-top: 50px;">
                    <a href="model/logout.php">
                        <i class="icon-logout"></i>
                        <p>Logged as <span class='text-primary'><?php echo $_SESSION['username']; ?></span></p>
                    </a>
                </li>
                <!-- end of sign out -->

            </ul>
        </div>
    </div>
</div>
<style>
    .sidebar.sidebar-style-2 .nav.nav-primary > .nav-item.active > a {
        background-color: lightseagreen !important;
    }
</style>
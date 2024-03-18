<aside class="sidebar-wrapper">
    <div class="logo-wrapper">
        <a href="index-2.html" class="admin-logo mt-4">
            <img height="90" width="90" src="assets/guardmark/images/rap.png" alt="" class="sp_logo">
            <img src="assets/guardmark/images/rap-icon.png" alt="" class="sp_mini_logo">
        </a>
    </div>
    <div class="side-menu-wrap">
        <ul class="main-menu">



            <?php 
        if (isset($_SESSION['guardmark_role_id']) && $_SESSION['guardmark_role_id'] != 3) {
        ?>
            <li>
                <a href="site_registration.php">
                    <span class="icon-menu feather-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </span>
                    <span class="menu-text">
                        Site registration
                    </span>
                </a>
            </li>
            <li>
                <a href="registration.php">
                    <span class="icon-menu feather-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </span>
                    <span class="menu-text">
                        Registration
                    </span>
                </a>
            </li>
            <li>
                <a href="duties.php">
                    <span class="icon-menu feather-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </span>
                    <span class="menu-text">
                        Duties
                    </span>
                </a>
            </li>
            <li>
                <a href="search_duties.php">
                    <span class="icon-menu feather-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </span>
                    <span class="menu-text">
                        Duty reports
                    </span>
                </a>
            </li>
            <?php } else if (isset($_SESSION['guardmark_role_id']) && $_SESSION['guardmark_role_id'] == 3) { ?>
            <li>
                <a href="guard_duties.php">
                    <span class="icon-menu feather-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </span>
                    <span class="menu-text">
                        Duites
                    </span>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</aside>
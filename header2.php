<?php
session_start();
$email = $_SESSION["email"];
$name = $_SESSION["name"];
$refID = $_SESSION["refID"];
$orderID = $_SESSION["orderID"];
$accType = $_SESSION["accType"];

if(empty($email)){
    header("location:login.php");
}
?>
<header class="main-header" style="background: #2D323D;" data-react-to-megamenu="true" data-sticky-header="true" data-sticky-options='{ "stickyTrigger": "first-section" }'>
		
    <div class="mainbar-wrap">
        <div class="megamenu-hover-bg"></div><!-- /.megamenu-hover-bg -->
        <div class="container-fluid mainbar-container">
            <div class="mainbar">
                <div class="row mainbar-row align-items-lg-stretch px-4">
                    
                    <div class="col">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="index.php" rel="home">
                                <span class="navbar-brand-inner">
                                    <img class="logo-dark" src="./images/logoBlack.png" alt="Ave HTML Template">
                                    <img class="logo-sticky" src="./images/logoBlack.png" alt="Ave HTML Template">
                                    <img class="mobile-logo-default" src="./images/logoBlack.png" alt="Ave HTML Template">
                                    <img class="logo-default" src="./images/logo.png" alt="Ave HTML Template">
                                </span>
                            </a>
                            <button type="button" class="navbar-toggle collapsed nav-trigger style-mobile" data-toggle="collapse" data-target="#main-header-collapse" aria-expanded="false" data-changeclassnames='{ "html": "mobile-nav-activated overflow-hidden" }'>
                                <span class="sr-only">Toggle navigation</span>
                                <span class="bars">
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                </span>
                            </button>
                        </div><!-- /.navbar-header -->
                    </div><!-- /.col -->
                    
                    
                    <div class="col">
                        
                        <div class="collapse navbar-collapse" id="main-header-collapse">
                            
                        <ul id="primary-nav" class="main-nav nl_index_main-nav nav align-items-lg-stretch justify-content-lg-start" data-submenu-options='{ "toggleType":"fade", "handler":"mouse-in-out" }' data-localscroll="true">
                 
                            <li class="nl_searchBarMob_profileLI">
                                <a style="padding: 0px;">
                                    <span class="link-icon"></span>
                                    <span class="link-txt">
                                    <span class="link-ext"></span>
                                        <span class="txt">
                                            <input type="text" placeholder="Search" class="bg-fade-white-01" style="border: solid 1px white; color: white; outline: none;"/>
                                            <button type="button" style="color:#003879"><i class="fa fa-search"></i></button>
                                        </span>
                                    </span>
                                </a>
                            </li>

                        <li>
                            <a href="index.php">
                                <span class="link-icon"></span>
                                <span class="link-txt">
                                    <span class="link-ext"></span>
                                    <span class="txt">
                                        Home
                                        <span class="submenu-expander">
                                            <i class="fa fa-angle-down"></i>
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="buyAirtime.php">
                                <span class="link-icon"></span>
                                <span class="link-txt">
                                    <span class="link-ext"></span>
                                    <span class="txt">
                                    Buy Airtime
                                        <span class="submenu-expander">
                                            <i class="fa fa-angle-down"></i>
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="buyData.php">
                                <span class="link-icon"></span>
                                <span class="link-txt">
                                    <span class="link-ext"></span>
                                    <span class="txt">
                                        Buy Data
                                        <span class="submenu-expander">
                                            <i class="fa fa-angle-down"></i>
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </li>

                        <li class="menu-item-has-children">
                            <a>
                                <span class="link-icon"></span>
                                <span class="link-txt">
                                    <span class="link-ext"></span>
                                    <span class="txt">
                                        More
                                        <span class="submenu-expander">
                                            <i class="fa fa-angle-down"></i>
                                        </span>
                                    </span>
                                </span>
                            </a>
                            <ul class="nav-item-children">
                                <li>
                                    <a href="buyPower.php">
                                        <span class="link-icon"></span>
                                        <span class="link-txt">
                                            <span class="link-ext"></span>
                                            <span class="txt">
                                                Buy Power
                                                <span class="submenu-expander">
                                                    <i class="fa fa-angle-down"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="buyCableTvSub.php">
                                        <span class="link-icon"></span>
                                        <span class="link-txt">
                                            <span class="link-ext"></span>
                                            <span class="txt">
                                                Cable Tv Subscription
                                                <span class="submenu-expander">
                                                    <i class="fa fa-angle-down"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="printRechargeCard.php">
                                        <span class="link-icon"></span>
                                        <span class="link-txt">
                                            <span class="link-ext"></span>
                                            <span class="txt">
                                                Print Recharge Card
                                                <span class="submenu-expander">
                                                    <i class="fa fa-angle-down"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="paymentHistory.php">
                                        <span class="link-icon"></span>
                                        <span class="link-txt">
                                            <span class="link-ext"></span>
                                            <span class="txt">
                                                Payment History
                                                <span class="submenu-expander">
                                                    <i class="fa fa-angle-down"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="transactions.php">
                                        <span class="link-icon"></span>
                                        <span class="link-txt">
                                            <span class="link-ext"></span>
                                            <span class="txt">
                                                Transactions
                                                <span class="submenu-expander">
                                                    <i class="fa fa-angle-down"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="referral.php">
                                        <span class="link-icon"></span>
                                        <span class="link-txt">
                                            <span class="link-ext"></span>
                                            <span class="txt">
                                            Referral
                                                <span class="submenu-expander">
                                                    <i class="fa fa-angle-down"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="blog-main.php">
                                        <span class="link-icon"></span>
                                        <span class="link-txt">
                                            <span class="link-ext"></span>
                                            <span class="txt">
                                                Blog
                                                <span class="submenu-expander">
                                                    <i class="fa fa-angle-down"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                            <a href="product-main.php">
                                                <span class="link-icon"></span>
                                                <span class="link-txt">
                                                    <span class="link-ext"></span>
                                                    <span class="txt">
                                                        products
                                                        <span class="submenu-expander">
                                                            <i class="fa fa-angle-down"></i>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="data_services.php">
                                                <span class="link-icon"></span>
                                                <span class="link-txt">
                                                    <span class="link-ext"></span>
                                                    <span class="txt">
                                                        Data Services
                                                        <span class="submenu-expander">
                                                            <i class="fa fa-angle-down"></i>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                            </ul>
                        </li>

                        <?php 
                                if(empty($email)){
                                    echo '<li>
                                    <a href="login.php">
                                        <span class="link-icon"></span>
                                        <span class="link-txt">
                                            <span class="link-ext"></span>
                                            <span class="txt">
                                                Login
                                            </span>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="register.php">
                                        <span class="link-icon"></span>
                                        <span class="link-txt">
                                            <span class="link-ext"></span>
                                            <span class="txt">
                                                Register
                                            </span>
                                        </span>
                                    </a>
                                </li>';
                               
                                }else{
                                    echo '<li class="menu-item-has-children">
                                    <a>
                                            <span class="link-icon"></span>
                                            <span class="link-txt">
                                                <span class="link-ext"></span>
                                                <i class="fa fa-user" ></i> 
                                                <span class="txt">
                                                    Account
                                                    <span class="submenu-expander">
                                                    <i class="fa fa-angle-down"></i>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                        
                                        <ul class="nav-item-children">
                                              
                                            <li>
                                                <a href="dashboard.php">
                                                    <span class="link-icon"></span>
                                                    <span class="link-txt">
                                                        <span class="link-ext"></span>
                                                        <span class="txt">
                                                            Dashboard
                                                            <span class="submenu-expander">
                                                                <i class="fa fa-angle-down"></i>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                    <a href="fundAccount.php">
                                        <span class="link-icon"></span>
                                        <span class="link-txt">
                                            <span class="link-ext"></span>
                                            <span class="txt">
                                                Fund Account
                                                <span class="submenu-expander">
                                                    <i class="fa fa-angle-down"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="transferFund.php">
                                        <span class="link-icon"></span>
                                        <span class="link-txt">
                                            <span class="link-ext"></span>
                                            <span class="txt">
                                                Transfer Funds
                                                <span class="submenu-expander">
                                                    <i class="fa fa-angle-down"></i>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </li>

                                            <li>
                                                <a href="edithProfile.php">
                                                    <span class="link-icon"></span>
                                                    <span class="link-txt">
                                                        <span class="link-ext"></span>
                                                        <span class="txt">
                                                            Edit Profile
                                                            <span class="submenu-expander">
                                                                <i class="fa fa-angle-down"></i>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="changePassword.php">
                                                    <span class="link-icon"></span>
                                                    <span class="link-txt">
                                                        <span class="link-ext"></span>
                                                        <span class="txt">
                                                            Change Password
                                                            <span class="submenu-expander">
                                                                <i class="fa fa-angle-down"></i>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="dev_API.php">
                                                    <span class="link-icon"></span>
                                                    <span class="link-txt">
                                                        <span class="link-ext"></span>
                                                        <span class="txt">
                                                            Developer API
                                                            <span class="submenu-expander">
                                                                <i class="fa fa-angle-down"></i>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="api/logout.php">
                                                    <span class="link-icon"></span>
                                                    <span class="link-txt">
                                                        <span class="link-ext"></span>
                                                        <span class="txt">
                                                            Logout
                                                            <span class="submenu-expander">
                                                                <i class="fa fa-angle-down"></i>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>';
                                }
                                ?>
                     
         
         </ul><!-- /#primary-nav  -->
                        
                        </div><!-- /#main-header-collapse -->
                        
                    </div><!-- /.col -->
                
                    <div class="col text-right">
                            
                            <div class="header-module">
                                <ul class="social-icon social-icon-sm">
                                    <li>
                                        <a href="https://fb.me/diligentmartofficial" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/diligentmart?s=09" target="_blank"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://t.me/Diligentmart" target="_blank"><i class="fa fa-telegram"></i></a>
                                    </li>
                                </ul>
                            </div><!-- /.header-module -->
                            
                        </div><!-- /.col -->
                
                </div><!-- /.mainbar-row -->
            </div><!-- /.mainbar -->
        </div><!-- /.mainbar-container -->
    </div><!-- /.mainbar-wrap -->
    
</header><!-- /.main-header -->
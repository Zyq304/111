<!-- loader -->
<div class="preloader">
    <div class="container">
        <div class="dot dot-1"></div>
        <div class="dot dot-2"></div>
        <div class="dot dot-3"></div>
    </div>
</div>
<!-- loader end -->
<header>
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-slid">
                <div>
                    <div class="phone-data">
                        <div class="phone">
                            <i>
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <path d="M0,81v350h512V81H0z M456.952,111L256,286.104L55.047,111H456.952z M30,128.967l134.031,116.789L30,379.787V128.967z
                   M51.213,401l135.489-135.489L256,325.896l69.298-60.384L460.787,401H51.213z M482,379.788L347.969,245.756L482,128.967V379.788z"></path>
                </svg>
                            </i><a href="mallto:username@domain.com">username@domain.com</a>
                        </div>
                        <div class="phone d-flax align-items-center">
                            <i>
                                <svg height="112" viewBox="0 0 24 24" width="112" xmlns="http://www.w3.org/2000/svg"><g clip-rule="evenodd" fill="rgb(255255,255)" fill-rule="evenodd"><path d="m7 2.75c-.41421 0-.75.33579-.75.75v17c0 .4142.33579.75.75.75h10c.4142 0 .75-.3358.75-.75v-17c0-.41421-.3358-.75-.75-.75zm-2.25.75c0-1.24264 1.00736-2.25 2.25-2.25h10c1.2426 0 2.25 1.00736 2.25 2.25v17c0 1.2426-1.0074 2.25-2.25 2.25h-10c-1.24264 0-2.25-1.0074-2.25-2.25z"></path><path d="m10.25 5c0-.41421.3358-.75.75-.75h2c.4142 0 .75.33579.75.75s-.3358.75-.75.75h-2c-.4142 0-.75-.33579-.75-.75z"></path><path d="m9.25 19c0-.4142.33579-.75.75-.75h4c.4142 0 .75.3358.75.75s-.3358.75-.75.75h-4c-.41421 0-.75-.3358-.75-.75z"></path></g></svg>
                            </i>
                            <a class="me-3" href="callto:+02112345678">+021 12345678</a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="time">
                        <div class="ordering">

                        </div>
                        <div class="login">
                            <i class="fa-solid fa-user"></i>
                            <?php if(isset($_SESSION['user_id'])){ ?>
                                <a href="user.php"><?=$_SESSION['name']?></a>
                                <a href="ajax.php?act=logout">Logout</a>
                            <?php }else{ ?>
                                <a href="login.php">Login / Register</a>
                            <?php }  ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="bottom-bar">
            <a href="index.php"><img src="assets/img/logo.png" alt="logo"></a>
            <nav class="navbar">
                <?php
                $filename = $_SERVER['PHP_SELF'];
                ?>
                <ul class="navbar-links">
                    <li class="navbar-dropdown  <?php if(strpos("/".$filename,"index.php")){ ?> active <?php } ?> ">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="navbar-dropdown  <?php if(strpos("/".$filename,"about")){ ?> active <?php } ?> ">
                        <a href="about.php">About</a>
                    </li>
                    <li class="navbar-dropdown  <?php if(strpos("/".$filename,"pet.php") || strpos("/".$filename,"pet_details.php")){ ?> active <?php } ?> ">
                        <a href="pet.php">Pet</a>
                    </li>
                    <li class="navbar-dropdown  <?php if(strpos("/".$filename,"forum") || strpos("/".$filename,"post")){ ?> active <?php } ?> ">
                        <a href="forum.php">Forum</a>
                    </li>
                    <li class="navbar-dropdown  <?php if(strpos("/".$filename,"map")){ ?> active <?php } ?> ">
                        <a href="map.php">Map</a>
                    </li>
                    <li class="navbar-dropdown  <?php if(strpos("/".$filename,"contact")){ ?> active <?php } ?> ">
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </nav>
            <div class="menu-end">
                <div class="bar-menu">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="header-search-button search-box-outer">
                    <a href="javascript:void(0)" class="search-btn">
                        <svg height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg"><g id="_12" data-name="12"><path d="m21.71 20.29-2.83-2.82a9.52 9.52 0 1 0 -1.41 1.41l2.82 2.83a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zm-17.71-8.79a7.5 7.5 0 1 1 7.5 7.5 7.5 7.5 0 0 1 -7.5-7.5z"></path></g></svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="mobile-nav hmburger-menu" id="mobile-nav" style="display:block;">
        <div class="res-log">
            <a href="index.php">
                <img src="assets/img/logo-w.png" alt="Responsive Logo">
            </a>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li class="navbar-dropdown">
                <a href="about.php">About</a>
            </li>
            <li class="navbar-dropdown">
                <a href="pet.php">Pet</a>
            </li>
            <li class="navbar-dropdown">
                <a href="forum.php">Chat</a>
            </li>
            <li class="navbar-dropdown">
                <a href="map.php">Map</a>
            </li>
            <li class="navbar-dropdown">
                <a href="contact.php">Contact</a>
            </li>
        </ul>

        <ul class="social-icon">
            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
        </ul>

        <a href="JavaScript:void(0)" id="res-cross"></a>
    </div>
</header>
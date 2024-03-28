<div id="sidebar" class="sidebar">
    <div class="sidebar-menu nav-collapse">
        <div class="divide-20"></div>

        <!-- SIDEBAR MENU -->

        <ul>

            <li class="<?=strpos($_SERVER['PHP_SELF'],"user")?'active':''?>"><a class="" href="user.php"><i class="fa fa-anchor fa-fw"></i> <span class="sub-menu-text">User Management</span></a></li>

            <li class="<?=strpos($_SERVER['PHP_SELF'],"tour")?'active':''?>"><a class="" href="category.php"><i class="fa fa-bars fa-fw"></i> <span class="sub-menu-text">Category Management</span></a></li>
            <li class="<?=strpos($_SERVER['PHP_SELF'],"destination")?'active':''?>"><a class="" href="pet.php"><i class="fa fa-bars fa-fw"></i> <span class="sub-menu-text">Pet Management</span></a></li>
            <li class="<?=strpos($_SERVER['PHP_SELF'],"tour")?'active':''?>"><a class="" href="board.php"><i class="fa fa-bars fa-fw"></i> <span class="sub-menu-text">Board Management</span></a></li>
            <li class="<?=strpos($_SERVER['PHP_SELF'],"tour")?'active':''?>"><a class="" href="post.php"><i class="fa fa-bars fa-fw"></i> <span class="sub-menu-text">Post Management</span></a></li>
            <li class="<?=strpos($_SERVER['PHP_SELF'],"comment")?'active':''?>"><a class="" href="comment.php"><i class="fa fa-bars fa-fw"></i> <span class="sub-menu-text">Comment Management</span></a></li>
            <li class="<?=strpos($_SERVER['PHP_SELF'],"block")?'active':''?>"><a class="" href="block.php"><i class="fa fa-bars fa-fw"></i> <span class="sub-menu-text">Block Management</span></a></li>

        </ul>
        <!-- /SIDEBAR MENU -->
    </div>
</div>
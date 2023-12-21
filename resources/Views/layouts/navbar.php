<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?php echo \App\Helpers\Helper::getBaseUrl().'/'?>">
            <img src="<?php echo \App\Helpers\Helper::getBaseUrl().'/resources/assets/images/logo.png'?>" width="100px" alt="Home">
            AZM
        </a>

    </div>
</nav>
<?php $route = \App\Helpers\Helper::getRoute();?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ">
                <li class="nav-item <?php if(($route== '/') || ($route== '/home')){echo 'active';}?> "><a href="<?php echo \App\Helpers\Helper::getBaseUrl().'/'?>" class="nav-link">Home</a></li>
                <?php if (isset($_SESSION['user_id'])) {  ?>
                  <li class="nav-item <?php if(($route== '/article/user') ){echo 'active';}?> "><a href="<?php echo \App\Helpers\Helper::getBaseUrl().'/article/user'?>" class="nav-link">My articles</a></li>
                  <li class="nav-item <?php if(($route== '/article/create') ){echo 'active';}?> "><a href="<?php echo \App\Helpers\Helper::getBaseUrl().'/article/create'?>" class="nav-link">Add article</a></li>
                <?php }?>

            </ul>

            <ul class="navbar-nav Loginstyle">

                <li class="nav-item">
                    <?php if (isset($_SESSION['user_id'])) {  ?>
                         <a href="<?php echo \App\Helpers\Helper::getBaseUrl().'/logout'?>" class="nav-link">logout</a>
                    <?php }else{?>
                        <a href="<?php echo \App\Helpers\Helper::getBaseUrl().'/login'?>" class="nav-link">login </a>
                    <?php }?>
                </li>
            </ul>
        </div>
    </div>
</nav>
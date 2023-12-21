
<?php include('layouts/header.php'); ?>

<section class="section">
    <?php include('layouts/navbar.php'); ?>
    <!-- END nav -->
    <div class="container">

        <?php foreach ($articles as $article){ ?>

            <div class="card cardStyle " >
                <div class="row no-gutters">
                    <div class="col-md-10">
                        <div class="card-body">
                            <a href="<?php echo \App\Helpers\Helper::getBaseUrl().'/article/detail?id='.$article['id'];?>">
                                <h5 class="card-title"><?php echo $article['title'] ;?></h5>
                                <p class="card-text"> <?php \App\Helpers\Helper::truncateContent($article['content'])?> </p>
                            </a>
                            <p class="card-text"><small class="text-muted">Author: <?php echo $article['username'] ?></small>  <small class="text-muted create-at">Created At : <?php echo  \App\Helpers\Helper::dateFormat($article['create_at']) ?> <br> <?php \App\Helpers\Helper::timeDifference($article['create_at'])?></small></p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <img src="<?php echo \App\Helpers\Helper::getBaseUrl().$article['img']?>" class="card-img" alt="...">
                    </div>
                </div>
            </div>
       <?php } ?>


        <?php \App\Helpers\Helper::showPaginate('/home',$page,$total,$pageSize) ;?>


    </div>
</section>

<?php include('layouts/footer.php'); ?>


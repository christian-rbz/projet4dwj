
<?php require ("includes/header.php"); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="swiper-container hero-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="hero-content flex justify-content-center align-items-center flex-column">
                                <img src="public/images/header.jpg" alt="">
                            </div><!-- .hero-content -->
                        </div><!-- .swiper-slide -->


                </div><!-- .swiper-container -->
            </div><!-- .col -->
        </div><!-- .row -->

    <!--     <div class="container">
            <div class="row">
                <div class=" col-12 col-lg-12">
                    <a href="#">
                        <div class="yt-subscribe">
                            <img src="images/yt-subscribe.png" alt="Youtube Subscribe">
                            <h3>Jean Forteroche</h3>
                            <p>Bienvenue dans mon blog !</p>
                        </div> 
                    </a>
                </div>
            </div>
        </div> -->

    </div><!-- .hero-section -->

    <div class="container single-page">
        <div class="row">

        	<?php
             echo $titleArticle;
             
				foreach ($articles as $article):
			?>

            <div class="col-12 col-lg-12">
                <div class="content-wrap">
                    <header class="entry-header">

                        <h2 class="entry-title"><?= $article->title() ?></h2>

                             <div class="posted-date">
                        		<?= $article->date() ?>
                        	</div><!-- .posted-date -->
                    </header><!-- .entry-header -->


                    <div class="entry-content">
                        <p><?= $article->content() ?></p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">

                        <a class="read-more order-2" href="post&id">Read more</a>

                        <div class="comments-count order-1 order-lg-3">
                            <a href="#">2 Comments</a>
                        </div><!-- .comments-count -->
                    
                </div><!-- .content-wrap -->

                <div class="pagination">
                    <ul class="flex align-items-center">
                        <li class="active"><a href="#">01.</a></li>
                        <li><a href="#">02.</a></li>
                        <li><a href="#">03.</a></li>
                    </ul>
                </div>
            </div><!-- .col -->

    	<?php endforeach ?>	
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .outer-container -->



<?php require ("includes/header.php"); ?>
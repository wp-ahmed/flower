<?php get_header(); ?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php
        $id=58;
        $i=0; 
                if( have_rows('gallery','58')){
                    while(have_rows('gallery','58')){
                        the_row();
                        $active=$i==0 ?"active":' ';
                        $image=get_sub_field('image',$id);
                        $link=get_sub_field('link',$id);
        ?>
                    <div class="carousel-item <?php echo $active; ?>">
                    <a href="<?php echo $link; ?>">
                        <img class="d-block w-100" src="<?php echo $image; ?>" alt="First slide">
                        </a>
                    </div>
        <?php
        $i++;
                    }
                } 
        ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
    <?php
        if(have_posts()){
            while(have_posts()){
                the_post();
                the_content();
            }
        }
    ?>
<?php get_footer(); ?>
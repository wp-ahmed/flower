<?php


//edit shop page ttle

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

function blue_add_title_shop(){
    ?>
        <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
    <?php
}

add_action('woocommerce_shop_loop_item_title','blue_add_title_shop',10);

//edit price 


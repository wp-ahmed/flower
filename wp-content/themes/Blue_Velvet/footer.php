<?php wp_footer(); ?>
    <footer id="footer" class="footer-section">
        <div id='footer-widget' class='footer-content'>
            <div class='footer-widgets-inner container'>
                <div class="row">
                    <div class="col-md-4">
                        <ul id="menu-footer" class="menu">
                            <li id="menu-item-53" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-53">
                                <a href="<?php echo  get_permalink( get_page_by_path( 'privacy-policy' ) );?>">Privacy Policy</a>
                            </li>
                            <li id="menu-item-54" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-54">
                                <a href="<?php echo  get_permalink( get_page_by_path( 'terms-conditions' ) );?>">Terms &amp; conditions</a>
                            </li>
                            <li id="menu-item-5555" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-54">
                                <a href="<?php echo  get_permalink( get_page_by_path( 'return-policy' ) );?>">Return Policy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4 class="widget-title">Contact us</h4>
                        <div class="textwidget">
                            <p>Phone: <?php echo get_field('phone',77); ?><br>
                            Email: <?php echo get_field('email',77); ?><br>
                            Address: <?php echo get_field('address',77); ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h4 class="widget-title">Payment options</h4>
                        <img width="177" height="34" src="<?php echo get_template_directory_uri() .'/images/Visa.png';?>" class="image wp-image-17  attachment-full size-full" alt="" style="max-width: 100%; height: auto;">
                    </div>
                </div>

            </div>
            <div id="footer-bottom" class="clr no-footer-nav">
                        <p><?php echo get_field('copy',70); ?>	</p>		
                </div>
        </div>
    </footer>
    </body>
</html>
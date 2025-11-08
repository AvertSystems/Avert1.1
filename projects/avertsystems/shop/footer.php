<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

                </div><!-- .col-full -->
        </div><!-- #content -->
<?php if ( is_front_page() ) { ?>
<section id="cat-banner">
	<div class="cat-header">
		<p class="cat-title">Dozens of Sale Items!</p>
	</div>
	<img class="catImg" style="display:block;" src="https://shop.avertsystems.co/wp-content/uploads/2025/10/sale_banner.jpeg">
</section>
<ul id="sale-loop" class="products columns-4">
<h1 class="cat-loop-title custom-cat-title">On Sale</h1>
<div class="storefront-sorting-2" style="width:100%">
	<?php get_template_part( "../../plugins/woocommerce/templates/loop/orderby" ); ?>
</div>
<?php 
do_action( 'storefront_loop_before' );
 if ( have_posts() ) : while ( have_posts() ) :
	the_post();

	/**
	 * Include the Post-Format-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	 */
	get_template_part("../../plugins/woocommerce/templates/content", "product"); 

	endwhile; ?>

<?php else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php } 

/**
 * Functions hooked in to storefront_paging_nav action
 *
 * @hooked storefront_paging_nav - 10
 */
do_action( 'storefront_loop_after' );
?>
<div class="storefront-sorting-2" style="width:100%">
	<?php get_template_part( "../../plugins/woocommerce/templates/loop/orderby" ); ?>
</div>
</ul>
        <?php do_action( 'storefront_before_footer' ); ?>
        <footer id="colophon" class="site-footer" role="contentinfo">
                <div class="col-full">

                        <?php
                        /**
                         * Functions hooked in to storefront_footer action
                         *
 			 * @hooked storefront_footer_widgets - 10
                         * @hooked storefront_credit         - 20
                         */
                        do_action( 'storefront_footer' );
                        ?>
                        <div id="footer-nav">
                                <a class="navLinks" href="/">Home</a>
                                <a class="navLinks" href="/product-category/on-sale">On Sale</a>
                                <a class="navLinks" href="/product-tag/3stripelife">3 Stripe Life</a>
                                <a class="navLinks" href="/cart">Cart</a>
                                <!--<a class="navLinks" href="/checkout">Checkout</a>-->
                                <a class="navLinks" href="/account">My Account</a>
                        </div>

                </div><!-- .col-full -->
        </footer><!-- #colophon -->

        <?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>

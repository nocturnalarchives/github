<?php
global $wp_query;
$image_width = get_option('product_image_width');
$image_height = get_option('product_image_height');
?>
<div id="grid_view_products_page_container">
<?php wpsc_output_breadcrumbs(); ?>

	<?php do_action('wpsc_top_of_products_page'); // Plugin hook for adding things to the top of the products page, like the live search ?>

	<?php if(wpsc_display_categories()): ?>
	  <?php if(get_option('wpsc_category_grid_view') == 1) :?>
			<div class="wpsc_categories wpsc_category_grid group">
				<?php wpsc_start_category_query(array('category_group'=> 1, 'show_thumbnails'=> 1)); ?>
					<a href="<?php wpsc_print_category_url();?>" class="wpsc_category_grid_item  <?php wpsc_print_category_classes_section(); ?>" title="<?php wpsc_print_category_name();?>">
						<?php wpsc_print_category_image(); ?>
					</a>
					<?php wpsc_print_subcategory("", ""); ?>
				<?php wpsc_end_category_query(); ?>

			</div><!--close wpsc_categories-->
	  <?php else:?>
			<ul class="wpsc_categories">
				<?php wpsc_start_category_query(array('category_group'=> 1, 'show_thumbnails'=> get_option('show_category_thumbnails'))); ?>
						<li>
							<?php wpsc_print_category_image(); ?>

							<a href="<?php wpsc_print_category_url();?>" class="wpsc_category_link  <?php wpsc_print_category_classes_section(); ?>"><?php wpsc_print_category_name();?></a>
							<?php if(get_option('wpsc_category_description')) :?>
								<?php wpsc_print_category_description("<div class='wpsc_subcategory'>", "</div>"); ?>
							<?php endif;?>

							<?php wpsc_print_subcategory("<ul>", "</ul>"); ?>
						</li>
				<?php wpsc_end_category_query(); ?>
			</ul>
		<?php endif; ?>
	<?php endif; ?>

	<?php if(wpsc_display_products()): ?>
	<?php if(wpsc_is_in_category()) : ?>
		<div class="wpsc_category_details">
			<?php if(get_option('show_category_thumbnails') && wpsc_category_image()) : ?>
				<img src="<?php echo wpsc_category_image(); ?>" alt="<?php echo wpsc_category_name(); ?>" title="<?php echo wpsc_category_name(); ?>" />
			<?php endif; ?>

			<?php if(get_option('wpsc_category_description') &&  wpsc_category_description()) : ?>
				<?php echo wpsc_category_description(); ?>
			<?php endif; ?>
		</div><!--close wpsc_category_details-->
	<?php endif; ?>


	<?php if(wpsc_has_pages_top()) : ?>
			<div class="wpsc_page_numbers_top group">
				<?php wpsc_pagination(); ?>
			</div><!--close wpsc_page_numbers_top-->
	<?php endif; ?>


	<div class="product_grid_display group">
		<?php while (wpsc_have_products()) :  wpsc_the_product(); ?>
			<div class="product_grid_item product_view_<?php echo wpsc_the_product_id(); ?>">

				<?php if(wpsc_the_product_thumbnail()) :?>
					<div class="item_image">
						<a class="item_image_link" href="<?php echo wpsc_the_product_permalink(); ?>">
						<img style="width:<?php echo get_option('product_image_width'); ?>px;height:<?php echo get_option('product_image_height'); ?>px" class="product_image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="<?php echo wpsc_the_product_title(); ?>" src="<?php echo wpsc_the_product_thumbnail(); ?>" />
						</a>

					<div class="addtocart">
						<form class="product_form"  enctype="multipart/form-data" action="<?php echo wpsc_this_page_url(); ?>" method="post" name="product_<?php echo wpsc_the_product_id(); ?>" id="product_<?php echo wpsc_the_product_id(); ?>" >
							<?php do_action ( 'wpsc_product_form_fields_begin' ); ?>
							<input type="hidden" value="add_to_cart" name="wpsc_ajax_action"/>
							<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="product_id"/>

							<?php if((get_option('display_addtocart') == 1) && (get_option('addtocart_or_buynow') !='1')) { ?>
								<?php if(wpsc_product_has_stock()) { ?>
										<input type="submit" value="<?php _e('Buy', 'jessica'); ?>" name="Buy" class="wpsc_buy_button" id="product_<?php echo wpsc_the_product_id(); ?>_submit_button"/>
								<?php }
							}
							?>
								<div class="wpsc_loading_animation"  style="display:none;">
								<img title="<?php esc_attr_e( 'Loading', 'jessica' ); ?>" alt="<?php esc_attr_e( 'Loading', 'jessica' ); ?>" src="<?php echo wpsc_loading_animation_url(); ?>" />
								<?php _e('Updating cart...', 'jessica'); ?>
								</div><!--close wpsc_loading_animation-->

						<?php do_action ( 'wpsc_product_form_fields_end' ); ?>
                    </form>
					</div><!--close addtocart-->

					<?php if((get_option('display_addtocart') == 1) && (get_option('addtocart_or_buynow') == '1')) :?>
						<?php echo wpsc_buy_now_button(wpsc_the_product_id()); ?>
					<?php endif ; ?>

							<?php if(get_option('display_moredetails') == 1) : ?>
							<div class="more-details"><a href="<?php echo wpsc_the_product_permalink(); ?>" class="more_details"><?php esc_html_e( 'Info', 'jessica' ); ?></a></div>
						<?php endif; ?>

					</div><!--close imte_image-->
						<?php else: ?>

					<div class="item_no_image">
									<a  class="item_image_link" href="<?php echo wpsc_the_product_permalink(); ?>">
									<img class="no-image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="<?php esc_attr_e( 'No Image', 'jessica' ); ?>" title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo WPSC_CORE_THEME_URL; ?>wpsc-images/noimage.png" width="<?php echo get_option('product_image_width'); ?>" height="<?php echo get_option('product_image_height'); ?>" />
									</a>

					<div class="addtocart">
						<form class="product_form"  enctype="multipart/form-data" action="<?php echo wpsc_this_page_url(); ?>" method="post" name="product_<?php echo wpsc_the_product_id(); ?>" id="product_<?php echo wpsc_the_product_id(); ?>" >
							<?php do_action ( 'wpsc_product_form_fields_begin' ); ?>
							<input type="hidden" value="add_to_cart" name="wpsc_ajax_action"/>
							<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="product_id"/>

							<?php if((get_option('display_addtocart') == 1) && (get_option('addtocart_or_buynow') !='1')) { ?>
								<?php if(wpsc_product_has_stock()) { ?>
										<input type="submit" value="<?php _e('Buy', 'jessica'); ?>" name="Buy" class="wpsc_buy_button" id="product_<?php echo wpsc_the_product_id(); ?>_submit_button"/>
								<?php }
							}
							?>
								<div class="wpsc_loading_animation"  style="display:none;">
								<img title="<?php esc_attr_e( 'Loading', 'jessica' ); ?>" alt="<?php esc_attr_e( 'Loading', 'jessica' ); ?>" src="<?php echo wpsc_loading_animation_url(); ?>" />
								<?php _e('Updating cart...', 'jessica'); ?>
								</div><!--close wpsc_loading_animation-->

						<?php do_action ( 'wpsc_product_form_fields_end' ); ?>
                    </form>
					</div><!--close addtocart-->


						<?php	if(get_option('display_moredetails') == 1) : ?>
							<div class="more-details"><a href="<?php echo wpsc_the_product_permalink(); ?>" class="more_details"><?php esc_html_e( 'Info', 'jessica' ); ?></a></div>
						<?php endif; ?>

					</div><!--close item_no_image-->
				<?php endif; ?>

				<?php if(wpsc_product_on_special()) : ?><span class="sale"><?php _e('Sale', 'jessica'); ?></span><?php endif; ?>
				<?php if(get_option('show_images_only') != 1): ?>
					<div class="grid_product_info">
							<h2 class="prodtitle"><a href="<?php echo wpsc_the_product_permalink(); ?>" title="<?php echo wpsc_the_product_title(); ?>"><?php echo wpsc_the_product_title(); ?></a></h2>

						<?php if((wpsc_the_product_description() != '') && (get_option('display_description') == 1)): ?>
							<div class="grid_description"><?php echo wpsc_the_product_description(); ?></div>
						<?php endif; ?>
                        	<div class="price_container">
                        		<p class="pricedisplay product_<?php echo wpsc_the_product_id(); ?>"><span id='product_price_<?php echo wpsc_the_product_id(); ?>' class="currentprice pricedisplay"><?php echo wpsc_the_product_price(); ?></span></p>
							</div><!--close price_container-->

					</div><!--close grid_product_info-->


				<?php endif; ?>
			</div><!--close product_grid_item-->
			<?php if((get_option('grid_number_per_row') > 0) && ((($wp_query->current_post +1) % get_option('grid_number_per_row')) == 0)) :?>
			  <div class="grid_view_clearboth"></div>
			<?php endif ; ?>



		<?php endwhile; ?>

		<?php if(wpsc_product_count() == 0):?>
			<p><?php  _e('There are no products in this group.', 'jessica'); ?></p>
		<?php endif ; ?>


	</div><!--close product_grid_display-->

		<?php if(wpsc_has_pages_bottom()) : ?>
			<div class="wpsc_page_numbers_bottom group">
				<?php wpsc_pagination(); ?>
			</div><!--close wpsc_page_numbers_bottom-->
		<?php endif; ?>
	<?php endif; ?>

    <?php do_action( 'wpsc_theme_footer' ); ?>

</div><!--close grid_view_products_page_container-->

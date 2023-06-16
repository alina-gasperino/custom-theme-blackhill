<?php
get_header();
$post_title = get_the_title(); ?>
<div class = "site-main">
	<section class = "product_overview">
		<div class = "stone_meta_btns">
			<div class = "stone_meta">
				<h1><?php echo $post_title;?></h1>
				<?php the_content(); ?>
			</div>
			<div class = "stone_btns">
				<button class = "btn_primary">Order Samples</button>
				<button class = "btn_secondary">Documentation</button>
			</div>
		</div>
	</section>
	<?php
	get_template_part('template-parts/flex/flexible_content');
	?>
</div>
<?php
get_footer();
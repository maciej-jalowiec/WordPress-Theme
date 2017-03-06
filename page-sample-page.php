<?php

/*
Template Name: Special Layout
*/

get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();
?>
		<article class="page">

		<?php
			if (has_children() OR $post->post_parent > 0) {
		?>
			<nav class="site-nav children-links clearfix">
				<span class="parent-link"><a href="<?php the_permalink(get_top_ancestor_id()); ?>"><?php echo get_the_title(get_top_ancestor_id()) ?></a></span>
				
				<ul>
				<?php
					$args = array (
						'child_of' => get_top_ancestor_id(),
						'title_li' => ''
					)
				?>
				<?php wp_list_pages($args); ?>
				</ul>

			</nav>
		<?php } ?>


			<!-- Column Container -->
			<div class="column-container clearfix">

				<!-- Title Container -->
				<div class="title-column">
					<h2><?php echo the_title(); ?></h2>
				</div>
				<!-- / Title Container -->

				<!-- Content Container -->
				<div class="content-column">
							<div class="info-box">
								<h4>Extra info</h4>
								<p>This is a sample text that goes into the Extra info box and is here solely for the purpose of showing how an actual text would look like.</p>
							</div>
					<?php echo the_content(); ?>
				</div>
				<!-- / Content Container -->

			</div>
			<!-- / Column Container -->

		</article>
<?php
	}
}
else {
	echo "<p>No content found</p>";
}

get_footer();

?>
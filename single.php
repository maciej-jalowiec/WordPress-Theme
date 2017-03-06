<?php

get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();
?>
		<article class="post">
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<span class="post-description">Post date: <?php the_time('d-m-Y'); ?> | Posted by <a href='<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>'><?php echo get_the_author(); ?></a> | Posted in 
			<?php
			
			$categories = get_the_category();
			$separator = ", ";
			$output = '';

			if ($categories) {
				foreach ($categories as $category) {
					$output .= '<a href="'.get_category_link($category->term_id).'">'.$category->cat_name.'</a>'.$separator;
				}
			}

			echo trim ($output, $separator);

			?></span>
			<p>
			<?php the_post_thumbnail('banner-image'); ?>
			</p>
			<?php echo the_content(); ?>
		</article>
<?php
	}
}
else {
	echo "<p>No content found</p>";
}

get_footer();

?>
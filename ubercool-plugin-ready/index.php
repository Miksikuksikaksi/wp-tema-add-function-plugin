<?php get_header(); ?>

	<section>
		<?php while (have_posts()) : the_post() ?>
			<div class="mh-post">
				<h3 class="mh-entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<span class="mh-entry-author"><?php the_author_posts_link(); ?></span>
				<span class="mh-entry-date"><?php the_time('Y/m/d'); ?></span>
				<div class="mh-entry-content">
					<?php the_excerpt(); ?>
				</div>
			</div>
		<?php endwhile; ?>
	</section>

<?php get_footer(); ?>
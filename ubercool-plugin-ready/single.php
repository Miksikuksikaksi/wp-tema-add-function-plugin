<?php get_header(); ?>

	<section>
		<?php the_post() ?>
			<div class="mh-post">
				<h3 class="mh-entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<span class="mh-entry-author"><?php the_author_posts_link(); ?></span>
				<div class="mh-entry-content">
					<?php the_content(); ?>
				</div><!-- ends mh-entry-content -->
				
				<?php // insert meta data into post ?>
				<div class="mh-meta-data">
					<p><?php echo get_post_meta($post->ID, "_color", true); ?></p>
				</div>
			</div><!-- ends mh-post -->
	</section>
	
<?php get_footer(); ?>
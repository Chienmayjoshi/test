<?php
/*
Template Name: Search 1
*/
?>
<?php get_header(); ?>
<div class="containerOuter">
	<div class="container postContainer clearfix">
		<div class="leftSide">
			<?php 
			// Check if there are any posts to display
			if ( have_posts() ) : ?>
			
			<header class="archive-header clearfix">
				<h1 class="archive-title"><?php single_cat_title( '' ); ?></h1>
				<?php
				// Display optional category description
				 if ( category_description() ) : ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
			</header>

			<div class="archive-posts clearfix">
				<?php $post = $posts[0]; $c=0;?>
				<?php

				// The Loop
				while ( have_posts() ) : the_post();?>
				<?php $c++;
				if( $c == 1) :?>
				<div class="firstPostWrapper">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('full', array('class' => 'firstPostThumb'));
					} ?>
					<h2 class="firstPostTitle">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>

					<div class="firstPostDesc">
						<?php echo get_excerpt(100); ?>
					</div>

				</div><!--end firstPostWrapper-->
				
				<?php else :?>
				
				<div class="otherPosts clearfix">
					<div class="imgLeft">
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('full', array('class' => 'postLeftThumb'));
						} ?>
					</div>
					<div class="postRight">
						<h2 class="postTitle">
							<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
								<?php the_title(); ?>
							</a>
						</h2>
						<a href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/visitPost.png" alt=""></a>
						<div class="postDescription">
							<?php echo get_excerpt_nolink(200); ?>
						</div>
					</div>
				</div>
				
				<?php endif;?>

				<?php endwhile; // End Loop ?>

				
			</div>
			<?php else: ?>
				<p style="padding-top:25px">Sorry, no posts matched your criteria.</p>


				<?php endif; ?>
		</div><!--end leftSide-->
		<div class="rightSide">
			<?php get_sidebar(); ?>
		</div><!--end rightSide-->
	</div>
</div>
<?php get_footer(); ?>
<!--index-->
<?php get_header(); ?>
			<?php
			if ( is_front_page() ) {
				echo '<div id="content" class="page--front-page">';
			} else {
				echo '<div id="content">';
			}
			?>



				<div id="inner-content" class="wrap  row">

					<?php
					if ( is_front_page() ) {
						echo '<main id="main" class="col-xs-12 " role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">';
					} else {
						echo '<div id="<main id="main" class="col-xs-12 col-sm-8 col-lg-9 " role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">';
					}
					?>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( ' single-post' ); ?> role="article">

								<?php
								if ( is_front_page() ) {
									echo '<header class="article-header col-sm-8">';
								} else {
									echo '<header class="article-header">';
								}
								?>
									<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="byline entry-meta vcard">
	                      <?php printf( __( '', 'startertheme' ).' %1$s %2$s',
	       								/* the time the post was published */
	       								'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
	       								/* the author of the post */
	       								'<span class="by">'.__( '', 'startertheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
	    							); ?>
									</p>

								</header>

								<section class="entry-content ">
									<?php the_content(); ?>
								</section>

								<?php
								if ( is_front_page() ) {
									echo '<footer class="article-footer col-sm-8">';
								} else {
									echo '<footer class="article-footer">';
								}
								?>
									<p class="footer-comment-count">
										<?php comments_number( __( '<span>No</span> Comments', 'startertheme' ), __( '<span>One</span> Comment', 'startertheme' ), __( '<span>%</span> Comments', 'startertheme' ) );?>
									</p>


                 	<?php printf( '<p class="footer-category">' . __('filed under', 'startertheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

                  <?php the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'startertheme' ) . '</span> ', ', ', '</p>' ); ?>


								</footer>

							</article>

							<?php endwhile; ?>

									<?php starter_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry ">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'startertheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'startertheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'startertheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


						</main>

						<?php
						if ( is_front_page() ) {
						  //
						} else {
						  get_sidebar();
						}
						?>



				</div>

			</div>

<?php get_footer(); ?>

<?php
get_header();
?>
<main id="primary" class="site-main search-result2">
	<section class="inner-page-hero">
		<div id="particles-js"></div>
		<div class="container">
			<?php echo get_field('search_svg_icon', 'option'); ?>
			<div class="inner text-center search-page">
				<h1 class="page-title">
					<?php printf(esc_html__('Search Results for: %s', 'diligent_technologies'), '<span class="fill-primary">' . get_search_query() . '</span>'); ?>
				</h1>
			</div>
		</div>
	</section>
	<div class="container">
		<div class="row">
			<?php get_template_part('template-parts/content', 'filter-form'); ?>
			<div class="col-xl-9 col-md-8">
				<div class="search-results filtered-data my-5 my-md-0 my-lg-0">
					<?php
					$search_query = get_search_query();
					$posts_per_page = 10; // Number of posts per page
					// Search Query
					$args = array(
						'post_type' => 'project',
						'posts_per_page' => $posts_per_page,
						'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
					);
					if (!empty($search_query)) {
						$args['s'] = $search_query;
					}
					$query = new WP_Query($args);
					if ($query->have_posts()) :
						while ($query->have_posts()) :
							$query->the_post();
							get_template_part('template-parts/content', 'search');
						endwhile;

					else :
						// If no search results, show all projects
						if (!empty($search_query)) {
							echo '<p class="text-center empty-result">' . esc_html__('No results found for your search..', 'your_text_domain') . '</p>';
						}
						wp_reset_postdata();
					endif;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
get_sidebar();
get_footer();
?>
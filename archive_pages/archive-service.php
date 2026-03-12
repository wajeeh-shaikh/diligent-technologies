<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package diligent_technologies
 */

get_header();

$taxonomy = get_queried_object();

$args = array(
    'post_type' => 'service',
    'posts_per_page' => -1,

);

$posts = new WP_Query($args);

?>

<main id="primary" class="site-main">
    <section class="inner-page-hero ">
        <div id="particles-js" class="inner-particles"></div>
        <div class="container">
            <?php echo get_field('service_section_svg_icon', 'option') ?>
            <div class="inner text-center search-page">
                <?php echo get_field('service_hero_section_title', 'option') ?>
            </div>
        </div>
    </section>
    <section class="featured-cards padding <?php echo $className ?>">
        <div class="container">
            <div class="inner">
                <div class="row cards-listing gy-4">
                    <?php if ($posts->have_posts()) : ?>
                        <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                            <div class="col-md-6">
                                <div class="single animate-border">
                                    <div class="hover-effects">
                                        <a href="<?php echo get_permalink(); ?>">
                                            <div class="icon">
                                                <img src="<?php echo get_field('services_icon', get_the_ID()); ?>" />
                                            </div>
                                            <h4 class="title"><?php echo get_the_title(); ?></h4>
                                            <div class="description">
                                                <?php echo wp_trim_words(get_the_content(), 20); ?>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_sidebar();
get_footer();

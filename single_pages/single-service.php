<?php get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        //  this be too Removed

        // $service_post_objects = get_field('service_releation_price_plan');

        // Initialize variables
        // $pricing_plan_title = '';
        // $pricing_plan_link = '';
        // $pricing_plan_time = '';
        // $pricing_plan_price = '';

        // if ($service_post_objects) {
        //     foreach ($service_post_objects as $service_post_object) {
        //         if (is_int($service_post_object)) {
        //             $service_post_object = get_post($service_post_object);
        //         }

        //         if ($service_post_object && is_object($service_post_object)) {
        //             $pricing_plan_link = get_permalink($service_post_object->ID);
        //             $pricing_plan_title = get_the_title($service_post_object->ID);
        //             $pricing_plan_time = get_field('plan_card_estimate_time', $service_post_object->ID);
        //             $pricing_plan_price = get_field('plan_card_price', $service_post_object->ID);
        //         }
        //     }
        // }
?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- Description -->
            <div class="entry-content">
                <div class="post-head text-center">
                    <div class="container">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <?php echo wp_trim_words(get_the_content(), 35); ?>
                    </div>
                </div>
                <?php if (get_field('single_service_page_details')) : ?>
                    <div class="container">
                        <?php echo get_field('single_service_page_details') ?>
                    </div>
                <?php endif ?>
                <!-- Service Details -->
                <?php if (have_rows('faq_accordion', get_the_ID())) : ?>
                    <section class="faqs padding">
                        <div class="container">
                            <div class="inner">
                                <h2>FAQs</h2>
                                <div class="accordion" id="faqAccordion">
                                    <?php
                                    $counter = 0;
                                    while (have_rows('faq_accordion', get_the_ID())) : the_row();
                                        $counter++;
                                        $collapse_id = 'faqAccordionCollapse' . $counter;
                                        $header_id = 'faq' . $counter;
                                    ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="<?php echo $header_id; ?>">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse_id; ?>" aria-expanded="true" aria-controls="<?php echo $collapse_id; ?>">
                                                    <span class="pe-3"><?php echo get_sub_field('accordion_title', get_the_ID()) ?></span>
                                                    <i class="fa-solid fa-arrow-right ms-auto"></i>
                                                </button>
                                            </h2>
                                            <div id="<?php echo $collapse_id; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo $header_id; ?>" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body">
                                                    <?php echo get_sub_field('accordion_description', get_the_ID()) ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            </div>

            <?php display_newsletter_banner(); ?>
            <footer class="entry-footer">
            </footer>

        </article>
<?php endwhile;
else :
    echo '<p>No content found</p>';
endif;
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
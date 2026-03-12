<?php
// Retrieve ACF fields
$home_video_block = get_field('hero_block_video');
$seo_video_thumbnail = get_field('seo_video_thumbnail');
$seo_video_url = get_field('seo_video_url'); // Add this to retrieve the video URL

$hero_title = get_field('home_hero_title');
$hero_description = get_field('home_hero_description');
$form_short_code = get_field('home_contact_form_short_code');

$secondary_cta = get_field('secondary_cta_button');
$secondary_button = [
    'url' => $secondary_cta['url'] ?? '',
    'title' => $secondary_cta['title'] ?? '',
    'target' => $secondary_cta['target'] ?? '_self'
];

// Block class name
$className = $block['className'] ?? '';


$home_hero_video = get_field('home_hero_video');
$home_hero_video_link = [
    'url' => $home_hero_video['url'] ?? '',
    'title' => $home_hero_video['title'] ?? '',
    'target' => $home_hero_video['target'] ?? '_self'
];
?>

<!-- Hero Section start -->
<section class="home-hero <?php echo esc_attr($className); ?>">
    <div id="particles-js"></div>
    <div class="container">
        <div class="inner d-flex">
            <div class="row my-auto align-items-center">
                <div class="col-lg-7">
                    <div class="hero-text">
                        <?php if ($hero_title): ?>
                        <?php echo $hero_title; ?>
                        <?php endif; ?>

                        <?php if ($hero_description): ?>
                        <div class="hero-description">
                            <p><?php echo $hero_description; ?></p>
                        </div>
                        <?php endif; ?>

                        <?php if (!$home_video_block): ?>
                        <div class="hero-cta-btns d-flex mb-4 mb-lg-0">
                            <a class="icon-btn" href="<?php echo esc_url($secondary_button['url']); ?>"
                                target="<?php echo esc_attr($secondary_button['target']); ?>">
                                <?php echo esc_html($secondary_button['title']); ?>
                            </a>
                        </div>
                        <?php else: ?>
                        <div class="seo-video">
                            <a href="<?php echo $home_hero_video_link['url']; ?>">
                                <?php if ($seo_video_thumbnail): ?>
                                <img class="seo-video-thumbnail"
                                    src="<?php echo esc_url($seo_video_thumbnail['url']); ?>" alt="">
                                <?php endif; ?>
                                <!-- Modal Trigger Button -->
                                <span class="btn play-btn-seo">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/play-btn.png" alt="">
                                </span>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="animate-border">
                        <div class="hero-form">
                            <?php echo do_shortcode($form_short_code); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section end -->

<!-- Modal for Video -->
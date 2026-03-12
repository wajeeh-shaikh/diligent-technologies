<section class="our-client padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-md-12">
                <?php echo get_field('our_client_heading'); ?>

            </div>
        </div>
        <div class="row gy-4">
            <?php if( have_rows('our_client_boxes') ): ?>
            <?php while( have_rows('our_client_boxes') ): the_row(); ?>
            <div class="col-xl-6">
                <div class="video-wrapper">
                    <?php 
                                // Get the subfield values
                                $video_link = get_sub_field('our_client_video_link'); // This is now an array
                                $thumbnail = get_sub_field('our_client_thumbnail');
                                $client_text = esc_html(get_sub_field('our_client_text'));

                                // Extract the URL from the video link array
                                if (!empty($video_link) && is_array($video_link)) {
                                    $video_url = esc_url($video_link['url']); // Accessing the 'url' key
                                } else {
                                    $video_url = ''; // Set a default value if not available
                                }
                            ?>
                    <a href="<?php echo $video_url; ?>" target="_blank" rel="noopener noreferrer">
                        <?php if ($thumbnail): ?>
                        <img class="seo-video-thumbnail" src="<?php echo esc_url($thumbnail['url']); ?>"
                            alt="<?php echo esc_attr($thumbnail['alt']); ?>">
                        <?php endif; ?>
                        <span class="play-btn">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/play-btn.png'); ?>"
                                alt="Play button">
                        </span>
                    </a>
                    <p><?php echo $client_text; ?></p>
                </div>
            </div>
            <?php endwhile; ?>
            <?php else: ?>
            <?php endif; ?>
        </div>
    </div>
</section>
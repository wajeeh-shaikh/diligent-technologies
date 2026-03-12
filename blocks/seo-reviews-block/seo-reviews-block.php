<section class="seo-reviews  padding">
    <div class="container ">
        <div class="inner rounded-4 py-4">
            <div class="row">
                <?php if( have_rows('seo_reviews_repeater') ): ?>
                <?php while( have_rows('seo_reviews_repeater') ): the_row(); ?>
                <div class="col-lg-4 text-center py-3">
                    <!-- Reviews Logo -->
                    <div class="reviews-logo">
                        <?php 
                                $logo = get_sub_field('seo_reviews_logo');
                                if( $logo ): ?>
                        <img class="seo_reviews_logo" src="<?php echo esc_url( $logo['url'] ); ?>"
                            alt="<?php echo esc_attr( $logo['alt'] ); ?>">
                        <?php endif; ?>
                    </div>

                    <!-- Reviews Rating -->
                    <?php 
                            $rating = get_sub_field('seo_reviews_rating');
                            if( $rating ): ?>
                    <img class="seo_reviews_rating" src="<?php echo esc_url( $rating['url'] ); ?>"
                        alt="<?php echo esc_attr( $rating['alt'] ); ?>">
                    <?php endif; ?>

                    <!-- Reviews Text -->
                    <p class="seo_reviews_text">
                        <?php echo esc_html( get_sub_field('seo_reviews_text') ); ?>
                    </p>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
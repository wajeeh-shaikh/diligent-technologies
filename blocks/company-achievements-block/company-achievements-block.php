<section class="company-achievements padding">
    <div class="container">
        <div class="row gy-5">
            <?php if( have_rows('company_achievements_block') ): ?>
            <?php while( have_rows('company_achievements_block') ): the_row(); 
                    // Get subfields
                    $achievement_number = get_sub_field('company_achievements_number');
                    $achievement_text = get_sub_field('company_achievements_text');
                ?>
            <div class="col-lg-3 col-md-6">
                <div class="achievement-counter text-center ">
                    <h3 class="fill-primary">+<?php echo esc_html($achievement_number); ?>%</h3>
                    <p><?php echo esc_html($achievement_text); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
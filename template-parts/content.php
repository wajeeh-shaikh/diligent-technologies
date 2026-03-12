<!-- Search Page Content -->
<?php ?>
<?php if (get_the_content()): ?>
    <div class="search-box">
        <article class="animate-border" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="entry-content">
                <?php
                if (is_singular()) :
                    // Display the title for singular pages
                    the_title('<h2 class="entry-title">', '</h2>');
                else :
                    // Display the title for search results and archives
                    echo '<h6 class="entry-title">' . get_the_title() . '</h6>';
                endif;
                ?>
                <?php
                if (has_excerpt()) :
                    the_excerpt();
                elseif (get_the_content()) :
                    the_content(sprintf(
                        wp_kses(
                            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'diligent-technologies'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ));
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'diligent-technologies'),
                        'after'  => '</div>',
                    ));
                else :
                // echo '<p>' . esc_html__('No content available.', 'your_text_domain') . '</p>';
                endif;
                ?>
                <?php
                if (!is_singular()) :
                    // Display "Read More" link for search results and archives
                    echo '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">Read More</a>';
                endif;
                ?>
            </div>
        </article>


    </div>
<?php endif ?>
<?php get_sidebar(); ?>
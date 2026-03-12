<?php get_header(); ?>
<?php
// Get current post data
$post_url = urlencode(get_permalink()); // Encoded URL of the current post
$post_title = urlencode(get_the_title()); // Encoded title of the current post
$post_id = get_the_ID();
// Social media URLs
// $facebook_url = "https://www.facebook.com/sharer/sharer.php?u=$post_url";
// $twitter_url = "https://twitter.com/intent/tweet?url=$post_url&text=$post_title";
// $linkedin_url = "https://www.linkedin.com/shareArticle?url=$post_url&title=$post_title";
// $email_link = "mailto:?subject=$post_title&body=Check out this blog: $post_url";

$blog_key_features_heading = get_field('blog_key_features_heading');
$blog_key_features_list = get_field('blog_key_features_list');

$toc_heading = get_field('toc_heading');
$toc_list = get_field('toc_list');
$toc_right_image = get_field('toc_right_image');

$author_id = (get_field('blog_author', $post_id)['ID']??get_the_author_meta('ID'));
$author_name = get_the_author_meta('display_name', $author_id);
$first_name = get_the_author_meta('first_name', $author_id);
$job_title = (get_the_author_meta('_tutor_profile_job_title', $author_id)??'');
$author_bio = get_the_author_meta('description', $author_id);
$author_avatar = get_avatar($author_id, 64); // Adjust size as needed
$author_url = get_author_posts_url($author_id);
$avatar_url = get_avatar_url($author_id);


if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <div class="container">
                    <div class="breadcrumb">
                        <h6 class="text-capitalize">
                            <?php
                            // Get the category
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                $category = $categories[0];
                                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="fill-primary">' . esc_html($category->name) . '</a> / ';
                            }

                            // Get the post title
                            echo '<a href="' . esc_url(get_permalink()) . '" class="fill-primary">' . get_the_title() . '</a>';
                            ?>
                        </h6>
                    </div>
                    <div class="post-head text-center">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <p><?php echo wp_trim_words(get_the_content(), 35); ?></p>
                    </div>
                    <div class="post-image">
                        <?php echo (get_the_post_thumbnail(get_the_ID())) ?>
                        <div class="social-share-icons">
                            <p class="text-white mb-0">
                                Published Date: <?php echo get_the_date('m-d-Y'); ?>
                            </p>
                            <div class="social-share-links d-flex align-items-center flex-wrap">
                            <?php echo do_shortcode('[miniorange_social_sharing]');
                            ?>
                            <a id="share-to-icon" href="javascript:void(0)"> <i class="fa-duotone fa-solid fa-share-nodes"></i></a>
                            </div>
                           
                        </div>
                    </div>
                    <?php if (isset($blog_key_features_heading) || !empty($blog_key_features_list)) { ?>
                    <div class="key-takeaways">
                        <h2><?php echo ($blog_key_features_heading??'');?></h2>
                        <ul>
                            <?php
                                foreach ($blog_key_features_list as $key => $value) {
                                    echo "<li><p>".$value['key_feature_input']."</p></li>";
                                }
                            ?>                         
                        </ul>
                    </div>
                    <?PHP }?>
                    <?php if (isset($toc_heading) || !empty($toc_list)) { ?>
                    <div class="table-of-content my-5">
                        <h2><?php echo ($toc_heading??'');?></h2>
                        <ol>
                            <?php
                                foreach ($toc_list as $key => $value) {
                                    echo "<li><p>".$value['toc_list_input']."</p></li>";
                                }
                            ?>
                        </ol>
                    </div>
                    <?php }?>
                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">

                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="copy-to-clipboard">
                                <button id="copy-url-btn" class="btn btn-primary">Copy URL</button>
                                <div id="toast" class="toast-body" style="display: none;">
                                    URL copied to clipboard!
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo get_field('blog_details') ?>
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'category');
                    if ($terms && !is_wp_error($terms)) :
                        $term_links = array();
                        foreach ($terms as $term) {
                            $args = array(
                                'post_type' => 'post',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'category',
                                        'field'    => 'slug',
                                        'terms'    => $term->slug,
                                    ),
                                ),
                                'orderby'        => 'date',
                                'order'          => 'DESC',
                            );

                            $blog_posts = new WP_Query($args);
                            $term_links[] = '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';
                        }
                        echo implode(', ', $term_links);
                    else :
                        echo 'No categories assigned.';
                    endif;
                    ?>
                   <div class="author-detail mt-5 gap-4 d-flex align-items-center">
                        <?php if($avatar_url){?>
                        <div class="author-profile">
                            <img src="<?php echo $avatar_url;?>" alt="Author-profile">
                        </div>
                        <?php }?>
                        <div class="author-details">
                            <?php if($first_name){?><h5 ><a href="javascript:void(0)" class="fill-primary"><?php echo $first_name; ?></a> </h5><?php }?>
                            <?php if($job_title){?><p><?php echo $job_title;?></p><?php }?>
                            <?php if($author_bio){?><p class="mb-0"><?php echo $author_bio;?></p><?php }?>
                        </div>
                    </div>
                </div>
                
            </div>
           
            <!-- releated Blogs -->
            <div class="posts-listing-wrapper padding">
                <div class="container">
                    <div class="inner">
                        <h2>Related<br> <span class="fill-primary">Blogs</span></h2>
                        <div class="post-listing row gy-4 ">
                            <?php if ($blog_posts->have_posts()) : ?>
                                <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                                    <div class="col-xl-4 col-md-6">
                                        <a href="<?php echo get_permalink(); ?>" class="post">
                                            <?php if (!empty((get_the_post_thumbnail(get_the_ID())))) { ?>
                                                <div class="post-thumbnail mb-3">
                                                    <?php echo (get_the_post_thumbnail(get_the_ID())) ?>
                                                </div>
                                            <?php } ?>
                                            <div class="post-text">
                                                <h3><?php echo get_the_title(); ?></h3>
                                                <p><?php echo get_the_excerpt(); ?></p>
                                            </div>
                                        </a>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="cta-btn-wrapper mt-5 text-end">
                            <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="icon-btn">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
<?php endwhile;
else :
    echo '<p>No content found</p>';
endif;
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<script>
    document.getElementById('copy-url-btn').addEventListener('click', function () {
        // Get the current post URL dynamically
        const postUrl = "<?php echo esc_url(get_permalink()); ?>";

        // Copy the URL to clipboard
        navigator.clipboard.writeText(postUrl).then(function () {
            // Show the toast message
            const toast = document.getElementById('toast');
            toast.style.display = 'block';

            // Hide the toast after 3 seconds
            setTimeout(function () {
                toast.style.display = 'none';
            }, 3000);
        }).catch(function (error) {
            console.error('Error copying URL:', error);
        });
    });
</script>
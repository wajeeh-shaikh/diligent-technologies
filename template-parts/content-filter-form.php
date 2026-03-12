<!-- Serach Side Filters  -->
<div class="col-xl-3 col-md-4">
    <div class="apply-filters-side d-md-none d-block mt-3">
        <a href="javascript:void(0);" class="apply-filters-button d-flex align-items-center justify-content-center">
            <h6>Filters <span class="fill-primary"><i class="fa-solid fa-sliders ms-1"></i></span></h6>
        </a>
    </div>
    <form id="filter-form" class="animate-border mb-4 mb-lg-0 filter-form">
        <a href="javascript:void(0);" class="close-filters-button d-md-none"><i class="fa-solid fa-xmark"></i></a>
        <input type="hidden" name="s" value="<?php echo get_search_query(); ?>">
        <?php
        $post_types = array('service', 'post', 'project');

        echo '<h6 class="d-none d-md-block">Apply Search <span class="fill-primary">Filters </span></h6>';

        foreach ($post_types as $post_type) {

            $taxonomies = get_object_taxonomies($post_type, 'objects');
            foreach ($taxonomies as $taxonomy) {
                $terms = get_terms(array(
                    'taxonomy' => $taxonomy->name,
                    'hide_empty' => false,
                ));

                if (!empty($terms)) {
                    echo "<h4>" . $taxonomy->labels->name . "</h4>";
                    echo '<div class="taxonomy-container" data-post-type="' . $post_type . '">';
                    echo '<ul class="taxonomy-terms">';
                    foreach ($terms as $term) {
                        echo '<li class="gchoice"><label class="input-label"><input type="checkbox" class="term-checkbox" name="' . $taxonomy->name . '[]" value="' . $term->slug . '"> ' . $term->name . '</label></li>';
                    }
                    echo '</ul>';
                    echo '<div class="show-all-container"><a type="button" class="show-all">Show All</a></div>';
                    echo '</div>';
                }
            }
        }
        ?>
    </form>
</div>

<!-- Ensure this is present for displaying results -->
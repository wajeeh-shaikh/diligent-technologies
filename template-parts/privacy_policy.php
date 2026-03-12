<?php
/*
Template Name: Privacy Policy
*/
get_header();
?>

<div class="entry-content">
    <div class="container">
        <div class="terms-privacy-head text-center">
            <h1>Our Privacy Policy</h1>
        </div>
        <?php
        echo get_field('privacy_policy_feild');
        ?>
    </div>
</div>


<?php
get_footer();
?>
<?php
/*
Template Name: Terms and  Condition
*/
get_header();
?>


<div class="entry-content">
    <div class="container">
        <div class="terms-privacy-head text-center">
            <h1>Our Terms and Condition</h1>
        </div>
        <?php
        echo get_field('terms_and_condition');
        ?>
    </div>
</div>

<?php
get_footer();
?>
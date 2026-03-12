<?php
$staff_section_title = get_field('slider_section_title');
$staff_augmentation_slider = get_field('staff_agumentation_slider');

// want to get class name from block use this variable
$className = '';



if (!empty($block['className'])) {
    $className = $block['className'];
}
?>

<section class="staff-augmentation padding  d-md-none <?php echo $className ?>">
    <div class="container">
        <div class="inner">
            <?php echo $staff_section_title ?>
            <div class="swiper-pagination staff-augmentation-pagination"></div>
                <div class="slider-wrapper">
                    <div class="swiper staff-augmentation-slider">
                        <?php if ($staff_augmentation_slider) : ?>
                            <div class="swiper-wrapper">
                                <?php foreach ($staff_augmentation_slider as $slide) : ?>
                                    <div class="swiper-slide">
                                        <div class="slide">
                                            <h3><?php echo $slide['slide_title'] ?></h3>
                                            <p><?php echo $slide['slide_description'] ?></p>
                                        </div>
                                    </div>
                        <?php endforeach ?>
                    </div>
                        <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section> 

<section class="staff-augmentation-svg padding  d-none d-md-block <?php echo $className ?>">
    <div class="container">
        <div class="inner">
            <?php echo $staff_section_title ?>
            <div class="staff-augmentation-section">
                <div class="staff-augmentation-slides">
                    <svg width="1194" height="109" viewBox="0 0 1194 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M221 109C234.807 109 246 97.8071 246 84C246 70.1929 234.807 59 221 59C207.193 59 196 70.1929 196 84C196 97.8071 207.193 109 221 109Z" fill="#FBFF29" />
                        <path d="M221 99C229.284 99 236 92.2843 236 84C236 75.7157 229.284 69 221 69C212.716 69 206 75.7157 206 84C206 92.2843 212.716 99 221 99Z" fill="#FFC30B" fill-opacity="0.21" />
                        <path opacity="0.3" d="M1167 58C1180.81 58 1192 46.8071 1192 33C1192 19.1929 1180.81 8 1167 8C1153.19 8 1142 19.1929 1142 33C1142 46.8071 1153.19 58 1167 58Z" fill="#FBFF29" />
                        <path d="M1167 48C1175.28 48 1182 41.2843 1182 33C1182 24.7157 1175.28 18 1167 18C1158.72 18 1152 24.7157 1152 33C1152 41.2843 1158.72 48 1167 48Z" fill="#FFC30B" fill-opacity="0.21" />
                        <path opacity="0.3" d="M27 51C40.8071 51 52 39.8071 52 26C52 12.1929 40.8071 1 27 1C13.1929 1 2 12.1929 2 26C2 39.8071 13.1929 51 27 51Z" fill="#FBFF29" />
                        <path d="M27.5237 41C35.5237 40.5 41.5237 35 42.0237 26.5C42.0237 18.2157 35.8079 11 27.5237 11C19.0229 11 11.5236 17.5 12.0237 26.5C12.0237 34.7843 19.2394 41 27.5237 41Z" fill="#FFC30B" fill-opacity="0.21" />
                        <path d="M50.5 35L195 79.5M246 86L1142 36.5" stroke="#FFC30B" stroke-opacity="0.21" stroke-width="5" />
                        <mask id="mask0_3617_166" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="12" y="11" width="1171" height="89">
                            <path d="M40 26.5C40 33.4036 34.4036 39 27.5 39C20.5964 39 15 33.4036 15 26.5C15 19.5964 20.5964 14 27.5 14C34.4036 14 40 19.5964 40 26.5Z" fill="#152329" />
                            <path d="M234 84.5C234 91.4036 228.404 97 221.5 97C214.596 97 209 91.4036 209 84.5C209 77.5964 214.596 72 221.5 72C228.404 72 234 77.5964 234 84.5Z" fill="#152329" />
                            <path d="M1180 33.5C1180 40.4036 1174.4 46 1167.5 46C1160.6 46 1155 40.4036 1155 33.5C1155 26.5964 1160.6 21 1167.5 21C1174.4 21 1180 26.5964 1180 33.5Z" fill="#152329" />
                            <path d="M50.5 35L197 80.5M246 86L1142 36.5M40 26.5C40 33.4036 34.4036 39 27.5 39C20.5964 39 15 33.4036 15 26.5C15 19.5964 20.5964 14 27.5 14C34.4036 14 40 19.5964 40 26.5ZM234 84.5C234 91.4036 228.404 97 221.5 97C214.596 97 209 91.4036 209 84.5C209 77.5964 214.596 72 221.5 72C228.404 72 234 77.5964 234 84.5ZM1180 33.5C1180 40.4036 1174.4 46 1167.5 46C1160.6 46 1155 40.4036 1155 33.5C1155 26.5964 1160.6 21 1167.5 21C1174.4 21 1180 26.5964 1180 33.5Z" stroke="#152329" stroke-width="5" />
                        </mask>
                        <g mask="url(#mask0_3617_166)">
                            <rect
                                class="mask"
                                x="5"
                                y="-12"
                                height="130"
                                fill="#FBFF29" />
                        </g>
                    </svg>
                    <?php if ($staff_augmentation_slider) : ?>
                        <?php foreach ($staff_augmentation_slider as $slide) : ?>
                            <div class="slide-section ">
                                <h3><?php echo $slide['slide_title'] ?></h3>
                                <p>
                                    <?php echo $slide['slide_description'] ?>
                                </p>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
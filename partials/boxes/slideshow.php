<?php
global $images_slideshow;

$slideshowHeightClass = get_field('slideshow_height', get_the_ID());
$slideshowWidthClass = get_field('slideshow_width', get_the_ID());
$containImageEnable = get_field('contain_image_enable', get_the_ID());
$slideshowClasses = [];
$slideshowLogo = get_field('slideshow_logo', get_the_ID());
$slideshowLogoURL = wp_get_attachment_image_url($slideshowLogo['ID'], 'medium');
$captionOnBottom = get_field('slideshow_caption_on_bottom');

$slideshowClasses[] = $slideshowHeightClass . ' ' . $slideshowWidthClass;

if ($slideshowWidthClass == 'partial_width') {
    $slideshowClasses[] = 'container';
}
if ($containImageEnable) {
    $slideshowClasses[] = 'contain_image';
}
if ($captionOnBottom) {
    $slideshowClasses[] = 'caption_on_bottom';
}

?>

<?php if ($images_slideshow && count($images_slideshow) > 0) { ?>
    <div id="main_slideshow" class="slideshow_container <?php echo implode(' ', $slideshowClasses); ?>">
        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php
                foreach ($images_slideshow as $k => $image) {
                    $imageID = $image['ID'];
                    $imageURL = wp_get_attachment_image_url($imageID, 'full');
                    $imageAlt = $image['alt'];
                    $imageCaption = !empty(wp_get_attachment_caption($imageID)) ? '<span class="slideshow_caption">' . wp_get_attachment_caption($imageID) . '</span>' : '';
                    $slideshowLogoHTML = $slideshowLogoURL && $k == 0 ? '<img class="slideshow_logo" src="' . $slideshowLogoURL . '">' : '';

                    echo '<div class="swiper-slide"><img class="slideshow_img" alt="' . $imageAlt . '" src="' . $imageURL . '" ><div class="caption_box"> ' . $slideshowLogoHTML . $imageCaption . '</div></div>';
                }
                ?>
            </div>

            <?php if (count($images_slideshow) > 1) { ?>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            <?php } ?>
        </div>
    </div>
<?php } else { ?>
    <div class="slideshow_placeholder"></div>
<?php }  ?>
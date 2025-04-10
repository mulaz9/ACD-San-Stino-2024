<?php

$photos = get_field('gallery_album_gallery');

if (is_array($photos) && count($photos) > 0) { ?>
    <section id="album_grid" class="section">
        <div class="container">
            <div class="grid_wrapper">
                <?php foreach ($photos as $photo) {
                    $photo_ID = $photo['ID'];
                    $thumbnail_url = wp_get_attachment_image_url($photo_ID, 'medium');
                    $photo_url = wp_get_attachment_url($photo_ID);
                    $caption = wp_get_attachment_caption($photo_ID);
                ?>
                    <a class="thumb fancy" href="<?php echo $photo_url; ?>" data-fancybox="gallery" data-caption="<?php echo $caption; ?>">
                        <img src="<?php echo $thumbnail_url; ?>" alt="" loading="lazy">
                        <?php if (!empty($caption)) { ?>
                            <div class="img_caption"><?php echo $caption; ?></div>
                        <?php } ?>
                    </a>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }

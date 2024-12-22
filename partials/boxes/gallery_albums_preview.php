<?php

$args = array(
    'post_type' => 'gallery-album',
    'post_status' => 'publish',
    'numberposts' => -1,
);

$albums = get_posts($args);

if (is_array($albums) && count($albums) > 0) { ?>
    <section id="gallery" class="section">
        <div class="container">
            <div class="albums_wrapper">
                <?php foreach ($albums as $album) {
                    $post_title = get_the_title($album->ID);
                    $image_url = get_the_post_thumbnail_url($album->ID, 'large');
                    $permailnk = get_the_permalink($album->ID);
                    $pubblication_date = get_the_date('j F Y', $album->ID);
                ?>
                    <?php if (!empty($image_url)) { ?>
                        <a class="item" href="<?php echo $permailnk; ?>">
                            <div class="thumb">
                                <img src="<?php echo $image_url; ?>" alt="">
                            </div>
                            <div class="description_wrap">
                                <div class="pubblication_date"><?php echo $pubblication_date; ?></div>
                                <h2 class="album_title"><?php echo $post_title; ?></h2>
                            </div>
                        </a>
                <?php }
                } ?>
            </div>
        </div>
    </section>
<?php }

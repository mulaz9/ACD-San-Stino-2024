<?php

$titolo = get_field('post_preview_title', get_the_ID());
$layout = get_field('post_preview_layout', get_the_ID());
$category = get_field('post_preview_categories', get_the_ID());
$posts = get_posts();
$selectedCategories = is_array($category) ? $category : 'all';

$postsContainerClass = $layout == 'grid' ? 'posts_container' : 'swiper';
$postsWrapperClass = $layout == 'grid' ? 'posts_wrapper' : 'swiper-wrapper';
$item = $layout == 'grid' ? 'item' : 'swiper-slide';

var_dump($title);
var_dump($layout);
var_dump($category);
var_dump($selectedCategories);
// var_dump('posts', $posts);


if (!empty($posts)) { ?>
    <section id="post_preview" class="container section post_preview_layout_<?php echo $layout; ?>">
        <h1 class="section_title"><?php echo $titolo; ?></h1>
        <!-- Slider main container -->
        <div class="<?php echo $postsContainerClass; ?>">
            <!-- Additional required wrapper -->
            <div class="<?php echo $postsWrapperClass; ?>">
                <!-- Slides -->
                <?php
                foreach ($posts as $post) {
                    $postID = $post->ID;
                    $postTitle = $post->post_title;
                    $postContent = $post->post_content;
                    $postDate = get_the_date('D M Y', $post);
                    $postImgUrl = get_the_post_thumbnail_url($post, 'large');
                    if ($selectedCategories == 'all') { ?>
                        <div class="<?php echo $item; ?>">
                            <div class="thumb"><img src="<?php echo $postImgUrl; ?>" alt=""></div>
                            <div class="description_wrap">
                                <h2 class="prev_title"><?php echo $postTitle; ?></h2>
                                <div class="description"><?php echo $postContent; ?></div>
                            </div>
                        </div>
                    <?php } elseif (has_category($selectedCategories, $post)) { ?>
                        <div class="<?php echo $item; ?>">
                            <div class="thumb"><img src="<?php echo $postImgUrl; ?>" alt=""></div>
                            <div class="description_wrap">
                                <h2 class="prev_title"><?php echo $postTitle; ?></h2>
                                <div class="description"><?php echo $postContent; ?></div>
                            </div>
                        </div>
                <?php }
                }
                ?>
            </div>

            <?php if ($layout == 'carousel') { ?>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            <?php } ?>
        </div>
    </section>
<? }

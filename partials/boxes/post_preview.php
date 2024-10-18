<?php

$isEnabled = get_field('post_preview_enable', get_the_ID());
$showCategory = get_field('post_preview_category_show', get_the_ID());
$viewAllEnabled = get_field('post_preview_view_all', get_the_ID());
$hideDescription = get_field('post_preview_hide_description', get_the_ID());
$readMoreEnabled = get_field('post_preview_read_more', get_the_ID());
$words = 20;
$bgColor = get_field('post_preview_bg_color', get_the_ID());
$autoplayEnabled = get_field('post_preview_autoplay', get_the_ID());
$viewAll = '<span class="view_all_separator">|</span><span class="view_all"><a href="' . get_the_permalink(250) . '">Tutte le notize</a></span>';

if ($isEnabled) {
    $titolo = get_field('post_preview_title', get_the_ID());
    $layout = get_field('post_preview_layout', get_the_ID());
    $category = get_field('post_preview_categories', get_the_ID());
    $allPosts = get_posts();
    $selectedCategories = is_array($category) ? $category : 'all';

    $postsContainerClass = $layout == 'grid' ? 'posts_container' : 'swiper';
    $postsWrapperClass = $layout == 'grid' ? 'posts_wrapper' : 'swiper-wrapper';
    $item = $layout == 'grid' ? 'item' : 'swiper-slide';

    if (!empty($allPosts)) { ?>
        <section id="post_preview" class="section post_preview_layout_<?php echo $layout, ' ', $bgColor; ?>">
            <script>
                var hasAutoplay = <?php echo json_encode($autoplayEnabled); ?>
            </script>
            <div class="container">
                <h1 class="section_title"><?php echo $titolo, $viewAllEnabled ? $viewAll : ''; ?></h1>
                <!-- Slider main container -->
                <div class="<?php echo $postsContainerClass; ?>">
                    <!-- Additional required wrapper -->
                    <div class="<?php echo $postsWrapperClass; ?>">
                        <!-- Slides -->
                        <?php
                        foreach ($allPosts as $curPost) {
                            $postID = $curPost->ID;
                            $postTitle = $curPost->post_title;
                            $postContent = $curPost->post_content;
                            $postUrl = get_the_permalink($curPost);
                            $postDate = get_the_date('j F Y', $curPost);
                            $postImgUrl = get_the_post_thumbnail_url($curPost, 'large');
                            $postCategories = get_the_category($curPost);
                            if ($selectedCategories == 'all') { ?>
                                <div class="<?php echo $item; ?>">
                                    <div class="thumb"><a href="<?php echo $postUrl; ?>"><img src="<?php echo $postImgUrl; ?>" alt="" loading="lazy"></a>
                                        <?php if ($showCategory) { ?>
                                            <div class="categories_wrap">
                                                <?php
                                                foreach ($postCategories as $category) {
                                                    $postCatName = $category->cat_name;
                                                    if ($postCatName !== 'In Evidenza' && $postCatName !== 'Uncategorized') { ?>
                                                        <a href="#" class="category_link"><?php echo $postCatName; ?></a>
                                                <?php }
                                                } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="description_wrap">
                                        <div class="post_date"><?php echo $postDate; ?></div>
                                        <h2 class="prev_title"><?php echo $postTitle; ?></h2>
                                        <?php if (!$hideDescription) { ?>
                                            <div class="description <?php echo $readMoreEnabled ? 'has_btn' : ''; ?>"><?php echo limit_words($postContent, $words); ?></div>
                                        <?php } ?>
                                        <?php if ($readMoreEnabled) { ?>
                                            <div class="btns_wrap">
                                                <div class="btn read_more"><a href="<?php echo $postUrl; ?>">Read more</a></div>
                                            </div>
                                        <?php  } ?>
                                    </div>
                                </div>
                            <?php } elseif (has_category($selectedCategories, $curPost)) { ?>
                                <div class="<?php echo $item; ?>">
                                    <div class="thumb"><img src="<?php echo $postImgUrl; ?>" alt="" loading="lazy">
                                        <?php if ($showCategory) { ?>
                                            <a href="#" class="category_link"><?php echo $postCatName; ?></a>
                                        <?php } ?>
                                    </div>
                                    <div class="description_wrap">
                                        <h2 class="prev_title"><?php echo $postTitle; ?></h2>
                                        <?php if (!$hideDescription) { ?>
                                            <div class="description <?php echo $readMoreEnabled ? 'has_btn' : ''; ?>">
                                                <?php echo limit_words($postContent, $words); ?></div>
                                        <?php } ?>
                                        <?php if ($readMoreEnabled) { ?>
                                            <div class="btns_wrap">
                                                <div class="btn read_more"><a href="<?php echo $postUrl; ?>">Read more</a></div>
                                            </div>
                                        <?php  } ?>
                                    </div>
                                </div>
                        <?php }
                        }
                        ?>
                    </div>
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
<?php }
}

?>
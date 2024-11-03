<?php get_header();
$postCategories = get_the_category();
?>


<main id="main_content" class="section container">
    <div class="thumb"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" alt=""></div>
    <div class="post_content">
        <div class="categories_wrap">
            <?php
            foreach ($postCategories as $category) {
                $postCatName = $category->cat_name;
                if ($postCatName !== 'In Evidenza' && $postCatName !== 'Uncategorized') { ?>
                    <a href="#" class="category_link"><?php echo $postCatName; ?></a><span class="separator"></span>
            <?php }
            } ?>
        </div>
        <div class="post_date"><?php echo get_the_date('j F Y', get_the_ID()); ?></div>
        <h1 class="the_title"><?php echo get_the_title(); ?></h1>
        <p class="the_content"><?php echo get_the_content(); ?></p>
        <div class="btns_wrap">
            <?php if (function_exists('ADDTOANY_SHARE_SAVE_KIT')) {
                ADDTOANY_SHARE_SAVE_KIT();
            }
            ?>
            <div class="btn go_back"><a href="javascript:history.go(-1)"
                    onMouseOver="self.status=document.referrer;return true">Torna indietro</a></div>
        </div>
    </div>
</main>


<?php
get_template_part('partials/boxes/sponsor');
get_footer();
?>
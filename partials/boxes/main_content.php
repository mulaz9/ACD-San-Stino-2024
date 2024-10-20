<?php

use function PHPSTORM_META\type;

$hide_title = get_field('main_content_hide_title');
$titolo = !empty(get_field('main_content_title')) ? get_field('main_content_title') : get_the_title();
$sottotitolo = get_field('main_content_subtitle');
$content = get_the_content();
$foto =  wp_get_attachment_image_url(get_field('main_content_image')['ID'], 'full');
$image_position = get_field('main_content_image_position');
$text_layout = get_field('main_content_text_layout');
$has_cta = get_field('main_content_btns_enable');
$btns = get_field('main_content_btns');

?>
<main id="main_content" class="container section squadre_main_content image_<?php echo $image_position; ?>">
    <?php if ($image_position == 'left' || $image_position == 'right') { ?>
        <aside class="aside_content"> <?php } else { ?><div class="text_content"><?php } ?>
            <?php if (!empty($titolo)) { ?>
                <h1 class="the_title"><?php echo $titolo; ?></h1>
            <?php } ?>
            <?php if (!empty($sottotitolo)) { ?>
                <div class="the_subtitle"><?php echo $sottotitolo; ?></div>
            <?php } ?>
            <?php if (!empty($content)) { ?>
                <p class="the_content text_layout_<?php echo $text_layout; ?>s"><?php echo $content; ?></p>
            <?php } ?>
            <?php if ($has_cta && !empty($btns)) { ?>
                <div class="btns">
                    <?php foreach ($btns as $btn) {
                        $btnType = $btn['main_content_btn_type'];
                        $btnLabel = $btn['main_content_btn_label'];
                        switch ($btnType) {
                            case 'internal':
                                $btnLink = $btn['main_content_internal_link'];
                                $target = '';
                                break;

                            case 'external':
                                $btnLink = $btn['main_content_external_link'];
                                $target = '_blank';
                                break;

                            case 'pdf':
                                $btnLink = $btn['main_content_pdf'];
                                $target = '_blank';
                                break;
                        } ?>
                        <div class="btn btn_<?php echo $btnType; ?>"><a href="<?php echo $btnLink; ?>" target="<?php echo $target; ?>"><?php echo $btnLabel ?></a></div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if ($image_position == 'left' || $image_position == 'right') { ?>
        </aside> <?php } else { ?></div><?php } ?>
    <?php if (!empty($foto)) { ?>
        <div class="thumb"><img class="foto_squadra" src="<?php echo $foto; ?>" alt=""></div>
    <?php } ?>
</main>
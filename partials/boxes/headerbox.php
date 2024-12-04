<?php

$logo = get_field('main_logo', 'options');
$logoHeight = get_field('main_logo_height', 'options') * 2;
$logoURL = $logo['url'];
$logoALT = $logo['alt'];

?>


<header id="header">
    <nav class="header_wrapper">
        <div class="header_top">
            <div class="social">
                <a href="https://www.facebook.com/acdsanstino" target="_blank"><i class="fab fa-brands fa-facebook-square fa-2x"></i></a>
                <a href="https://www.instagram.com/acd_sanstino/" target="_blank"><i class="fab fa-brands fa-instagram fa-2x"></i></a>
            </div>
        </div>
        <div class="header_bottom">
            <a href="<?php echo get_home_url(); ?>" id="logo" title="Torna all'homepage">
                <img src="<?php echo $logoURL; ?>" alt="<?php echo $logoALT; ?>" height="<?php echo $logoHeight; ?>" width="60">
            </a>
            <div id="hamburger_menu">
                <a href="javascript:;" id="open_menu" title="Apri sidebar menu">
                    <span class="line line_1"></span>
                    <span class="line line_2"></span>
                    <span class="line line_3"></span>
                </a>
                <a href="javascript:;" class="close_sidebar close" title="Chiudi sidebar menu"></a>
            </div>

            <?php get_template_part('partials/boxes/sidebar-menu'); ?>

            <?php if (has_nav_menu('highlight_menu')) { ?>
                <div id="highlight_menu">
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'highlight_menu',
                            'container_class' => 'menu',
                            'container' => 'ul'
                        )
                    ) ?>
                </div>
            <?php } ?>
        </div>
    </nav>
</header>
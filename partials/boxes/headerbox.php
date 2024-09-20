<?php

$logo = get_field('main_logo', 'options');
$logoURL = $logo['url'];
$logoALT = $logo['alt'];

?>


<header id="header" class="container">
    <nav class="header_wrapper">
        <a href="<?php echo get_home_url(); ?>" id="logo" title="Torna all'homepage">
            <img src="<?php echo $logoURL; ?>" alt="<?php echo $logoALT; ?>" height="80" width="60">
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
    </nav>
</header>
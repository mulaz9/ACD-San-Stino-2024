<?php

$logo = get_field('main_logo', 'options');
$logoURL = $logo['url'];
$logoALT = $logo['alt'];

?>


<header id="header" class="container">
    <div class="header_wrapper">
        <a href="<?php echo get_home_url(); ?>" class="logo" title="Torna all'homepage">
            <img src="<?php echo $logoURL; ?>" alt="<?php echo $logoALT; ?>" height="80" width="60">
        </a>
        <div class="highlight_menu">
            <?php wp_nav_menu(
                array(
                    'theme_location' => 'highlight_menu',
                    'container_class' => 'menu',
                    'container' => 'ul'
                )
            ) ?>
        </div>
    </div>
</header>
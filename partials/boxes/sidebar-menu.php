<?php if (has_nav_menu('highlight_menu')) { ?>
    <div id="sidebar_menu" class="hidden">
        <div class="sidebar_menu_wrap">
            <?php wp_nav_menu(
                array(
                    'theme_location' => 'highlight_menu',
                    'container_class' => 'sidebar_menu',
                    'container' => 'ul'
                )
            ) ?>
        </div>
    </div>
<?php }

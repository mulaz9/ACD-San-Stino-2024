<?php

/*=============================================
=            BREADCRUMBS			            =
=============================================*/

//  to include in functions.php
function the_breadcrumb()
{

    $sep = '<span class="separator"></span>';

    if (!is_front_page()) {

        // Start the breadcrumb with a link to your homepage
        echo '<div id="breadcrumbs" class="container">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a>' . $sep;

        // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_singular('gallery-album')) {
            $gallery_hub = get_posts(array(
                'numberposts' => 1,
                'post_status' => 'publish',
                'post_type' => 'page',
                'meta_key' => '_wp_page_template',
                'meta_value' => 'template-gallery-hub.php'
            ));

            $gallery_hub_title = $gallery_hub[0]->post_title;
            $gallery_hub_url = get_the_permalink($gallery_hub[0]->ID);

            echo '<a href="' . $gallery_hub_url . '">' . $gallery_hub_title . '</a>';
        }
        if (is_category() || is_single()) {
            the_category('title_li=');
        } elseif (is_archive() || is_single()) {
            if (is_day()) {
                printf(__('%s', 'text_domain'), get_the_date());
            } elseif (is_month()) {
                printf(__('%s', 'text_domain'), get_the_date(_x('F Y', 'monthly archives date format', 'text_domain')));
            } elseif (is_year()) {
                printf(__('%s', 'text_domain'), get_the_date(_x('Y', 'yearly archives date format', 'text_domain')));
            } else {
                _e('Blog Archives', 'text_domain');
            }
        }

        // If the current page is a single post, show its title with the separator
        if (is_single()) {
            if ($post->post_parent) {
                $anc = get_post_ancestors($post->ID);
                foreach ($anc as $ancestor) {
                    $output = '<a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a>' . $sep;
                }
                echo $output;
                echo the_title();
            } else {
                echo $sep;
                the_title();
            }
        }

        // If the current page is a static page, show its title.
        if (is_page()) {
            $this_post = get_post(get_the_ID());
            if ($this_post->post_parent) {
                $anc = get_post_ancestors($this_post);
                foreach ($anc as $ancestor) {
                    $output = '<a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a>' . $sep;
                }
                echo $output;
                echo the_title();
            } else {
                echo the_title();
            }
        }

        // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()) {
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ($page_for_posts_id) {
                $post = get_post($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}
/*
* Credit: http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/
*/
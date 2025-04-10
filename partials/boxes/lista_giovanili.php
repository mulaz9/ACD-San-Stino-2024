<?php
$parent_page_id = get_the_ID();

// Use get_pages() to fetch child pages
$child_pages = get_pages(array(
    'child_of' => $parent_page_id, // This is the parent page ID
    'orderby' => 'title', // Sort by page title alphabetically
    'order' => 'ASC' // Sort in ascending alphabetical order (use DESC for descending)
));

// Loop through child pages
if ($child_pages) { ?>
    <section id="squad_list" class="section">
        <div class="container">
            <ul>
                <?php foreach ($child_pages as $page) { ?>
                    <li><a href="<?php echo get_permalink($page->ID); ?>"><?php echo $page->post_title; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </section>
<?php }

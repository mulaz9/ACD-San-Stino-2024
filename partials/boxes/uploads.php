<?php

$titoloSezioneUploads = get_field('files_section_title', get_the_ID());
$uploads = get_field('files_repeater', get_the_ID());
$uploadsBg = get_field('files_color', get_the_ID());

?>


<?php if (!empty($uploads)) { ?>
    <section id="uploaded_files" class="section uploaded_files <?php echo $uploadsBg; ?>">
        <div class="container">
            <?php if (!empty($titoloSezioneUploads)) { ?>
                <h1 class="section_title"><?php echo $titoloSezioneUploads; ?></h1>
            <?php } ?>
            <div class="cards_wrapper">
                <?php foreach ($uploads as $upload) {
                    $title = $upload['file_title'];
                    $img = $upload['file_bg_image'];
                    $imgURL = esc_url($img['url']);
                    $fileURL = $upload['file_file'];
                    $btnLabel = $upload['file_btn_label'];
                ?>
                    <a href="<?php echo $fileURL; ?>" target="_blank" class="card_wrap">
                        <h3 class="upload_title"><?php echo $title; ?></h3>
                        <?php if ($imgURL) { ?>
                            <div class="thumb_wrap"><img src="<?php echo $imgURL; ?>" class="upload_img" alt=""></div>
                        <?php } ?>
                        <?php if ($fileURL) { ?>
                            <div class="btns_wrap">
                                <div class="btn btn_file"><?php echo $btnLabel; ?></div>
                            </div>
                        <?php } ?>
                    </a>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>
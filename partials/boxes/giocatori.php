<?php

$componenti = get_field('componenti_tabs_goup');
$portieri = $componenti['portieri'];
$difensori = $componenti['difensori'];
$centrocampisti = $componenti['centrocampisti'];
$attaccanti = $componenti['attaccanti'];
$staff = $componenti['staff'];

$sanitized_data = [];
if ($portieri) {
    $sanitized_data['portieri'] = $portieri;
}
if ($difensori) {
    $sanitized_data['difensori'] = $difensori;
}
if ($centrocampisti) {
    $sanitized_data['centrocampisti'] = $centrocampisti;
}
if ($attaccanti) {
    $sanitized_data['attaccanti'] = $attaccanti;
}

if (safeCount($sanitized_data) > 0) { ?>

    <section id="componenti_squadra" class="section light">
        <div class="container">
            <?php foreach ($sanitized_data as $title => $data) { ?>
                <div class="<?php echo $title . '_wrapper'; ?> subsection">
                    <h3 class="role_title section_title"><?php echo $title; ?></h3>
                    <div class="item_wrapper">
                        <?php foreach ($data as $player) {
                            $photo_url = $player[$title . '_foto']['url'];
                            $photo_placeholder = get_template_directory_uri() . '/img/logo.png';
                            $name = $player[$title . '_nome'];
                            $birth_date = $player[$title . '_data_nascita'];
                            $role = replaceLastLetter($title, 'e');
                            if ($title == 'centrocampisti') {
                                $role = replaceLastLetter($title, 'a');
                            }
                        ?>
                            <div class="item">
                                <div class="thumb">
                                    <?php if ($photo_url) { ?>
                                        <img src="<?php echo $photo_url; ?>" alt="">
                                    <?php } else { ?>
                                        <img class="placeholder" src="<?php echo $photo_placeholder; ?>" alt="">
                                    <?php } ?>
                                </div>
                                <div class="text_wrap">
                                    <div class="name"><?php echo $name; ?></div>
                                    <div class="role"><?php echo $role; ?></div>
                                    <div class="birthdate"><?php echo $birth_date; ?></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <div class="staff_wrapper subsection">
                <h3 class="role_title section_title">Staff Tecnico</h3>
                <div class="item_wrapper">
                    <?php foreach ($staff as $member) {
                        $photo_url = $member['staff_foto']['url'];
                        $name = $member['staff_nome'];
                        $role = $member['staff_ruolo']; ?>
                        <div class="item">
                            <div class="thumb">
                                <?php if ($photo_url) { ?>
                                    <img src="<?php echo $photo_url; ?>" alt="">
                                <?php } else { ?>
                                    <img class="placeholder" src="<?php echo $photo_placeholder; ?>" alt="">
                                <?php } ?>
                            </div>
                            <div class="text_wrap">
                                <div class="name"><?php echo $name; ?></div>
                                <div class="role"><?php echo $role; ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>


<? }

<?php

$sede_address = get_field('address_sede', 'options');
$stadio = get_field('stadio', 'options');
$altri_campi = get_field('altri_campi', 'options');
$phone = get_field('phone', 'options');
$fax = get_field('fax', 'options');
$email = get_field('email', 'options');
?>

<section id="contatti" class="section">
    <div class="container">
        <ul class="contatti_wrap">
            <li><span class="label">Sede:</span><span class="address"><?php echo $sede_address; ?></span></li>
            <li><span class="label">Stadio:</span><span class="stadio"><?php echo $stadio; ?></span></li>
            <?php if (is_array($altri_campi) && !empty($altri_campi)) {
                foreach ($altri_campi as $campo) { ?>
                    <li><span class="label">Altro Campo:</span><span class="altro_campo"><?php echo $campo['field_altro_campo']; ?></span></li>
            <?php }
            } ?>
            <li><span class="label">Telefono:</span><a class="phone" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></li>
            <li><span class="label">Fax:</span><span class="fax"><?php echo $fax; ?></span></li>
            <li><span class="label">Email:</span><a href="<?php echo esc_url('mailto:' . antispambot($email)); ?>"><?php echo $email; ?></a></li>
        </ul>
    </div>
</section>
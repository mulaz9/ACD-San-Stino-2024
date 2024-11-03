<?php get_header();

global $prima_squadra_data;

$girone = $prima_squadra_data->girone;
$prossima_partita = $prima_squadra_data->prossima_partita;
$prossima_partita_bg = $prima_squadra_data->prossima_partita_bg;
$classifica = $prima_squadra_data->classifica_campionato;
$classifica_bg = $prima_squadra_data->classifica_campionato_bg;

get_template_part('partials/boxes/slideshow');
get_template_part('partials/boxes/main_content');
get_template_part('partials/boxes/post_preview');
get_template_part('partials/boxes/uploads');

?>




<?php if (!empty($prossima_partita)) { ?>
    <section id="prossima_partita_home" class="prossima_partita section has_iframe <?php echo $prossima_partita_bg; ?>">
        <div class="container">
            <h1 class="section_title">Prossima partita</h1>
            <?php echo $prossima_partita; ?>
        </div>
    </section>
<?php } ?>
<?php if (!empty($classifica)) { ?>
    <section id="classifica_home" class="classifica section has_iframe <?php echo $classifica_bg; ?>">
        <div class="container">
            <h1 class="section_title">Classifica</h1>
            <div class="the_subtitle girone"><?php echo $girone; ?></div>
            <?php echo $classifica; ?>
        </div>
    </section>
<?php } ?>

<?php

get_template_part('partials/boxes/sponsor');
get_footer(); ?>
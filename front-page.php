<?php get_header();

global $prima_squadra_data;

$girone = $prima_squadra_data->girone;
$prossima_partita = $prima_squadra_data->prossima_partita;
$classifica = $prima_squadra_data->classifica_campionato;




get_template_part('partials/boxes/slideshow');

get_template_part('partials/boxes/post_preview'); ?>

<?php if (!empty($prossima_partita)) { ?>
    <section id="prossima_partita_home" class="prossima_partita section has_iframe">
        <h1 class="section_title">Prossima partita</h1>
        <?php echo $prossima_partita; ?>
    </section>
<?php } ?>
<?php if (!empty($classifica)) { ?>
    <section id="classifica_home" class="classifica section has_iframe">
        <h1 class="section_title">Classifica</h1>
        <div class="girone"><?php echo $girone; ?></div>
        <?php echo $classifica; ?>
    </section>
<?php } ?>

<!-- <p><?php echo get_the_content(); ?></p> -->

<?php get_footer(); ?>
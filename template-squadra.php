<?php

/**
 * Template Name: Squadra
 */

global $current_squadra_data, $prima_squadra_data;

// All teams data
$titolo = $current_squadra_data->titolo;
$girone = $current_squadra_data->girone;
$content = get_the_content();
$foto = $current_squadra_data->foto_url;
$prossima_partita = $current_squadra_data->prossima_partita;
$prossima_partita_bg = $current_squadra_data->prossima_partita_bg;
$classifica_campionato = $current_squadra_data->classifica_campionato;
$classifica_campionato_bg = $current_squadra_data->classifica_campionato_bg;
$classifica_marcatori = $current_squadra_data->classifica_marcatori;
$classifica_marcatori_bg = $current_squadra_data->classifica_marcatori_bg;
$risultati_campionato_bg = $current_squadra_data->risultati_bg;

// Prima Squadra data
$nome_coppa = $prima_squadra_data->nome_coppa;
$prossima_partita_coppa = $prima_squadra_data->prossima_partita_coppa;
$prossima_partita_coppa_bg = $prima_squadra_data->prossima_partita_coppa_bg;
$classifica_coppa = $prima_squadra_data->classifica_coppa;
$classifica_coppa_bg = $prima_squadra_data->classifica_coppa_bg;
$classifica_marcatori_coppa = $prima_squadra_data->classifica_marcatori_coppa;
$classifica_marcatori_coppa_bg = $prima_squadra_data->classifica_marcatori_coppa_bg;
$risultati_coppa = $prima_squadra_data->risultati_coppa;
$risultati_coppa_bg = $prima_squadra_data->risultati_coppa_bg;

$isPrimaSquadraPage = has_term('prima-squadra', 'page-category', get_the_ID());

get_header(); ?>

<main id="main_content" class="container section squadre_main_content">
    <?php if (!empty($titolo)) { ?>
        <h1 class="the_title"><?php echo $titolo; ?></h1>
    <?php } ?>
    <?php if (!empty($girone)) { ?>
        <div class="the_subtitle"><?php echo $girone; ?></div>
    <?php } ?>
    <?php if (!empty($content)) { ?>
        <p class="the_content"><?php echo $content; ?></p>
    <?php } ?>
    <?php if (!empty($foto)) { ?>
        <img class="foto_squadra" src="<?php echo $foto; ?>" alt="">
    <?php } ?>
</main>
<?php if (!empty($prossima_partita)) { ?>
    <section id="prossima_partita" class="section has_iframe <?php echo $prossima_partita_bg; ?>">
        <div class="container">
            <h1 class="section_title">Prossima partita</h1>
            <?php echo $prossima_partita; ?>
        </div>
    </section>
<?php } ?>
<?php if (!empty($classifica_campionato)) { ?>
    <section id="classifica_campionato" class="section has_iframe <?php echo $classifica_campionato_bg; ?>">
        <div class="container">
            <h1 class="section_title">Classifica</h1>
            <?php echo $classifica_campionato; ?>
        </div>
    </section>
<?php } ?>
<?php if (!empty($classifica_marcatori)) { ?>
    <section id="classifica_marcatori" class="section has_iframe <?php echo $classifica_marcatori_bg; ?>">
        <div class="container">
            <h1 class="section_title">Marcatori</h1>
            <?php echo $classifica_marcatori; ?>
        </div>
    </section>
<?php } ?>
<?php if (!empty($risultati_campionato)) { ?>
    <section id="risultati_campionato" class="section has_iframe <?php echo $risultati_campionato_bg; ?>">
        <div class="container">
            <h1 class="section_title">Risultati</h1>
            <?php echo $risultati_campionato; ?>
        </div>
    </section>
<?php } ?>
<?php if ($isPrimaSquadraPage) {
    if (!empty($prossima_partita_coppa)) { ?>
        <section id="prossima_partita_coppa" class="coppa section has_iframe <?php echo $prossima_partita_coppa_bg; ?>">
            <div class="container">
                <?php if (!empty($nome_coppa)) { ?>
                    <div class="the_subtitle"><?php echo $nome_coppa; ?></div>
                <?php } ?>
                <h1 class="section_title">Prossima partita di coppa</h1>
                <?php echo $prossima_partita_coppa; ?>
            </div>
        </section>
    <?php } ?>
    <?php if (!empty($risultati_coppa)) { ?>
        <section id="risultati_coppa" class="coppa section has_iframe <?php echo $risultati_coppa_bg; ?>">
            <div class="container">
                <h1 class="section_title">Risultati coppa</h1>
                <?php echo $risultati_coppa; ?>
            </div>
        </section>
    <?php } ?>
    <?php if (!empty($classifica_marcatori_coppa)) { ?>
        <section id="classifica_marcatori_coppa" class="coppa section has_iframe <?php echo $classifica_marcatori_coppa_bg; ?>">
            <div class="container">
                <h1 class="section_title">Marcatori Coppa</h1>
                <?php echo $classifica_marcatori_coppa; ?>
            </div>
        </section>
    <?php } ?>
    <?php if (!empty($classifica_coppa)) { ?>
        <section id="classifica_coppa" class="coppa section has_iframe <?php echo $classifica_coppa_bg; ?>">
            <div class="container">
                <h1 class="section_title">Classifica coppa</h1>
                <?php echo $classifica_coppa; ?>
            </div>
        </section>
<?php }
} ?>


<?php get_footer(); ?>
<?php

// Main Sponsor data
$mainSponsorFields = get_field('main_sponsor_group', 'options');
$mainSponsorTitle = !empty($mainSponsorFields['main_sponsor_section_title']) ? $mainSponsorFields['main_sponsor_section_title'] : 'Main Sponsor';
$mainSponsorLogoURL = esc_url($mainSponsorFields['main_sponsor_logo']['url']);
$mainSponsorLinkURL = esc_url($mainSponsorFields['main_sponsor_link']);

// Official Sponsor data
$officialSponsorFields = get_field('official_sponsor_group', 'options');
$officialSponsorTitle = !empty($officialSponsorFields['official_sponsor_section_title']) ? $officialSponsorFields['official_sponsor_section_title'] : 'Official Sponsor';
$officialSponsorList = $officialSponsorFields['official_sponsor'];


// Official Partners data
$officialPartenersFields = get_field('official_partners_group', 'options');
$officialPartenersTitle = !empty($officialPartenersFields['official_parteners_section_title']) ? $officialPartenersFields['official_parteners_section_title'] : 'Official Parteners';
$officialPartenersList = $officialPartenersFields['official_parteners'];

// var_dump(!empty($mainSponsorFields));

if (!empty($mainSponsorLogoURL || $officialSponsorList || $officialPartenersList)) { ?>
    <section id="sponsor" class="section">
        <div class="container">
            <?php if (!empty($mainSponsorLogoURL)) { ?>
                <div id="main_sponsor" class="sponsor_section">
                    <h1 class="section_title sponsor_title"><?php echo $mainSponsorTitle; ?></h1>
                    <a class="main_sponsor_logo" href="<?php echo $mainSponsorLinkURL; ?>" target="_blank"><img src="<?php echo $mainSponsorLogoURL; ?>" alt=""></a>
                </div>
            <?php } ?>
            <?php if (!empty($officialSponsorList)) { ?>
                <div id="official_sponsor" class="sponsor_section">
                    <h1 class="section_title sponsor_title"><?php echo $officialSponsorTitle; ?></h1>
                    <div class="logos_wrapper">
                        <?php foreach ($officialSponsorList as $officialSponsor) { ?>
                            <a class="official_sponsor_logo" href="<?php echo esc_url($officialSponsor['official_sponsor_link']); ?>" target="_blank"><img src="<?php echo $officialSponsor['official_sponsor_logo']['url']; ?>" alt=""></a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <?php if (!empty($officialPartenersList)) { ?>
                <div id="official_partners" class="sponsor_section">
                    <h1 class="section_title sponsor_title"><?php echo $officialPartenersTitle; ?></h1>
                    <div class="logos_wrapper">
                        <?php foreach ($officialPartenersList as $officialPartner) { ?>
                            <a class="official_partner_logo" href="<?php echo esc_url($officialPartner['official_partner_link']); ?>" target="_blank"><img src="<?php echo $officialPartner['official_partner_logo']['url']; ?>" alt=""></a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
<?php }

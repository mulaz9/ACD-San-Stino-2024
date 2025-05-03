<?php

// Main Sponsor data
$mainSponsorFields = get_field('main_sponsor_group', 'options');
$mainSponsorTitle = !empty($mainSponsorFields['main_sponsor_section_title']) ? $mainSponsorFields['main_sponsor_section_title'] : 'Main Sponsor';
$mainSponsorLogoURL = esc_url($mainSponsorFields['main_sponsor_logo']['url']);
$mainSponsorLinkURL = !empty(esc_url($mainSponsorFields['main_sponsor_link'])) ? esc_url($mainSponsorFields['main_sponsor_link']) : 'javascript:;';

// Official Sponsor data
$officialSponsorFields = get_field('official_sponsor_group', 'options');
$officialSponsorTitle = !empty($officialSponsorFields['official_sponsor_section_title']) ? $officialSponsorFields['official_sponsor_section_title'] : 'Official Sponsor';
$officialSponsorList = $officialSponsorFields['official_sponsor'];


// Official Partners data
$officialPartnersFields = get_field('official_partners_group', 'options');
$officialPartnersTitle = !empty($officialPartnersFields['official_partners_section_title']) ? $officialPartnersFields['official_partners_section_title'] : 'Official Partners';
$officialPartnersList = $officialPartnersFields['official_partners'];

if (!empty($mainSponsorLogoURL || $officialSponsorList || $officialPartenersList)) { ?>
    <section id="sponsor" class="section <?php echo !is_page_template('template-sponsor.php') ? 'light'  : ''; ?>">
        <div class="container">
            <?php if (!empty($mainSponsorLogoURL)) { ?>
                <div id="main_sponsor" class="sponsor_section">
                    <h1 class="section_title sponsor_title"><?php echo $mainSponsorTitle; ?></h1>
                    <a class="main_sponsor_logo <?php echo !is_page_template('template-sponsor.php') ? 'sponsor_slider' : ''; ?>" href="<?php echo $mainSponsorLinkURL; ?>" <?php echo $mainSponsorLinkURL !== 'javascript:;' ? 'target="_blank"' : ''; ?>><img src="<?php echo $mainSponsorLogoURL; ?>" alt=""></a>
                </div>
            <?php } ?>
            <?php if (!empty($officialSponsorList)) { ?>
                <div id="official_sponsor" class="sponsor_section">
                    <h1 class="section_title sponsor_title"><?php echo $officialSponsorTitle; ?></h1>
                    <?php if (!is_page_template('template-sponsor.php')) { ?>
                        <!-- Slider main container -->
                        <div class="swiper sponsor_slider">
                            <!-- Additional required wrapper -->
                            <div class="logos_wrapper swiper-wrapper">
                                <!-- Slides -->
                                <?php foreach ($officialSponsorList as $officialSponsor) {
                                    $officialSponsorLogoURL = $officialSponsor['official_sponsor_logo']['url'];
                                    $officialSponsorLinkURL = !empty($officialSponsor['official_sponsor_link']) ? esc_url($officialSponsor['official_sponsor_link']) : 'javascript:;';
                                    $target = $officialSponsorLinkURL !== 'javascript:;' ? 'target="_blank"' : '';
                                ?>
                                    <div class="swiper-slide">
                                        <a class="official_sponsor_logo" href="<?php echo $officialSponsorLinkURL; ?>" target="<?php echo $target; ?>"><img src="<?php echo $officialSponsorLogoURL; ?>" alt=""></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="logos_wrapper">
                            <?php foreach ($officialSponsorList as $officialSponsor) {
                                $officialSponsorLogoURL = $officialSponsor['official_sponsor_logo']['url'];
                                $officialSponsorLinkURL = !empty($officialSponsor['official_sponsor_link']) ? esc_url($officialSponsor['official_sponsor_link']) : 'javascript:;';
                                $target = $officialSponsorLinkURL !== 'javascript:;' ? 'target="_blank"' : '';
                            ?>
                                <a class="official_sponsor_logo" href="<?php echo $officialSponsorLinkURL; ?>" target="<?php echo $target; ?>"><img src="<?php echo $officialSponsorLogoURL; ?>" alt=""></a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if (!empty($officialPartnersList)) { ?>
                <div id="official_partners" class="sponsor_section">
                    <h1 class="section_title sponsor_title"><?php echo $officialPartnersTitle; ?></h1>
                    <?php if (!is_page_template('template-sponsor.php')) { ?>
                        <!-- Slider main container -->
                        <div class="swiper sponsor_slider">
                            <!-- Additional required wrapper -->
                            <div class="logos_wrapper swiper-wrapper">
                                <!-- Slides -->
                                <?php foreach ($officialPartnersList as $officialPartner) {
                                    $officialPartnerLogoURL = $officialPartner['official_partner_logo']['url'];
                                    $officialPartnerLinkURL = !empty($officialPartner['official_partner_link']) ? esc_url($officialPartner['official_partner_link']) : 'javascript:;';
                                    $target = $officialPartnerLinkURL !== 'javascript:;' ? 'target="_blank"' : '';

                                ?>
                                    <div class="swiper-slide">
                                        <a class="official_partner_logo" href="<?php echo $officialPartnerLinkURL; ?>" target="<?php echo $target; ?>"><img src="<?php echo $officialPartnerLogoURL; ?>" alt=""></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="logos_wrapper">
                            <?php foreach ($officialPartnersList as $officialPartner) {
                                $officialPartnerLogoURL = $officialPartner['official_partner_logo']['url'];
                                $officialPartnerLinkURL = !empty($officialPartner['official_partner_link']) ? esc_url($officialPartner['official_partner_link']) : 'javascript:;';
                                $target = $officialPartnerLinkURL !== 'javascript:;' ? 'target="_blank"' : '';
                            ?>
                                <a class="official_partner_logo" href="<?php echo $officialPartnerLinkURL; ?>" target="<?php echo $target; ?>"><img src="<?php echo $officialPartnerLogoURL; ?>" alt=""></a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php }

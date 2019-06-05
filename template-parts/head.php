<?php if (get_theme_mod('devdmbootstrap4_show_header_setting', 1)) : ?>
<?php
$dmbsCustomLogoUrl = devdmbootstrap4_custom_logo();
$dmbsHeaderText    = get_theme_mod('header_text', 1);


?>


<nav class="navbar navbar-expand-md navbar-dark fixed-top" id="banner">
    <div class="container">
        <!-- Brand -->
        <?php if (!empty($dmbsCustomLogoUrl)) : ?>
        <a class="navbar-brand" href="<?php echo esc_url(site_url()); ?>"><span><img class="dmbs-logo-image" src="<?php echo esc_url($dmbsCustomLogoUrl); ?>" alt="<?php bloginfo('name'); ?>" /></span> </a>
        <?php endif; ?>
            <div class="container dmbs-header">



    </div>

<?php endif; ?>


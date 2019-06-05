<?php if ( has_nav_menu( 'main_menu' ) ) : ?>


<?php endif; ?>


        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
           <?php
           $loadEnhancedMenu = get_theme_mod('devdmbootstrap4_enhanced_menu_setting', 1);

           if ($loadEnhancedMenu == 1) {
               $dmbswalker = new devdmbootstrap_enhanced_nav_walker();
           } else {
               $dmbswalker = new devdmbootstrap_nav_walker();
           }
           wp_nav_menu( array(
            'theme_location'    => 'main_menu',
            'depth'             => 2,
            'container'         => '',
            'container_class'   => '',
            'menu_class'        => 'navbar-nav ml-auto',
            'walker'            => $dmbswalker
            )
            );?>

        </div>
    </div>
</nav>
<?php if(is_front_page()):?>

<div class="banner">
    <div class="container">
        <div class="banner-text">
            <div class="banner-heading">
                Siguenos Conoce AC y GP desarrollo Web
            </div>
            <div class="banner-sub-heading">
                Brindamos soluciones innovadoras
            </div>
            <a href="<?php echo esc_url(site_url())?>/contactenos"><button type="button" class="btn btn-warning text-dark btn-banner"">Comienza ya</button></a>
        </div>
    </div>
</div>
<?php endif;

if(!is_front_page()):?>

<div class="breadcrumb wrapper-breadcrumb">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php the_breadcrumb(); ?>
        </div>
    </div>
</div>
</div>
<?php endif;?>



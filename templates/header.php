<?php
    use Roots\Sage\Options;
?>
<?php
    $options = Options\get_options();
    $cur_ID = $wp_query->queried_object->ID;
    $navbar_position = function_exists('get_field') ? get_field('navbar_position', $cur_ID) : 'navbar-static-top';
    $logo_url = function_exists('get_field') ? get_field('header_logo', 'options') : '';
    $navbar_brand = sprintf(
        '<a class="%s" href="%s">%s</a>',
        esc_attr('navbar-brand'),
        esc_url(home_url('/')),
        $logo_url ? '<img src="' . esc_url($logo_url) . '" alt="' . get_bloginfo('name') . '">' : get_bloginfo('name')
    );
    $container_class = $options['header_container'] ? $options['header_container'] : 'container';
?>
<header class="banner navbar navbar-default <?php echo $navbar_position; ?>" role="banner">
    <div class="<?php echo $container_class; ?>">


        <div class="navbar-header">
          <?php echo $navbar_brand; ?>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <nav class="collapse navbar-collapse" role="navigation">
          <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav']);
          endif;
          ?>
        </nav>

        <img class="estimate-image" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/dist/images/GT-estimate.png" alt=""/>

        <?php if($options['socials_in_header']) echo do_shortcode('[socials]'); ?>

  </div>
</header>

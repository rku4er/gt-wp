<?php
    $hide_footer = function_exists('get_field') ? get_field('hide_footer') : false;
    $logo_url = function_exists('get_field') ? get_field('footer_logo', 'options') : '';
    $content_info_brand = sprintf(
        '<a class="%s" href="%s">%s</a>',
        esc_attr('content-info-brand'),
        esc_url(home_url('/')),
        $logo_url ? '<img src="' . esc_url($logo_url) . '" alt="' . get_bloginfo('name') . '">' : get_bloginfo('name')
    );
    $footer_widget_content = function_exists('get_field') ? get_field('footer_widget_content', 'options') : '';
?>

<?php if(!$hide_footer): ?>
    <footer class="content-info" role="contentinfo">
      <div class="container">
        <div class="holder">
          <section><?php echo $content_info_brand; ?></section>
          <section><?php dynamic_sidebar('sidebar-footer'); ?></section>
          <section>
              <section class="widget text-2 widget_text">
                  <?php echo $footer_widget_content; ?>
              </section>
          </section>
        </div>
      </div>
    </footer>
<?php endif; ?>

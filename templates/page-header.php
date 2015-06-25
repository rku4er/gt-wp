<?php
use Roots\Sage\Titles;
use Roots\Sage\Options;
?>

<?php
    $curr_ID = $wp_query->queried_object->ID;
    $hide_header = function_exists('get_field') ? get_field('hide_header',$curr_ID) : false;
?>

<?php if(!$hide_header && !is_search()): ?>
<div class="page-header">
    <h1> <?= Titles\title(); ?> </h1>
</div>
<?php endif; ?>

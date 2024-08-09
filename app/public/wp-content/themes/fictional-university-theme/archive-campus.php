<?php
get_header();
page_banner(array(
  'title' => 'Our Campuses',
  'subtitle' => 'Campuses Across the World'
));
?>

<div class="container container--narrow page-section">
  <ul class="link-list min-list">
    <?php
    while (have_posts()) {
      the_post();
    ?>
      <li><a href="<?php the_permalink(); ?>"><?php the_title(); 
      $map_location = get_field('map_location');
      echo $map_location['address'];
      print_r($map_location);
      ?></a></li>
    <?php }
    echo paginate_links();
    ?>
  </ul>
</div>
<?php
get_footer();
?>
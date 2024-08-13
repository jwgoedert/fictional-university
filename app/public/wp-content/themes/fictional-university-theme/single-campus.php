<?php get_header();
while (have_posts()) {
  the_post();
  page_banner();
?>


  <div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p>
        <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('campus'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Campuses </a> <span class="metabox__main"><?php the_title(); ?></span>
      </p>
    </div>
    <div class="generic-content">
      <?php the_content(); ?>
      <div class="acf-map">
        <?php
        $map_location = get_field('map_location');
        ?>
        <div class="marker" data-lat="<?php echo $map_location['lat'] ?>" data-lng="<?php echo $map_location['lng'] ?>">
          <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></h3>
          <?php echo $map_location['address']; ?>
        </div>

      </div>
    </div>
    <!-- Display next two upcoming events related to program -->
    <?php

    $related_programs = new WP_Query(array(
      'posts_per_page' => -1,
      'post_type' => 'program',
      'orderby' => 'title',
      'order' => 'ASC',
      'meta_query' => array(
        array(
          'key' => 'related_campus',
          'compare' => 'LIKE',
          'value' => '"' . get_the_ID() . '"'
        )
      ),
    ));
    if ($related_programs->have_posts()) {
      echo '<hr class="section-break">';
      echo '<h2 class="headline headline--medium ">Programs Available At This Campus</h2>';
      echo '<ul class="min-list link-list">';
      while ($related_programs->have_posts()) {
        $related_programs->the_post(); ?>
        <li>
          <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
        </li>
    <?php
      }
      echo '</ul>';
    }
    wp_reset_postdata();

    $today = date('Y-m-d H:i:s');
    $home_page_events = new WP_Query(array(
      'posts_per_page' => 2,
      'post_type' => 'event',
      'meta_key' => 'event_date',
      'orderby' => 'meta_value',
      'order' => 'ASC',
      // Only return events that are greater than or equal to today's date
      'meta_query' => array(
        array(
          'key' => 'event_date',
          'compare' => '>=',
          'value' => $today,
          'type' => 'DATETIME',
        ),
        // Only return events that are related to the current program
        array(
          'key' => 'related_programs',
          'compare' => 'LIKE',
          'value' => '"' . get_the_ID() . '"'
        )
      ),
    ));

    if ($home_page_events->have_posts()) {
      echo '<hr class="section-break">';
      echo '<h2 class="headline headline--medium ">Upcoming ' . get_the_title() . ' Events</h2>';
      while ($home_page_events->have_posts()) {
        $home_page_events->the_post();
        get_template_part('template-parts/content', 'event');
      }
    }
    ?>
  </div>
<?php }
get_footer();
?>
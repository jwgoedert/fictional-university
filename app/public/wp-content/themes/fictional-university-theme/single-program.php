<?php get_header();
while (have_posts()) {
  the_post(); ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>)"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title(); ?></h1>
      <div class="page-banner__intro">
        <p>DON'T FORGET TO REPLACE ME LATER!!!</p>
      </div>
    </div>
  </div>

  <div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p>
        <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Programs </a> <span class="metabox__main"><?php the_title(); ?></span>
      </p>
    </div>
    <div class="generic-content">
      <?php the_content(); ?>
    </div>
    <!-- Display next two upcoming events related to program -->
    <?php
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

      if($home_page_events->have_posts()){
        echo '<hr class="section-break">';
      echo '<h2 class="headline headline--medium ">Upcoming ' . get_the_title() . ' Events</h2>';
      while ($home_page_events->have_posts()) {
        $home_page_events->the_post(); ?>
        <div class="event-summary">
          <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
            <span class="event-summary__month">
              <?php
              $event_date = new DateTime(get_field('event_date'));
              echo $event_date->format('M') ?>
            </span>
            <span class="event-summary__day">
              <?php
              echo $event_date->format('d')
              ?></span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5>
            <p><?php
                the_field('event_date');
                if (has_excerpt()) {
                  echo get_the_excerpt();
                } else {
                  echo wp_trim_words(get_the_content(), 18);
                }
                ?><a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
          </div>
        </div>
      <?php
      }

      }
      ?>
  </div>
  <?php }
get_footer();
  ?>
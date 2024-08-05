<?php get_header();
while (have_posts()) {
  the_post();
  // Example with hardcoded title, subtitle, and image 
  page_banner(array(
    'title' => 'Hello, this is the Title!',
    'subtitle' => 'Hello, this is the subtitle!',
    'photo' => 'https://images.unsplash.com/photo-1518680371558-107eece618ec?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
  ));
  ?>

  <div class="container container--narrow page-section">
    <?php
    $the_parent = wp_get_post_parent_id(get_the_id());
    if ($the_parent) { ?>
      <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_permalink($the_parent) ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($the_parent); ?></a> <span class="metabox__main"><?php the_title(); ?></span>
        </p>
      </div>
    <?php }
    ?>

    <?php
      $test_array = get_pages(array(
        'child_of' => get_the_id()
      ));
      if($the_parent or $test_array) { ?>
    
    <div class="page-links">
      <h2 class="page-links__title"><a href="<?php echo get_permalink($the_parent)?>"><?php echo get_the_title($the_parent)?></a></h2>
      <ul class="min-list">
        <?php
          if ($the_parent) {
            $find_children_of = $the_parent;
          } else {
            $find_children_of = get_the_id();
          }
          wp_list_pages(array(
            'title_li' => null,
            'child_of' => $find_children_of,
            'sort_column' => 'menu_order'
          )); ?>
      </ul>
    </div>
    <?php } ?>
    
    <div class="generic-content">
      <?php the_content(); ?>
    </div>
  </div>

<?php }
get_footer();
?>
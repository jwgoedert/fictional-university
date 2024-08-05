<?php
get_header();
page_banner(array(
	'title' => 'Past Events...',
	'subtitle' => 'See what\'s happened on our planet.',
  ));
?>


<div class="container container--narrow page-section">
	<?php
	$today = date('Y-m-d H:i:s');
	$past_events = new WP_Query(array(
		'paged' => get_query_var('paged', 1),
		'post_type' => 'event',
		'meta_key' => 'event_date',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'meta_query' => array(
			array(
				'key' => 'event_date',
				'compare' => '<',
				'value' => $today,
				'type' => 'DATETIME',
			),
		),
	));
	while ($past_events->have_posts()) {
		$past_events->the_post();
		get_template_part('template-parts/content', 'event');
	}
	echo paginate_links(array(
		'total' => $past_events->max_num_pages,
	));
	?>
	<hr class="section-break">
	<p><a href="<?php echo site_url('/events') ?>"> Current Events</a></p>
</div>
<?php
get_footer();
?>
<h1><?php bloginfo('name'); ?></h1>
<p><?php bloginfo('description'); ?></p>
<?php 
    $names = array('Tom', 'Mike', 'John', 'Jane');
    $descriptions = array('sunny', 'rainy', 'cloudy', 'windy');
    
?>
<p>Hi, My name is <?php echo $names[0]; ?> and I am a <?php echo $descriptions[0] ?> student.</p>
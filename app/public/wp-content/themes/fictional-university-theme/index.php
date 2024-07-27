<h1><?php bloginfo('name'); ?></h1>
<p><?php bloginfo('description'); ?></p>
<?php 
    $names = array('Tom', 'Mike', 'John', 'Jane');
    $descriptions = array('sunny', 'rainy', 'cloudy', 'windy');
    $count = 0;

    while($count < 4) {
        echo "<p>Hi, My name is $names[$count] and I am a $descriptions[$count] student.</p>";
        $count++;
    }
?>

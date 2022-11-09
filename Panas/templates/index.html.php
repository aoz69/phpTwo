

<section class="right">


<ul class = "cars">


<?php

foreach ($stories as $car) {
	
	echo '<li>';
	if (file_exists('./images/stories/' . $car->id . '.jpg')) {
		echo '<a href="/images/cars/' . $car->id . '.jpg"><img src="/images/cars/' . $car->id . '.jpg" /></a>';
	}

	echo '<h2>'. $car->title . '</h2>';
	echo '<div class="details">';

	echo '<p>' . $car->story . '</p>';
	echo '</div>';
	echo '</li>';
}

?>

</ul>

</section>

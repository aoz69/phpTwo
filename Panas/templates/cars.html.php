<section class="left">
	<ul>
	<?php
	foreach($manufacturers as $manufac) {
		echo '<li><a href="/cars/manufacturer/'.$manufac->id.'">'.$manufac->name.'</a></li>';
	}
	?>
	</ul>
</section>

<section class="right">

	<h1>Our cars</h1>

<ul class="cars">


<?php

foreach ($cars as $car) {
	$manufacturer;
	foreach($manufacturers as $manufac) {
		
		if($manufac->id == $car->manufacturerId){
			$manufacturer = $manufac;
		}
	}
	echo '<li>';
	if (file_exists('images/cars/' . $car->id . '.jpg')) {
		echo '<a href="/images/cars/' . $car->id . '.jpg"><img src="/images/cars/' . $car->id . '.jpg" /></a>';
	}

	echo '<div class="details">';
	echo '<h2>' . $manufacturer->name . ' ' . $car->name . '</h2>';
	echo '<h2> £' . ($car->discounted_price != 0 ? ('was '.$car->price. ' now: '.$car->discounted_price) : $car->price) . '</h2>';

	echo '<p>' . $car->description . '</p>';
	echo '<p> Mileage: ' . $car->mileage . '</p>';
	echo '<p> Engine Type: ' . $car->engine_type . '</p>';

	echo '</div>';
	echo '</li>';
}

?>

</ul>

</section>

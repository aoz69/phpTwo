<h2>Cars</h2>

<a class="new" href="/Stories/save">Add new story</a>

<?php
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Title</th>';
echo '<th style="width: 10%">Price</th>';
echo '<th style="width: 5%">&nbsp;</th>';
echo '<th style="width: 5%">&nbsp;</th>';
echo '</tr>';


foreach ($cars as $car) {
	echo '<tr>';
	echo '<td>' . $car->title . '</td>';
	echo '<td><a style="float: right" href="/stories/save/' . $car->id . '">Edit</a></td>';
	echo '<td><form method="post" action="/Stories/delete">
	<input type="hidden" name="id" value="' . $car->id . '" />
	<input type="submit" name="submit" value="Delete" />
	</form></td>';
	echo '</tr>';
}

echo '</thead>';
echo '</table>';
	
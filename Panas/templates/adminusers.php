
<h2>Users</h2>

<a class="new" href="/users/save">Add new User</a>

<?php
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Name</th>';
echo '<th style="width: 5%">&nbsp;</th>';
echo '<th style="width: 5%">&nbsp;</th>';
echo '</tr>';
foreach ($users as $category) {
	echo '<tr>';
	echo '<td>' . $category->name . '</td>';
	echo '<td><a style="float: right" href="/users/save/' . $category->id. '">Edit</a></td>';
	echo '<td><form method="post" action="/users/delete">
	<input type="hidden" name="id" value="' . $category->id . '" />
	<input type="submit" name="submit" value="Delete" />
	</form></td>';
	echo '</tr>';
}

echo '</thead>';
echo '</table>';

?>
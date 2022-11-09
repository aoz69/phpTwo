<h2>Save Car</h2>

<form action="/Cars/save" method="POST" enctype="multipart/form-data">
	<label>Car Model</label>
	<input type="text" name="name" value="<?= $cars[0]->name ?? '' ?>" />

	<label>Description</label>
	<textarea name="description"> <?= $cars[0]->description ?? '' ?></textarea>

	<label>Price</label>
	<input type="text" name="price" value="<?= $cars[0]->price ?? '' ?>" />
	<label>Mileage</label>
	<input type="text" name="mileage" value="<?= $cars[0]->mileage ?? '' ?>" />
	<label>Give Discount</label>
	<input type="text" name="discounted_price" value="<?= $cars[0]->discounted_price ?? '' ?>" />
	<label>Category</label>

	<select name="manufacturerId">
	<?php
		foreach ($manufacturers as $row) {
			echo '<option value="' . $row->id . '">' . $row->name. '</option>';
		}

	?>

	</select>

	<label>Image</label>

	<input type="file" name="image" />

	<input type="submit" name="submit" value="Submit" />

</form>
			

		

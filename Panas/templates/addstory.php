<h2>Save Story</h2>

<form action="" method="POST" enctype="multipart/form-data">
	<label>Car Model</label>
	<input type="text" name="title" value="<?= $cars[0]->title ?? '' ?>" />

	<label>Description</label>
	<textarea name="story"> <?= $cars[0]->story ?? '' ?></textarea>

	<label>Image</label>

	<input type="file" name="image" />

	<input type="submit" name="submit" value="Submit" />

</form>
			
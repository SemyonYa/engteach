<?php
$this->title = "Загрузка изображения";
?>

<h1><?= $this->title ?></h1>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="image" id="Image">
    <button type="submit" class="btn btn-primary">Ok</button>
</form>
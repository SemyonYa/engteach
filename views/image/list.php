<?php

$this->title = "Менеджер изображений";

?>
<h1><?= $this->title ?></h1>
<!-- <span href="/image/create"><span class="glyphicon glyphicon-plus-sign"></span></a> -->
<form method="post" enctype="multipart/form-data">
    <input type="file" multiple accept="image/jpeg,image/png" name="image[]" id="Image" onchange="$('#SubmitBtn').click()" style="display: none">
    <button type="submit" class="btn btn-primary" id="SubmitBtn" style="display: none">Ok</button>
    <span class="glyphicon glyphicon-plus image-chose-btn" onclick="$('#Image').click()"></span>
</form>
<div class="images">
    <?php foreach ($imgs as $img) : ?>
        <div class="image" style="background-image: url('/web/images/____<?= $img->name ?>')">
        <a href="/image/remove?id=<?= $img->id ?>"><span class="glyphicon glyphicon-remove remove-image"></span></a>
    </div>
    <?php endforeach; ?>
</div>
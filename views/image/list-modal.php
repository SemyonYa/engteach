<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="EngModalLabel">Менеджер изображений</h4>
        </div>
        <div class="modal-body">
            <div class="modal-images" id="EngInputAttr" data-id="1">
                <?php foreach ($imgs as $img) : ?>
                    <div class="modal-image" style="background-image: url('/web/images/____<?= $img->name ?>')" onclick="ChooseImage('<?= $img->name ?>')"></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
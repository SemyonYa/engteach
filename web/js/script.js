///
// ImageManager
///
function LoadImageManager(attr) {
    $('#EngModal').load('/image/list-modal');
    $('#EngModal').attr('data-input-id', attr);
}

function ChooseImage(name) {
    $('#' + $('#EngModal').attr('data-input-id')).val(name);
    $('#EngImgPreview').attr('src', '/web/images/' + name);
    $('#EngModal').modal('hide');
}
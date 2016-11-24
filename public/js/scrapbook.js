/** UPLOAD PHOTO **/
var fileInput;

function showImagePreview(input) {
    if (input.files && input.files[0]) {
        var filerdr = new FileReader();
        filerdr.onload = function(e) {
            $('#upload-preview-image').attr('src', e.target.result);
			fileInput = e.target.result;
        };
        filerdr.readAsDataURL(input.files[0]);
    }
}

function showImageFilter(input) {
	$.post("../app/Helpers/ImageFilter.php", { filter: input, path: fileInput },
		function(data, status){
			$("#upload-preview-image").attr('src', data);
		}
	);
}

$('#love-button').click(function() {
	if($('#loved-button').length != 0) {
		$('.love-icon').text("").css('color', 'inherit');
		$('.love-text').text("Love it");
		$('#loved-button').prop('id', 'love-button');
		$.post("../../app/http/controllers/LoveController.php", { lover_id: $('.view-lover').val(), image_id: $('.view-love-image').val(), type: 0 });
	}
	else {
		$.post("../../app/http/controllers/LoveController.php", { lover_id: $('.view-lover').val(), image_id: $('.view-love-image').val(), type: 1 });
		$('.love-icon').text("").css('color', '#ed4956');
		$('.love-text').text("Loved");
		$('#love-button').prop('id', 'loved-button');
	}
});
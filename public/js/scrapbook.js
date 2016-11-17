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
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

/*$('.view-submit').click(function submitComment() {
	$('.view-comments').append('<p class="view-post"><b class="view-author">' + $('.view-author-name').val() + ':</b>' + $('.view-input').val() + '</p>');
		
	$.post("../../app/helpers/ImageComments.php", { comment: $('.view-input').val(), author: $('.view-author-name').val(), image_id: $('.view-author-id').val() },
		function(data, status){
			alert(status);
		}
	);
	
	$('.view-input').val("");
});*/
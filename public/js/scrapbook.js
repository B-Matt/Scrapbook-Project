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

var cache = {};
function showImageFilter(input) {
	if(cache[input]) {
		showImageSource(cache[input]);
	}		
    else
	   $.post("../app/Helpers/ImageFilter.php", { filter: input, path: fileInput },
			function(data, status) {
				cache[input] = data;
				showImageSource(data);
			}
		);
}

function showImageSource(data) {
	$("#upload-preview-image").attr('src', data);
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

$('.view-click-change').click(function() {
	var value = $('.view-text').text();
	var str = window.location.pathname .split('/');
	$('.view-click-change').replaceWith('<form method="post" action="chngdcrpt/' + str[4] + '"><input type="hidden" name="_token" value="' + $('.test').val() + '"/><textarea id="view-text-changed" name="new_description" class="view-text-change">' + value + '</textarea><input type="submit" class="view-text-change-submit view-submit-text" value="&#xf1d8;"></input></form>');
});
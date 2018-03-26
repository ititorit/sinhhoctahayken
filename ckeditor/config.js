CKEDITOR.editorConfig = function(config) {
	var baseURL = 'http://localhost/intern';
   	config.filebrowserBrowseUrl 		= baseURL + '/kcfinder/browse.php?opener=ckeditor&type=files';
   	config.filebrowserImageBrowseUrl 	= baseURL + '/kcfinder/browse.php?opener=ckeditor&type=images';
   	config.filebrowserFlashBrowseUrl 	= baseURL + '/kcfinder/browse.php?opener=ckeditor&type=flash';
   	config.filebrowserUploadUrl 		= baseURL + '/kcfinder/upload.php?opener=ckeditor&type=files';
   	config.filebrowserImageUploadUrl 	= baseURL + '/kcfinder/upload.php?opener=ckeditor&type=images';
   	config.filebrowserFlashUploadUrl 	= baseURL + '/kcfinder/upload.php?opener=ckeditor&type=flash';

};
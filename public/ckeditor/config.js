/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
var baseurl = "http://www.nirapad.org.bd/nirapadorg"
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
   config.filebrowserBrowseUrl = baseurl+'/kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl =baseurl+'/kcfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl =baseurl+'/kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = baseurl+'/kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = baseurl+'/kcfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = baseurl+'/kcfinder/upload.php?opener=ckeditor&type=flash';
};

/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
 var sitefolder = '/ecms3';
 //alert(sitefolder); 
 
 config.language = 'pl';
 config.entities = false;
 config.entities_latin = false;



 config.filebrowserBrowseUrl = sitefolder+'/admin/modules/php-form-builder-class/includes/ckfinder/ckfinder.html';
 config.filebrowserImageBrowseUrl = sitefolder+'/admin/modules/php-form-builder-class/includes/ckfinder/ckfinder.html?type=Images';
 config.filebrowserFlashBrowseUrl = sitefolder+'/admin/modules/php-form-builder-class/includes/ckfinder/ckfinder.html?type=Flash';
 config.filebrowserUploadUrl = sitefolder+'/admin/modules/php-form-builder-class/includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
 config.filebrowserImageUploadUrl = sitefolder+'/admin/modules/php-form-builder-class/includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
 config.filebrowserFlashUploadUrl = sitefolder+'/admin/modules/php-form-builder-class/includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
 

};

/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';

    config.filebrowserBrowseUrl = '/public/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';

    config.filebrowserImageBrowseUrl = '/public/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';

    config.filebrowserFlashBrowseUrl = '/public/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';

    config.filebrowserUploadUrl = '/public/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';

    config.filebrowserImageUploadUrl = '/public/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';

    config.filebrowserFlashUploadUrl = '/public/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';
};


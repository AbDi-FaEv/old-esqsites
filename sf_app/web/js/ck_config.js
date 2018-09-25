CKEDITOR.editorConfig = function( config )
{
    config.toolbar_Full = [
        ['Source'],
        ['Cut','Copy','Paste','PasteFromWord','SpellCheck'],
        ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
        ['FitWindow'],
        '/',
        ['Bold','Italic','Underline','Strike'],
        ['NumberedList','BulletedList','-','Outdent','Indent','CreateDiv'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['Link','Unlink','Anchor'],
        ['Image','Flash','Table','HorizontalRule','SpecialChar'],
        ['TextColor','BGColor'],
        '/',
        ['Styles','Format','Font','FontSize']		// No comma for the last row.
    ];

    config.toolbar_Basic = [
        ['Format','-','Bold','Italic'],['JustifyLeft','JustifyCenter'],['RemoveFormat','Undo','Redo'],
        '/',
        ['NumberedList','BulletedList','-','Link','Unlink','Anchor'],['Image','HorizontalRule','Table'],['SpellCheck','Source']
        // No comma for the last row.
    ];
    
    //config.LinkBrowser = true ;
    config.filebrowserBrowseUrl = '/js/ckfinder/ckfinder.html';
    config.width = '600';
    config.toolbarCanCollapse = false;
    
    //config.FlashBrowser = false;
    //config.LinkUpload = false;
    //config.ImageUpload = false;
    //config.FlashUpload = false;
};
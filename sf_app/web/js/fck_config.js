FCKConfig.EditorAreaCSS = FCKConfig.BasePath + 'css/fck_editorarea.css' ;
FCKConfig.EditorAreaStyles = '' ;
FCKConfig.FullPage = false ;
FCKConfig.SkinPath = FCKConfig.BasePath + 'skins/silver/' ;
// FCKConfig.Plugins.Add( 'autogrow' ) ;
// FCKConfig.Plugins.Add( 'dragresizetable' );
FCKConfig.AutoGrowMax = 400 ;
FCKConfig.ToolbarCanCollapse = false;

FCKConfig.EMailProtection = 'none' ; // none | encode | function
FCKConfig.EMailProtectionFunction = 'mt(NAME,DOMAIN,SUBJECT,BODY)' ;

FCKConfig.ToolbarSets["Default"] = [
	['Source'],
	['Cut','Copy','Paste','PasteWord','SpellCheck'],
	['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	['FitWindow'],
	'/',
	['Bold','Italic','Underline','StrikeThrough'],
	['OrderedList','UnorderedList','-','Outdent','Indent','CreateDiv'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
	['Link','Unlink','Anchor'],
	['Image','Flash','Table','Rule','SpecialChar'],
	['TextColor','BGColor'],
	'/',
	['FontFormat','FontName','FontSize']		// No comma for the last row.
];

FCKConfig.ToolbarSets["Basic"] = [
	['FontFormat','-','Bold','Italic'],['JustifyLeft','JustifyCenter'],['RemoveFormat','Undo','Redo'],
    '/',
	['OrderedList','UnorderedList','-','Link','Unlink','Anchor'],['Image','Rule','Table'],['SpellCheck','Source']
	// No comma for the last row.
];

FCKConfig.SpellChecker			= 'WSC' ;	// 'WSC' | 'SpellerPages' | 'ieSpell'
FCKConfig.IeSpellDownloadUrl	= 'http://www.iespell.com/download.php' ;
FCKConfig.SpellerPagesServerScript = 'server-scripts/spellchecker.php' ;	// Available extension: .php .cfm .pl
FCKConfig.FirefoxSpellChecker	= false ;

// The option switches between trying to keep the html structure or do the changes so the content looks like it was in Word
FCKConfig.CleanWordKeepsStructure = false ;

FCKConfig.LinkBrowser = true ;
FCKConfig.LinkBrowserURL = FCKConfig.BasePath + '../../ckfinder/ckfinder.html';

FCKConfig.ImageBrowser = true ;
FCKConfig.ImageBrowserURL = FCKConfig.BasePath + '../../ckfinder/ckfinder.html';

FCKConfig.FlashBrowser = false;
FCKConfig.LinkUpload = false;
FCKConfig.ImageUpload = false;
FCKConfig.FlashUpload = false;

//customize templates
FCKConfig.TemplatesXmlPath	= FCKConfig.EditorPath + '../fcktemplates.xml' ;
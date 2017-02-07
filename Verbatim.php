<?php
# MediaWiki Verbatim extension
# Syntax: <verbatim>mediawikimessage</verbatim> includes [[MediaWiki:Mediawikimessage]] verbatim.
$wgHooks['ParserFirstCallInit'][] = "wfVerbatimExtension";
/**
* @param Parser $parser
* @return bool
*/
function wfVerbatimExtension( $parser ) {
// register the extension with the WikiText parser
// the first parameter is the name of the new tag. In this case it defines the tag <example> ... </example>
// the second parameter is the callback function for processing the text between the tags
$parser->setHook( "verbatim", "renderVerbatim" );
return true;
}
// The callback function for converting the input text to HTML output
function renderVerbatim( $input ) {
  $str = '<a href="#" class="des-help" data-toggle="tooltip" title="由Verbatim标签生成。Verbatim标签已弃用并且将在未来版本中被移除。请不要继续使用。"><i class="fa fa-question-circle"></i></a>';
  return str_replace("\n",'',wfMessage(trim($input))->text()).$str;
}

  

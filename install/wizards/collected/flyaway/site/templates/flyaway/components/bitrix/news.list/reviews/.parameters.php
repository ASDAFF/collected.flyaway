<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule('iblock'))
	return;
if(!CModule::IncludeModule('collected.flayway'))
	return;
if(!CModule::IncludeModule('collected.devlibrary'))
	return;

$listProp = RSDevLibParameters::GetTemplateParamsPropertiesList($arCurrentValues['IBLOCK_ID']);

$arTemplateParameters = array(
	'RSFLYAWAY_AUTHOR_NAME' => array(
		'NAME' => GetMessage('RS.FLYAWAY.AUTHOR_NAME'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
	),
	'RSFLYAWAY_AUTHOR_JOB' => array(
		'NAME' => GetMessage('RS.FLYAWAY.AUTHOR_JOB'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
	),
);

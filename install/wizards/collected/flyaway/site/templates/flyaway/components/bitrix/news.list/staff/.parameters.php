<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/**
 * Copyright (c) 18/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if(!CModule::IncludeModule('iblock'))
	return;
if(!CModule::IncludeModule('collected.flyaway'))
	return;
if(!CModule::IncludeModule('collected.devlibrary'))
	return;

$arTemplateParameters = array(
	'RSFLYAWAY_SHOW_BUTTON' => array(
		'NAME' => GetMessage('RS.FLYAWAY.SHOW_BUTTON'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'N',
		'REFRESH' => 'Y',
	),
);

if( $arCurrentValues['RSFLYAWAY_SHOW_BUTTON']=='Y' ) {
	$arTemplateParameters['RSFLYAWAY_BUTTON_CAPTION'] = array(
		'NAME' => GetMessage('RS.FLYAWAY.BUTTON_CAPTION'),
		'TYPE' => 'STRING',
	);
}

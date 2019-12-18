<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/**
 * Copyright (c) 18/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

use \Bitrix\Main\Localization\Loc;

if (!CModule::IncludeModule('iblock')
	|| !CModule::IncludeModule('collected.flyaway')
	|| !CModule::IncludeModule('collected.devlibrary')) {
	return;
}

$arTemplateParameters = array(
	'RSFLYAWAY_BLOCK_NAME' => array(
		'NAME' => Loc::getMessage('RS.FLYAWAY.BLOCK_NAME'),
		'TYPE' => 'STRING',
		'DEFAULT' => '',
	),
	'RSFLYAWAY_BLOCK_LINK' => array(
		'NAME' => Loc::getMessage('RS.FLYAWAY.BLOCK_LINK'),
		'TYPE' => 'STRING',
		'DEFAULT' => '',
	),
);

RSFLYAWAY_AddComponentParameters($arTemplateParameters,array('blockName','owlSupport'));
if( $arCurrentValues['RSFLYAWAY_USE_OWL']=='Y' ) {
	RSFLYAWAY_AddComponentParameters($arTemplateParameters,array('owlSettings'));
} else {
	RSFLYAWAY_AddComponentParameters($arTemplateParameters,array('bootstrapCols'));
}
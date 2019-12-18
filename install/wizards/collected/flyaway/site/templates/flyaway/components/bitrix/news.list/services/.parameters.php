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

$arTemplateParameters = array();

RSFLYAWAY_AddComponentParameters($arTemplateParameters,array('blockName','owlSupport'));
if( $arCurrentValues['RSFLYAWAY_USE_OWL']=='Y' ) {
	RSFLYAWAY_AddComponentParameters($arTemplateParameters,array('owlSettings'));
} else {
	RSFLYAWAY_AddComponentParameters($arTemplateParameters,array('bootstrapCols'));
}
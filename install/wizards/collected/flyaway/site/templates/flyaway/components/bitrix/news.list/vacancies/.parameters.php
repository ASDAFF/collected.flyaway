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

$listProp = RSDevLibParameters::GetTemplateParamsPropertiesList($arCurrentValues['IBLOCK_ID']);

$arTemplateParameters = array(
	'RSFLYAWAY_PROP_VACANCY_TYPE' => array(
		'NAME' => GetMessage('RS.FLYAWAY.PROP_VACANCY_TYPE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['L'],
		'DEFAULT' => '',
	),
	'RSFLYAWAY_PROP_SIGNATURE' => array(
		'NAME' => GetMessage('RS.FLYAWAY.PROP_SIGNATURE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
		'DEFAULT' => '',
	),
);
<?php
/**
 * Copyright (c) 18/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if (!CModule::IncludeModule('iblock')
	|| !CModule::IncludeModule('collected.flyaway')
	|| !CModule::IncludeModule('collected.devlibrary')) {
	return;
}

$listProp = RSDevLibParameters::GetTemplateParamsPropertiesList($arCurrentValues['IBLOCK_ID']);

$arTemplateParameters = array(
	'RSFLYAWAY_PROP_MORE_PHOTO' => array(
		'NAME' => Loc::getMessage('RS.FLYAWAY.PROP_MORE_PHOTO'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['F'],
	),
	'RSFLYAWAY_PROP_ARTICLE' => array(
		'NAME' => Loc::getMessage('RS.FLYAWAY.PROP_ARTICLE'),
		'TYPE' => 'LIST',
		'VALUES' => $listProp['SNL'],
	),
	'RSFLYAWAY_PROP_OFF_POPUP' => array(
		'NAME' => Loc::getMessage('RS.FLYAWAY.PROP_OFF_POPUP'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'N',
	),
	'RSFLYAWAY_USE_FAVORITE' => array(
		'NAME' => GetMessage('RS.FLYAWAY.USE_FAVORITE'),
		'TYPE' => 'CHECKBOX',
		'VALUE' => 'Y',
		'DEFAULT' => 'Y',
	),
);

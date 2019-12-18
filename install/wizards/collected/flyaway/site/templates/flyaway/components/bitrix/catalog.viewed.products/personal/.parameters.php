<?php
/**
 * Copyright (c) 18/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc,
    \Bitrix\Main\Loader;

Loc::loadMessages(__FILE__);

if (!Loader::includeModule('iblock')
	|| !Loader::includeModule('collected.flyaway')
	|| !Loader::includeModule('collected.devlibrary')) {
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
);

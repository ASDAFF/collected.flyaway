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

RSMONOPOLY_AddComponentParameters($arTemplateParameters,array('blockName'));
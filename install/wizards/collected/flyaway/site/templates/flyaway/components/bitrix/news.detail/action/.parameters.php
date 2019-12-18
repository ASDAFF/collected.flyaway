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
  'RSFLYAWAY_PROP_MARKER_TEXT' => array(
    'NAME' => GetMessage('RS.FLYAWAY.PROP_MARKER_TEXT'),
    'TYPE' => 'LIST',
    'VALUES' => $listProp['SNL'],
  ),
  'RSFLYAWAY_PROP_MARKER_COLOR' => array(
    'NAME' => GetMessage('RS.FLYAWAY.PROP_MARKER_COLOR'),
    'TYPE' => 'LIST',
    'VALUES' => $listProp['SNL'],
  ),
  'RSFLYAWAY_PROP_ACTION_DATE' => array(
    'NAME' => GetMessage('RS.FLYAWAY.PROP_ACTION_DATE'),
    'TYPE' => 'LIST',
    'VALUES' => $listProp['SNL'],
  ),
);
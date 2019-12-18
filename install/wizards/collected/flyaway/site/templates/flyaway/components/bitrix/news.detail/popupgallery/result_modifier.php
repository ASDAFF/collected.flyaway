<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * Copyright (c) 18/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if(!CModule::IncludeModule('collected.devlibrary'))
	return;
if(!CModule::IncludeModule('collected.flyaway'))
	return;

if(!empty($arResult)) {
	$params = array(
		'PROP_MORE_PHOTO' => $arParams['RSFLYAWAY_PROP_MORE_PHOTO'],
		'MAX_WIDTH' => 300,
		'MAX_HEIGHT' => 300,
		'PAGE' => 'detail',
	);
	$arItems = array(0 => &$arResult);
	RSDevLib::GetDataForProductItem($arItems,$params);
	// /get monopoly data
}

// get no photo
$arResult['NO_PHOTO'] = RSDevLib::GetNoPhoto(array('MAX_WIDTH'=>$max_width_size,'MAX_HEIGHT'=>$max_height_size));
// /get no photo
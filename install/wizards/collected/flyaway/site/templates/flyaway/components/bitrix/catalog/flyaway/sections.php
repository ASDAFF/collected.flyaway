<?php
/**
 * Copyright (c) 18/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

global $HIDE_SIDEBAR;
$HIDE_SIDEBAR = true;

if (!\Bitrix\Main\Loader::includeModule('collected.flyaway')) {
	return;
}

if (\Bitrix\Main\Loader::includeModule('iblock')) {
	// take data about curent section
	$arFilter = array(
		'ID' => $arParams['IBLOCK_ID'],
		'ACTIVE' => 'Y',
	);

	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($arFilter) ,'/iblock/catalog')) {
		$arCurIBlock = $obCache->GetVars();
	} elseif ($obCache->StartDataCache()) {
		$arCurIBlock = array();
		$dbRes = CIBlock::GetList(array(), $arFilter, false);

		if (defined('BX_COMP_MANAGED_CACHE')) {
			global $CACHE_MANAGER;
			$CACHE_MANAGER->StartTagCache('/iblock/catalog');

			if ($arCurIBlock = $dbRes->Fetch()) {
				$CACHE_MANAGER->RegisterTag('iblock_id_'.$arParams['IBLOCK_ID']);
			}

			$CACHE_MANAGER->EndTagCache();
		} else {
			if (!$arCurIBlock = $dbRes->Fetch()) {
				$arCurIBlock = array();
			}
		}

		$obCache->EndDataCache($arCurIBlock);
	}
	// /take data about curent section
}

?><div class="row">
	<?$URL_PIC = CFile::GetPath($arCurIBlock['PICTURE']);?>
	<?if ($URL_PIC):?>
	<div class="col col-sm-4 col-md-3 col-lg-2 hidden-xs sections-cover">
		<img class="sections-cover__img" src="<?=$URL_PIC?>" alt="" />
	</div>
	<?endif;?>

	<?if ($arCurIBlock['DESCRIPTION']):?>
	<div class="sections-description sections-description_wide">
		<div class="sections-detail"><?=$arCurIBlock['DESCRIPTION']?></div>
	</div>
	<?endif;?>
</div>

<div class="row">
	<div class="col col-md-12">
		<?$APPLICATION->IncludeComponent(
			"bitrix:catalog.section.list",
			"flyaway",
			array(
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
                "TOP_DEPTH" => "1",
                "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                "HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
                "ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : ''),
                "SET_TITLE" => $arParams["SET_TITLE"],
			),
			$component,
			array("HIDE_ICONS" => "Y")
		);?>

	</div>
</div>

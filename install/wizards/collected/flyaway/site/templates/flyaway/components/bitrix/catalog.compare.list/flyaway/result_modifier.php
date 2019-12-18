<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

if (!CModule::IncludeModule('collected.devlibrary')) {
	return;
}

$arResult['COMPARE_CNT'] = count($arResult);
$arResult['RIGHT_WORD'] = RSDevLib::BasketEndWord($arResult['COMPARE_CNT']);

<?php
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

if (!\Bitrix\Main\Loader::includeModule('collected.devlibrary')) {
	return;
}
	
$arResult = RSDevLibResultModifier::SearchPage($arResult);
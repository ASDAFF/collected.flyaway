<?php
/**
 * Copyright (c) 18/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

if (!IsModuleInstalled('collected.flyaway'))
	return;

  $colors = array(
    "kids" => array(
      "gencolor" => "ffb700",
      "secondColor" => "000000",
      "openMenuType" => "type2",
      "presets" => "preset_4",
      "bannerType" => "type3",
      "Fichi" => "Y",
      "New" => "Y",
      "News" => "Y",
      "SmallBanners" => "Y",
      "PopularItem" => "Y",
      "AboutAndReviews" => "Y",
      "Service" => "N",
      "Partners" => "Y",
      "Gallery" => "N",
    ),
    "fashion" => array(
      "gencolor" => "f5dfce",
      "secondColor" => "000000",
      "openMenuType" => "type2",
      "presets" => "preset_1",
      "bannerType" => "type4",
      "Fichi" => "N",
      "New" => "Y",
      "Service" => "Y",
      "News" => "N",
      "Gallery" => "Y",
      "SmallBanners" => "Y",
      "PopularItem" => "Y",
      "AboutAndReviews" => "N",      
      "Partners" => "Y",
    ),
    "furniture" => array(
      "gencolor" => "eb3a0e",
      "secondColor" => "ffffff",
      "openMenuType" => "type2",
      "presets" => "preset_6",
      "bannerType" => "type3",
      "Fichi" => "Y",
      "New" => "N",
      "Service" => "Y",
      "News" => "Y",
      "Gallery" => "Y",
      "SmallBanners" => "Y",
      "PopularItem" => "Y",
      "AboutAndReviews" => "Y",      
      "Partners" => "Y",
    ),
    "food" => array(
      "gencolor" => "609B1B",
      "secondColor" => "ffffff",
      "openMenuType" => "type2",
      "presets" => "preset_5",
      "bannerType" => "type3",
      "Fichi" => "Y",
      "New" => "Y",
      "Service" => "N",
      "News" => "Y",
      "Gallery" => "N",
      "SmallBanners" => "Y",
      "PopularItem" => "Y",
      "AboutAndReviews" => "N",      
      "Partners" => "Y",
    ),
    "auto" => array(
      "gencolor" => "696969",
      "secondColor" => "ffffff",
      "openMenuType" => "type1",
      "presets" => "preset_8",
      "bannerType" => "type2",
      "Fichi" => "Y",
      "New" => "Y",
      "Service" => "N",
      "News" => "N",
      "Gallery" => "N",
      "SmallBanners" => "Y",
      "PopularItem" => "Y",
      "AboutAndReviews" => "Y",      
      "Partners" => "Y",      
    ),
    "office" => array(
      "gencolor" => "7cc4fc",
      "secondColor" => "ffffff",
      "openMenuType" => "type2",
      "presets" => "preset_5",
      "bannerType" => "type3",
      "Fichi" => "Y",
      "New" => "Y",
      "Service" => "N",
      "News" => "N",
      "Gallery" => "N",
      "SmallBanners" => "Y",
      "PopularItem" => "Y",
      "AboutAndReviews" => "Y",      
      "Partners" => "Y",
    ),
    "digital" => array(
      "gencolor" => "FFDB4F",
      "secondColor" => "000000",
      "openMenuType" => "type1",
      "presets" => "preset_5",
      "bannerType" => "type3",
      "Fichi" => "Y",
      "New" => "Y",
      "Service" => "N",
      "News" => "Y",
      "Gallery" => "N",
      "SmallBanners" => "Y",
      "PopularItem" => "Y",
      "AboutAndReviews" => "Y",      
      "Partners" => "Y",
    ),
    "sport" => array(
      "gencolor" => "013563",
      "secondColor" => "ffffff",
      "openMenuType" => "type2",
      "presets" => "preset_6",
      "bannerType" => "type5",
      "Fichi" => "Y",
      "New" => "Y",
      "Service" => "N",
      "News" => "Y",
      "Gallery" => "N",
      "SmallBanners" => "Y",
      "PopularItem" => "Y",
      "AboutAndReviews" => "N",      
      "Partners" => "N",
    ),
    "animal" => array(
      "gencolor" => "f7f7f7",
      "secondColor" => "c42a16",
      "openMenuType" => "type2",
      "presets" => "preset_2",
      "bannerType" => "type3",
      "Fichi" => "Y",
      "New" => "Y",
      "Service" => "N",
      "News" => "Y",
      "Gallery" => "N",
      "SmallBanners" => "Y",
      "PopularItem" => "Y",
      "AboutAndReviews" => "Y",      
      "Partners" => "Y",
    ),
    "home" => array(
      "gencolor" => "2fd1ed",
      "secondColor" => "ffffff",
      "openMenuType" => "type2",
      "presets" => "preset_3",
      "bannerType" => "type1",
      "Fichi" => "Y",
      "New" => "Y",
      "Service" => "Y",
      "News" => "Y",
      "Gallery" => "Y",
      "SmallBanners" => "Y",
      "PopularItem" => "Y",
      "AboutAndReviews" => "Y",      
      "Partners" => "Y",
    ),
    "build" => array(
      "gencolor" => "662b04",
      "secondColor" => "ffffff",
      "openMenuType" => "type1",
      "presets" => "preset_9",
      "bannerType" => "type3",
      "Fichi" => "Y",
      "New" => "Y",
      "Service" => "Y",
      "News" => "Y",
      "Gallery" => "Y",
      "SmallBanners" => "Y",
      "PopularItem" => "Y",
      "AboutAndReviews" => "Y",      
      "Partners" => "Y",
    ),
  );

if (WIZARD_THEME_ID != 'default' && is_array($colors[WIZARD_THEME_ID]) && count($colors[WIZARD_THEME_ID]) > 0) {
	
	foreach ($colors[WIZARD_THEME_ID] as $name => $value) {
		COption::SetOptionString('collected.flyaway', $name, $value);
	}
	
} else {
	
	COption::SetOptionString('collected.flyaway', 'gencolor', 'ffe062' );
	COption::SetOptionString('collected.flyaway', 'secondColor', '555555' );

	COption::SetOptionString('collected.flyaway', 'openMenuType', 'type1' );
	COption::SetOptionString('collected.flyaway', 'presets', 'preset_1' );
	COption::SetOptionString('collected.flyaway', 'bannerType', 'type1' );
	COption::SetOptionString('collected.flyaway', 'filterSide', 'left' );

	COption::SetOptionString('collected.flyaway', 'Fichi', 'Y' );
	COption::SetOptionString('collected.flyaway', 'SmallBanners', 'Y' );
	COption::SetOptionString('collected.flyaway', 'New', 'Y' );
	COption::SetOptionString('collected.flyaway', 'PopularItem', 'Y' );
	COption::SetOptionString('collected.flyaway', 'Service', 'Y' );
	COption::SetOptionString('collected.flyaway', 'AboutAndReviews', 'Y' );
	COption::SetOptionString('collected.flyaway', 'News', 'Y' );
	COption::SetOptionString('collected.flyaway', 'Partners', 'Y' );
	COption::SetOptionString('collected.flyaway', 'Gallery', 'Y' );
	
}

RsFlyaway::generateCssColorFile();

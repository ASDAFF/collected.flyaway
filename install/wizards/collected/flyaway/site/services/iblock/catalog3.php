<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
/**
 * Copyright (c) 18/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if(!CModule::IncludeModule("iblock") || !CModule::IncludeModule("catalog"))
	return;

if(COption::GetOptionString("collected.flyaway", "wizard_installed", "N", WIZARD_SITE_ID) == "Y" && !WIZARD_INSTALL_DEMO_DATA)
	return;

//update iblocks, demo discount and precet
$shopLocalization = $wizard->GetVar("shopLocalization");

$IBLOCK_CATALOG_ID = (isset($_SESSION["WIZARD_CATALOG_IBLOCK_ID"]) ? (int)$_SESSION["WIZARD_CATALOG_IBLOCK_ID"] : 0);
$IBLOCK_OFFERS_ID = (isset($_SESSION["WIZARD_OFFERS_IBLOCK_ID"]) ? (int)$_SESSION["WIZARD_OFFERS_IBLOCK_ID"] : 0);
//reference update
/*$rsIBlock = CIBlock::GetList(array(), array("XML_ID" => "clothes_colors", "TYPE" => "references"));
if ($arIBlock = $rsIBlock->Fetch())
{
	if (WIZARD_INSTALL_DEMO_DATA)
	{
		$ib = new CIBlock;
		$ib->Update($arIBlock["ID"], array("XML_ID" => "clothes_colors_".WIZARD_SITE_ID));
	}
}*/

if ($IBLOCK_OFFERS_ID)
{
	$iblockCodeOffers = "offers_".WIZARD_SITE_ID;
	//IBlock fields
	$iblock = new CIBlock;
	$arFields = Array(
		"ACTIVE" => "Y",
		"FIELDS" => array(
			'IBLOCK_SECTION' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'ACTIVE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'Y',),
			'ACTIVE_FROM' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'ACTIVE_TO' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'SORT' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'NAME' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => '',),
			'PREVIEW_PICTURE' => array(
				'IS_REQUIRED' => 'N',
				'DEFAULT_VALUE' => array(
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
				),
			),
			'PREVIEW_TEXT_TYPE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text',),
			'PREVIEW_TEXT' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'DETAIL_PICTURE' => array(
				'IS_REQUIRED' => 'N',
				'DEFAULT_VALUE' => array(
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
				),
			),
			'DETAIL_TEXT_TYPE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text',),
			'DETAIL_TEXT' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'XML_ID' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'CODE' => array(
				'IS_REQUIRED' => 'N',
				'DEFAULT_VALUE' => array(
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '_',
					'TRANS_OTHER' => '_',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'Y',
				),
			),
			'TAGS' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'SECTION_NAME' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'SECTION_PICTURE' => array(
				'IS_REQUIRED' => 'N',
				'DEFAULT_VALUE' => array(
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
				),
			),
			'SECTION_DESCRIPTION_TYPE' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => 'text',),
			'SECTION_DESCRIPTION' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'SECTION_DETAIL_PICTURE' => array(
				'IS_REQUIRED' => 'N',
				'DEFAULT_VALUE' => array(
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
				),
			),
			'SECTION_XML_ID' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'SECTION_CODE' => array(
				'IS_REQUIRED' => 'N',
				'DEFAULT_VALUE' => array(
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '_',
					'TRANS_OTHER' => '_',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'Y',
				),
			),
		),
		"CODE" => "offers",
		"XML_ID" => $iblockCodeOffers
	);
	$iblock->Update($IBLOCK_OFFERS_ID, $arFields);
}

if ($IBLOCK_CATALOG_ID)
{
	$iblockCode = "catalog_".WIZARD_SITE_ID;
	//IBlock fields
	$iblock = new CIBlock;
	$arFields = Array(
		"ACTIVE" => "Y",
		"FIELDS" => array(
			'IBLOCK_SECTION' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => '',),
			'ACTIVE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'Y',),
			'ACTIVE_FROM' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'ACTIVE_TO' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'SORT' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'NAME' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => '',),
			'PREVIEW_PICTURE' => array(
				'IS_REQUIRED' => 'N',
				'DEFAULT_VALUE' => array(
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
				),
			),
			'PREVIEW_TEXT_TYPE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text',),
			'PREVIEW_TEXT' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'DETAIL_PICTURE' => array(
				'IS_REQUIRED' => 'N',
				'DEFAULT_VALUE' => array(
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
				),
			),
			'DETAIL_TEXT_TYPE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text',),
			'DETAIL_TEXT' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'XML_ID' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'CODE' => array(
				'IS_REQUIRED' => 'Y',
				'DEFAULT_VALUE' => array(
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '_',
					'TRANS_OTHER' => '_',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'Y',
				),
			),
			'TAGS' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'SECTION_NAME' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => '',),
			'SECTION_PICTURE' => array(
				'IS_REQUIRED' => 'N',
				'DEFAULT_VALUE' => array(
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
				),
			),
			'SECTION_DESCRIPTION_TYPE' => array('IS_REQUIRED' => 'Y', 'DEFAULT_VALUE' => 'text',),
			'SECTION_DESCRIPTION' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'SECTION_DETAIL_PICTURE' => array(
				'IS_REQUIRED' => 'N',
				'DEFAULT_VALUE' => array(
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
				),
			),
			'SECTION_XML_ID' => array('IS_REQUIRED' => 'N', 'DEFAULT_VALUE' => '',),
			'SECTION_CODE' => array(
				'IS_REQUIRED' => 'Y',
				'DEFAULT_VALUE' => array(
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '_',
					'TRANS_OTHER' => '_',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'Y',
				),
			),
		),
		"CODE" => "catalog",
		"XML_ID" => $iblockCode
	);
	$iblock->Update($IBLOCK_CATALOG_ID, $arFields);

	if ($IBLOCK_OFFERS_ID)
	{
		$ID_SKU = CCatalog::LinkSKUIBlock($IBLOCK_CATALOG_ID, $IBLOCK_OFFERS_ID);

		$rsCatalogs = CCatalog::GetList(
			array(),
			array('IBLOCK_ID' => $IBLOCK_OFFERS_ID),
			false,
			false,
			array('IBLOCK_ID')
		);
		if ($arCatalog = $rsCatalogs->Fetch())
		{
			CCatalog::Update($IBLOCK_OFFERS_ID,array('PRODUCT_IBLOCK_ID' => $IBLOCK_CATALOG_ID,'SKU_PROPERTY_ID' => $ID_SKU));
		}
		else
		{
			CCatalog::Add(array('IBLOCK_ID' => $IBLOCK_OFFERS_ID, 'PRODUCT_IBLOCK_ID' => $IBLOCK_CATALOG_ID, 'SKU_PROPERTY_ID' => $ID_SKU));
		}
	}

	//user fields for sections
	$arLanguages = Array();
	$rsLanguage = CLanguage::GetList($by, $order, array());
	while($arLanguage = $rsLanguage->Fetch())
		$arLanguages[] = $arLanguage["LID"];

	$arUserFields = array("UF_BROWSER_TITLE", "UF_KEYWORDS", "UF_META_DESCRIPTION");
	foreach ($arUserFields as $userField)
	{
		$arLabelNames = Array();
		foreach($arLanguages as $languageID)
		{
			WizardServices::IncludeServiceLang("property_names.php", $languageID);
			$arLabelNames[$languageID] = GetMessage($userField);
		}

		$arProperty["EDIT_FORM_LABEL"] = $arLabelNames;
		$arProperty["LIST_COLUMN_LABEL"] = $arLabelNames;
		$arProperty["LIST_FILTER_LABEL"] = $arLabelNames;

		$dbRes = CUserTypeEntity::GetList(Array(), Array("ENTITY_ID" => 'IBLOCK_'.$IBLOCK_CATALOG_ID.'_SECTION', "FIELD_NAME" => $userField));
		if ($arRes = $dbRes->Fetch())
		{
			$userType = new CUserTypeEntity();
			$userType->Update($arRes["ID"], $arProperty);
		}
		//if($ex = $APPLICATION->GetException())
			//$strError = $ex->GetString();
	}

//demo discount
	$dbDiscount = CCatalogDiscount::GetList(array(), Array("SITE_ID" => WIZARD_SITE_ID));
	if(!($dbDiscount->Fetch()))
	{
		if (CModule::IncludeModule("iblock"))
		{
			$dbSect = CIBlockSection::GetList(Array(), Array("IBLOCK_TYPE" => "catalog", "IBLOCK_ID"=>$IBLOCK_CATALOG_ID, "CODE" => "underwear", "IBLOCK_SITE_ID" => WIZARD_SITE_ID));
			if ($arSect = $dbSect->Fetch())
				$sofasSectId = $arSect["ID"];
		}
		$dbSite = CSite::GetByID(WIZARD_SITE_ID);
		if($arSite = $dbSite -> Fetch())
			$lang = $arSite["LANGUAGE_ID"];
		$defCurrency = "EUR";
		if($lang == "ru")
			$defCurrency = "RUB";
		elseif($lang == "en")
			$defCurrency = "USD";
		$arF = Array (
			"SITE_ID" => WIZARD_SITE_ID,
			"ACTIVE" => "Y",
			//"ACTIVE_FROM" => ConvertTimeStamp(mktime(0,0,0,12,15,2011), "FULL"),
			//"ACTIVE_TO" => ConvertTimeStamp(mktime(0,0,0,03,15,2012), "FULL"),
			"RENEWAL" => "N",
			"NAME" => GetMessage("WIZ_DISCOUNT"),
			"SORT" => 100,
			"MAX_DISCOUNT" => 0,
			"VALUE_TYPE" => "P",
			"VALUE" => 10,
			"CURRENCY" => $defCurrency,
			"CONDITIONS" => Array (
				"CLASS_ID" => "CondGroup",
				"DATA" => Array("All" => "OR", "True" => "True"),
				"CHILDREN" => Array(Array("CLASS_ID" => "CondIBSection", "DATA" => Array("logic" => "Equal", "value" => $sofasSectId)))
			)
		);
		CCatalogDiscount::Add($arF);
	}

	if(\Bitrix\Main\Loader::includeModule('sale'))
	{
		$strapIds = array();
		$specificConditions = array();
		$dbItem = CIBlockElement::GetList(Array(), Array(
			"CODE" => array(
				"strap-elegance",
				"strap-rainbow",
				"strap-weaving",
				"strap-classics",
			),
			"IBLOCK_ID"=>$IBLOCK_CATALOG_ID,
			"IBLOCK_SITE_ID" => WIZARD_SITE_ID,
		), false, Array("nTopCount" => 100), Array(
			"ID",
			"IBLOCK_ID",
		));
		while($arItem = $dbItem->Fetch())
		{
			$strapIds[] = $arItem['ID'];
			$specificConditions[] = array(
				'CLASS_ID' => 'CondIBElement',
				'DATA' => array(
					'logic' => 'Equal',
					'value' => $arItem['ID'],
				),
			);
		}

		$name = GetMessage('WIZ_DISCOUNT_BASKET_GIFTS');
		$siteId = WIZARD_SITE_ID;
		$userGroupIds = array();

		$groupIterator = \Bitrix\Main\GroupTable::getList(array(
			'select' => array('ID'),
		));
		while($group = $groupIterator->fetch())
		{
			$userGroupIds[] = $group['ID'];
		}

		$arFields = array(
			'LID' => $siteId,
			'NAME' => $name,
			'ACTIVE_FROM' => '',
			'ACTIVE_TO' => '',
			'ACTIVE' => 'Y',
			'SORT' => '100',
			'PRIORITY' => '1',
			'LAST_DISCOUNT' => 'Y',
			'XML_ID' => '',
			'CONDITIONS' => array(
				'CLASS_ID' => 'CondGroup',
				'DATA' => array(
					'All' => 'OR',
					'True' => 'False',
				),
				'CHILDREN' => array(
					array(
						'CLASS_ID' => 'CondGroup',
						'DATA' => array(
							'All' => 'AND',
							'True' => 'True',
						),
						'CHILDREN' => array(
							array(
								'CLASS_ID' => 'CondBsktRowGroup',
								'DATA' => array(
									'logic' => 'Equal',
									'Value' => 1,
									'All' => 'OR',
								),
								'CHILDREN' => $specificConditions,
							),
							array(
								'CLASS_ID' => 'CondBsktRowGroup',
								'DATA' => array(
									'logic' => 'Equal',
									'Value' => 1,
									'All' => 'AND',
								),
								'CHILDREN' => array(),
							),
						),
					),
				),
			),
			'ACTIONS' => array(
				'CLASS_ID' => 'CondGroup',
				'DATA' => array(
					'All' => 'AND',
				),
				'CHILDREN' => array(
					array(
						'CLASS_ID' => 'GiftCondGroup',
						'DATA' => array(
							'All' => 'AND',
						),
						'CHILDREN' => array(
							array(
								'CLASS_ID' => 'GifterCondIBElement',
								'DATA' => array(
									'Type' => 'one',
									'Value' => $strapIds,
								),
							),
						),
					),
				),
			),
			'USER_GROUPS' => $userGroupIds,
		);

		if($strapIds)
		{
			CSaleDiscount::Add($arFields);
		}
	}

//precet
/*
	$dbProperty = CIBlockProperty::GetList(Array(), Array("IBLOCK_ID"=>$IBLOCK_CATALOG_ID, "CODE"=>"SALELEADER"));
	$arFields = array();
	while($arProperty = $dbProperty->GetNext())
	{
		$arFields["find_el_property_".$arProperty["ID"]] = "";
	}
	$dbProperty = CIBlockProperty::GetList(Array(), Array("IBLOCK_ID"=>$IBLOCK_CATALOG_ID, "CODE"=>"NEWPRODUCT"));
	while($arProperty = $dbProperty->GetNext())
	{
		$arFields["find_el_property_".$arProperty["ID"]] = "";
	}
	$dbProperty = CIBlockProperty::GetList(Array(), Array("IBLOCK_ID"=>$IBLOCK_CATALOG_ID, "CODE"=>"SPECIALOFFER"));
	while($arProperty = $dbProperty->GetNext())
	{
		$arFields["find_el_property_".$arProperty["ID"]] = "";
	}
	require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/interface/admin_lib.php");
	CAdminFilter::AddPresetToBase( array(
			"NAME" => GetMessage("WIZ_PRECET"),
			"FILTER_ID" => "tbl_product_admin_".md5($iblockType.".".$IBLOCK_CATALOG_ID)."_filter",
			"LANGUAGE_ID" => $lang,
			"FIELDS" => $arFields
		)
	);
	CUserOptions::SetOption("filter", "tbl_product_admin_".md5($iblockType.".".$IBLOCK_CATALOG_ID)."_filter", array("rows" => "find_el_name, find_el_active, find_el_timestamp_from, find_el_timestamp_to"), true);

	CAdminFilter::SetDefaultRowsOption("tbl_product_admin_".md5($iblockType.".".$IBLOCK_CATALOG_ID)."_filter", array("miss-0","IBEL_A_F_PARENT"));
*/

//delete 1c props
/*
	$arPropsToDelete = array("CML2_TAXES", "CML2_BASE_UNIT", "CML2_TRAITS", "CML2_ATTRIBUTES", "CML2_ARTICLE", "CML2_BAR_CODE", "CML2_FILES", "CML2_MANUFACTURER", "CML2_PICTURES");
	foreach ($arPropsToDelete as $code)
	{
		$dbProperty = CIBlockProperty::GetList(Array(), Array("IBLOCK_ID"=>$IBLOCK_CATALOG_ID, "XML_ID"=>$code));
		if($arProperty = $dbProperty->GetNext())
		{
			CIBlockProperty::Delete($arProperty["ID"]);
		}
		if ($IBLOCK_OFFERS_ID)
		{
			$dbProperty = CIBlockProperty::GetList(Array(), Array("IBLOCK_ID"=>$IBLOCK_OFFERS_ID, "XML_ID"=>$code));
			if($arProperty = $dbProperty->GetNext())
			{
				CIBlockProperty::Delete($arProperty["ID"]);
			}
		}
	}
*/
	
	// #IBLOCK_ID_catalog_catalog#
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.'/_index.php', array('IBLOCK_ID_catalog_catalog' => $IBLOCK_CATALOG_ID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.'/include/footer/compares.php', array('IBLOCK_ID_catalog_catalog' => $IBLOCK_CATALOG_ID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.'/include/header/head_type1_menu.php', array('IBLOCK_ID_catalog_catalog' => $IBLOCK_CATALOG_ID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.'/include/header/head_type2_menu.php', array('IBLOCK_ID_catalog_catalog' => $IBLOCK_CATALOG_ID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.'/include/header/flyaway_head.php', array('IBLOCK_ID_catalog_catalog' => $IBLOCK_CATALOG_ID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.'/personal/favorite/index.php', array('IBLOCK_ID_catalog_catalog' => $IBLOCK_CATALOG_ID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.'/personal/viewed/index.php', array('IBLOCK_ID_catalog_catalog' => $IBLOCK_CATALOG_ID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.'/services/index.php', array('IBLOCK_ID_catalog_catalog' => $IBLOCK_CATALOG_ID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.'/auth/index.php', array('IBLOCK_ID_catalog_catalog' => $IBLOCK_CATALOG_ID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.'/brands/index.php', array('IBLOCK_ID_catalog_catalog' => $IBLOCK_CATALOG_ID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.'/catalog/index.php', array('IBLOCK_ID_catalog_catalog' => $IBLOCK_CATALOG_ID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.'/about/production/materials/index.php', array('IBLOCK_ID_catalog_catalog' => $IBLOCK_CATALOG_ID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.'/search/index.php', array('IBLOCK_ID_catalog_catalog' => $IBLOCK_CATALOG_ID));
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.'/include_areas/footer/index.php', array('IBLOCK_ID_catalog_catalog' => $IBLOCK_CATALOG_ID));
	// offers
	// #IBLOCK_ID_offers_offers#
	CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.'/personal/viewed/index.php', array('IBLOCK_ID_offers_offers' => $IBLOCK_OFFERS_ID));
}

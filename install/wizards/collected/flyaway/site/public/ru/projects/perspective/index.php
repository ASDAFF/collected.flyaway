<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Перспективные");
?><?$APPLICATION->IncludeComponent(
	"bitrix:news",
	"flyaway",
	array(
		"IBLOCK_TYPE" => "projects",
		"IBLOCK_ID" => "#IBLOCK_ID_projects_perspective#",
		"NEWS_COUNT" => "12",
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "#SITE_DIR#projects/perspective/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_ELEMENT_CHAIN" => "Y",
		"USE_PERMISSIONS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"RSMONOPOLY_LIST_TEMPLATES_LIST" => "gallery",
		"RSMONOPOLY_SHOW_BLOCK_NAME_LIST" => "N",
		"RSMONOPOLY_BLOCK_NAME_IS_LINK_LIST" => "N",
		"RSMONOPOLY_USE_OWL_LIST" => "N",
		"RSMONOPOLY_COLS_IN_ROW_LIST" => "4",
		"DISPLAY_NAME" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_ACTIVE_DATE_FORMAT" => "",
		"DISPLAY_DATE" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "MORE_PHOTO",
			2 => "",
		),
		"RSMONOPOLY_DETAIL_TEMPLATES" => "gallery",
		"RSMONOPOLY_LIST_TEMPLATES_DETAIL_USE" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"PAGER_TEMPLATE" => "flyaway",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"RSMONOPOLY_SHOW_BLOCK_NAME_DETAIL" => "Y",
		"RSMONOPOLY_BLOCK_NAME_IS_LINK_DETAIL" => "Y",
		"RSMONOPOLY_LIST_TEMPLATES_DETAIL" => "gallery",
		"RSMONOPOLY_USE_OWL_DETAIL" => "Y",
		"RSMONOPOLY_OWL_CHANGE_SPEED_DETAIL" => "500",
		"RSMONOPOLY_OWL_CHANGE_DELAY_DETAIL" => "8000",
		"RSMONOPOLY_OWL_PHONE_DETAIL" => "1",
		"RSMONOPOLY_OWL_TABLET_DETAIL" => "2",
		"RSMONOPOLY_OWL_PC_DETAIL" => "3",
		"COMPONENT_TEMPLATE" => "flyaway",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"RSMONOPOLY_PROP_MORE_PHOTO" => "MORE_PHOTO",
		"USE_REVIEW" => "N",
		"SET_LAST_MODIFIED" => "N",
		"RSFLYAWAY_LIST_TEMPLATES_LIST" => "services_main",
		"RSFLYAWAY_SHOW_BLOCK_NAME_LIST" => "N",
		"RSFLYAWAY_BLOCK_NAME_IS_LINK_LIST" => "N",
		"RSFLYAWAY_USE_OWL_LIST" => "N",
		"RSFLYAWAY_COLS_IN_ROW_LIST" => "3",
		"RSFLYAWAY_DETAIL_TEMPLATES" => "gallery",
		"RSFLYAWAY_LIST_TEMPLATES_DETAIL_USE" => "N",
		"RSFLYAWAY_DETAIL_USE_SUBSCRIBE" => "Y",
		"RSFLYAWAY_DETAIL_SUBSCRIBE_PAGE" => "/about/press_center/subscribe/",
		"RSFLYAWAY_DETAIL_SUBSCRIBE_NOTE" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"RSFLYAWAY_PROP_MORE_PHOTO" => "MORE_PHOTO",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

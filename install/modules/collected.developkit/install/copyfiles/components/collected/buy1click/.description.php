<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("COLLECT_COM_NAME__BIY1CLICK"),
	"DESCRIPTION" => GetMessage("COLLECT_COM_DESCR__BIY1CLICK"),
	"ICON" => "",
	"PATH" => array(
		"ID" => "collect_com",
		"SORT" => 2000,
		"NAME" => GetMessage("COLLECT_COM_COMPONENTS__BIY1CLICK"),
		"CHILD" => array(
			"ID" => "developkit",
			"NAME" => GetMessage("COLLECT_COM_DEV_COM__BIY1CLICK"),
			"SORT" => 8000,
		),
	),
);
?>
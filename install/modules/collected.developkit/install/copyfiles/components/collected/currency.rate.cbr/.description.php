<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("COLLECT_COM_NAME"),
	"DESCRIPTION" => GetMessage("COLLECT_COM_DESCRIPTION"),
	"ICON" => "",
	"PATH" => array(
		"ID" => "collect_com",
		"SORT" => 2000,
		"NAME" => GetMessage("COLLECT_COM_COMPONENTS"),
		"CHILD" => array(
			"ID" => "developkit",
			"NAME" => GetMessage("COLLECT_COM_DEV_COM"),
			"SORT" => 8000,
		),
	),
);
?>
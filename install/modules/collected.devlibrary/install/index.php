<?
/**
 * Copyright (c) 18/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

use \Bitrix\Main\ModuleManager;
use \Bitrix\Main\EventManager;
use \Bitrix\Main\Localization\Loc;

global $MESS;
$strPath2Lang = str_replace("\\", "/", __FILE__);
$strPath2Lang = substr($strPath2Lang, 0, strlen($strPath2Lang)-strlen("/install/index.php"));
include(GetLangFileName($strPath2Lang."/lang/", "/install/index.php"));

Class collected_devlibrary extends CModule
{
	var $MODULE_ID = "collected.devlibrary";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $MODULE_GROUP_RIGHTS = "Y";

	function collected_devlibrary()
	{
		$arModuleVersion = array();

		$path = str_replace("\\", "/", __FILE__);
		$path = substr($path, 0, strlen($path) - strlen("/index.php"));
		include($path."/version.php");

		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

		$this->MODULE_NAME = GetMessage("COLLECTED.DEVLIBRARY.INSTALL_NAME");
		$this->MODULE_DESCRIPTION = GetMessage("COLLECTED.DEVLIBRARY.INSTALL_DESCRIPTION");
		$this->PARTNER_NAME = GetMessage("COLLECTED.DEVLIBRARY.SPER_PARTNER");
		$this->PARTNER_URI = GetMessage("COLLECTED.DEVLIBRARY.PARTNER_URI");
	}

	function InstallDB($install_wizard = true)
	{
		global $DB, $DBType, $APPLICATION;

		ModuleManager::registerModule($this->MODULE_ID);

		return true;
	}

	function UnInstallDB($arParams = Array())
	{
		global $DB, $DBType, $APPLICATION;
		ModuleManager::unregisterModule($this->MODULE_ID);

		return true;
	}

	function InstallEvents()
	{
		RegisterModuleDependences('iblock', 'OnAfterIBlockElementAdd', 'collected.devlibrary', 'RSDevLibOffersExtension', 'OnAfterIBlockElementAddHandler',10000);
		RegisterModuleDependences('iblock', 'OnAfterIBlockElementUpdate', 'collected.devlibrary', 'RSDevLibOffersExtension', 'OnAfterIBlockElementUpdateHandler',10000);
		if (isModuleInstalled('catalog') && isModuleInstalled('sale'))
		{
			RegisterModuleDependences('catalog', 'OnPriceAdd', 'collected.devlibrary', 'RSDevLibOffersExtension', 'OnPriceUpdateAddHandler',10000);
			RegisterModuleDependences('catalog', 'OnPriceUpdate', 'collected.devlibrary', 'RSDevLibOffersExtension', 'OnPriceUpdateAddHandler',10000);
		}

		RegisterModuleDependences('main', 'OnEpilog', 'collected.devlibrary', 'RSSeo', 'addMetaOG', 10000);

		if (ModuleManager::isModuleInstalled('iblock'))
		{
			EventManager::getInstance()->registerEventHandler(
				'iblock',
				'OnIBlockPropertyBuildList',
				$this->MODULE_ID,
				'\Collected\DevLib\Iblock\Property',
				'OnIBlockPropertyBuildListStores'
			);

			EventManager::getInstance()->registerEventHandler(
				'iblock',
				'OnIBlockPropertyBuildList',
				$this->MODULE_ID,
				'\Collected\DevLib\Iblock\Property',
				'OnIBlockPropertyBuildListPrices'
			);

			EventManager::getInstance()->registerEventHandler(
				'iblock',
				'OnIBlockPropertyBuildList',
				$this->MODULE_ID,
				'\Collected\DevLib\Iblock\Property',
				'OnIBlockPropertyBuildListLocations'
			);
		}
        
        EventManager::getInstance()->registerEventHandler(
            'main',
            'onMainGeoIpHandlersBuildList',
            $this->MODULE_ID,
            '\Collected\DevLib\Sale\Location\Location',
            'onGeoIpHandlersBuildList'
        );

		return true;
	}

	function UnInstallEvents()
	{
		UnRegisterModuleDependences('iblock', 'OnAfterIBlockElementAdd', 'collected.devlibrary', 'RSDevLibOffersExtension', 'OnAfterIBlockElementAddHandler');
		UnRegisterModuleDependences('iblock', 'OnAfterIBlockElementUpdate', 'collected.devlibrary', 'RSDevLibOffersExtension', 'OnAfterIBlockElementUpdateHandler');
		if (isModuleInstalled('catalog') && isModuleInstalled('sale'))
		{
			UnRegisterModuleDependences('catalog', 'OnPriceAdd', 'collected.devlibrary', 'RSDevLibOffersExtension', 'OnPriceUpdateAddHandler');
			UnRegisterModuleDependences('catalog', 'OnPriceUpdate', 'collected.devlibrary', 'RSDevLibOffersExtension', 'OnPriceUpdateAddHandler');
		}

		UnRegisterModuleDependences('main', 'OnEpilog', 'collected.devlibrary', 'RSSeo', 'addMetaOG');

		if (ModuleManager::isModuleInstalled('iblock'))
		{
			EventManager::getInstance()->unRegisterEventHandler(
				'iblock',
				'OnIBlockPropertyBuildList',
				$this->MODULE_ID,
				'\Collected\DevLib\Iblock\Property',
				'OnIBlockPropertyBuildListStores'
			);

			EventManager::getInstance()->unRegisterEventHandler(
				'iblock',
				'OnIBlockPropertyBuildList',
				$this->MODULE_ID,
				'\Collected\DevLib\Iblock\Property',
				'OnIBlockPropertyBuildListPrices'
			);

			EventManager::getInstance()->unRegisterEventHandler(
				'iblock',
				'OnIBlockPropertyBuildList',
				$this->MODULE_ID,
				'\Collected\DevLib\Iblock\Property',
				'OnIBlockPropertyBuildListLocations'
			);
		}
        
        EventManager::getInstance()->unRegisterEventHandler(
            'main',
            'onMainGeoIpHandlersBuildList',
            $this->MODULE_ID,
            '\Collected\DevLib\Sale\Location\Location',
            'onGeoIpHandlersBuildList'
        );

		return true;
	}

	function InstallFiles()
	{
		COption::SetOptionString('collected.devlibrary', 'no_photo_path', '/bitrix/modules/collected.devlibrary/img/no-photo.png');
		$arFile = CFile::MakeFileArray($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/collected.devlibrary/img/no-photo.png');
		$fid = CFile::SaveFile($arFile, 'collected_devlibrary_nophoto');
		COption::SetOptionInt('collected.devlibrary', 'no_photo_fileid', $fid);

		CopyDirFiles($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/collected.devlibrary/install/js', $_SERVER['DOCUMENT_ROOT'].'/bitrix/js', true, true);


		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/collected.devlibrary/install/components", $_SERVER["DOCUMENT_ROOT"]."/bitrix/components", true, true);

		return true;
	}

	function UnInstallFiles()
	{
		DeleteDirFilesEx('/bitrix/js/collected.devlibrary');

		DeleteDirFiles(
			$_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/collected.devlibrary/install/themes/.default",
			$_SERVER["DOCUMENT_ROOT"]."/bitrix/themes/.default"
		);
		
		DeleteDirFiles(
			$_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/collected.devlibrary/install/components/collected",
			$_SERVER["DOCUMENT_ROOT"]."/bitrix/components/collected"
		);

		return true;
	}

	function InstallPublic()
	{
		return true;
	}

	function UnInstallPublic()
	{
		return true;
	}

	function InstallOptions()
	{
		COption::SetOptionString('collected.devlibrary', 'fakeprice_active', "Y" );
		COption::SetOptionString('collected.devlibrary', 'propcode_cml2link', "CML2_LINK" );
		COption::SetOptionString('collected.devlibrary', 'propcode_fakeprice', "PROD_PRICE_FALSE" );
		return true;
	}

	function UnInstallOptions()
	{
		COption::RemoveOption('collected.devlibrary');
		return true;
	}

	function DoInstall()
	{
		global $APPLICATION, $step;

		$this->InstallFiles();
		$this->InstallDB(false);
		$this->InstallOptions();
		$this->InstallEvents();
		$this->InstallPublic();

		$APPLICATION->IncludeAdminFile(GetMessage('COLLECTED.DEVLIBRARY.INSTALL_TITLE'), $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/collected.devlibrary/install/install.php');

		return true;
	}

	function DoUninstall()
	{
		global $APPLICATION, $step;

		$this->UnInstallDB();
		$this->UnInstallOptions();
		$this->UnInstallFiles();
		$this->UnInstallEvents();
		$this->UnInstallPublic();

		$APPLICATION->IncludeAdminFile(GetMessage('COLLECTED.DEVLIBRARY.UNINSTALL_TITLE'), $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/collected.devlibrary/install/uninstall.php');

		return true;
	}
}
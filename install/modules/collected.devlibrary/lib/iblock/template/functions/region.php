<?php

namespace Collected\DevLib\Iblock\Template\Functions;

use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Loader;

Loc::loadMessages(__FILE__);

class Region extends \Bitrix\Iblock\Template\Functions\FunctionBase
{
    public static function eventHandler($event)
    {
        $parameters = $event->getParameters();
        $functionName = $parameters[0];

        if ($functionName === "region")
        {
            return new \Bitrix\Main\EventResult(
               \Bitrix\Main\EventResult::SUCCESS,
               "\Collected\DevLib\Iblock\Template\Functions\Region"	
            );
        }
	}
  
	public function calculate($parameters)
	{
		$result = $this->parametersToArray($parameters);

		if (!Loader::includeModule('collected.devlibrary')) {
			return null;
		}

		if (!\Collected\DevLib\Sale\Location\Region::isUseRegionality()) {
			return null;
		}

        $arRegion = \Collected\DevLib\Sale\Location\Region::getCurrentRegion();
		
		$sResult = '';
		if (strlen($arRegion['NAME']) > 0) {
			$sResult = $arRegion['NAME'];
		}

        return $sResult;
	}
}
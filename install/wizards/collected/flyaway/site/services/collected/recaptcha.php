<?php
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

$module_id = 'collected.recaptcha';

if($obModule = CModule::CreateModuleObject($module_id)){
	if(!$obModule->IsInstalled()){
		$obModule->DoInstall();
	}
}
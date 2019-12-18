<?php
/**
 * Copyright (c) 18/12/2019 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

if (!defined('WIZARD_THEME_ID') || WIZARD_THEME_ID == "default")
	return;

$moduleId = 'collected.flyaway';
$content = WIZARD_THEME_ID;
$isUtf = 'N';
if (defined('BX_UTF')) {
	$isUtf = 'Y';
}

$gzFileName = $content.'.tar.gz';
$folderPath = '/upload/rs_download_data/'.$moduleId.'/';
$gzFilePath = $folderPath.$gzFileName;
if (file_exists($_SERVER['DOCUMENT_ROOT'].$gzFilePath)) {
	return true;
}

$gzRemoteFile = 'https://asdaff.github.io/module_upload/?moduleid='.$moduleId.'&content='.$content.'&is_utf='.$isUtf.'';

CheckDirPath($_SERVER['DOCUMENT_ROOT'].$folderPath);

$arFile = CFile::MakeFileArray($gzRemoteFile);

CopyDirFiles($arFile['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$gzFilePath);

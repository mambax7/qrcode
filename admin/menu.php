<?php
//  ------------------------------------------------------------------------ //
//  Author: Designburo.nl (info@designburo.nl)                               //
//  http://www.designburo.nl                                                 //
//  Project: QRcode v1.0                                                     //
//  ------------------------------------------------------------------------ //

$moduleDirName = basename(dirname(__DIR__));

if (false !== ($moduleHelper = Xmf\Module\Helper::getHelper($moduleDirName))) {
} else {
    $moduleHelper = Xmf\Module\Helper::getHelper('system');
}


$pathIcon32    = \Xmf\Module\Admin::menuIconPath('');
$pathModIcon32 = $moduleHelper->getModule()->getInfo('modicons32');

$moduleHelper->loadLanguage('modinfo');

$adminmenu[] = [
    'title' => _AM_MODULEADMIN_HOME,
    'link'  => 'admin/index.php',
    'icon'  => $pathIcon32 . '/home.png'
];

$adminmenu[] = [
    'title' => _MI_QRCODE_NAME,
    'link'  => 'admin/main.php',
    'icon'  => $pathModIcon32 . '/manage.png'
];

$adminmenu[] = [
    'title' => _AM_MODULEADMIN_ABOUT,
    'link'  => 'admin/about.php',
    'icon'  => $pathIcon32 . '/about.png'
];
/*
$i                      = 1;
$adminmenu[$i]['title'] = _MI_QRCODE_HOME;
$adminmenu[$i]['link']  = 'admin/index.php';
$adminmenu[$i]['icon']  = 'assets/images/admin/home.png';
++$i;
$adminmenu[$i]['title'] = _MI_QRCODE_NAME;
$adminmenu[$i]['link']  = 'admin/main.php';
$adminmenu[$i]['desc']  = 'QRCodes 4 XOOPS';
$adminmenu[$i]['icon']  = 'assets/images/admin/qrcode.png';
++$i;
$adminmenu[$i]['title'] = _MI_QRCODE_ABOUT;
$adminmenu[$i]['link']  = 'admin/about.php';
$adminmenu[$i]['icon']  = 'assets/images/admin/about.png';
*/
// $adminmenu[2]['title'] = _MI_QRCODE_HELP;
// $adminmenu[2]['link'] = "admin/help.php";
// $adminmenu[2]['desc'] = 'Help on QRCode';
// $adminmenu[2]['icon'] = "assets/images/admin/help.png";

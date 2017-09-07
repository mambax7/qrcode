<?php

require_once __DIR__ . '/../../../include/cp_header.php';
//require_once __DIR__ . '/../../../class/xoopsformloader.php';

//require __DIR__ . '/../class/utility.php';
//require_once __DIR__ . '/../include/common.php';


$moduleDirName = basename(dirname(__DIR__));

if (false !== ($moduleHelper = Xmf\Module\Helper::getHelper($moduleDirName))) {
} else {
    $moduleHelper = Xmf\Module\Helper::getHelper('system');
}
/** @var Xmf\Module\Admin $adminObject */
$adminObject = Xmf\Module\Admin::getInstance();

$myts = MyTextSanitizer::getInstance();

if (!isset($GLOBALS['xoopsTpl']) || !($GLOBALS['xoopsTpl'] instanceof XoopsTpl)) {
    require_once $GLOBALS['xoops']->path('class/template.php');
    $xoopsTpl = new XoopsTpl();
}

$pathIcon16      = Xmf\Module\Admin::iconUrl('', 16);
$pathIcon32      = Xmf\Module\Admin::iconUrl('', 32);
$pathModIcon32 = $moduleHelper->getModule()->getInfo('modicons32');

// Local icons path
$xoopsTpl->assign('pathModIcon16', $pathIcon16);
$xoopsTpl->assign('pathModIcon32', $pathIcon32);

// Load language files
$moduleHelper->loadLanguage('admin');
$moduleHelper->loadLanguage('modinfo');
$moduleHelper->loadLanguage('main');


if ($xoopsUser) {
    $modulepermHandler = xoops_getHandler('groupperm');
    if (!$modulepermHandler->checkRight('module_admin', $xoopsModule->getVar('mid'), $xoopsUser->getGroups())) {
        redirect_header(XOOPS_URL, 1, _NOPERM);
    }
} else {
    redirect_header(XOOPS_URL . '/user.php', 1, _NOPERM);
}

if (!isset($xoopsTpl) || !is_object($xoopsTpl)) {
    require_once XOOPS_ROOT_PATH . '/class/template.php';
    $xoopsTpl = new XoopsTpl();
}

xoops_cp_header();
$adminObject = \Xmf\Module\Admin::getInstance();

// Define Stylesheet and JScript
$xoTheme->addStylesheet(XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/assets/css/admin.css');
//$xoTheme->addJavaScript( XOOPS_URL . "/modules/" . $xoopsModule->getVar("dirname") . "/admin/switcher.js" );

<?php
//  ------------------------------------------------------------------------ //
//  Author: Designburo.nl (info@designburo.nl)                               //
//  http://www.designburo.nl                                                 //
//  Project: QRcode v1.0                                                     //
//  ------------------------------------------------------------------------ //
require_once __DIR__ . '/../../../include/cp_header.php';
// if the site has no language defined, turn to English default
if (file_exists('../language/' . $xoopsConfig['language'] . '/main.php')) {
    include __DIR__ . '/../language/' . $xoopsConfig['language'] . '/main.php';
} else {
    include __DIR__ . '/../language/english/main.php';
}
$GLOBALS['xoopsOption']['template_main'] = 'help.tpl';
include XOOPS_ROOT_PATH . '/mainfile.php';
xoops_cp_header();

xoops_cp_footer();

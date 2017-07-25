<?php
/**
 * ****************************************************************************
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright  XOOPS Project
 * @license    http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package
 * @author
 *
 * Version :
 * ****************************************************************************
 */

//require_once __DIR__ . '/../../../include/cp_header.php';
//include __DIR__ . '/header.php';

require_once __DIR__ . '/header.php';
// Display Admin header
xoops_cp_header();

//require_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/class/admin.php';

$adminObject = \Xmf\Module\Admin::getInstance();

$adminObject->addConfigLabel(_AM_QRCODE_CONFIG_CHECK);
$adminObject->addLineConfigLabel(_AM_QRCODE_CONFIG_PHP, $xoopsModule->getInfo('min_php'), 'php');
$adminObject->addLineConfigLabel(_AM_QRCODE_CONFIG_XOOPS, $xoopsModule->getInfo('min_xoops'), 'xoops');

$adminObject->displayNavigation(basename(__FILE__));
$adminObject->displayIndex();

include __DIR__ . '/footer.php';
xoops_cp_footer();

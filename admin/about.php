<?php
/**
 * MyModule module
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright           XOOPS Project (https://xoops.org)
 * @license             http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package             MyModule
 * @since               2.5.0
 * @author              Mage, Mamba
 **/

require_once __DIR__ . '/../../../include/cp_header.php';
include XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
xoops_cp_header();
require_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/class/admin.php';
/** @var XoopsModuleHandler $moduleHandler */
$moduleHandler = xoops_getHandler('module');
$module_info   = $moduleHandler->get($xoopsModule->getVar('mid'));

$module_info = '<div id="about">
                <label>' . _AM_QRCODE_ABOUT_DESCRIPTION . '</label><text>' . $module_info->getInfo('description') . '</text><br>
                <label>' . _AM_QRCODE_ABOUT_RELEASEDATE . '</label><text class="bold">' . $module_info->getInfo('release_date') . '</text><br>
                <label>' . _AM_QRCODE_ABOUT_UPDATEDATE . '</label><text class="bold">' . formatTimestamp($xoopsModule->getVar('last_update'), 'm') . '</text><br>
                <label>' . _AM_QRCODE_ABOUT_MODULE_STATUS . '</label><text>' . $module_info->getInfo('module_status') . '</text><br>
                <label>' . _AM_QRCODE_ABOUT_WEBSITE . '</label><text><a class="tooltip" href="' . $module_info->getInfo('module_website_url') . '" rel="external" title="' . $module_info->getInfo('module_website_name') . ' - ' . $module_info->getInfo('module_website_url') . '">
                ' . $module_info->getInfo('module_website_name') . '</a></text></div>';

$about_admin = \Xmf\Module\Admin::getInstance();
$about_admin->addLabel($xoopsModule->getVar('name'));
$about_admin->addLabel(_AM_QRCODE_ABOUT_MODULE_INFO);
$about_admin->addLineLabel($xoopsModule->getVar('name'), '', 'xoopsfoundation@gmail.com', '', 'module');
$about_admin->addLineLabel(_AM_QRCODE_ABOUT_MODULE_INFO, $module_info, '', '', 'information');
$about_admin->addChangelogLabel(_AM_QRCODE_ABOUT_CHANGELOG);

echo $about_admin->displayNavigation(basename(__FILE__));
echo $about_admin->displayAbout();

require_once __DIR__ . '/footer.php';

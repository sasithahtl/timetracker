<?php
// +----------------------------------------------------------------------+
// | Anuko Time Tracker
// +----------------------------------------------------------------------+
// | Copyright (c) Anuko International Ltd. (https://www.anuko.com)
// +----------------------------------------------------------------------+
// | LIBERAL FREEWARE LICENSE: This source code document may be used
// | by anyone for any purpose, and freely redistributed alone or in
// | combination with other software, provided that the license is obeyed.
// |
// | There are only two ways to violate the license:
// |
// | 1. To redistribute this code in source form, with the copyright
// |    notice or license removed or altered. (Distributing in compiled
// |    forms without embedded copyright notices is permitted).
// |
// | 2. To redistribute modified versions of this code in *any* form
// |    that bears insufficient indications that the modifications are
// |    not the work of the original author(s).
// |
// | This license applies to this document only, not any other software
// | that it may be combined with.
// |
// +----------------------------------------------------------------------+
// | Contributors:
// | https://www.anuko.com/time_tracker/credits.htm
// +----------------------------------------------------------------------+

require_once('initialize.php');
import('form.Form');
import('ttGroupHelper');

// Access checks.
if (!(ttAccessAllowed('view_own_timesheets') ||
  ttAccessAllowed('manage_own_timesheets') ||
  ttAccessAllowed('view_timesheets') ||
  ttAccessAllowed('manage_timesheets') ||
  ttAccessAllowed('approve_timesheets'))) {
  header('Location: access_denied.php');
  exit();
}

if (!$user->isPluginEnabled('ts_NEVER_ENABLED')) { // Work in progress...
  header('Location: feature_disabled.php');
  exit();
}
// End of access checks.

//$invoices = ttGroupHelper::getActiveInvoices();

//$smarty->assign('invoices', $invoices);
$smarty->assign('title', $i18n->get('title.timesheets'));
$smarty->assign('content_page_name', 'invoices.tpl'); // TODO: fix this, too.
$smarty->display('index.tpl');
<?php
/*
** Zabbix
** Copyright (C) 2001-2017 Zabbix SIA
**
** This program is free software; you can redistribute it and/or modify
** it under the terms of the GNU General Public License as published by
** the Free Software Foundation; either version 2 of the License, or
** (at your option) any later version.
**
** This program is distributed in the hope that it will be useful,
** but WITHOUT ANY WARRANTY; without even the implied warranty of
** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
** GNU General Public License for more details.
**
** You should have received a copy of the GNU General Public License
** along with this program; if not, write to the Free Software
** Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
**/

require_once dirname(__FILE__).'/include/config.inc.php';

$refer=isset($_SERVER["HTTP_REFERER"])?$_SERVER["HTTP_REFERER"]:null;
$refer_param='~192.168.81.112:9444~';
if (preg_match($refer_param,$refer)==0) {
    DBstart();
    add_audit_details(AUDIT_ACTION_LOGOUT, AUDIT_RESOURCE_USER, CWebUser::$data['userid'], '', _('Manual Logout'),
    CWebUser::$data['userid']);
    DBend(true);
    CWebUser::logout();
    redirect('index.php');
}

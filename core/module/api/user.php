<?php
/*-----------------------------------------------------------------
！！！！警告！！！！
以下为系统文件，请勿修改
-----------------------------------------------------------------*/


//不能非法包含或直接执行
if(!defined("IN_BAIGO")) {
    exit("Access Denied");
}

include_once(BG_PATH_FUNC . "init.func.php"); //管理员通用
fn_init(true, false, "Content-type: application/json", true, "ajax");

include_once(BG_PATH_CONTROL . "api/user.class.php"); //载入商家控制器

$api_user = new API_USER(); //初始化商家

switch ($GLOBALS["act_post"]) {
    case "reg":
        $api_user->api_reg();
    break;

    case "login":
        $api_user->api_login();
    break;

    case "edit":
        $api_user->api_edit();
    break;

    case "mailbox":
        $api_user->api_mailbox();
    break;

    case "nomail":
        $api_user->api_nomail();
    break;

    case "forgot":
        $api_user->api_forgot();
    break;

    case "del":
        $api_user->api_del();
    break;

    default:
        switch ($GLOBALS["act_get"]) {
            case "get":
            case "read":
                $api_user->api_read();
            break;

            case "chkname":
            case "check_name":
                $api_user->api_chkname();
            break;

            case "chkmail":
            case "check_mail":
                $api_user->api_chkmail();
            break;
        }
    break;
}

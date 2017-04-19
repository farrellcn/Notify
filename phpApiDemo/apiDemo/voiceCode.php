<?php
/**
 * 发送语音验证码接口
 */
require_once("../../SendMail/Notify.php");
require_once("include/config.php");
require_once("include/httpUtil.php");

/**
 * url中{function}/{operation}?部分
*/
$funAndOperate = "call/voiceCode";

// 参数详述请参考http://miaodiyun.com/https-yuyinyanzhengma.html

// 生成body
$body = createBasicAuthData();
// 在基本认证参数的基础上添加短信内容和发送目标号码的参数
$body['verifyCode'] = "654321";
$body['called'] = '18501773353';
$body['callDisplayNumber'] = '02112305';
$body['playTimes'] = 3;

// 提交请求
$result = post($funAndOperate, $body);
echo("<br/>result:<br/><br/>");
var_dump($result);
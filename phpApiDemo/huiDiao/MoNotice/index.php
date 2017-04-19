<?php
/**
 * 上行短信
 */

// 获取请求数据
$reqStr = file_get_contents("php://input");

// 以json格式解析数据
$reqArray = json_decode($reqStr, true);

// 判断签名是否正确
$sig = md5($reqArray["accountId"] . "your key here" . $reqArray["timestamp"]);
if($sig != $reqArray["sig"])
{
	echo '{"respCode":"00006"}';
	return;
}

// TODO 业务处理。开发者根据自己的需求实现


// 响应
echo '{"respCode":"00000"}';
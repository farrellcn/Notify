<?php
/*
 *  Copyright (c) 2014 The CCP project authors. All Rights Reserved.
 *
 *  Use of this source code is governed by a Beijing Speedtong Information Technology Co.,Ltd license
 *  that can be found in the LICENSE file in the root of the web site.
 *
 *   http://www.yuntongxun.com
 *
 *  An additional intellectual property rights grant can be found
 *  in the file PATENTS.  All contributing project authors may
 *  be found in the AUTHORS file in the root of the source tree.
 */

include_once("CCPRestSDK.php");

//主帐号
$accountSid= '8aaf07085b5fee9a015b8518f9920f89';

//主帐号Token
$accountToken= 'd62192c33b7e40699ebd2a296148f2a5';

//应用Id
$appId='8aaf07085b5fee9a015b8518fb750f90';

//请求地址，格式如下，不需要写https://
$serverIP='app.cloopen.com';

//请求端口 
$serverPort='8883';

//REST版本号
$softVersion='2013-12-26';

    /**
    * 外呼通知
    * @param to 被叫号码
    * @param mediaName 语音文件名称，格式 wav。与mediaTxt不能同时为空。当不为空时mediaTxt属性失效。
    * @param mediaTxt 文本内容
    * @param displayNum 显示的主叫号码
    * @param playTimes 循环播放次数，1－3次，默认播放1次。
    * @param respUrl 外呼通知状态通知回调地址，云通讯平台将向该Url地址发送呼叫结果通知。
    * @param userData 用户私有数据
    * @param maxCallTime 最大通话时长
    * @param speed 发音速度
    * @param volume 音量
    * @param pitch 音调
    * @param bgsound 背景音编号
    */
function landingCall($to,$mediaName,$mediaTxt,$displayNum,$playTimes,$respUrl,$userData,$maxCallTime,$speed,$volume,$pitch,$bgsound)
{
    // 初始化REST SDK
    global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
    $rest = new REST($serverIP,$serverPort,$softVersion);
    $rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);
    
    //调用外呼通知接口
    echo "Try to make a landingcall,called is $to <br/>";
    $result = $rest->landingCall($to,$mediaName,$mediaTxt,$displayNum,$playTimes,$respUrl,$userData,$maxCallTime,$speed,$volume,$pitch,$bgsound);
    if($result == NULL ) {
        echo "result error!";
        break;
    }
    if($result->statusCode!=0) {
        echo "error code :" . $result->statusCode . "<br>";
        echo "error msg :" . $result->statusMsg . "<br>";
        //TODO 添加错误处理逻辑
    } else{
        echo "landingcall success!<br>";
        // 获取返回信息
        $landingCall = $result->LandingCall;
        echo "callSid:".$landingCall->callSid."<br/>";
        echo "dateCreated:".$landingCall->dateCreated."<br/>";
        //TODO 添加成功处理逻辑
    }  
}

//Demo调用,参数填入正确后，放开注释可以调用
landingCall("17187796343","","Hello","02103225","2","",'用户私有数据','60','0','0','0','0'); 
?>

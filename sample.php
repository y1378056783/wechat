<?php
require_once "sign.php";
//"wx0f9a3c1edefd635b", "deb3432327777eb4aa5592b43db07727"
$jssdk = new Sign("wx8f4cc7237d9b243f","0bf20abff1f0b6c94b8041e67a05ece3");
$signPackage = $jssdk->getSignPackage();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta charset="UTF-8">
  <title>test</title>
  <style type="text/css">
    p{word-break: break-all;}
  </style>
</head>
<body>
  <h2 align="center">WXSDK Test</h2>
  <?php echo '<p>'.$signPackage["rawString"].'</p>'; ?>
</body>
<script src="//res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
    debug: true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: ["onMenuShareTimeline","onMenuShareAppMessage","onMenuShareQQ","onMenuShareWeibo"]
  });
  wx.ready(function () {
    var title = 'test',
        desc = 'this is wx sdk!';
        link='http://www.midoogame.com',
        type=dataUrl='',
        imgUrl='//img.midoogame.com/game/2017/12/20/game_20171220164818_305.png';
    wx.onMenuShareTimeline({
        title   : title,
        link    : link,
        imgUrl  : imgUrl,
        success : function () { },
        cancel  : function () { }
    });
    wx.onMenuShareAppMessage({
        title   : title,
        desc    : desc,
        link    : link,
        imgUrl  : imgUrl,
        type    : type,
        dataUrl : dataUrl,
        success : function () { },
        cancel  : function () { }
    });
    wx.onMenuShareQQ({
        title   : title,
        desc    : desc,
        link    : link,
        imgUrl  : imgUrl,
        success : function () { },
        cancel  : function () {  }
    });
  });
</script>
</html>

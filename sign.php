<?php 

class Sign{
	private $appId;
  	private $appSecret;

	public function __construct($appId, $appSecret) {
	    $this->appId = $appId;
	    $this->appSecret = $appSecret;
	}
	public function getSignPackage() {
	    // 注意 URL 一定要动态获取，不能 hardcode.
	    $jsapiTicket='kgt8ON7yVITDhtdwci0qeXHIUPh4BNAcZ_qkrcVOv__M34vZjlv0u8lDAyNiASrVLkdBEM3EWQ9Fegy-YoytPg';
	    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	    $url = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];//$_GET['url'];
	    $timestamp = time();
	    $nonceStr = $this->createNonceStr();

	    // 这里参数的顺序要按照 key 值 ASCII 码升序排序
	    $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

	    $signature = sha1($string);

	    $signPackage = array(
	      "appId"     => $this->appId,
	      "nonceStr"  => $nonceStr,
	      "timestamp" => $timestamp,
	      "url"       => $url,
	      "signature" => $signature,
	      "rawString" => $string
	    );
	    return $signPackage;
	}

  private function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
  }
}
 ?>
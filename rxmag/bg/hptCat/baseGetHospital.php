<?php namespace base;

abstract class BaseGetAns{
	protected $url;
	protected $callTime;
	protected $referer;
	protected $lines_string;
	protected $rs;
	protected $timeOut;
	protected $postData;
	protected $SSL=false;
	protected $log = array();
	

	protected function init($nowUrl,$reUrl,$post=false) {
		$this->url = $nowUrl;
		$this->callTime =Date("Ymd H:i:s");
		$this->referer = $reUrl;
		$this->postData = $post;
		$this->timeOut = 10;
		$this->lines_string = $this->getResource();
		$this->rs = $this->writeEnd();
	}
	//擷取資訊
	abstract function writeEnd();
	//抓取html文檔
	function getResource(){
		$ch = curl_init();
		$options = array(
			CURLOPT_URL => $this->url,
			CURLOPT_HEADER => false,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36",
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_REFERER => $this->referer,
			CURLOPT_NOSIGNAL => true,
			CURLOPT_TIMEOUT => $this->timeOut,
			CURLOPT_CONNECTTIMEOUT => 10,
			CURLOPT_COOKIEJAR => dirname(__FILE__).DIRECTORY_SEPARATOR.'c00kie.txt',
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			// CURLOPT_SSLVERSION  => 3,
			CURLOPT_ENCODING => 'gzip'
		);
		if($this->SSL){
			curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		}
		if($this->postData) {
			$options[CURLOPT_POST] = true;
			$options[CURLOPT_POSTFIELDS] = http_build_query($this->postData);
		}
		curl_setopt_array($ch, $options);
		$result = curl_exec($ch);
		$curl_errno = curl_errno($ch);
		$curl_error = curl_error($ch);
		curl_close($ch);
		
		return $result;
	}
}

?>
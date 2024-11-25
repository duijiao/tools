<?php
//公众号：友享资源
header('Content-type:text/json');
index();
function index()
{  
  
    $url=$_GET["url"];
    $result = httpCurl($url,[],'GET');
    
    $src=$_GET["src"];
    $result1 = httpCurl($src,[],'GET');
    
    $down="/<li><a href=\"(.*?)\">下载地址/i";
    preg_match($down,$result1,$downn);
    // 图片
    $avatarRule = "/\"><img src=\"([^<>]*)\" width=\"668\".*?><\/li>/s"; 
    preg_match_all($avatarRule,$result,$avatar);
    $preg = '/<img src=[\"|\']?(.*?)[\"|\']?\s>/i';
   //标题
   
    $titleRule = "/<li>.*?<\/li>/s"; 
    preg_match_all($titleRule,$result,$title);
    $titleRulea = "/<img src=\"([^<>]*)\" width=\"668\".*?><\/li><li>/s";
 
    // 截取内容
    $titleRuleb = "/<img src=\"([^<>]*)\" width=\"668\".*?><\/li><li>/s";
    preg_match_all($titleRuleb,$result,$content);
    
    $link = "/<a href=\"\/.*?\/([^<>]*).html\" class=\"p-title\" target=\"_blank\">/s";
    preg_match_all($link,$result,$linkurl);

    $insert=[];
    $titleRulec = "/<div class=\"descBox\">([^<>]*)<\/div>/s";
    foreach ($content[0] as $k => $v) {
        // 图片
        preg_match($avatarRule, $avatar[0][$k], $imgs);
        $str = $imgs[1];
        $checkstr = 'http';
 
        preg_match($titleRulea, $content[0][$k], $url_title);        
        $arr['image']="https://www.ypppt.com".$url_title[1];// 标题
        
        preg_match($link, $linkurl[0][$k], $url);
        $strr=$url[1];
        //将字符串指定符号转为数组
        $sub_str=explode("/",$strr);        
        $insert[]=$arr;
    }
    $json = json_encode(array("code"=>200,"down"=>$downn[1],"msg"=>"资源来源：优品；工具盒子采集","data"=>$insert), JSON_UNESCAPED_UNICODE); 
    echo $json;die;
}
function httpCurl($url, $params, $method = 'POST', $header = array(), $multi = false){
    date_default_timezone_set('PRC');
    $opts = array(
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_HTTPHEADER     => $header,
        CURLOPT_COOKIESESSION  => true,
        CURLOPT_FOLLOWLOCATION => 1,
        CURLOPT_COOKIE         =>session_name().'='.session_id(),
    );
    /* 根据请求类型设置特定参数 */
    switch(strtoupper($method)){
        case 'GET':
            // $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
            // 链接后拼接参数  &  非？
            $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
            break;
        case 'POST':
            //判断是否传输文件
            $params = $multi ? $params : http_build_query($params);
            $opts[CURLOPT_URL] = $url;
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = $params;
            break;
        default:
            echo '不支持的请求方式！';
    }
    /* 初始化并执行curl请求 */
    $ch = curl_init();
    curl_setopt_array($ch, $opts);
    $data  = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    // if($error) throw new Exception('请求发生错误：' . $error);
    return  $data;
    
}
 ?>


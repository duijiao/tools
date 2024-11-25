<?php
/**
 * @采集爬取学习
 <ul class="layui-clear">
 
 <img class="lazy img" data-original="https://imgs.ymaaa.com/i/2022/12/04/638b84ed2e402.jpg" src="/images/defaultpic.gif" alt="闪豆视频下载器 v3.4.0 多平台视频批量下载"/></a>
    <a href="/html/1346.html" class="tit" target="_blank">闪豆视频下载器 v3.4.0 多平台视频批量下载</a><a href="/html/1346.html" class="link" target="_blank">查看</a><time class="">2023-05-13</time>
 */
 header('Content-type:text/json');
index();
function index()
{  
  
    $url=$_GET["url"];
    //$url = 'https://www.ypppt.com/article/2019/5617.html';
    $result = httpCurl($url,[],'GET');
    
    $src=$_GET["src"];
    $result1 = httpCurl($src,[],'GET');
    
    $down="/<li><a href=\"(.*?)\">下载地址/i";
    preg_match($down,$result1,$downn);
    //echo $result;
    // 图片
    $avatarRule = "/\"><img src=\"([^<>]*)\" width=\"668\".*?><\/li>/s"; 
    preg_match_all($avatarRule,$result,$avatar);
    $preg = '/<img src=[\"|\']?(.*?)[\"|\']?\s>/i';
   //标题
   
    $titleRule = "/<li>.*?<\/li>/s"; 
    preg_match_all($titleRule,$result,$title);
    //echo json_encode($title,JSON_UNESCAPED_UNICODE);
    $titleRulea = "/<img src=\"([^<>]*)\" width=\"668\".*?><\/li><li>/s";
 
    // 截取内容
    $titleRuleb = "/<img src=\"([^<>]*)\" width=\"668\".*?><\/li><li>/s";
    
    preg_match_all($titleRuleb,$result,$content);
    
   // echo json_encode($content,JSON_UNESCAPED_UNICODE);
    $link = "/<a href=\"\/.*?\/([^<>]*).html\" class=\"p-title\" target=\"_blank\">/s";
    preg_match_all($link,$result,$linkurl);
    
    
    $insert=[];
    $titleRulec = "/<div class=\"descBox\">([^<>]*)<\/div>/s";
    foreach ($content[0] as $k => $v) {
        //preg_match($titleRulec, $v, $arrc);
        // 简介
       // $arr['content']=trim($arrc[1]);
 
        // 图片
        preg_match($avatarRule, $avatar[0][$k], $imgs);
        //$arr['title']="https://www.ypppt.com".$imgs[1];
        $str = $imgs[1];
        $checkstr = 'http';
        
       /* 这里判断必须用双等号 !== 才有效果,因为可能返回等同false的布尔值
       if (strpos($str, $checkstr) !== false) {
            $arr['image']=$imgs[1];
        }else{
            $arr['image']="https://www.ypppt.com".$imgs[1];
        }*/
 
        preg_match($titleRulea, $content[0][$k], $url_title);        
        $arr['image']="https://www.ypppt.com".$url_title[1];// 标题
        
        
        preg_match($link, $linkurl[0][$k], $url);
       
        
        $strr=$url[1];
        //将字符串指定符号转为数组
        $sub_str=explode("/",$strr);
        //$arr['link']="https://www.ypppt.com/p/d.php?aid=".$sub_str[2];// 链接
        
        
        
        
        $insert[]=$arr;
    }
    //var_dump($insert);
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


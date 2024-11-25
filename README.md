<h3>#工具box开源接口</h3>

  🔵主页模板接口获取实例(hqppt.php)：
  <br>
> http://域名/hqppt.php? `page ` =1&amp; `name` =总结
  <br>
  <table><thead><tr><th>参数名</th><th>参数值</th><th>是否必填</th><th>参数类型</th><th>描述说明</th></tr></thead>
    <tbody>
      <tr>
        <td><span>page</span></td><td>1</td></td><td>否</td><td>int</td><td>页数</td>
      </tr>
      <tr>
        <td><span>name</span></td><td>zongjie</td></td><td>否</td><td>string</td><td>模板分类、类型如下：<br>zongjie/总结，jianyue/简约，zhongguo/中国风，dangjian/党建工作</td>
      </tr>
    </tbody>
  </table>
  <img width="600" src="https://github.com/duijiao/tools/blob/main/image.png?raw=true">
  <P>json数据说明</P>
  <table><thead><tr><th>名称</th><th>描述说明</th></tr></thead>
    <tbody>
      <tr>
        <td><span>image</span></td><td>封面图片地址</td>
      </tr>
      <tr>
        <td><span>title</span></td><td>PPT模板标题</td>
      </tr>
      <tr>
        <td><span>link1</span></td><td>PPT模板预览地址</td>
      </tr>
      <tr>
        <td><span>link</span></td><td>PPT模板下载id，获取方式：https://www.ypppt.com/p/d.php?aid=加获取的id</td>
      </tr>
    </tbody>
  </table>


  🔵搜索模板接口获取实例(ssppt.php)：
  <br>
  > http://域名/ssppt.php? `page` =1&amp; `name` =总结
  <br>
  <table><thead><tr><th>参数名</th><th>参数值</th><th>是否必填</th><th>参数类型</th><th>描述说明</th></tr></thead>
    <tbody>
      <tr>
        <td><span>page</span></td><td>1</td></td><td>否</td><td>int</td><td>页数</td>
      </tr>
      <tr>
        <td><span>name</span></td><td>zongjie</td></td><td>是</td><td>string</td><td>搜索模板名字</td>
      </tr>
    </tbody>
  </table>
  <img width="600" src="https://github.com/duijiao/tools/blob/main/image.png?raw=true">
  <P>json数据说明</P>
  <table><thead><tr><th>名称</th><th>描述说明</th></tr></thead>
    <tbody>
      <tr>
        <td><span>image</span></td><td>封面图片地址</td>
      </tr>
      <tr>
        <td><span>link1</span></td><td>PPT模板预览地址</td>
      </tr>
      <tr>
        <td><span>link</span></td><td>PPT模板下载id，获取方式：https://www.ypppt.com/p/d.php?aid=加获取的id</td>
      </tr>
    </tbody>
  </table>

  🔵模板查看下载接口获取实例(pptzs.php)：
  <br>
> http://域名/pptzs.php? `url` =上面获取到的：link1&amp; `src` =link
  <br>
  <table><thead><tr><th>参数名</th><th>参数值</th><th>是否必填</th><th>参数类型</th><th>描述说明</th></tr></thead>
    <tbody>
      <tr>
        <td><span>url</span></td><td>link1</td></td><td>是</td><td>int</td><td>前面获取到的：link1</td>
      </tr>
      <tr>
        <td><span>src</span></td><td>link</td></td><td>是</td><td>string</td><td>前面获取到的：link</td>
      </tr>
    </tbody>
  </table>
  <img width="600" src="https://github.com/duijiao/tools/blob/main/image.png?raw=true">
  <p>json数据说明</p>
  <table><thead><tr><th>名称</th><th>描述说明</th></tr></thead>
    <tbody>
      <tr>
        <td><span>image</span></td><td>图片列表</td>
      </tr>
      <tr>
        <td><span>down</span></td><td>PPT模板下载链接</td>
      </tr>
     
    </tbody>
  </table>
<h3>#关注我们</h3>
<p style="color:red">
微信公众号：友享资源</p>
<img width="250" src="https://github.com/duijiao/tools/blob/main/qrcode_for_gh_407a4f664545_258.jpg?raw=true">

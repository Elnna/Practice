<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Graham Huang Project</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
        <div class="navbar-wrapper">
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapsed" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">Graham</a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                       <ul class="nav navbar-nav">
                           <li class="active"><a href="#">Home</a></li>
                           <li class="dropdown">
                               <a id="drupal-dw" class="dropdown-toggle" data-toggle="dropdown" href="#">Drupal</a>
                               <ul class="dropdown-menu" role="menu" aria-labelledby="drupal-dw">
                                   <li role="presentation">
                                       <a role="menuitem" tabindex="-1" target="_blank" href="http://mall.voguem.com">Vogue Mall</a></li>
                                   <li role="presentation">
                                       <a role="menuitem" tabindex="-1" href="#">Locus Club</a></li>
                                   <li role="presentation">
                                       <a role="menuitem" tabindex="-1" href="#">CJ Home</a></li>
                               </ul>
                               
                           </li>
                           <li class="dropdown">
                               <a id="other-dw" class="dropdown-toggle" data-toggle="dropdown" href="#">Other</a>
                               <ul class="dropdown-menu" role="menu" aria-labelledby="other-dw">
                                   <li role="presentation">
                                       <a role="menuitem" tabindex="-1" href="#">XML TABLE</a></li>
                               </ul>
                           </li>
                           <li><a href="#">Contact</a></li>
                           <li><a href="practice.php">Practice</a></li>
                       </ul> 
                    </div>
                </div>
            </div>
        </div>
        <div class="php-review">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                PHP REVIEW TESTs
                            </a>
                        </h4>
                    </div>
                    <div id="collpaseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <dl>
                                <dt>1.用PHP打印出前一天的时间格式是2006-5-10 22:21:21</dt>
                                <pre>
                                <dd><kbd><kbd>date_default_timezone_set('Asia/Shanghai');</kbd><kbd>echo date("Y-m-d H:i:s", strtotime("-1 day"));</kbd></kbd></dd>
                                <dd><?php       date_default_timezone_set('Asia/Shanghai'); 
                                    
                                echo date("Y-m-d H:i:s", strtotime("-1 day"));
                                    ?></dd>
                                </pre>
                                
                                <dt>2.echo, print(), print_r(), sprintf(), var_dump(), var_export() 的区别</dt>
                                <pre>
                                <dd><kbd>echo</kbd>输出一个或多个字符串,语句没有返回值 </dd>
                                <dd><kbd>print()</kbd>输出一个或多个字符串,或一个变量，有返回值</dd>
                                <dd><kbd>print_r()</kbd>显示关于一个变量的易于理解的信息。如果给出的是 string、integer 或 float，将打印变量值本身。如果给出的是 array，将会按照一定格式显示键和元素。</dd>
                                <dd><kbd>$a = array ('a' => 'apple', 'b' => 'banana', 'c' => array ('x','y','z'));print_r ($a);</kbd>
                                <?php $a = array ('a' => 'apple', 'b' => 'banana', 'c' => array ('x','y','z'));print_r ($a);
                                    ?>
                                
                                </dd>
                                
                                <dd><kbd>var_dump()</kbd>此函数显示关于一个或多个表达式的结构信息，包括表达式的类型与值。数组将递归展开值，通过缩进显示其结构。</dd>
                                <dd><kbd>var_export()</kbd>此函数返回关于传递给该函数的变量的结构信息，它和 var_dump() 类似，不同的是其返回的表示是合法的 PHP 代码。</dd>
                                <?php $res = fopen('./test.xml','r');?>
                                <dd><kbd>$res = fopen('./test.xml','r');</kbd></dd>
                                 <dd><kbd>var_dump($res);//<?php var_dump($res);?></kbd></dd>
                                <dd><kbd> var_dump($res);//<?php var_export($res);?></kbd></dd>
                                </pre>
                                <dt>3.能够使HTML和PHP分离使用的模板引擎</dt>
                                <pre><dd>Smarty,Dwoo,TinyButStrong,Template Lite,Savant,phemplate,XTemplate</dd></pre>
                                <dt>4.使用哪些工具进行版本控制?</dt>
                                <pre><dd>git</dd></pre>
                                <dt>5.怎么实现字符翻转?</dt>
                                <pre>
                                <dd> function getRev($str,$encoding='utf-8'){
                                        $result = '';
                                        $len = mb_strlen($str);
                                        for($i=$len-1; $i>=0; $i--){
                                            $result .= mb_substr($str,$i,1,$encoding);
                                        }
                                        return $result;
                                    }
                                    $string = 'OK你是正确的Ole';
                                    echo getRev($string);</dd>
                                <dd><?php
                                    function getRev($str,$encoding='utf-8'){
                                        $result = '';
                                        $len = mb_strlen($str);
                                        for($i=$len-1; $i>=0; $i--){
                                            $result .= mb_substr($str,$i,1,$encoding);
                                        }
                                        return $result;
                                    }
                                    $string = 'OK你是正确的Ole';
                                    echo getRev($string);

                                ?></dd>
                                </pre>
                                <dt>6.PHP是什么意思</dt>
                                <pre><dd>PHP: Hypertext Preprocessor;超文本预处理器，一种通用开源脚本语言</dd></pre>
                                <dt>7.MYSQL取得当前时间的函数是?，格式化日期的函数是</dt>
                                <pre><dd>now();date_format('%Y-%m-%d')</dd></pre>
                                <dt>8.实现中文字串截取无乱码的方法</dt>
                                <pre>
                                <dd><kbd>echo mb_substr('这样一来我的字符串就不会有乱码^_^', 0, 7, 'utf-8');</kbd></dd>
                                <dd><?php echo mb_substr('这样一来我的字符串就不会有乱码^_^', 0, 7, 'utf-8');?></dd>
                                </pre>
                                <dt>9.用PHP写出显示客户端IP与服务器IP的代码</dt>
                                <pre>
                                <dd>打印客户端IP:</dd>
                                <dd><kbd>echo $_SERVER['REMOTE_ADDR'];</kbd>//<?php echo $_SERVER['REMOTE_ADDR']; ?></dd>
                                <dd><kbd>getenv('REMOTE_ADDR');</kbd>//<?php echo getenv('REMOTE_ADDR');?></dd>
                                <dd>打印服务器端IP:</dd>
                                <dd><kbd>echo gethostbyname('www.voguem.com');</kbd>//<?php echo gethostbyname('www.voguem.com'); ?></dd>
                                <dd>本页地址:</dd>
                                <dd><kbd>echo $_SERVER['PHP_SELF'];</kbd>//<?php echo $_SERVER['PHP_SELF']; ?></dd>
                                <dd>链接到当前页面的前一页面的 URL 地址:</dd>
                                <dd><kbd>echo $_SERVER['HTTP_REFERER'];</kbd>//<?php echo $_SERVER['HTTP_REFERER']; ?></dd>
                                <dd>执行脚本的绝对路径名:</dd>
                                <dd><kbd>echo $_SERVER['SCRIPT_FILENAME'];</kbd>//<?php echo $_SERVER["SCRIPT_FILENAME"]; ?></dd>
                                <dd>正在浏览当前页面用户的 IP 地址:</dd>
                                <dd><kbd>echo $_SERVER["REMOTE_ADDR"];</kbd>//<?php echo $_SERVER["REMOTE_ADDR"]; ?></dd>
                                <dd>当前运行脚本所在的文档根目录:</dd>
                                <dd><kbd>echo $_SERVER["DOCUMENT_ROOT"];</kbd>//<?php echo $_SERVER["DOCUMENT_ROOT"];?></dd>
                                
                                </pre>
                                <dt>10.如何修改SESSION的生存时间</dt>
                                <pre>
                                <dd><kbd>$lifeTime = 24 * 3600;session_set_cookie_params($lifeTime);session_start();</kbd></dd>
                                </pre>
                                
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="../js/jquery-1.12.2.min.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/main.js"></script>
    </body>
</html>




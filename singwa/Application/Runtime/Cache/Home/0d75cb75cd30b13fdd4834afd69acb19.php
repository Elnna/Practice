<?php if (!defined('THINK_PATH')) exit(); $config = D('Basic')->select(); $navs = D('Menu')->getBarMenus(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo ($config["title"]); ?></title>
  <meta name="keywords" content="<?php echo ($config["keywords"]); ?>"/>
  <meta name="description" content="<?php echo ($config["description"]); ?>"/>
  <link rel="stylesheet" href="/singwa/Public/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="/singwa/Public/css/home/main.css" type="text/css" />
</head>
<body>
<header id="header">
  <div class="navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a href="/">
          <img src="/singwa/Public/images/logo.png" alt="">
        </a>
      </div>
      <ul class="nav navbar-nav navbar-left">
        <li><a href="/" <?php if($res['catId'] == 0): ?>class="curr"<?php endif; ?>>首页</a></li>
        <?php if(is_array($navs)): foreach($navs as $key=>$nav): ?><li><a href="/singwa/index.php?c=cat&id=<?php echo ($nav["menu_id"]); ?>" <?php if($nav['menu_id'] == $res['catId']): ?>class="curr"<?php endif; ?>><?php echo ($nav["name"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
  </div>
</header>
<?php $news = $res['news'];?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-9">
       
        <div class="news-detail">
            <h1><?php echo ($news["title"]); ?></h1>
            <?php echo ($news["content"]); ?>
        </div>
        
      </div>
      
      <!--网站右侧-->
      <div class="col-sm-3 col-md-3">
        <div class="right-title">
          <h3>文章排行</h3>
          <span>TOP ARTICLES</span>
        </div>
        <div class="right-content">
          <ul>
              <?php if(is_array($res['rankNews'])): $k = 0; $__LIST__ = $res['rankNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rnew): $mod = ($k % 2 );++$k;?><li class="num<?php echo ($k); ?> curr">
                  <a href="/singwa/index.php?c=detail&id=<?php echo ($rnew["news_id"]); ?>"><?php echo ($rnew["small_title"]); ?></a>
                  <?php if($k == 1): ?><div class="intro">
                        <?php echo ($rnew["description"]); ?>
                    </div><?php endif; ?>
                 
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </div>
        <?php if(is_array($res['ads'])): $k = 0; $__LIST__ = $res['ads'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ad): $mod = ($k % 2 );++$k;?><div class="right-hot">
            
            <img src="/singwa/<?php echo ($ad["thumb"]); ?>" alt="<?php echo ($ad["name"]); ?>">
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
    </div>
  </div>
</section>
</body>
</html>
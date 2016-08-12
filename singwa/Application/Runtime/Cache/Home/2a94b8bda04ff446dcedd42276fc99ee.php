<?php if (!defined('THINK_PATH')) exit(); $config = D('Basic')->select(); $navs = D('Menu')->getBarMenus(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo ($config["title"]); ?></title>
  <meta name="keywords" content="<?php echo ($config["keywords"]); ?>"/>
  <meta name="description" content="<?php echo ($config["description"]); ?>"/>
  <link rel="stylesheet" href="/Public/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="/Public/css/home/main.css" type="text/css" />
</head>
<body>
<header id="header">
  <div class="navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a href="/">
          <img src="/Public/images/logo.png" alt="">
        </a>
      </div>
      <ul class="nav navbar-nav navbar-left">
        <li><a href="/" <?php if($res['catId'] == 0): ?>class="curr"<?php endif; ?>>首页</a></li>
        <?php if(is_array($navs)): foreach($navs as $key=>$nav): ?><li><a href="/index.php?c=cat&id=<?php echo ($nav["menu_id"]); ?>" <?php if($nav['menu_id'] == $res['catId']): ?>class="curr"<?php endif; ?>><?php echo ($nav["name"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
  </div>
</header>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-9">
        <div class="banner">
          <div class="banner-left">
              <div class="banner-info"><span>阅读数</span><i class="news_count node-<?php echo ($res['topPic'][0]['news_id']); ?>" news_id="<?php echo ($res['topPic'][0]['news_id']); ?>"><?php echo ($res['topPic'][0]['count']); ?></i></div>
            <a  target='_blank' href="/index.php?c=detail&id=<?php echo ($res['topPic'][0]['news_id']); ?>"><img width="670" height="360" src="<?php echo ($res['topPic'][0]['thumb']); ?>" alt="<?php echo ($res['topPic'][0]['title']); ?>"></a>
          </div>
          <div class="banner-right">
            <ul>
                <?php if(is_array($res['topSmallPic'])): $i = 0; $__LIST__ = $res['topSmallPic'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$smallPic): $mod = ($i % 2 );++$i;?><li>
                        <a target="_blank" href="/index.php?c=detail&id=<?php echo ($smallPic["news_id"]); ?>"><img width="150" height="113" src="<?php echo ($smallPic["thumb"]); ?>" alt="<?php echo ($smallPic["title"]); ?>"></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </div>
        </div>
        <div class="news-list">
            <?php if(is_array($res['lists'])): $i = 0; $__LIST__ = $res['lists'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><dl>
                    <dt><?php echo ($list["title"]); ?></dt>
                    <dd class="news-img">
                      <a target="_blank" href="/index.php?c=detail&id=<?php echo ($list["news_id"]); ?>"><img width="200" height="120" src="<?php echo ($list["thumb"]); ?>" alt=""></a>
                    </dd>
                    <dd class="news-intro">
                      <?php echo ($list["description"]); ?>
                    </dd>
                    <dd class="news-info">
                      <?php echo ($list["keywords"]); ?> <span><?php echo (date("Y-m-d H:i:s",$list["create_time"])); ?></span> 阅读(<i news_id="<?php echo ($list["news_id"]); ?>" class="news_count node-<?php echo ($list["news_id"]); ?>"><?php echo ($list["count"]); ?></i>)
                    </dd>
                  </dl><?php endforeach; endif; else: echo "" ;endif; ?>
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
                  <a href="/index.php?c=detail&id=<?php echo ($rnew["news_id"]); ?>"><?php echo ($rnew["small_title"]); ?></a>
                  <?php if($k == 1): ?><div class="intro">
                        <?php echo ($rnew["description"]); ?>
                    </div><?php endif; ?>
                 
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </div>
        <?php if(is_array($res['ads'])): $k = 0; $__LIST__ = $res['ads'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ad): $mod = ($k % 2 );++$k;?><div class="right-hot">
            
            <img src="<?php echo ($ad["thumb"]); ?>" alt="<?php echo ($ad["name"]); ?>">
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
    </div>
  </div>
</section>
</body>
<script src="/Public/js/jquery.js"></script>
<script src='/Public/js/count.js'></script>
</html>
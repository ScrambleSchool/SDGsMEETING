<!-- head 確認用-->
<?php if(substr($S_ADD,0,mb_strrpos($S_ADD,'.')) != substr($R_ADD,0,mb_strrpos($R_ADD,'.'))) { ?>

<?php } else { ?>
<section onclick="accordiondebugHeadList();">
  <style>
  #debug_head_list {
    background-color: white;
    display: none;
  }
  </style>
  <h3>HEAD INFOMATION</h3>
  <aside id="debug_head_list">
  <h5>$name</h5>
  <?php echo $name;?>
  <h5>$site_title</h5>
  <?php echo $site_title;?>
  <h5>$page_title</h5>
  <?php echo $page_title;?>
  <h5>$twitter</h5>
  <?php echo $twitter;?>
  <h5>$reality_id</h5>
  <?php echo $reality_id;?>
  <h5>$showroom_id</h5>
  <?php echo $showroom_id;?>
  <h5>$keyword_list</h5>
  <?php foreach ($keyword_list as $key => $value): ?>
    <?php if ( $value ) { echo $value; } ?><br />
  <?php endforeach; ?>
  <h5>$site_description</h5>
  <?php echo $site_description;?>
  <h5>$site_viewport</h5>
  <?php echo $site_viewport;?>
  <h5>$site_app_capable</h5>
  <?php echo $site_app_capable;?>
  <h5>$site_app_status_bar_style</h5>
  <?php echo $site_app_status_bar_style;?>
  <h5>$home_dir</h5>
  <a href="<?php echo $home_dir;?>"><?php echo $home_dir;?></a>
  <h5>$vtuber_dir</h5>
  <a href="<?php echo $vtuber_dir;?>"><?php echo $vtuber_dir;?></a>
  <h5>$vtuber_image_dir</h5>
  <?php if (file_exists($vtuber_image_dir)) { ?>
  <a href="<?php echo $vtuber_image_dir;?>"><?php echo $vtuber_image_dir;?></a>
  <?php } ?>
  <h5>$top_dir</h5>
  <a href="<?php echo $top_dir;?>"><?php echo $top_dir;?></a>
  <?php if (file_exists($top_image_dir)) { ?>
  <h5>$top_image_dir</h5>
  <a href="<?php echo $top_image_dir;?>"><?php echo $top_image_dir;?></a>
  <?php } ?>
  <h5>$site_rss</h5>
  <a href="<?php echo $site_rss;?>"><?php echo $site_rss;?></a>
  <h5>$site_media_handheld</h5>
  <a href="<?php echo $site_media_handheld;?>"><?php echo $site_media_handheld;?></a>
  <h5>$site_canonical</h5>
  <a href="<?php echo $site_canonical;?>"><?php echo $site_canonical;?></a>
  <h5>$site_main_css</h5>
  <a href="<?php echo $site_main_css;?>"><?php echo $site_main_css;?></a>
  <h5>$site_main_js</h5>
  <a href="<?php echo $site_main_js;?>"><?php echo $site_main_js;?></a>
  <h5>$common_php</h5>
  <a href="<?php echo $common_php;?>"><?php echo $common_php;?></a>
  <h5>$analytics_php</h5>
  <a href="<?php echo $analytics_php;?>"><?php echo $analytics_php;?></a>
  <h5>$head_php</h5>
  <a href="<?php echo $head_php;?>"><?php echo $head_php;?></a>
  <h5>$head_confirm_php</h5>
  <a href="<?php echo $head_confirm_php;?>"><?php echo $head_confirm_php;?></a>
  <h5>$site_image_icon_list</h5>
  <?php foreach ($site_image_icon_list as $key => $value): ?>
    <a href="<?php echo $value;?>"><img src="<?php if ( $value ) { echo $value; } ?>" /></a><br />
  <?php endforeach; ?>

<h5 style="padding-left: 30px;background-color:green;color:white;">head confirm</h5>
<h5>Content-Type</h5>
&lt;meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<h5>Content-Style-Type</h5>
&lt;meta http-equiv="Content-Style-Type" content="text/css" />
<h4>site main head</h4>
&lt;title><?php echo $site_title." - ".$name." - ".$page_title;?>	&lt;/title>
<h5>keywords</h5>
<?php if ($keyword_list) { ?>
  &lt;meta name="keywords" content="<?php if ( $keyword_list ) { echo join(",",$keyword_list); } else { echo "セミナー,クリエーター,育成,制作"; } ?>" />
<?php } ?>
<h5>description</h5>
&lt;meta name="description" content="<?php if ( $site_description ) { echo $site_description; } else { echo "クリエーターの可能性を引き出すサンストライプ - オフィシャルサイト。 すべての友達を笑顔に - すべての友達を可能性の光に変えて - http://sunstripe.main.jp/ - 掴まないといけないのは時代の流れなのかもしれない。"; } ?>" />
<h5>viewport</h5>
&lt;meta name="viewport" content="<?php if ( $site_viewport ) { echo $site_viewport; } else { echo "width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=10.0, user-scalable=yes"; }?>" />
<h5>robots</h5>
<?php if ($site_robots) { ?>
  &lt;meta name="robots" content="<?php echo $site_robots?>" />
<?php } ?>
<h5>site_app_capable</h5>
&lt;meta name="apple-mobile-web-app-capable" content="<?php if ( $site_app_capable ) { echo $site_app_capable; } else { echo "yes"; } ?>" />
<h5>site_app_status_bar_style</h5>
<?php if ($site_app_status_bar_style) { ?>
  &lt;meta name="apple-mobile-web-app-status-bar-style" content="<?php if ( $site_app_status_bar_style ) { echo $site_app_status_bar_style; } else { echo "default"; } ?>" />
<?php } ?>
<h5>icon</h5>
<?php foreach ($site_image_icon_list as $key => $value): ?>
  &lt;link rel="icon" type="image/png" href="<?php if ( $value ) { echo $value; } ?>" /><br />
<?php endforeach; ?>
<h4>facebook</h4>
&lt;meta property="og:url" content="<?php echo $fullPathURL; ?>" /><br />
&lt;meta property="og:type" content="website" /><br />
&lt;meta property="og:title" content="<?php echo $site_title; ?>" /><br />
&lt;meta property="og:description" content="<?php echo $site_description; ?>" /><br />
&lt;meta property="og:site_name" content="<?php echo $site_title; ?>" /><br />
&lt;meta property="og:image" content="<?php echo $site_image; ?>" /><br />
<h4>alternate</h4>
<h5>application_rss</h5>
&lt;link rel="alternate" type="application/rss+xml" title="RSS" content="<?php if ( $site_rss ) { echo $site_rss; } else { echo "http://sunstripe.main.jp/rss.xml"; } ?>" /><br />
&lt;link rel="alternate" media="handheld" href="<?php if ( $site_media_handheld ) { echo $site_media_handheld; } else { echo "http://sunstripe.main.jp/"; }?>" /><br />
&lt;link rel="canonical" href="<?php if ( $site_canonical ) { echo $site_canonical; } else { echo "http://sunstripe.main.jp/"; }?>" /><br />
<h4>CSS</h4>
<?php if (file_exists($site_main_css) || file_exists($home_dir."/css/styles.css")) { ?>
  &lt;link rel="stylesheet" type="text/css" href="<?php if ( $site_main_css ) { echo $site_main_css; } else { echo $home_dir."/css/styles.css"; }?>" />
<?php } ?>
<?php foreach ($site_css_list as $key => $value): ?>
<?php if (file_exists($value)) { ?>
    &lt;link rel="stylesheet" type="text/css" href="<?php if ( $value ) { echo $value; } ?>" /><br />
<?php } ?>
<?php endforeach; ?>
<h4>JavaScript</h4>
<?php if (file_exists($site_main_js) || file_exists($home_dir."/js/main.js")) { ?>
  &lt;script src="<?php if ( $site_main_js ) { echo $site_main_js; } else { echo $home_dir."/js/main.js"; }?>"></script><br />
<?php } ?>
<?php if (file_exists($top_dir."/js/main.js")) { ?>
  &lt;script src="<?php if ( $site_main_js ) { echo $top_dir."/js/main.js"; }?>"></script><br />
<?php } ?>
<?php foreach ($site_js_list as $key => $value): ?>
  <?php if (file_exists($value)) { ?>
  &lt;script src="<?php if ( $value ) { echo $value; } ?>"></script><br />
  <?php } ?>
<?php endforeach; ?>
</aside>
</section>
<script>
function accordiondebugHeadList() {
  var debug_head_list = document.getElementById("debug_head_list");
  if (debug_head_list.style.display != "none") {
    debug_head_list.style.display = "none";
  } else {
    debug_head_list.style.display = "block";
  }
}
</script>
<?php } ?>

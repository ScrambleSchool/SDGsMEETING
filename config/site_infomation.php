<?php
$api_dir = "..";
$api_version = "1.0";
$api_path = $api_dir."/api/".$api_version."/";

include($api_path."define.php");
include($api_path."index.php");

$dir = "./";

/// ヘッダー情報
$site_title = "みんなで考える SDGsMEETING 毎週水曜日 21:00 〜";
$site_keywords = "SDGsMEETING,SDGs,毎週水曜日,みんなで考えるの日,SDGs,VTuber,SDGsVTuber";
$site_description = "サンストライプでは、VTuber夢見がち🦄🐣👨‍🏫はSDGsについて考えて活動しております。";
$site_viewport = "width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=10.0, user-scalable=yes";
$site_app_capable = "yes";
$site_app_status_bar_style = "default";
$site_rss = "http://sunstripe.main.jp/rss.xml";
$site_media_handheld = "http://sunstripe.main.jp/";
$site_canonical = "http://sunstripe.main.jp/";
$site_main_css = "../css/styles.css";
$site_css_list = ["./css/styles.css",/*"./css/main.css",*/"../css/settings.css"];
$site_main_js = "../js/main.js";
$site_js_list = ["./js/main.js"];

/// サイトタイトル
$detail_text = "みんなで考える SDGsMEETING 毎週水曜日 21:00 〜";

$search_category = $_GET[category];

$event_data = getApiDataCurl("http://sunstripe.main.jp/SDGs/api/menu.json");
$event_listItem = getResult($event_data);
$SDGs_side_menu_item = $event_listItem[0];
$SDGs_side_menu_main_title = $SDGs_side_menu_item[title];
$SDGs_side_menu_list = $SDGs_side_menu_item[side_menu];

$SDGs_category_item = $event_listItem[1];
$SDGs_category_title = $SDGs_category_item[title];
$SDGs_category_list = $SDGs_category_item[category];
?>

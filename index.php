<?php include("./config/site_infomation.php"); ?>
<?php include("./config/site_DOCTYPEhtml.php"); ?>
<?php include("./class/SDGs.php"); ?>
<?php displaySDGsHeader($site_title); ?>

<?php

$video_file_name = "top_video_list";

?>

<div id="inner">

    <section id="side_menu">
      <h1><?php echo $SDGs_side_menu_main_title; ?></h1>
      <?php displaySDGsNav(); ?>

      <ul>
      <?php foreach ($SDGs_side_menu_list as $side_menu_no => $side_menu_item) { ?>
        <li><h1 onclick="eventAnalytics('sdgs_nav_buttonGoal<?php echo str_pad($side_menu_no, 2, '0', STR_PAD_LEFT); ?>',window.location.href,'click',this);"><a href="<?php echo $side_menu_item[URL]; ?>"><img src="./images/<?php echo $side_menu_item[URL]; ?>long.png" alt="<?php echo $side_menu_item[title]; ?>"/></a></h1></li>
      <?php } ?>
      </ul>
    </section>

    <main id="main_contents">
      <img id="main_visual" src="./images/SDGsMEETING.png">
      <h3>【SDGs】持続可能な開発目標（Sustainable Developement Goals、以下SDGs）</h3>
      <?php displaySDGsNav(); ?>
    </main>
<?php if ($search_category) { ?>
  <h2><?php echo $search_category; ?></h2>

<?php
  $search_list = [
    // "文化" => [
    //   [
    //     "description" => "文化に関する資料がまとまります。"
    //   ],
    //   [
    //     "title" => "文化２"
    //   ],
    // ],
  ];

  $search_item = $search_list[$search_category];
  if (is_array($search_item)) {
    foreach ($search_item as $num => $section) {
      // code... echo $num;1...8
      foreach ($section as $key => $value) {
        if ($key == "title") {
          echo $value."<br />";
        }
        if ($key == "description") {
          echo "<section>".$value."</section>";
        }
      }
    }
  } else {
    if ($search_item) {
      echo $search_item;
    }
  }
  ?>


<?php } ?>

<?php include("./commons/sdgs_video_list.php"); ?>

<section style="border-top: ridge rgba(0, 0, 155, .6);border-bottom: ridge rgba(0, 0, 155, .6);">
  <h3>NEWS</h3>
  <?php
  $ad_count = 0;
  foreach ($event_listItem as $event_no => $event_item) {
    //eventDisplay($event_listItem,$event_no,$event_item);
    $ad_count++;
    if ($ad_count % 3 == 0) {
      include("../commons/ad.php");
    }
  }

  ?>
</section>

<?php

$SDGs_member_video_list_data = getApiDataCurl("http://sunstripe.main.jp/SDGs/api/YuMeMiGaChiram_video_list.json");
$SDGs_member_video_list = getResult($SDGs_member_video_list_data);

?>

<section id="member_video_list" style="border-top: ridge rgba(0, 0, 155, .6);border-bottom: ridge rgba(0, 0, 155, .6);">
  <h3>おすすめ</h3>
  <?php
  $ad_count = 0;
  foreach ($SDGs_member_video_list as $video_no => $video_item) {
    if ($video_no < count($SDGs_member_video_list) - 4) {
      continue;
    }

    $video_sub_title = $video_item["sub_title"];
    $video_title = $video_item["title"];
    $youtube_video_id = $video_item["youtube_video_id"];
    $video_live_date = $video_item["live_date"];
    $SDGs_Goals = $video_item["Goals"];
?>
<section class="youtube_video">
<h4><?php echo $video_sub_title; ?></h4>
<h2><?php echo $video_title; ?></h2>

<aside style="overflow:scroll;">
  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube_video_id; ?>"
        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</aside>

<?php
foreach ($SDGs_Goals as $Goals_num => $Goals_item) {

  $SDGs_link = $Goals_item;
  if ($Goals_item == "SDGsGoals") {
    $SDGs_link = "./";
  }
?>
<?php
if ($Goals_num == 0) { ?>
<h3>
  <a href="<?php echo $SDGs_link; ?>"><img src="./images/<?php echo $Goals_item; ?>@290x290.png" style="width:200px;"></a>
</h3>
<?php }
if ($Goals_num != 0 && $Goals_num < count($SDGs_Goals)) { ?>
  <a href="<?php echo $SDGs_link; ?>"><img src="./images/<?php echo $Goals_item; ?>@290x290.png" style="width:55px;"></a>
<?php }
}
?>


<h6><?php echo $video_live_date; ?></h6>

</section>

<?php
    $ad_count++;
    if ($ad_count % 3 == 0) {
      include("../commons/ad.php");
    }
  }

  ?>
</section>
<style>
#member_video_list {
  text-align: center;
}

.youtube_video {

}
.youtube_video iframe {
    text-align: center;
}
.youtube_video aside {
  margin:auto;
}
</style>

  <section id="footer_menu">
    <?php displaySDGsNav(); ?>
    <?php echo $SDGs_category_title; ?>
    <ul>
    <?php foreach ($SDGs_category_list as $category_no => $category_item) { ?>
      <li><a href="./?category=<?php echo stringReplace("　","",$category_item[title]); ?>"><?php echo $category_item[title]; ?></a></li>
    <?php } ?>
    </ul>
  <section>

  </div>

    <?php displaySDGsFooter($site_title); ?>
  </body>
</html>

<?php include("./config/site_infomation.php"); ?>
<?php include("./config/site_DOCTYPEhtml.php"); ?>
<?php include("./class/SDGs.php"); ?>
<?php displaySDGsHeader($site_title); ?>

<?php

$video_file_name = "Goal07_video_list";

?>

<div id="inner">

    <?php
    $SDGs_page_nav_list = [
      [
          "title" => "TOP",
          "URL" => "./",
      ],
      [
          "title" => "Goal07",
          "URL" => "./Goal07",
      ],
    ]
    ?>
    <section id="side_menu">
      <h1><?php echo $SDGs_side_menu_main_title; ?></h1>
      <?php displaySDGsNav(); ?>
      <style>
      .nav_page {
        padding-left: 10px;
      }
      .nav_page a {
        color:white;
      }
      </style>
      <h2 class="nav_page"><?php foreach ($SDGs_page_nav_list as $SDGs_page_nav_no => $SDGs_page_nav_item) {
        $page_nav_title = $SDGs_page_nav_item[title];
        $page_nav_URL = $SDGs_page_nav_item[URL];
        ?>
        <a href="<?php echo $page_nav_URL; ?>" alt="<?php echo $page_nav_title; ?>" alt="<?php echo $page_nav_title; ?>"><?php echo $page_nav_title; ?></a>
        <?php if ($SDGs_page_nav_no != count($SDGs_page_nav_list) - 1) { ?>
          <span> > </span>
        <?php } ?>
      <?php } ?>
      </h2>

      <ul>
      <?php foreach ($SDGs_side_menu_list as $side_menu_no => $side_menu_item) { ?>
        <li><h1 onclick="eventAnalytics('sdgs_side_nav_buttonGoal<?php echo str_pad($side_menu_no + 1, 2, '0', STR_PAD_LEFT); ?>',window.location.href,'click',this);"><a href="<?php echo $side_menu_item[URL]; ?>"><img src="./images/<?php echo $side_menu_item[URL]; ?>long.png" alt="<?php echo $side_menu_item[title]; ?>"/></a></h1></li>
      <?php } ?>
      </ul>
    </section>

    <main id="main_contents">
      <img id="main_visual" src="./images/Goal07long.png">
      <h1>
        7. エネルギーをみんなにそしてクリーンに
      </h1>
      <p>
        全ての人々の、安価かつ信頼できる持続可能な近代的なエネルギーへのアクセスを確保する。
      </p>

      <?php
      $Goal_key = "Goal07";
      $targets_thema_list = targetsSDG();
      if (is_array($targets_thema_list[$Goal_key])) {
        foreach ($targets_thema_list[$Goal_key] as $key => $targets_thema_item) {
          if ($key == "title") {
            echo '<h2>'.$targets_thema_item.'</h2>';
          }
          if ($key == "items") {
            echo '<article id="target_item_description">';
            foreach ($targets_thema_item as $target_num => $target_item) {
              echo '<section class="target_item_description">'.$target_item["description"].'</section>';
            }
            echo '</article>';
          }
        }
      }
      ?>

    </main>

<?php include("./commons/sdgs_video_list.php"); ?>

  <section style="border-top: ridge rgba(0, 0, 155, .6);border-bottom: ridge rgba(0, 0, 155, .6);">
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
    $SDGs_Goals = $video_item["Goals"];
    $key = in_array("Goal07", $SDGs_Goals);
    if ($key == false) {
      continue;
    }

    $video_sub_title = $video_item["sub_title"];
    $video_title = $video_item["title"];
    $youtube_video_id = $video_item["youtube_video_id"];
    $video_live_date = $video_item["live_date"];
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
      <li><a href="?category=<?php echo $category_item[title]; ?>"><?php echo $category_item[title]; ?></a></li>
    <?php } ?>
    </ul>
  <section>

  </div>

    <?php displaySDGsFooter($site_title); ?>

  </body>
</html>

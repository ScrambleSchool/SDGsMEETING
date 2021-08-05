<?php include("./config/site_infomation.php"); ?>
<?php include("./config/site_DOCTYPEhtml.php"); ?>
<?php displaySDGsHeader($site_title); ?>
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

<style>
#SDGs_top_video_list {
  text-align: center;
}
</style>

<article id="SDGs_top_video_list">

<?php

$search_action = $_GET["action"];

// YouTube動画リンク集
$SDGs_top_video_list_data = getApiDataCurl("http://sunstripe.main.jp/SDGs/api/top_video_list.json");
$SDGs_top_video_list = getResult($SDGs_top_video_list_data);

function displayVideoList($video_list) {
  foreach ($video_list as $video_num => $video_item) {
    $video_title = $video_item["title"];
    $youtube_video_id = $video_item["youtube_video_id"];
?>
  <section style="overflow:scroll;">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube_video_id; ?>"
      title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <h2><?php echo $video_title; ?></h2>
  </section>
<?php
  // code...
  }
?>

<?php
}
displayVideoList($SDGs_top_video_list);

?>
</article> <!-- SDGs_top_video_list //-->

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


<?php if ($search_action == "edit") { ?>
<style>
/* // YouTubeVideoSetting Editing Start */
#youtube_video_setting {
  width: 100%;
  overflow: scroll;
  text-align: center;
}
#youtube_video_setting_table tr {
	background: #eee;
  height: 50px;
}
#youtube_video_setting_table tr:nth-child(odd) {
	background: #fff;
}

#youtube_video_setting_table th,#youtube_video_setting_table td{
  text-align: center;
  padding: 15px 0;
  height: 100%;
}
.youtube_video_setting_input {
  height: 50px;
}
.youtube_video_setting_title {
  width: 30%;
}
#youtube_video_setting_output {
  width: 100%;
  height: 400px;
}
#youtube_video_setting_save {
  display:none;
}
#youtube_video_setting_output_post {
  width: 100%;
  height: 400px;
}
</style>
<section id="youtube_video_setting">
<table id="youtube_video_setting_table" style="width:100%">
<?php foreach ($SDGs_top_video_list as $video_num => $video_item) {
  $video_title = $video_item["title"];
  $youtube_video_id = $video_item["youtube_video_id"];
?>
<tr>
  <th class="youtube_video_setting_title">項目</th>
  <th><?php echo $video_num; ?>：<span id="youtube_video_list[<?php echo $video_num; ?>][title]_title"><?php echo $video_title; ?></span></th>
</tr>
<tr>
<th class="youtube_video_setting_title"> title</th>
<td><input class="youtube_video_setting_input" id="youtube_video_list[<?php echo $video_num; ?>][title]" type="text" name="youtube_video_list[<?php echo $video_num; ?>][title]" onchange="changeInput(this,<?php echo $video_num; ?>,'title')" value="<?php echo $video_title; ?>" style="width:98%"/></td>
</tr>
<tr>
<th class="youtube_video_setting_title">youtube_id</th>
<td><input class="youtube_video_setting_input" id="youtube_video_list[<?php echo $video_num; ?>][youtube_id]" type="text" name="youtube_video_list[<?php echo $video_num; ?>][youtube_id]" onchange="changeInput(this,<?php echo $video_num; ?>,'youtube_id')" value="<?php echo $youtube_video_id; ?>" style="width:98%"/></td>
</tr>
<th class="youtube_video_setting_title">youtube_video</th>
<td><iframe id="youtube_video_list[<?php echo $video_num; ?>][title]_youtube_video" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube_video_id; ?>"
  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
</tr>
<?php } ?>
</table>

<!--button onclick="youtubeVideoSetting();" class="button">情報</button//-->

</section>
<script>
function youtubeVideoSetting() {
  var youtube_video_setting_output = document.getElementById("youtube_video_setting_output");
  let SDGs_top_video_list = <?php echo json_encode($SDGs_top_video_list); ?>;

  youtube_video_setting_output.value = JSON.stringify(SDGs_top_video_list, undefined,1);
}

function changeInput(element,num,key) {
  let SDGs_top_video_list = <?php echo json_encode($SDGs_top_video_list); ?>;
  let item = SDGs_top_video_list[num];
  if (key == "title") {
    var title = document.getElementById("youtube_video_list[" + num + "][title]_title");
    title.innerHTML = element.value;
    if (item) {
      item["title"] = element.value;
    }
  }
  if (key == "youtube_id") {
    var youtube_video = document.getElementById("youtube_video_list[" + num + "][title]_youtube_video");
    youtube_video.src = "https://www.youtube.com/embed/" + element.value;
    if (item) {
      item["youtube_video_id"] = element.value;
    }
  }
  SDGs_top_video_list[num] = item;
  var youtube_video_setting_output = document.getElementById("youtube_video_setting_output");
  youtube_video_setting_output.value = JSON.stringify(SDGs_top_video_list, undefined,1);
  var youtube_video_setting_save = document.getElementById("youtube_video_setting_save");
  youtube_video_setting_save.style.display = "block";
}

</script>

<form id="youtube_video_setting_save" action="./?action=<?php echo $search_action; ?>" method="post">
<textarea name="youtube_video_setting_output" id="youtube_video_setting_output" hidden></textarea>
<button class="button">保　存</button>
</form>

<?php
if(isset($_POST["youtube_video_setting_output"])){
$search_video_list_post = $_POST["youtube_video_setting_output"];
if ($search_video_list_post) {

  $output_file = "./api/top_video_list.json";
  $output_data = [
    "results" => json_decode($search_video_list_post),
  ];
  if( file_put_contents($output_file, json_encode($output_data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ) ) {
  ?><script>alert("保存されました");</script><?php
  }

?>
  <textarea id="youtube_video_setting_output_post" hidden><?php echo $search_video_list_post;?></textarea>
  <a href="<?php echo $output_file; ?>" target="_blank"><?php echo $output_file; ?></a>
<?php
}
}
// YouTubeVideoSetting Editing End
?>

<?php } ?>

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

<article id="SDGs_video_list">

<?php

$search_action = $_GET["action"];
// YouTube動画リンク集
$SDGs_top_video_list_data = getApiDataCurl("http://sunstripe.main.jp/SDGs/api/".$video_file_name.".json");
$SDGs_top_video_list = getResult($SDGs_top_video_list_data);

$classSDGs = new SDGs();
$classSDGs->displayVideoList($SDGs_top_video_list);

?>
</article> <!-- SDGs_top_video_list //-->
<style>
#SDGs_video_list {
  text-align: center;
}
</style>


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

<form id="youtube_video_setting_save" action="?action=<?php echo $search_action; ?>" method="post">
<textarea name="youtube_video_setting_output" id="youtube_video_setting_output" hidden></textarea>
<button class="button">保　存</button>
</form>

<?php
if(isset($_POST["youtube_video_setting_output"])){
$search_video_list_post = $_POST["youtube_video_setting_output"];
if ($search_video_list_post) {

  $output_file = "./api/".$video_file_name.".json";
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

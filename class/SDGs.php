<?php
class SDGs {



  function displayVideoList($video_list) {
    foreach ($video_list as $video_num => $video_item) {
      $video_title = $video_item["title"];
      $youtube_video_id = $video_item["youtube_video_id"];
  ?>
<section>
<aside style="overflow:scroll;">
  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube_video_id; ?>"
        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</aside>
<h2><?php echo $video_title; ?></h2>
</section>
  <?php
    // code...
    }
  ?>

  <?php
  }

}
?>

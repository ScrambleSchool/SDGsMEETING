<?php
class SDGs {
  function displaySDGsTarget($targets_thema_list,$Goal_key) {
    if (is_array($targets_thema_list[$Goal_key])) {
      foreach ($targets_thema_list[$Goal_key] as $key => $targets_thema_item) {
        if ($key == "title") { ?>
          <h2><?php echo $targets_thema_item; ?></h2>
        <?php } /* title */
        if ($key == "items") { ?>
          <article id="target_item_description">
            <?php foreach ($targets_thema_item as $target_num => $target_item) {
              $target_description = $target_item["description"];
              ?>
              <section class="target_item_description"><?php $target_description; ?></section>
            <?php } ?>
          </article>
  <?php } /* items */
      }
    }
  }

  function displayVideoList($video_list) {
    foreach ($video_list as $video_num => $video_item) {
      $video_title = $video_item["title"];
      $youtube_video_id = $video_item["youtube_video_id"]; ?>
      <section>
        <aside style="overflow:scroll;">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube_video_id; ?>"
        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </aside>
        <h2><?php echo $video_title; ?></h2>
      </section>
      <?php // code...
    }
  }
}
?>

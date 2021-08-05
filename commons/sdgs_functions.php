<?php $S_ADD = $_SERVER['SERVER_ADDR']; ?>
<?php $R_ADD = $_SERVER['REMOTE_ADDR']; ?>

<!-- 設定処理 -->
<?php if(substr($S_ADD,0,mb_strrpos($S_ADD,'.')) != substr($R_ADD,0,mb_strrpos($R_ADD,'.'))) { ?>
  <?php
  ?>
<?php } else { ?>
  <section id="existsFunction">
    <h2>開発環境チェック</h2>
    <aside style="background-color:white;">
  <?php
  $function_list = [
    "displaySDGsHeader",
    "displaySDGsNav",
    "stringReplace",
    "displaySDGsFooter",
  ];
  function existsFunction ($function_list) {
    foreach ($function_list as $num => $title) {
      if (!function_exists($title)) {
?>
<h5 style="padding-left: 30px;background-color:red;color:white;"><?php echo $title; ?></h5>
<?php
      }
    }
  }
  existsFunction($function_list);
  ?>
</aside>
</section>
<?php } ?>

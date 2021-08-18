<?php include("./config/site_infomation.php"); ?>

<!DOCTYPE html>
<html xml:lang="ja" lang="ja">
  <?php include("../config/common.php"); ?>
  <?php include("../commons/head.php"); ?>
  <?php include("../commons/analytics.php"); ?>

  <body>
  <?php include("./commons/sdgs_header.php"); ?>
  <?php include("./commons/sdgs_nav.php"); ?>
  <?php include("./commons/sdgs_footer.php"); ?>

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

      <section style="overflow:scroll;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/XjmKAN-XoaE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/uizRLgC78tw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/8itFRERIfuk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/sWezZw34604" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </section>
    </main>

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

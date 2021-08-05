<?php include("./config/site_infomation.php"); ?>
<?php include("./config/site_DOCTYPEhtml.php"); ?>
<?php displaySDGsHeader($site_title); ?>
<div id="inner">

    <?php
    $SDGs_page_nav_list = [
      [
          "title" => "TOP",
          "URL" => "./",
      ],
      [
          "title" => "Goal05",
          "URL" => "./Goal05",
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
      <img id="main_visual" src="./images/Goal05long.png">
      <h1>
        5. ジェンダー平等を実現しよう
      </h1>
      <p>
        ジェンダー平等を達成し、全ての女性及び女児のエンパワーメントを行う。
      </p>

      <section style="overflow:scroll;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/oha651uB3sg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </section>

      <?php
      $Goal_key = "Goal05";
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
      <li><a href=""><?php echo $category_item[title]; ?></a></li>
    <?php } ?>
    </ul>
  <section>

  </div>

    <?php displaySDGsFooter($site_title); ?>

  </body>
</html>

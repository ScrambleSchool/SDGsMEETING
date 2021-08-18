<?php function displaySDGsHeader($site_title) { ?>
  <header class="header_section">
    <article class="header_image">
      <a href="./" >
        <img src="./images/sdg_icon_wheel_3.png" alt="SDGsTOP" title="SDGsTOP" style="margin: 0;padding: 0; width:100%;"/>
      </a>
    </article>
    <article class="header_title">
      <h2 class="title_text"><?php echo $site_title;?></h2>
    </article>
  </header>
  <article id="header_nav">
    <a href="javascript:history.back();"><section id="nav_back">
     <h2>＜</h2>
    </section></a>
    <section id="aside_last_modified">
      <?php
  // タイムゾーン設定
  date_default_timezone_set('Asia/Tokyo');
  // ファイルの更新日時を取得

  $REQUEST_URI = $_SERVER['REQUEST_URI'];
  $FULL_PATH_URL = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']. "";
  $REQUEST_PATHS = explode("/",parse_url($REQUEST_URI, PHP_URL_PATH));
  $FULL_BASE_PATH = str_replace(end($REQUEST_PATHS), "", $FULL_PATH_URL);

  // pathinfoにフルパスを指定し、連想配列の形で変数に格納
  $filepath = pathinfo($FULL_BASE_PATH);

  // 連想配列から取得したいファイル情報を出力
  // echo "<h5>dirname : ".$filepath['dirname']."</h5>";   // /home/example/www
  // echo "<h5>basename : ".$filepath['basename']."</h5>";  // file.txt
  // echo "<h5>extension : ".$filepath['extension']."</h5>"; // txt
  // echo "<h5>filename : ".$filepath['filename']."</h5>";  // file

  // echo "<h5>REQUEST_URI ".$REQUEST_URI."</h5>";
  // echo "<h5>FULL_PATH_URL : ".$FULL_PATH_URL."</h5>";
  // echo "<h5>REQUEST_PATHS : ".$REQUEST_PATHS."</h5>";
  // echo "<h5>end(REQUEST_PATHS) : ".end($REQUEST_PATHS)."</h5>";
  // echo "<h5>FULL_BASE_PATH : ".$FULL_BASE_PATH."</h5>";
  $extension = $filepath['extension'];
  $filename = end($REQUEST_PATHS);
  if ($filename) {
    if(strpos($filename,'.php') === false){
      $filename = $filename.".".($extension?$extension:"php");
    }
  } else {
    $filename = "index.php";
  }

  $timeStamp = filemtime($filename);
  // 日時整形後、出力
  $stringTimeStamp = date('Y/m/d H:i:s', $timeStamp);

  ?>
      <script>displayFilemTime('<?php echo $stringTimeStamp;?>');</script>
      <!--script>displayLastModified();</script//-->
    </section>
    <!--h3><?php echo $stringTimeStamp;?></h3-->
  </article>
<?php } ?>

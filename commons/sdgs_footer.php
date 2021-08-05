<?php function displaySDGsFooter($site_title) { ?>
  <section style="background-color:white;">
  <article class="header_image">
    <a href="./" >
      <img src="./images/sdg_icon_wheel_3.png" alt="SDGsTOP" title="SDGsTOP" style="margin: 0;padding: 0; width:100%;"/>
    </a>
  </article>
  <article class="header_title">
    <h2 class="title_text"><?php echo $site_title;?></h2>
  </article>
  </section>

  <footer class="footer_section" style="text-align:center;background-color:rgba(0,0,100,0.8);color:rgba(200,200,200,0.8);">
      <p style="color:white;">以下は、登録された方には、見えません</p>
      <style>
      #footer_site_map_nav {
        text-align: left;
      }
      #footer_site_map_nav a {
        color:white;
      }
      #footer_site_map_nav li {
         list-style-type:none;
      }
      .footer_site_map {
        width:calc(49% - 20px);
        display:inline-block;
        vertical-align: top;
        padding-left: 20px;
      }
      .footer_site_map_title {
        text-align: center;
        font-size: 3vw;
      }
      </style>
      <nav id="footer_site_map_nav">
        <ul class="footer_site_map">
        <li class="footer_site_map_title">
          <h4>SDGsMEETING</h4>
        </li>
        <li>
          <h4><a href="">TOP</a></h4>
        </li>
        <li>
          <h4><a href="about">SDGsMEETINGについて</a></h4>
        </li>
        <li>
          <h4><a href="event">EVENT</a></h4>
        </li>
        <li>
          <h4><a href="news">NEWS</a></h4>
        </li>
        </ul>
        <ul class="footer_site_map">
          <li>
            <h4 class="footer_site_map_title">コンテンツ</h4>
            <h4><a href="contents">CONTENS</a></h4>
            <h4><a href="blog">ブログ</a></h4>
            <h4><a href="https://note.com/thecardgame/n/n1a90519ef19e" target="_blank">note</a></h4>
          </li>
      </nav>


      <h3 style="text-align:center">制作チーム：サンストライプ</h3>
    <div id="footlink" style="text-align:center"><div id="headertext">クリエーターの可能性を引き出すサンストライプ-オフィシャルサイト。
        Team sunsripe, Share your dreams and thoughts with me.</div>
    </div>
    © 2011 - <script>let d = new Date();let year = d.getFullYear();document.write(year);</script> <a href="/">SunStripe</a> Inc.
  </footer>
  <script>
  if (typeof eventAnalytics == 'function') {
    eventAnalytics('@ScrambleVSchool',window.location.href,'read_end',this);
  } else {
    alert("アナリティクスが設定されていません");
  }
  </script>
<?php } ?>

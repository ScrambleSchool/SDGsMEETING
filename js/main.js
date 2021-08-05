
  function selectSearchLine(element) {
    var location_href = location.href;
    var tag_title = "みんなで考える SDGsMEETING";
    var tag_title2 = "@ScrambleVSchool";
    var text = "みんなで考える SDGsMEETING 毎週水曜日 21:00 〜";
    sendBodyLineURL(document.title,text,location_href);
  }

  function selectSearchMixi(element) {
    var location_href = location.href;
    var tag_title = "みんなで考える SDGsMEETING";
    var tag_title2 = "@ScrambleVSchool";
    var text = "みんなで考える SDGsMEETING 毎週水曜日 21:00 〜";
    sendBodyMixiURL(document.title,text,location_href);
  }

  function selectSearchTweet(element) {
    var location_href = location.href;
    var tag_title = "みんなで考える SDGsMEETING";
    var tag_title2 = "@ScrambleVSchool";
    var text = "みんなで考える SDGsMEETING 毎週水曜日 21:00 〜";
    sendBodyTweetURL(document.title,text,[tag_title,tag_title2],location_href);
  }

  function selectSearchFacebook(element) {
    var location_href = location.href;
    var tag_title = "みんなで考える SDGsMEETING";
    var tag_title2 = "@ScrambleVSchool";
    var text = "みんなで考える SDGsMEETING 毎週水曜日 21:00 〜";
    sendBodyFacebookURL(document.title,text,location_href);
  }

  function selectSearchNote(element) {
    var location_href = location.href;
    var tag_title = "みんなで考える SDGsMEETING";
    var tag_title2 = "@ScrambleVSchool";
    var text = "みんなで考える SDGsMEETING 毎週水曜日 21:00 〜";
    sendBodyNoteURL(document.title,text,location_href);
  }

  function displayBack() {
    var ans; //1つ前のページが同一ドメインかどうか
	    var bs  = false; //unloadイベントが発生したかどうか
	    var ref = document.referrer;
	    // $(window).bind("unload beforeunload",function(){
	    //     bs = true;
	    // });
	    re = new RegExp(location.hostname,"i");
	    if(ref.match(re)){
	        ans = true;
          document.write('<a href="javascript:history.back();"><section id="nav_back">');
          document.write('<h2>＜</h2>');
          document.write('</section></a>');
	    }else{
	        ans = false;
          document.write('<a href="./"><section id="nav_back">');
          document.write('<h2>＝</h2>');
          document.write('</section></a>');
	    }
  }

  function displayFilemTime(stringTimestamp) {
    var today = new Date();
    var timestamp = new Date(stringTimestamp);
    var year = timestamp.getFullYear();
    var month= timestamp.getMonth() + 1;
    var date = timestamp.getDate();

    var nowYear = today.getFullYear();
    var nowMonth = today.getMonth() + 1;
    var nowDate = today.getDate();

    if (nowYear > year + 1) {
        document.write('<h2 id="LastModifiedOldYear">この記事は最終更新日から1年以上が経過しています。</h2>');
        return;
    } else if (nowYear == year && nowMonth == month && nowDate == date) {
      document.write('<h2 id="LastModifiedNew">この記事は最近更新されました。</h2>');
      return;
    }
    document.write('<h2 id="LastModified">' +  "最終更新：" + year + "年" + month + "月" + date + "日" + '</h2>');
  }
  function displayLastModified() {
    var today = new Date();
    var modified = new Date(document.lastModified);
    var year = modified.getFullYear();
    var month= modified.getMonth() + 1;
    var date = modified.getDate();

    var nowYear = today.getFullYear();
    var nowMonth = today.getMonth() + 1;
    var nowDate = today.getDate();

    if (nowYear > year + 1) {
        document.write('<h5 id="LastModifiedOldYear">この記事は最終更新日から1年以上が経過しています。</h5>');
        return;
    } else if (nowYear == year && nowMonth == month && nowDate == date) {
      document.write('<h2 id="LastModifiedNew">この記事は最近更新されました。</h2>');
      return;
    }
    document.write('<p id="LastModified">' +  "最終更新：" + year + "年" + month + "月" + date + "日" + '</p>');
  }

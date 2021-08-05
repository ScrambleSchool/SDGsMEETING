<?php function displaySDGsNav() { ?>
<nav style="text-align:center;width:calc(100% - 10px);background-color:white;padding-left:5px;padding-right:5px;">
  <h4 style="text-align:center;" onclick="eventAnalytics('sdgs_nav_buttonTop',window.location.href,'click',this);">
    <a href="./" >
      <img src="./images/sdg_logo_2030_top.png" alt="SDGsTOP" title="SDGsTOP" style="margin: 0;padding: 0; width:calc(100% / 2 - 10px);"/>
    </a>
  </h4>
  <?php for ($i = 1; $i <= 17; $i++){ ?>
    <span onclick="eventAnalytics('sdgs_nav_buttonGoal<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>',window.location.href,'click',this);">
      <a href="Goal<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>" >
      <img src="./images/sdgs<?php echo $i?>-150x150.png" alt="SDGs<?php echo $i?>" title="SDGs<?php echo $i?>" style="margin: 0;padding: 0; width:calc(100% / 6 - 10px);"/>
      </a>
    </span>
  <?php } ?>
  <span onclick="eventAnalytics('sdgs_nav_buttonTop',window.location.href,'click',this);">
    <a href="./" >
      <img src="./images/sdg_icon_wheel_3.png" alt="SDGsTOP" title="SDGsTOP" style="margin: 0;padding: 0; width:calc(100% / 6 - 10px);"/>
    </a>
  </span>
</nav>
<?php } ?>

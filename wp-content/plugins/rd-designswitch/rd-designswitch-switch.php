<div class="rd-designswitch-panel">

  <form name="rd-designswitch" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <input type="hidden" name="rd-designswitch-change" value="1" />
    <label>Show images:</label>
    <input type="checkbox" name="rd-designswitch-toggle" value="1"<?php echo ( DESIGNSWITCH=='high' ? ' checked="checked"' : '' ); ?> onchange="document.forms['rd-designswitch'].submit();" />
    <noscript>
      <input type="submit" value="update" />
    </noscript>
  </form>

</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

  <h1 class="page-header">Intro</h1>

  <ul>
    <li><?=$intro_c?> intro events</li>
  </ul>

  <ul>
    <?php foreach ($intros as $intro):?>
      <li><?=limit_text($intro['description'], 10)?></li>
    <?php endforeach;?>
  </ul>

</div>

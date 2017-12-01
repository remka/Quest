<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

  <h1 class="page-header">Events</h1>

  <ul>
    <li><?=$events_c?> random events</li>
  </ul>

  <ul>
    <?php foreach ($events as $event):?>
      <li><?=limit_text($event['description'], 10)?></li>
    <?php endforeach;?>
  </ul>

</div>

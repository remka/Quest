<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">

  <h1 class="page-header">Intro</h1>

  <div class="row">
    <div class="col-md-9"><?=$intro_c?> intro events</div>
    <div class="col-md-3">
      <a class="btn btn btn-primary" href="#" role="button">New intro event</a>
    </div>
  </div>

  <div class="row">
    <ul>
      <?php foreach ($intros as $intro):?>
        <li><?=limit_text($intro['description'], 10)?></li>
      <?php endforeach;?>
    </ul>
  </div>

</main>

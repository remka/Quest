<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">

  <h1 class="page-header">Visuals</h1>

  <div class="row">
    <div class="col-md-9"><?=$visuals_c?> visuals</div>
    <div class="col-md-3">
      <a class="btn btn btn-primary" href="#" role="button">New visual</a>
    </div>
  </div>

  <div class="row">
    <ul class="list-visuals">
      <?php foreach ($visuals as $visual):?>
        <?php
          $posX = $visual['coords'][0]*120;
          $posY = $visual['coords'][1]*120;
        ?>
        <li style="background-position: -<?=$posX?>px -<?=$posY?>px" title="<?=$visual['name']?>">
          <span>
            <?=$visual['name']?>
          </span>
        </li>
      <?php endforeach;?>
    </ul>
  </div>

</main>

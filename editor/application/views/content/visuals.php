<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

  <h1 class="page-header">Intro</h1>

  <ul>
    <li><?=$visuals_c?> visuals</li>
  </ul>

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

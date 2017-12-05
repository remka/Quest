<main role="main" class="col-md-12">

  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Visuals</li>
    </ol>
  </nav>

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

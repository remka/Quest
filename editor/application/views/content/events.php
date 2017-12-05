<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">

  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Events</li>
    </ol>
  </nav>

  <h1 class="page-header">Events</h1>

  <div class="row">
    <div class="col-md-9"><?=$events_c?> random events</div>
    <div class="col-md-3">
      <a class="btn btn btn-primary" href="<?=base_url('events/new')?>" role="button">New random event</a>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">

      <div class="table-responsive">
        <table class="table table-striped">

          <thead>
            <tr>
              <th>#</th>
              <th>Header</th>
              <th><abbr title="Probability">P</abbr></th>
              <th><abbr title="Exits">E</abbr></th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($events as $event):?>
              <tr>
                <td><?=$event['id']?></td>
                <td><?=limit_text($event['description'], 9)?></td>
                <td>
                  <?php if($event['isTimeline'] != 0) { ?>
                    <?=$event['probability']?>
                  <?php } else { ?>
                    -
                  <?php }; ?>
                </td>
                <td>
                  <?php foreach ($event['exits'] as $exit):?>

                    <?php
                    // check if exit point exists
                    $is_in_array = false;
                    for ($x = 0; $x < count($events); $x++) {
                      if($events[$x]['id'] == $exit['goTo']) {
                        $is_in_array = true;
                      };
                    };
                    if ($is_in_array == true && $exit['goTo'] != 0) { ?>
                      <a href="<?=base_url('events/edit/'.$exit['goTo'])?>" class="valueOk"><?=$exit['goTo']?></a>
                    <?php } else if($is_in_array != true && $exit['goTo'] != 0) { ?>
                      <a href="<?=base_url('events/edit/'.$exit['goTo'])?>" class="valueError"><?=$exit['goTo']?></a>
                    <?php } else { ?>
                      <span class="valueGrey"><?=$exit['goTo']?></span>
                    <?php }; ?>
                  <?php endforeach;?>
                </td>
              </tr>
            <?php endforeach;?>
          </tbody>

        </table>
      </div>

    </div>
  </div>

</main>

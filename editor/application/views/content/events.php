<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">

  <h1 class="page-header">Events</h1>

  <div class="row">
    <div class="col-md-9"><?=$events_c?> random events</div>
    <div class="col-md-3">
      <a class="btn btn btn-primary" href="#" role="button">New random event</a>
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
                    $is_in_array = false;
                    for ($x = 0; $x < count($events); $x++) {
                      if($events[$x]['id'] == $exit['goTo']) {
                        $is_in_array = true;
                      };
                    };
                    if ($is_in_array == true && $exit['goTo'] != 0) { ?>
                      <i class="fa fa-check" aria-hidden="true"></i>
                    <?php } else if($is_in_array != true && $exit['goTo'] != 0) { ?>
                      <i class="fa fa-times" aria-hidden="true"></i>
                    <?php }; ?>
                    <?=$exit['goTo']?>
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

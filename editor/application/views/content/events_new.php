<main role="main" class="col-md-12">

  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?=base_url('events')?>">Events</a></li>
      <li class="breadcrumb-item active" aria-current="page">New event</li>
    </ol>
  </nav>

  <h1 class="page-header">New event</h1>

  <div class="row">

    <div class="col-md-8">
      <form id="newEventForm">

        <h2>Event</h2>

        <div class="row">

          <div class="col-md-3">
            dddd
          </div>

          <div class="col-md-9">

            <div class="form-group">
              <label for="event_id">Event ID</label>
              <input class="form-control" id="event_id" name="event_id" value="<?=uniqid()?>" readonly>
            </div>

            <div class="form-group">
              <label for="event_description">Event description</label>
              <textarea class="form-control" id="event_description" name="event_description" rows="4"></textarea>
              <small id="emailHelp" class="form-text text-muted">The event main description. Should be 160 characters maximum.</small>
            </div>

            <div class="form-group">
              <span class="prob_value badge badge-primary"></span>
              <label for="event_probability">Event probability</label>
              <input type="range" min="1" max="10" value="1" class="form-control" id="event_probability" name="event_probability">
            </div>

            <div class="form-group">
              <label for="event_requires">Event requires</label>
              <select class="form-control" id="event_requires">
                <option value="0">Nothing</option>
                <option value="girlNumber">girlNumber</option>
              </select>
            </div>

            <div class="form-group">
              <label for="event_unlocks">Event unlocks</label>
              <select class="form-control" id="event_unlocks">
                <option value="0">Nothing</option>
                <option value="girlNumber">girlNumber</option>
              </select>
            </div>

          </div>
        </div>

        <hr />

        <h2>Exits</h2>

        <div class="row">

          <div class="col-md-6">

            <div class="form-group">
              <label for="exit_1_title">Exit #1 title</label>
              <input type="text" class="form-control" id="exit_1_title" name="exit_1_title" placeholder="Walk home">
            </div>

            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exit_1_money">Exit #1 money</label>
                  <input type="text" class="form-control" id="exit_1_money" name="exit_1_money" placeholder="-2000">
                </div>

                <div class="form-group">
                  <label for="exit_1_tatemae">Exit #1 tatemae</label>
                  <input type="text" class="form-control" id="exit_1_tatemae" name="exit_1_tatemae" placeholder="10">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exit_1_ninki">Exit #1 ninki</label>
                  <input type="text" class="form-control" id="exit_1_ninki" name="exit_1_ninki" placeholder="-10">
                </div>
                <div class="form-group">
                  <label for="exit_1_alcohol">Exit #1 alcohol</label>
                  <input type="text" class="form-control" id="exit_1_alcohol" name="exit_1_alcohol" placeholder="20">
                </div>
              </div>

            </div>

            <div class="form-group">
              <label for="exit_1_goto">Exit #1 goTo</label>
              <select class="form-control" id="exit_1_goto" name="exit_1_goto">
                <option value="nowhere">Nowhere</option>
                <option value="<?=uniqid()?>">New event</option>
                <option value="winlose">Win / lose</option>
              </select>
            </div>

            <input type="hidden" id="exit_1_win" name="exit_1_win" value="<?=uniqid()?>">
            <input type="hidden" id="exit_1_lose" name="exit_1_lose" value="<?=uniqid()?>">

          </div>

          <div class="col-md-6">

            <div class="form-group">
              <label for="exit_2_title">Exit #2 title</label>
              <input type="text" class="form-control" id="exit_2_title" name="exit_2_title" placeholder="Take a cab">
            </div>

            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exit_2_money">Exit #2 money</label>
                  <input type="text" class="form-control" id="exit_2_money" name="exit_2_money" placeholder="-2000">
                </div>

                <div class="form-group">
                  <label for="exit_2_tatemae">Exit #2 tatemae</label>
                  <input type="text" class="form-control" id="exit_2_tatemae" name="exit_2_tatemae" placeholder="10">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exit_2_ninki">Exit #2 ninki</label>
                  <input type="text" class="form-control" id="exit_2_ninki" name="exit_2_ninki" placeholder="-10">
                </div>

                <div class="form-group">
                  <label for="exit_2_alcohol">Exit #2 alcohol</label>
                  <input type="text" class="form-control" id="exit_2_alcohol" name="exit_2_alcohol" placeholder="20">
                </div>
              </div>

            </div>

            <div class="form-group">
              <label for="exit_2_goto">Exit #2 goTo</label>
              <select class="form-control" id="exit_2_goto" name="exit_2_goto">
                <option value="nowhere">Nowhere</option>
                <option value="<?=uniqid()?>">New event</option>
                <option value="winlose">Win / lose</option>
              </select>
            </div>

            <input type="hidden" id="exit_2_win" name="exit_2_win" value="<?=uniqid()?>">
            <input type="hidden" id="exit_2_lose" name="exit_2_lose" value="<?=uniqid()?>">

          </div>

        </div>

        <hr />

        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Create new event">

        <br />

      </form>
    </div>

    <div class="col-md-4">
      <?php

      function recursiveExits($exits, $events, $count=0) {
        echo '<ul>';

        for($i = 0; $i < count($exits); $i++) {

          // check exits

          if($exits[$i]['goTo'] != 0) {

            $hasExit = false;

            for($j = 0; $j < count($events); $j++) {
              if($events[$j]['id'] == $exits[$i]['goTo']) {
                echo '<li><a href="' . base_url('events/edit/'.$exits[$i]['goTo']) .'" class="nodeEdit">' . $exits[$i]['goTo'] . '</a> ';
                recursiveExits($events[$j]['exits'], $events);
                echo '</li>';
                $hasExit = true;
              }
            }
            if($hasExit == false) {
              // exit node doesn't exist
              echo '<li><a href="' . base_url('events/new/'.$exits[$i]['goTo']) .'" class="nodeCreate">' . $exits[$i]['goTo'] . '</a> ';
              echo '</li>';
            }
          }

          // check win / lose

          else if(isset($exits[$i]['winLose']['win']) && isset($exits[$i]['winLose']['lose']) ) {

            $hasWinExit = false;
            $hasLoseExit = false;

            echo '<ul>';

            for($j = 0; $j < count($events); $j++) {
              if ($events[$j]['id'] == $exits[$i]['winLose']['win']) {
                echo '<li><a href="' . base_url('events/edit/'.$exits[$i]['winLose']['win']) .'" class="nodeEdit winLose doWin"><i class="fa fa-check" aria-hidden="true"></i> ' . $exits[$i]['winLose']['win'] . '</a> ';
                recursiveExits($events[$j]['exits'], $events);
                echo '</li>';
                $hasWinExit = true;
              }
            }
            if($hasWinExit == false) {
              echo '<li><a href="' . base_url('events/new/'.$exits[$i]['winLose']['win']) .'" class="nodeCreate winLose doWin"><i class="fa fa-check" aria-hidden="true"></i> ' . $exits[$i]['winLose']['win'] . '</a> ';
              echo '</li>';
            }

            // check lose

            for($j = 0; $j < count($events); $j++) {
              if ($events[$j]['id'] == $exits[$i]['winLose']['lose']) {
                echo '<li><a href="' . base_url('events/edit/'.$exits[$i]['winLose']['lose']) .'" class="nodeEdit winLose doLose"><i class="fa fa-times" aria-hidden="true"></i> ' . $exits[$i]['winLose']['lose'] . '</a> ';
                recursiveExits($events[$j]['exits'], $events);
                echo '</li>';
                $hasLoseExit = true;
              }
            }
            if($hasLoseExit == false) {
              echo '<li><a href="' . base_url('events/new/'.$exits[$i]['winLose']['lose']) .'" class="nodeCreate winLose doLose"><i class="fa fa-times" aria-hidden="true"></i> ' . $exits[$i]['winLose']['lose'] . '</a> ';
              echo '</li>';
            }

            echo '</ul>';

          }

        }

        /*
        foreach ($exits as $exit){
          for($i = 0; $i < count($events); $i++) {
            // check goto
            if($events[$i]['id'] == $exit['goTo']) {
              echo '<li><a href="#">' . $events[$i]['id'] . '</a> ';
              recursiveExits($events[$i]['exits'], $events);
              echo '</li>';
            };
            // check win
            if ($events[$i]['id'] == $exit['winLose']['win']) {
              echo '<li><a href="#">' . $events[$i]['id'] . '</a> ';
              recursiveExits($events[$i]['exits'], $events);
              echo '</li>';
            };
            // check lose
            if ($events[$i]['id'] == $exit['winLose']['lose']) {
              echo '<li><a href="#">' . $events[$i]['id'] . '</a> ';
              recursiveExits($events[$i]['exits'], $events);
              echo '</li>';
            };
          }
        }
        */

        echo '</ul>';
      };

      function plotTree($arr) {
        echo '<ul class="tree">';
        foreach ($arr as $key){
          if($key['isTimeline'] != 0) {
            echo '<li><a href="' . base_url('events/edit/'.$key['id']) .'" class="nodeEdit" title="' . limit_text($key['description'], 9) . '">' . $key['id'] . '</a> ';
            recursiveExits($key['exits'], $arr);
            echo '</li>';
          }
        }
        echo '</ul>';
      };

      plotTree($events);

      ?>

      <div class="newObj">&nbsp;</div>

  </div>

</main>

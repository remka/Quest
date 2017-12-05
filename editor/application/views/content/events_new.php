<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">

  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?=base_url('events')?>">Events</a></li>
      <li class="breadcrumb-item active" aria-current="page">New event</li>
    </ol>
  </nav>

  <h1 class="page-header">New event</h1>

  <form id="newEventForm">

    <h2>Event</h2>

    <div class="row">

      <div class="col-md-3">
        dddd
      </div>

      <div class="col-md-9">

        <input type="hidden" class="form-control" id="event_id" name="event_id" value="<?=uniqid()?>">

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

</main>

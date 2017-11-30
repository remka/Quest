var questModule = (function() {

  // data
  var dataEvents = 'events.json';

  // privates
  var hasStarted = false;
  var isLoading = true;
  var probaMulti = 10;
  var lastEvent; // only one event for now, make that an array to store several?

  var eventHistory = [];
  var maxEvents = 3;

  var userStats = {
    money: 50000,
    tatemae: 50,
    ninki: 50,
    aruchu: 0
  }

  var round = {
    round: 0,
    day: 1,
    roundPerDay: 1
  }

  var userOptions = {
    conbini: false,
    eikaiwa: false,
    girlfriend: false,
    inGuesthouse: true,
    noJob: true,
    girlNumber: false
  }

  var introReference = [];
  var eventsReference = [];

  // Jquery aliases
  var $usrMoney = $('#usrMoney');
  var $usrTatemae = $('#usrTatemae');
  var $usrNinki = $('#usrNinki');
  var $usrAruchu = $('#usrAruchu');
  var $usrMoney = $('#usrMoney');
  var $usrDay = $('#usrDay');
  var $eventVisual = $('#event .visual');
  var $eventDescr = $('#event .description');
  var $eventExits = $('#exits');
  var $eventVisual = $('#event .visual');
  var $eventVisualInner = $('#event .visual .inner');
  var $eventDescription = $('#event .description');

  function whichTransitionEvent(){
    var t,
        el = document.createElement("fakeelement");

    var transitions = {
      "transition"      : "transitionend",
      "OTransition"     : "oTransitionEnd",
      "MozTransition"   : "transitionend",
      "WebkitTransition": "webkitTransitionEnd"
    }

    for (t in transitions){
      if (el.style[t] !== undefined){
        return transitions[t];
      }
    }
  }

  var transitionEvent = whichTransitionEvent();

  function resizeVisual() {
    var w = $eventVisualInner.width();
    $eventVisualInner.height(w);
    var h = $eventVisual.height() - 50;
    $eventDescription.css('top', h + 'px');
  }

  function updateDay() {
    if(round.round < round.roundPerDay - 1) {
      round.round += 1;
    } else {
      round.day += 1;
      round.round = 0;
    }
  }

  function findEvent(eventId, win, lose) {

    var nextEvent;
    var win = parseInt(win);
    var lose = parseInt(lose);
    var randomInt;
    var winLoseId;

    if(hasStarted === false) {
      // still in intro
      if(eventId == 'startGame') {
        // start the game!
        console.log('show random event');
        hasStarted = true;
        pickRandomEvent();
      } else {
        // load next intro event
        for (var i = 0; i < introReference.length; i++) {
          if(introReference[i].id == eventId) {
            //return introReference[i]
            showEvent(introReference[i]);
          }
        }
      }
    } else if (eventId == 0 && win == 0 && lose == 0) {
      // load next random game event
      pickRandomEvent();
      updateDay();
    } else if (eventId == 0 && win != 0 && lose != 0) {
      // win/lose event
      randomInt = Math.round(Math.random());
      if(randomInt == 1) {
        // console.log('WIN!');
        winLoseId = win;
      } else {
        // console.log('LOSE!');
        winLoseId = lose;
      };
      for (var i = 0; i < eventsReference.length; i++) {
        if(eventsReference[i].id == winLoseId) {
          showEvent(eventsReference[i]);
        }
      }
      updateDay();
    } else {
      // load next follow-up game event
      for (var i = 0; i < eventsReference.length; i++) {
        if(eventsReference[i].id == eventId) {
          showEvent(eventsReference[i]);
        }
      }
      updateDay();
    }
  }

  function refreshEvent(eventObj) {
    console.log(eventObj);
    var exitStyle;
    var linkString;

    // update unlocked
    if(eventObj.unlocks != 0) {
      console.log(eventObj.unlocks);
      switch (eventObj.unlocks) {
        case 'girlNumber':
          userOptions.girlNumber = true;
          break;
      }
    }

    $eventExits.delay(300).velocity({
      bottom: 0 },
      'easeInCubic',
      300,
      function() {
        $eventDescr.html('<p>' + eventObj.description + '</p>');
        if(eventObj.exits.length < 2) {
          $eventExits.removeClass('single double').addClass('single');
        } else {
          $eventExits.removeClass('single double').addClass('double');
        }
        $eventExits.empty();
        for (i=0; i<eventObj.exits.length; i++) {
          linkString  = '<li data-target="';
          linkString += eventObj.exits[i].goTo + '"';
          linkString += 'data-money="' + eventObj.exits[i].money + '" ';
          linkString += 'data-tatemae="' + eventObj.exits[i].tatemae + '" ';
          linkString += 'data-ninki="' + eventObj.exits[i].ninki + '" ';
          linkString += 'data-alcool="' + eventObj.exits[i].alcool + '" ';
          if(eventObj.exits[i].winLose === 0) {
            linkString += 'data-win="0" ';
            linkString += 'data-lose="0" ';
          } else {
            linkString += 'data-win="' + eventObj.exits[i].winLose.win+ '" ';
            linkString += 'data-lose="' + eventObj.exits[i].winLose.lose+ '" ';
          }
          linkString += '>';
          linkString += '<span>';
          linkString += eventObj.exits[i].title;
          linkString += '</span></li>';
          $(linkString).appendTo($eventExits);
        }
        // attach event clicks
        $eventExits.off().on( 'click', 'li', function() {
          var target = $(this).attr('data-target');
          var money = $(this).attr('data-money');
          var tatemae = $(this).attr('data-tatemae');
          var ninki = $(this).attr('data-ninki');
          var alcool = $(this).attr('data-alcool');
          var win = $(this).attr('data-win');
          var lose = $(this).attr('data-lose');
          updateStats(money, tatemae, ninki, alcool);
          findEvent(target, win, lose);
        });
        $eventDescr.velocity({ opacity: 1 }, 300);
      }
    );
  }

  function showEvent(eventObj) {
    $eventExits.velocity({
      bottom:'-180px'
    }, 'easeInCubic', 300, function() {
      refreshEvent(eventObj);
    });
    $eventDescr.velocity({ opacity: 0 }, 300);
  }

  function updateStats(stMoney, stTatemae, stNinki, stAlcool) {
    var stMoney = parseInt(stMoney);
    userStats.money += stMoney;
    var stTatemae = parseInt(stTatemae);
    userStats.tatemae += stTatemae;
    var stNinki = parseInt(stNinki);
    userStats.ninki += stNinki;
    var stAlcool = parseInt(stAlcool);
    userStats.aruchu += stAlcool;
    displayStats();
  }

  function displayStats() {
    // display money
    var formattedMoney = numberFormat(userStats.money);
    $usrMoney.html(formattedMoney);
    $usrTatemae.html(userStats.tatemae);
    $usrNinki.html(userStats.ninki);
    $usrAruchu.html(userStats.aruchu);
    $usrDay.html(round.day);
  }

  function playIntro() {
    var currentEvent = introReference[0];
    showEvent(currentEvent);
  }

  function pickRandomEvent() {
    var randomEvents = [];
    var event, eventCheck;
    var loop = 5;
    var isInHistory = false;
    var test = false;
    for (var i = 0; i < eventsReference.length; i++) {
      if (eventsReference[i].isTimeline == 1) {
        // Events with no requirements
        if (eventsReference[i].need == 0) {
          var prob = Math.floor(eventsReference[i].probability * probaMulti);
          for (var j = 0; j < prob; j++) {
            randomEvents.push(eventsReference[i]);
          }
        }
        // Events with conbini requirement
        if (eventsReference[i].need == 'conbini' && userOptions.conbini == true) {
          var prob = Math.floor(eventsReference[i].probability * probaMulti);
          for (var j = 0; j < prob; j++) {
            randomEvents.push(eventsReference[i]);
          }
        }
        // Events with noJob requirement
        if (eventsReference[i].need == 'noJob' && userOptions.noJob == true) {
          var prob = Math.floor(eventsReference[i].probability * probaMulti);
          for (var j = 0; j < prob; j++) {
            randomEvents.push(eventsReference[i]);
          }
        }
        // Events with noJob requirement
        if (eventsReference[i].need == 'girlNumber' && userOptions.girlNumber == true) {
          var prob = Math.floor(eventsReference[i].probability * probaMulti);
          for (var j = 0; j < prob; j++) {
            randomEvents.push(eventsReference[i]);
          }
        }
      }
    }
    // Check that the event is not in event history
    while(loop < 10) {
      eventCheck = randomEvents[Math.floor(Math.random() * randomEvents.length)];
      isInHistory = false;
      for (var j =0; j<eventHistory.length; j++ ) {
        if(eventHistory[j] == eventCheck.id) {
          isInHistory = true;
        }
      };
      if (isInHistory == false) {
        // not in history
        loop = 10;
        event = eventCheck
      } else {
        // in history, pick another one
        loop--;
      }
    };
    eventHistory.push(event.id);
    if(eventHistory.length > maxEvents) {
      eventHistory.shift();
    };
    showEvent(event);
  }

  function loadData() {
    $(function() {
      var c = Date.now();
      $.getJSON('./data/' + dataEvents + '?c=' + c, function(eventsArray) {
        // events
        $.each(eventsArray.events, function(index, value) {
          eventsReference.push(eventsArray.events[index]);
        });
        // intro
        $.each(eventsArray.intro, function(index, value) {
          introReference.push(eventsArray.intro[index]);
        });
        playIntro();
      });
    });
  }

  return {

    getStarted: function() {
      resizeVisual();
      loadData();
      displayStats();
      $(window).resize(function() {
        resizeVisual();
      });
    },

    doStuff: function(values) {
      //
    }

  };
})();

questModule.getStarted();

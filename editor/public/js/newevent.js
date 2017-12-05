var visualsModule = (function() {

  var visualsSprite = 'sprite-01.png';

  var spriteWidth = 600;
  var spriteEditorWidth = 120;
  var visualWidth;
  var spriteDimensions = [];

  var showWinLose = [false, false];

  var $eventIllu = $('.list-visuals li');

  var $event_id = $('#event_id');
  var $event_description = $('#event_description');
  var $event_probability = $('#event_probability');
  var $prob_value = $('.prob_value');
  var $newObj = $('.newObj');

  var $exit_1_title = $('#exit_1_title');
  var $exit_1_money = $('#exit_1_money');
  var $exit_1_tatemae = $('#exit_1_tatemae');
  var $exit_1_ninki = $('#exit_1_ninki');
  var $exit_1_alcool = $('#exit_1_alcohol');
  var $exit_1_goto = $('#exit_1_goto');
  var $exit_1_win = $('#exit_1_goto');
  var $exit_1_lose = $('#exit_1_lose');

  var $exit_2_title = $('#exit_2_title');

  function setSpriteDimensions() {
    var c = Date.now();
    var url = './../../../images/' + visualsSprite + '?c=' + c;
    var bgImg = $('<img />');
    bgImg.hide();
    bgImg.bind('load', function() {
        var height = $(this).height();
        var width = $(this).width();
        spriteDimensions[0] = width;
        spriteDimensions[1] = height;
        resizeVisual();
    });
    $('body').append(bgImg);
    bgImg.attr('src', url);
  }

  function resizeVisual() {
    var w = spriteEditorWidth;
    var imagesW = spriteDimensions[0]/spriteWidth;
    var imagesH = spriteDimensions[1]/spriteWidth;
    var bgW = w*imagesW;
    var bgH = w*imagesH;
    $eventIllu.css('background-size', bgW + 'px ' + bgH + 'px');
  }

  function displaySlideVal(slideVal) {
    var slideClass;
    if (slideVal <= 3) {
      slideClass = 'badge-primary';
    } else if (slideVal <= 5) {
      slideClass = 'badge-success';
    } else if (slideVal <= 8) {
      slideClass = 'badge-warning';
    } else if (slideVal <= 10) {
      slideClass = 'badge-danger';
    }
    $prob_value.removeClass().addClass('prob_value badge ' + slideClass);
    $prob_value.html(slideVal);
  }

  function updateSliderValue() {
    $event_probability.change(function() {
       displaySlideVal($(this).val());
    });
  }

  function validateForm() {
    $('#newEventForm').submit(function( event ) {

      var doesValidate = true;
      var newEvent = {};

      var event_id = $event_id.val();
      var event_description = $event_description.val();
      var event_probability = $event_probability.val();

      var exit_1_title = $exit_1_title.val();
      var exit_1_money = $exit_1_money.val();
      var exit_1_ninki = $exit_1_ninki.val();
      var exit_1_tatemae = $exit_1_tatemae.val();
      var exit_1_alcool = $exit_1_alcool.val();

      var exit_2_title = $exit_2_title.val();

      newEvent.id = event_id;
      newEvent.description = '';
      newEvent.probability = parseInt(event_probability);
      newEvent.isUnique = 0;
      newEvent.isTimeline = 1;
      newEvent.need = 0;
      newEvent.unlocks = 0;
      newEvent.exits = [];
      newEvent.exits.push(
        {
          title: exit_1_title,
          money: 0,
          tatemae: 0,
          ninki: 0,
          alcool: 0,
          goTo: 0,
          winLose: 0
        }
      );

      if(event_description.trim() == '') {
        doesValidate = false;
        $event_description.addClass('is-invalid');
      } else if(event_description.length > 160) {
        doesValidate = false;
        $event_description.addClass('is-invalid');
      } else {
        $event_description.removeClass('is-invalid');
        newEvent.description = event_description.trim();
      }

      if(exit_1_title.trim() == '') {
        doesValidate = false;
        $exit_1_title.addClass('is-invalid');
      } else {
        $exit_1_title.removeClass('is-invalid');
        newEvent.exits[0].title = exit_1_title.trim();
      }

      if(exit_1_money == '') {
        exit_1_money = 0;
      } else {
        exit_1_money = parseInt(exit_1_money);
        if(!exit_1_money) {
          exit_1_money = 0;
        }
      }
      newEvent.exits[0].money = exit_1_money;

      if(exit_1_ninki == '') {
        exit_1_ninki = 0;
      } else {
        exit_1_ninki = parseInt(exit_1_ninki);
        if(!exit_1_ninki) {
          exit_1_ninki = 0;
        }
      }
      newEvent.exits[0].ninki = exit_1_ninki;

      if(exit_1_alcool == '') {
        exit_1_alcool = 0;
      } else {
        exit_1_alcool = parseInt(exit_1_alcool);
        if(!exit_1_alcool) {
          exit_1_alcool = 0;
        }
      }
      newEvent.exits[0].alcool = exit_1_alcool;

      if(exit_1_tatemae == '') {
        exit_1_tatemae = 0;
      } else {
        exit_1_tatemae = parseInt(exit_1_tatemae);
        if(!exit_1_tatemae) {
          exit_1_tatemae = 0;
        }
      }
      newEvent.exits[0].tatemae = exit_1_tatemae;

      if(exit_2_title.trim() != '') {
        newEvent.exits.push({
          title: exit_2_title.trim(),
          money: 0,
          tatemae: 0,
          ninki: 0,
          alcool: 0,
          goTo: 0,
          winLose: 0
        });
      } else {
        newEvent.exits.length = 1;
      }

      if(doesValidate) {
        console.log(newEvent);
        $newObj.html(JSON.stringify(newEvent, null, 4));
      } else {
        console.log('Fix errors.');
      }


      event.preventDefault();
    });
  }

return {

  init: function() {
    setSpriteDimensions();
    validateForm();
    updateSliderValue();
    displaySlideVal(1);
  }

};
})();

$( document ).ready(function() {
  visualsModule.init();
});

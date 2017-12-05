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

      newEvent.id = event_id;
      newEvent.probability = parseInt(event_probability);
      newEvent.isUnique = 0;
      newEvent.isTimeline = 1;

      if(event_description == '') {
        doesValidate = false;
        $event_description.addClass('is-invalid');
      } else if(event_description.length > 160) {
        doesValidate = false;
        $event_description.addClass('is-invalid');
      } else {
        $event_description.removeClass('is-invalid');
        newEvent.description = event_description;
      }

      if(doesValidate) {
        console.log('OK');
      } else {
        console.log('Fix errors.');
      }

      console.log(newEvent);
      $newObj.html(JSON.stringify(newEvent, null, 4));

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

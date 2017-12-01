var visualsModule = (function() {

  var visualsSprite = 'sprite-01.png';

  var spriteWidth = 600;
  var spriteEditorWidth = 120;
  var visualWidth;
  var spriteDimensions = [];

  var $eventIllu = $('.list-visuals li');

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

return {

  init: function() {
    setSpriteDimensions();
  }

};
})();

$( document ).ready(function() {
  visualsModule.init();
});

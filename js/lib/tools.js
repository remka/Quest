(function() {

  // formatting big numbers
  numberFormat = function(a) {
    var sep = ',';
    a = String(a);
    a = a.replace(new RegExp("^(\\d{" + (a.length%3?a.length%3:0) + "})(\\d{3})", "g"), "$1 $2").replace(/(\d{3})+?/gi, "$1 ").trim();
    a = a.replace(/\s/g, sep);
    return a;
  };

}());

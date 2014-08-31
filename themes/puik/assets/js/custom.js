function loadhashtag(ele){
  if (!ele.length) {
    if (window.location.hash) {
      window.scrollTo(0, 0);         // execute it straight away
      setTimeout(function() {
        window.scrollTo(0, 0);     // run it a bit later also for browser compatibility
      }, 1);
      var active = this.element.children().filter(window.location.hash);

      if (active.length) {
        this.element.children().removeClass('uk-active').filter(active).addClass("uk-active");
      }

    }
  } else {
    window.scrollTo(0, 0);         // execute it straight away
    setTimeout(function() {
      window.scrollTo(0, 0);     // run it a bit later also for browser compatibility
    }, 1);

    set_hash(ele);
 /*
    $("li").removeClass('uk-active');
    var id=window.location.hash;
    var myClassName=" uk-active"; //must keep a space before class name
    var d;
    d=document.getElementById(id);
    d.className=d.className.replace(myClassName,""); // first remove the class name if that already exists
    d.className += myClassName; // adding new class name
  */
  }
}

function set_hash(hash){
hash = hash.replace( /^#/, '' );
var fx, node = $( '#' + hash );
if ( node.length ) {
  node.attr( 'id', '' );
  fx = $( '<div></div>' )
          .css({
              position:'absolute',
              visibility:'hidden',
              top: $(document).scrollTop() + 'px'
          })
          .attr( 'id', hash )
          .appendTo( document.body );
}
window.location.hash = hash;
if ( node.length ) {
  fx.remove();
  node.attr( 'id', hash );
}
}
/* imgsizer (flexible images for fluid sites) */
var imgSizer={Config:{imgCache:[],spacer:"/path/to/your/spacer.gif"},collate:function(aScope){var isOldIE=(document.all&&!window.opera&&!window.XDomainRequest)?1:0;if(isOldIE&&document.getElementsByTagName){var c=imgSizer;var imgCache=c.Config.imgCache;var images=(aScope&&aScope.length)?aScope:document.getElementsByTagName("img");for(var i=0;i<images.length;i++){images[i].origWidth=images[i].offsetWidth;images[i].origHeight=images[i].offsetHeight;imgCache.push(images[i]);c.ieAlpha(images[i]);images[i].style.width="100%";}
if(imgCache.length){c.resize(function(){for(var i=0;i<imgCache.length;i++){var ratio=(imgCache[i].offsetWidth/imgCache[i].origWidth);imgCache[i].style.height=(imgCache[i].origHeight*ratio)+"px";}});}}},ieAlpha:function(img){var c=imgSizer;if(img.oldSrc){img.src=img.oldSrc;}
var src=img.src;img.style.width=img.offsetWidth+"px";img.style.height=img.offsetHeight+"px";img.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+src+"', sizingMethod='scale')"
img.oldSrc=src;img.src=c.Config.spacer;},resize:function(func){var oldonresize=window.onresize;if(typeof window.onresize!='function'){window.onresize=func;}else{window.onresize=function(){if(oldonresize){oldonresize();}
func();}}}}


// add twitter bootstrap classes and color based on how many times tag is used
function addTwitterBSClass(thisObj) {
  var title = jQuery(thisObj).attr('title');
  if (title) {
    var titles = title.split(' ');
    if (titles[0]) {
      var num = parseInt(titles[0]);
      if (num > 0)
      	jQuery(thisObj).addClass('label label-default');
      if (num == 2)
        jQuery(thisObj).addClass('label label-info');
      if (num > 2 && num < 4)
        jQuery(thisObj).addClass('label label-success');
      if (num >= 5 && num < 10)
        jQuery(thisObj).addClass('label label-warning');
      if (num >=10)
        jQuery(thisObj).addClass('label label-important');
    }
  }
  else
  	jQuery(thisObj).addClass('label');
  return true;
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {

	// modify tag cloud links to match up with twitter bootstrap
	$("#tag-cloud a").each(function() {
	    addTwitterBSClass(this);
	    return true;
	});
	
	$("p.tags a").each(function() {
		addTwitterBSClass(this);
		return true;
	});
	
	$("ol.commentlist a.comment-reply-link").each(function() {
		$(this).addClass('btn btn-success btn-mini');
		return true;
	});
	
	$('#cancel-comment-reply-link').each(function() {
		$(this).addClass('btn btn-danger btn-mini');
		return true;
	});
	
	// Prevent submission of empty form
	$('[placeholder]').parents('form').submit(function() {
	  $(this).find('[placeholder]').each(function() {
		var input = $(this);
		if (input.val() == input.attr('placeholder')) {
		  input.val('');
		}
	  })
	});
			
	$('.alert-message').alert();
	
	$('.dropdown-toggle').dropdown();
});

(function () {
  'use strict';

  var FALLBACK_IMAGE = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAEElEQVR42gEFAPr/AP///wAI/AL+Sr4t6gAAAABJRU5ErkJggg==';
  var DEFAULT_OFFSET = 300;

  /**
   * throttle
   * @param fn
   * @param delay
   * @returns {Function}
   * @private
   * @description forked from underscore.js
   */
  function throttle(fn, delay) {
    var context, args, result;
    var timeout = null;
    var previous = 0;
    return function() {
      var now = Date.now();
      if (!previous) {
        previous = now;
      }
      var remaining = delay - (now - previous);
      context = this;
      args = arguments;
      if (remaining <= 0) {
        clearTimeout(timeout);
        timeout = null;
        previous = now;
        result = fn.apply(context, args);
        context = args = null;
      }
      return result;
    };
  }

  // create prototype from HTMLImageElement
  var LazyloadImagePrototype = Object.create(HTMLImageElement.prototype);

  // lifecycle callbacks
  LazyloadImagePrototype.createdCallback = function () {

    var that = this;

    // swap original src attribute
    this.original = this.currentSrc || this.src;
    this.src = FALLBACK_IMAGE;

    // get offset attribute for pre-loading
    this.offset = this.getAttribute('offset') - 0 || DEFAULT_OFFSET;

    this.onLoad = function (e) {
      window.removeEventListener('scroll', that.onScroll);
    };

    this.onError = function (e) {
      that.removeAttribute('srcset');
      that.src = FALLBACK_IMAGE;
      window.removeEventListener('scroll', that.onScroll);
    };

    this.onScroll = throttle(function (e) {
      var imgRect = that.getBoundingClientRect();
      var displayTop = document.documentElement.scrollTop;
      var displayBottom = displayTop + document.documentElement.clientHeight;
      if (imgRect.top > displayTop - that.offset &&
          imgRect.bottom < displayBottom + that.offset) {
        that.addEventListener('load', that.onLoad);
        that.addEventListener('error', that.onError);
        that.src = that.original;
      }
    }, 300);
  };

  LazyloadImagePrototype.attachedCallback = function () {
    var imgRect = this.getBoundingClientRect();
    var displayTop = document.documentElement.scrollTop;
    var displayBottom = displayTop + document.documentElement.clientHeight;
    if (imgRect.top > displayTop - this.offset &&
        imgRect.bottom < displayBottom + this.offset) {
      this.addEventListener('load', this.onLoad);
      this.addEventListener('error', this.onError);
      this.src = this.original;
    } else {
      window.addEventListener('scroll', this.onScroll);
    }
  };

  LazyloadImagePrototype.detachedCallback = function () {
    this.removeEventListener('load', this.onLoad);
    this.removeEventListener('error', this.onError);
    window.removeEventListener('scroll', this.onScroll);
  };

  // register element as lazyload-image
  window.LazyloadImage = document.registerElement('lazyload-image', {
    prototype: LazyloadImagePrototype,
    extends: 'img'
  });

})();
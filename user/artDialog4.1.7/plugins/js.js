<script type="text/javascript">
    // function close_all() {
    //     var list = art.dialog.list;
    //     for (var i in list) {
    //         list[i].close();
    //     };
    // }
    // 
    
(function (jQuery, doc) {

	jQuery.fn.setMyLock = function (options) {


	    var def = {
	    	show: false,
	    	message: '',
	    	isEnd: 1
	    };

	    var opts = $.extend(def, options);

		var _isIE6 = window.VBArray && !window.XMLHttpRequest,
			_isMobile = 'createTouch' in doc && !('onmousemove' in doc.documentElement)
				|| /(iPhone|iPad|iPod)/i.test(navigator.userAgent),
			docWidth = jQuery(doc).width(),
			docHeight = jQuery(doc).height(),
			baseCss = _isMobile ? 'width:' + docWidth + 'px;height:' + docHeight
				+ 'px' : 'width:100%;height:100%',
			oDiv = jQuery('<div id="myLock" style="'+ baseCss + ';background-color:#000000;filter:alpha(opacity=50);opacity:.5;display:none;position:fixed;top:0;left:0;overflow:hidden;z-index:8;"></div>'),
			oDivLoading = jQuery( '<div id="myLockLoading" style="top:200px;left:50%;margin-left:-75px;position:absolute;width:150px;height:80px;z-index:9"><img src="user/images/ajax-loader.gif" alt="" /></div>' ),
			oDivEnd = jQuery('<div id="myLockEnd" style="top:150px;left:50%;margin-left:-75px;position:absolute;width:150px;height:80px;z-index:10;filter:alpha(opacity=0);opacity:0;"><img src="user/images/end.gif" alt="" /></div>');

		jQuery('#myLock').length == 0 ? jQuery('body').append( oDiv ) : oDiv.hide();

		if(_isIE6){
			jQuery('#myLock').css({
				'position': 'absolute',
				'left': $(doc).scrollLeft(),
				'top': $(doc).scrollTop(),
				'width': $('body').clientWidth,
				'height': $('body').clientHeight
			})
		}
		if(opts.show){
			jQuery('#myLock').unbind('click').show();
			jQuery('body').append( oDivLoading );
			oDivEnd.unbind('click');
		}else{
			if(opts.isEnd == 1){
				jQuery('#myLockLoading').animate({
					'top': 250,
					'opacity': 0
				}, function () {
					jQuery(this).remove();
				});
				jQuery('body').append( oDivEnd );
				jQuery('#myLockEnd').animate({
					'top': 200,
					'opacity': 100
				});
				jQuery('#myLock').bind('click', myHide);
				jQuery('#myLockEnd').bind('click', myHide);
				setTimeout(function () {
					myHide();
				}, 3000)
			}else{
				jQuery('#myLockLoading').remove();
				// jQuery('#myLockEnd').remove();
				jQuery('#myLock').hide();
			}
		}
		function myHide() {
			jQuery('#myLock').hide();
			jQuery('#myLockEnd').animate({
				'top': 250,
				'opacity': 0
			}, function () {
				jQuery(this).remove();
			})
		}
        // if( opts.callback && (opts.callback instanceof Function) ){
        //     callback();
        // }

	};

})( jQuery, document )

// ÏÔÊ¾
function myLockShow() {
	$.fn.setMyLock({
		show: true
	});
}

// Òþ²Ø
function myLockHide(isSuccess) {
	$.fn.setMyLock({
		show: false,
		isEnd: isSuccess
	});
}


// $(function () {
// 	myLockShow();
// 	setTimeout(function () {
// 		myLockHide('1')
// 	}, 2000)
// })

</script>
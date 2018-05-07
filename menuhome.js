$('input[type="submit"]').each(function () {
   $(this).hide().after('<button>').next().button({
        icons: { primary: $(this).attr('icon') },
        label: $(this).val()
    }).click(function (event) {
         event.preventDefault();
         $(this).prev().click();
    });
});
$(function() {
	$( "#accordion" ).accordion({
		//event: "click hoverintent",
		//collapsible: true,
		heightStyle: "content"
	});
});
$.event.special.hoverintent = {
	setup: function() {
		$( this ).bind( "mouseover", jQuery.event.special.hoverintent.handler );
	},
	teardown: function() {
		$( this ).unbind( "mouseover", jQuery.event.special.hoverintent.handler );
	},
	handler: function( event ) {
		var currentX, currentY, timeout,
		args = arguments,
		target = $( event.target ),
		previousX = event.pageX,
		previousY = event.pageY;
		function track( event ) {
			currentX = event.pageX;
			currentY = event.pageY;
		};
		function clear() {
			target
			.unbind( "mousemove", track )
			.unbind( "mouseout", clear );
			clearTimeout( timeout );
		}
		function handler() {
			var prop,
			orig = event;

			if ( ( Math.abs( previousX - currentX ) +
					Math.abs( previousY - currentY )) < 7) {
				clear();
				event = $.Event( "hoverintent" );
				for ( prop in orig ) {
					if ( !( prop in event ) ) {
						event[ prop ] = orig[ prop ];
					}
				}
				delete event.originalEvent;
				target.trigger( event );
			} else {
				previousX = currentX;
				previousY = currentY;
				timeout = setTimeout( handler, 100 );
			}
		}
		timeout = setTimeout( handler, 100 );
		target.bind({
			mousemove: track,
			mouseout: clear
		});
	}
};
$(document).ready(function(){
	document.getElementById("mjudul").innerHTML="System Informasi Aplikasi Koperasi KSP Nabasa"
	$(function() {
		$('#kolomkiri a').click(function() {
			$('#loading').show();
			var xjudul=$(this).attr('title');
			$.get(this.href, function(data) {
				document.getElementById("mjudul").innerHTML=xjudul
				$('#innertub').html($(data));
				$('#loading').hide();
			}, 'html');
			return false;
		});
	});
});
function goRefresh(){
	$('#innertub').html('');
	$('#loading').hide();
	return false;
}
function goLogout(){
	document.location.href = "logout.php";
	return false;
}
function goHome(){
	document.location.href = "menu.php";
	return false;
}
function goHomea(){
	document.location.href = "admin.php";
	return false;
}
function goHomet(){
	document.location.href = "teller.php";
	return false;
}
function goHomen(){
	document.location.href = "nabasa.php";
	return false;
}
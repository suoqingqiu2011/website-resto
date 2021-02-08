/**
 * modalEffects.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */

var ModalEffects = (function() {

	function init() {

		var overlay = document.querySelector( '.md-overlay' );

		[].slice.call( document.querySelectorAll( '.add-button' ) ).forEach( function( el, i ) {

			var modal = document.querySelector( '#' + el.getAttribute( 'data-modal' ) ),
				close = modal.querySelector( '.md-close' );

			function removeModal( hasPerspective ) {
				classie.remove( modal, 'md-show' );

				if( hasPerspective ) {
					classie.remove( document.documentElement, 'md-perspective' );
				}
			}

			function removeModalHandler() {
				removeModal( classie.has( el, 'md-setperspective' ) ); 
			}

			el.addEventListener( 'click', function( ev ) {
				classie.add( modal, 'md-show' );
				overlay.removeEventListener( 'click', removeModalHandler );
				overlay.addEventListener( 'click', removeModalHandler );

				if( classie.has( el, 'md-setperspective' ) ) {
					setTimeout( function() {
						classie.add( document.documentElement, 'md-perspective' );
					}, 25 );
				}
			});

			close.addEventListener( 'click', function( ev ) {
				ev.stopPropagation();
				removeModalHandler();
			});

		} );

	}

	init();

})();


function pupopen(){
	        document.getElementById("bg").style.display="block";
            /*document.getElementById("popbox").style.display="block" ;*/	
	}

function lien_window(){

	var lienwind=document.getElementById('a1');
	lienwind.href = 'adminmenu.php?MenuID=<?php print($myrow[MenuID]);?>&MenuTypeID=<? echo $FamilleID;?>&SousFamilleID=<? echo $myrow[SousFamilleID]; ?>';
	
	document.getElementById("bg").style.display="block";
}

function pupclose(){
            document.getElementById("bg").style.display="none";
           /* document.getElementById("popbox").style.display="none" ;	*/
}

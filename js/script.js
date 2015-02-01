jQuery( document ).ready( function() {
    jQuery( '#idk-play' ).on( 'click', function() {

        jQuery( '#idk-play, body' ).toggleClass( 'playing' );
//        jQuery( 'note' ).toggle();

        jQuery( '#idk-overlay' ).html( '' ).toggle();

        if ( jQuery( '#idk-play' ).hasClass( 'playing' ) ) {

            slides = jQuery( '.slide' ).clone();

            jQuery( '#idk-overlay' ).html( slides );

            jQuery( this ).html( 'Stop' );
        } else
            jQuery( this ).html( 'Start' );

    } );
} );
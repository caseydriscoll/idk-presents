jQuery( document ).ready( function() {
    jQuery( '#idk-play' ).on( 'click', function() {

        jQuery( this ).toggleClass( 'playing' );
        jQuery( 'note' ).toggle();

        if ( jQuery( '#idk-play' ).hasClass( 'playing' ) )
            jQuery( this ).html( 'Stop' );
        else
            jQuery( this ).html( 'Start' );

    } );
} );
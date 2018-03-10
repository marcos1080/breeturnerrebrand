/**
 * Simple loop to take any images embedded intoan article and nest them in a
 * link so the user can click them to view them.
 */
jQuery( document ).ready( function( $ ) {
    var images = $( '.single main img' );
    
    images.each( function() {
        // Create link using the image src as the href.
        var anchorLink = $( '<a href="' + $( this ).attr( 'src' ) + '"></a>' );
        
        // Add to DOM and move image to link.
        anchorLink.appendTo( $( this ).parent() );
        $( this ).appendTo( anchorLink );
    });
});
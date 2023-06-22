( function( $ ){
    $( document ).ready( function(){
      $( '.jquery-btn-get-started' ).on( 'click', function( e ) {
          e.preventDefault();
          $( this ).html( 'Processing.. Please wait' ).addClass( 'updating-message' );
          $.post( ct_ajax_object.ajax_url, { 'action' : 'install_act_plugin' }, function( response ){
              location.href = 'admin.php?page=ct-crafthemes-demo-import&ct_notice=dismiss-get-started';
          } );
      } );

      function ct_plugin_installer( pl_class, pl_slug ) {
          $( pl_class ).one( 'click', function( e ) {
            e.preventDefault();
            $( this ).html( 'Installing...' ).addClass( 'updating-message' );
            $.post( ct_ajax_object.ajax_url, { 'action' : 'install_act_plugin_custom', 'plugin' : pl_slug }, function( response ){
                $( pl_class ).html( 'Installed & Activated' ).removeClass( 'updating-message js-btn-cf7 button-primary' );
            } );
        } );
      }

      ct_plugin_installer( '.js-btn-cf7', 'contact-form-7' );
    } );

    $( document ).on( 'click', '.notice-get-started-class .notice-dismiss', function () {
        // Read the "data-notice" information to track which notice
        // is being dismissed and send it via AJAX
        var type = $( this ).closest( '.notice-get-started-class' ).data( 'notice' );
        // Make an AJAX call
        $.ajax( ajaxurl,
          {
            type: 'POST',
            data: {
              action: 'periar_dismissed_notice_handler',
              type: type,
            }
          } );
      } );

    // Admin Notice For Premium Version
    $( document ).on( 'click', '.notice-ct-premium-class .notice-dismiss', function () {
        // Read the "data-notice" information to track which notice
        // is being dismissed and send it via AJAX
        var type = $( this ).closest( '.notice-ct-premium-class' ).data( 'notice' );
        // Make an AJAX call
        $.ajax( ajaxurl,
           {
              type: 'POST',
              data: {
                action: 'ct_premium_notice_handler',
                type: type,
              }
           } );
      } );
}( jQuery ) )

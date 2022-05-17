<script type="text/javascript">

    function confirmModal(delete_url,param ) {
        jQuery('#alert-modal').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_form').setAttribute('action' , delete_url);
    }
    function rightModal(url) {

       modalPreloader()
        jQuery('#right-modal').modal('show', {
            backdrop: 'true'
        });
        $.ajax({
        url: url,
        error :function(error){
          console.log(error.responseText);
        },
        success: function(response){
           jQuery('#right-modal .modal-content').html(response);
        }
        });

    }
    function largeModal(url) {
        modalPreloader()
        jQuery('#large-modal').modal('show', {
            backdrop: 'true'
        });
          $.ajax({
             url: url,
             processData: false,
			      	contentType: false,
             error :function(error){
               // console.log(error.responseText);
             },
         success: function(response){
            jQuery('#large-modal .modal-content').html(response);
         }
        });
    }



    $(".ajaxDeleteForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form,callBackFunction);
    });

</script>

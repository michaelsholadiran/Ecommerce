    {{-- Alert Modal --}}
    <div id="alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-modal="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body p-4">
        <div class="text-center">
  <i class="dripicons-information h1 text-info"></i>
          <h4 class="mt-2">Heads Up!</h4>
          <p class="mt-3">Are You Sure?</p>
          <form method="POST" class="ajaxDeleteForm" action="" id="delete_form">
            @csrf
            <button type="button" class="btn btn-info my-2" data-dismiss="modal"> Cancel</button>
            <button type="submit" class="btn btn-danger my-2"><i class="fas  fa-trash"></i>  Continue</button>
          </form>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- modal -->




{{-- Large Center Modal --}}
<div id="large-modal" class="modal fade" tabindex="-1" role="dialog" aria-modal="true">
<div class="modal-dialog modal-md">
<div class="modal-content">






</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- modal -->










{{-- Right Modal --}}
<div class="modal fade right" id="right-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog " role="document">
        <div class="modal-content">







        </div><!-- modal-content -->
      </div><!-- modal dialog-->
    </div><!-- modal -->

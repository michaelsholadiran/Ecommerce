
@if (count($drafts) >0)
  <table class="table table-striped dt-responsive" id="table-2">
      <thead>
          <tr>
              <th>Subject</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($drafts as $draft)
          <tr>
              <td>{{$draft->subject}}</td>
              <td>
                <a href="{{route('backend.email_marketing.edit_draft', ['id'=>$draft->id])}}" class="btn btn-outline-primary mr-2 use">Use</a>
                  <a href="{{route('backend.email_marketing.destroy_draft', ['id'=>$draft->id])}}" class="btn btn-outline-danger mr-2 delete"><i class="fas
fas fa-trash"></i></a>
              </td>
          </tr>
        @endforeach

      </tbody>
  </table>

@else
  <div class="text-center">
    <img src="{{asset('assets/backend/img/nodata-found.png')}}" alt="" style="height:200px;width:200px">
  </div>

@endif
<script type="text/javascript">
var data_fetcher = function() {
  $(".use").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: 'GET',
        url: $(this).attr('href'),
        error: function(error) {
            console.log(error.responseText);
        },
        success: function(response) {
          // console.log(response);
          // console.log(response.from);
          $('#from_name').val(response.from_name)
          $('#from_email').val(response.from_email)
          $('#subject').val(response.subject)
          $('#body').summernote("code", response.body)


        }
      });
    });
}
data_fetcher()
var callBackFunction = function() {
    $.ajax({
        type: 'GET',
        url: '{{route('backend.email_marketing.draft_list')}}',
        error: function(error) {
            // console.log(error.responseText);
        },
        success: function(response) {
          // console.log('hree');
            $('.list').html(response);
            $("#table-2").dataTable({
        "columnDefs": [
          { "sortable": false, "targets": [2, 3] }
        ]
      });
        }
    });
}

    $(".delete").click(function (e) {
      e.preventDefault();
    swal({
        title: 'Are you sure?',
        text: 'Once deleted, you will not be able to recover this file!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
        .then((willDelete) => {
  if (willDelete) {
          var callBackFunction = function() {
              $.ajax({
                  type: 'GET',
                  url: '{{route('backend.email_marketing.draft_list')}}',
                  error: function(error) {
                      console.log(error.responseText);
                  },
                  success: function(response) {
                    // console.log('hree');
                      $('.list').html(response);
                      $("#table-2").dataTable({
                  "columnDefs": [
                    { "sortable": false, "targets": [2, 3] }
                  ]
                });
                  }
              });
          }

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });


          $.ajax({
              type: "DELETE",
              url: $(this).attr('href'),
              processData: false,
              contentType: false,
              dataType: 'json',
              error: function(error) {
                console.log(error.responseText);
              },
              success: function(response) {
                  // console.log(response);
                      if (response.status) {
                      callBackFunction();
                      iziToast.success({
                          title: 'Success!',
                          message: 'Successful',
                          position: 'topRight'
                      });

                  }
              }
          });
}
        });

    });
</script>

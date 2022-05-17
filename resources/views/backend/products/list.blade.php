
@if (count($list) >0)
  <table class="table table-striped dt-responsive" id="table-1">
      <thead>
          <tr>
              <th>Product</th>
              <th>Inventory</th>
              <th>Status</th>
              <th>Date</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($list as $l)
          <tr>

              <td>{{$l->title}}</td>
              <td>
                  64 of {{$l->quantity}}
              </td>
              <td>
                  @if ($l->status)
                  <div class="badge badge-success badge-shadow"> {{'Published'}}</div>
                  @else
                  <div class="badge badge-danger badge-shadow"> {{'Drafted'}}</div>
                  @endif
              </td>
              <td>
                  {{$l->created_at->format('d M Y') }}
              </td>
              <td>
                <a href="{{route('backend.product.edit', ['id'=>$l->id])}}" class="btn btn-primary">Edit</a>
                <a href="{{route('backend.product.destroy', ['id'=>$l->id])}}" class="btn btn-danger delete">Delete</a>
                   {{-- <button class="btn btn-primary" id="swal-6">Launch</button> --}}
              </td>



          </tr>
          @endforeach
      </tbody>
  </table>
  <script type="text/javascript">

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
                    url: '{{route('backend.product.list')}}',
                    error: function(error) {
                        // console.log(error.responseText);
                    },
                    success: function(response) {
                      // console.log('hree');
                        $('.list').html(response);
                        $("#table-1").dataTable({
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
                    console.log(response);
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
@else
  <div class="text-center">
    <img src="{{asset('assets/backend/img/nodata-found.png')}}" alt="" style="height:200px;width:200px">
  </div>

@endif

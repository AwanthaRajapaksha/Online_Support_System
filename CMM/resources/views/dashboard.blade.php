@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        <h1 style="text-align: center;" >All Problems Details</h1>
    </div>
    <div class="row">
       <div class="col">
            <section>
                <table id="userTable" width="100%">
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Problem</th>
                    <th>Phone Number</th>
                    <th>Token</th>
                    <th>Date</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($problems as $key => $problem)
                        <tr>
                        <td>{{ $problem->name }}</td>
                        <td>{{ $problem->email }}</td>
                        <td>{{ $problem->problem }}</td>
                        <td>{{ $problem->phone }}</td>
                        <td>{{ $problem->token }}</td>
                        <td>{{ $problem->created_at }}</td>
                        <td>
                            <button type="button"  class="ProblemDetails btn btn-success "  value="{{ $problem->id }}" >View</button>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </section>
       </div>
    </div>



    <div class="modal fade" id="UserProbelem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Problem Information</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form  action="" method="post" enctype="multipart/form">
                   @csrf
               <input type="hidden" name="up_problrm_id" class="form-control" id="up_problem_id">
               <input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Name:</label>
                  <input type="text" name="up_name" class="form-control" id="up_name" readonly>
                </div>
                <div class="mb-3">
                   <label for="recipient-name" class="col-form-label">Email:</label>
                   <input type="email" name="up_email" class="form-control" id="up_email" readonly>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Phone Number:</label>
                    <input type="email" name="up_phone" class="form-control" id="up_phone" readonly>
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">problem:</label>
                  <textarea class="form-control" name="up_problem" id="up_problem" readonly></textarea>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Answer</label>
                    <textarea class="form-control" name="up_answer" id="up_answer"></textarea>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary submit_answer"  >Submit Answer</button>
            </div>
            </form>
          </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

        $(document).on('click','.ProblemDetails',function(e){
            e.preventDefault();
            var problem_id =$(this).val();
            //console.log(problem_id);
            $('#UserProbelem').modal('show');
            $.ajax({
                url: "/getproblem/"+problem_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#up_problem_id').val(data.problem.id);
                    $('#up_name').val(data.problem.name);
                    $('#up_email').val(data.problem.email);
                    $('#up_phone').val(data.problem.phone);
                    $('#up_problem').val(data.problem.problem);
                   // console.log(data.problem);
                   localStorage.setItem("problemid", data.problem.id);
                },
                error: function() {
                    alert('Error loading data.');
                }
            });

        });


        $('.submit_answer:not(.dd)').on('click',function(){

            $.ajaxSetup({
              headers: {
                'X-CSSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            var emp_id =$('#emp_id').val();
            var data ={
                'name' : $('#up_name').val(),
                'email' : $('#up_email').val(),
                'problem' : $('#up_problem').val(),
                'phone' : $('#editaddress').val(),
                'answer' : $('#editaddress').val(),
            };
            console.log(data);
            $.ajax({
              url:  '/updateanswer/'+ $('#up_problem_id').val(),
              type: 'GET',
              data: data,
              success: function (data) {

            }
            });
        });

    </script>
</div>
@endsection

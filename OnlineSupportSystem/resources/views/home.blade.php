@extends('layouts.app')

@section('content')

<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div>
        <h1 style="text-align: center;" >All Problems Details</h1>
        <p style="text-align: center;color:red;" >The red Problems have not been answered yet</p>
    </div>
    <div class="row">
       <div class="col">
            <section>
                <table id="userTable" >
                <thead>
                    <tr>
                    <th id="UserName" >Name</th>
                    <th id="UserEmail">Email</th>
                    <th id="UserProblem">Problem</th>
                    <th id="UserPhone">Phone Number</th>
                    <th id="UserToken">Token</th>
                    <th id="UserDate">Date</th>
                    <th id="UserAction">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($problems as $key => $problem)

                        <tr class="status"  value="{{ $problem->answer }}" >
                        <td id="UserName2">{{ $problem->name }}</td>
                        <td id="UserEmail2">{{ $problem->email }}</td>
                        <td id="UserProblem2">{{ $problem->problem }}</td>
                        <td id="UserPhone2">{{ $problem->phone }}</td>
                        <td id="UserToken2">{{ $problem->token }}</td>
                        <td id="UserDate2">{{ $problem->created_at }}</td>
                        <td id="UserAction2">
                            <button type="button"  class="ProblemDetails btn btn-success "  value="{{ $problem->id }}" >View</button>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </section>
       </div>
    </div>

    <div class="modal" tabindex="-1" aria-hidden="true" id="exampleModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Problem Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action="{{ route('update.answer') }}" method="post" enctype="multipart/form">
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
                     <textarea class="form-control" name="up_answer" id="" required></textarea>
                   </div>
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
            </div>
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

          $(document).ready(function() {
            $('tr.status[value=0]').closest('tr').css('background-color', '#e35b5b');
          });


        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

        $(document).on('click','.ProblemDetails',function(e){
            e.preventDefault();
            var problem_id =$(this).val();
            //console.log(problem_id);
            $('#exampleModal').modal('show');
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
                    $('#up_answer').val(data.problem.answer);
                   // console.log(data.problem);
                   localStorage.setItem("problemid", data.problem.id);
                },
                error: function() {
                    alert('Error loading data.');
                }
            });

        });



    </script>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
    @endif
    <button type="submit" class="btn btn-primary create_ticket ">Create a Titicket</button>
    <div class="modal" tabindex="-1" aria-hidden="true" id="exampleModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Create a Ticket</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <form class="form-inline" action="{{ route('post.store') }}" method="post" enctype="multipart/form">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Problem Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="problem" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                            <div id="emailHelp" class="form-text">We will never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" required>Phone Number</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
<div class="container">
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
                        <th id="UserProblem">Problem</th>
                        <th id="UserToken">Token</th>
                        <th id="UserDate">Date</th>
                        <th id="UserAction">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($problems as $key => $problem)

                            <tr class="status"  value="{{ $problem->answer }}" >
                            <td id="UserProblem2">{{ $problem->problem }}</td>
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
</div>

    <div class="modal" tabindex="-1" aria-hidden="true" id="viewmodel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Problem Details :-  </h5>
              <label  for="recipient-name" class="col-form-label mt-1"  id="token_number"> </label>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action="{{ route('update.answer') }}" method="post" enctype="multipart/form">
                    @csrf
                <input type="hidden" name="up_problrm_id" class="form-control" id="up_problem_id">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
                 <div class="mb-3">
                   <label for="left" class="col-form-label">Name :- </label>
                   <label  for="right" class="col-form-label"  id="up_name"></label>
                 </div>
                 <div class="mb-3">
                    <label for="left" class="col-form-label">Email :- </label>
                    <label for="right" class="col-form-label" id="up_email"></label>
                 </div>
                 <div class="mb-3">
                    <label for="left" class="col-form-label">Phone Number :- </label>
                    <label for="right" class="col-form-label" id="up_phone"></label>
                 </div>
                 <div class="mb-3">
                    <label for="left" class="col-form-label">Problem :- </label>
                    <label for="right" class="col-form-label" id="up_problem"></label>
                 </div>
                 <div class="mb-3">
                    <label for="left" class="col-form-label">Answer :- </label>
                    <label for="right" class="col-form-label" id="up_answer"></label>
                </div>
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $(document).ready(function() {
            $('tr.status[value=0]').closest('tr').css('background-color',  '#e35b5b');
          });

        $(document).on('click','.ProblemDetails',function(e){
            e.preventDefault();
            var problem_id =$(this).val();
            //console.log(problem_id);
            $('#viewmodel').modal('show');
            $.ajax({
                url: "/getproblem/"+problem_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#up_problem_id').val(data.problem.id);

                    $('#up_name').html(data.problem.name);
                    $('#up_name').html(data.problem.name);
                    $('#up_email').html(data.problem.email);
                    $('#up_phone').html(data.problem.phone);
                    $('#up_problem').html(data.problem.problem);
                    $('#token_number').html(data.problem.token);

                    if(data.problem.answer == '0'){
                        $('#up_answer').html('The Ticket has not yet been reviewed');
                    }
                    else{
                        $('#up_answer').html(data.problem.answer);
                    }
                   // console.log(data.problem);
                },
                error: function() {
                    alert('Error loading data.');
                }
            });

        });

        $(document).on('click','.create_ticket',function(e){
            e.preventDefault();
            $('#exampleModal').modal('show');
        });



    </script>
</div>
@endsection

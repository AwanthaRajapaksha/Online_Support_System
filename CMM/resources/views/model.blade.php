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

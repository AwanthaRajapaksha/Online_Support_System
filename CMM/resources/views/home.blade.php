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
</div>
@endsection



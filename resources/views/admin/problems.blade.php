@extends('layouts.app')

@section('content') 
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <!-- Current Problems -->
            @if (count($problems) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Problems
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped problem-table">
                            <thead>
                                <th>Problem</th>
                                <th>User</th>
                                <th>Date added</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($problems as $problem)
                                    <tr>
                                        <td class="table-text"><div>{{ $problem->content }}</div></td>
                                        <td class="table-text"><div>{{ $problem->user->name }}</div></td>
                                        <td class="table-text"><div>{{ $problem->created_at }}</div></td>
                                        <!-- Problem Delete Button -->
                                        <td>                                        
                                            <form action="/admin/problem/{{ $problem->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-problem-{{ $problem->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
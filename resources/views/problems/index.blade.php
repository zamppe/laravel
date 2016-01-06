@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Problem
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Problem Form -->
                    <form action="/problem" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Problem Name -->
                        <div class="form-group">
                            <label for="problem-content" class="col-sm-3 control-label">Content</label>

                            <div class="col-sm-6">
                                <input type="text" name="content" id="problem-content" class="form-control" value="{{ old('problem') }}">
                            </div>
                        </div>

                        <!-- Add Problem Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add problem
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Problems -->
            @if (count($problems) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        My Problems
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped problem-table">
                            <thead>
                                <th>Problem</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($problems as $problem)
                                    <tr>
                                        <td class="table-text"><div>{{ $problem->content }}</div></td>

                                        <!-- Problem Delete Button -->
                                        <td>
                                            <form action="/problem/{{ $problem->id }}" method="POST">
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
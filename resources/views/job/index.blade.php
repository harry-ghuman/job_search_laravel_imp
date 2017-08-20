@extends('layouts.master_module')
@section('page.title')
    Jobs
@endsection
@section('page.body')
    <div class="title">
        <div class="container">
            List of Jobs
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <?php if(!count($jobs)){ ?>
                    <div class="alert alert-info text-center h4">
                        No job has been posted yet!
                        <br>
                        <br>
                        <div class="text-center">
                            <a href="{{ URL::to('job/create#title') }}" class="btn btn-sm btn-primary">Create Job</a>
                        </div>
                    </div>
                    <?php }
                    else { ?>
                        <div class="text-right">
                            <a href="{{ URL::to('job/create#title') }}" class="btn btn-sm btn-primary">Create Job</a>
                        </div>
                        <table class="table table-condensed">
                            <thead>
                            <th>#</th>
                            <th>Job title</th>
                            <th>Credits</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td title="Click to view more information"><a href="{{ URL::to('job/' . $job->id.'/#title') }}">{{ ucwords($job->job_title) }}</a></td>
                                    <td>{{ ucwords($job->credits) }}</td>
                                    <td>
                                        <a href="{{ URL::to('job/' . $job->id.'/edit#title') }}" class="btn btn-xs btn-primary">Edit</a>
                                        <div style="display: inline-block;">
                                            {{ Form::open(array('url' => 'job/' . $job->id,'onsubmit' => 'return confirm("Are you sure you want to delete '.$job->job_title.'?")')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-primary')) }}
                                            {{ Form::close() }}
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
@endsection
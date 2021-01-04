@extends('layouts.app')

@section('content')

    <div class="card row col-12 mx-0 p-4 border-radius">
        <div class="col-2 ml-auto addButtonContainer">
            <button id="addJobBtn" class="btn btn-info mb-4 float-right">Add Job</button>
        </div>
        <div class="table-responsive">
            <table id="jobs" class="display">
                <thead>
                <tr>
                    <th>Employee</th>
                    <th>Fixed Price</th>
                    <th>Title</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>{{$job->getEmployeeName()}}</td>
                        <td>{{$job->getFixedPrice()}}</td>
                        <td>{{$job->title}}</td>
                        <td>{{$job->due_date->diffForHumans()}}</td>
                        <td>{!! $job->getJobStatusBadge() !!}</td>
                        <td>{{$job->contact}}</td>
                        <td>
                            <button class="btn bnt-sm rounded-circle btn-success m-auto removeJob"
                                    data-job-id="{{$job->id}}"><i class="fa fa-trash text-info"
                                                                  aria-hidden="true"></i>
                            </button>
                            <button class="btn bnt-sm rounded-circle btn-success m-auto editJob"
                                    data-job-id="{{$job->id}}"><i class="fa fa-pencil text-info"
                                                                  aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('modals.modal-addJob')
    @include('modals.modal-edit-job')

    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
    </script>

    <script>

        $(document).ready(function () {

            $('#jobs').DataTable({
                dom: 'fBlrtp',
                oLanguage: {
                    sProcessing: '<div class="dt-loader"></div>',
                    sSearch: '<i class="fa fa-search text-info dtSearchIcon mr-2" aria-hidden="true"></i>',
                },
                language: {
                    searchPlaceholder: "Search...",
                    lengthMenu: "Show:  _MENU_"
                },
            });

            $('#addJobBtn').click(function () {
                $('#addJob').modal('show');
            });

            $('.removeJob').click(function () {
                var job_id = $(this).attr('data-job-id');
                $.ajax({
                    url: '/jobs/remove',
                    type: 'get',
                    data: {
                        job_id: job_id,
                    },
                    "_token": "{{ csrf_token() }}",
                    headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                }).done(function () {
                    location.reload();
                });
            });

            $('.editJob').click(function () {
                var job_id = $(this).attr('data-job-id');
                $('#editJob').modal('show');
                $('#editJob').attr('data-job-id', job_id);
            });

        });

    </script>

@endsection

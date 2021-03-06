@extends('layouts.app')

@section('the-menu')
    <div class="block-header">
        <h2>SERVICES</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('workspaces.show', $workspace) }}" class="info-box-link">
                        <div class="info-box bg-teal hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">dashboard</i>
                            </div>
                            <div class="content">
                                <div><h3>Workspace</h3></div>
                            </div>
                        </div>
                    </a>
                </div>
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('workspaces.jobs.index', $workspace) }}" class="info-box-link">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div><h3>JOBS</h3></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('workspaces.png2cvt.index', $workspace) }}" class="info-box-link">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">cached</i>
                    </div>
                    <div class="content">
                        <div>
                            <h3>Png
                                <small><span style="color: #E91E63">to</span></small>
                                cvt
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('workspaces.cli', $workspace) }}" class="info-box-link">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">code</i>
                    </div>
                    <div class="content">
                        <div><h3>Console</h3></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('render.index', $workspace) }}" class="info-box-link">
                <div class="info-box bg-brown hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">videocam</i>
                    </div>
                    <div class="content">
                        <div><h3>Render</h3></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('workspaces.output.index', $workspace) }}" class="info-box-link">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">open_in_new</i>
                    </div>
                    <div class="content">
                        <div><h3>Output</h3></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- #END# Widgets -->
@endsection

@section('main-content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Jobs
                        <small>All jobs you have been submitted on this workspace</small>
                    </h2>
                    <ul class="header-dropdown m-r--1">
                        <li>
                            <a href="{{ route('workspaces.jobs.create_empty', $workspace) }}">
                                  <i class="material-icons">add_circle_outline</i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Job Key<th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Aksi</th>
                            {{--<th>Status*</th>--}}
                            {{--<th>Action</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($workspace->jobs as $job)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th><a href="{{ route('workspaces.jobs.edit', [$workspace->id, $job]) }}">{{ $job->key }}</a></th>
                            <th></th>
                            <td>{{ $job->name }}</td>
                            <td>{{ $job->created_at->format('d F Y') }}</td>
{{--                            <td>{{ \App\Job::$statusNames[$job->status] }}</td>--}}
                            {{--<td>--}}
                                {{--<a href="{{ route('jobs.show', $job->key) }}">--}}
                                    {{--<button type="submit" style="border: none; background: none; cursor: pointer;">--}}
                                        {{--<i class="material-icons">remove_red_eye</i>--}}
                                    {{--</button>--}}
                                {{--</a>--}}
                                {{--@if ($job->status == 'running' || $job->status == 'queued')--}}
                                    {{--{{ Form::open([--}}
                                        {{--'url' => route('jobs.destroy', $job->id),--}}
                                        {{--'method' => 'delete'--}}
                                    {{--]) }}--}}
                                    {{--<button type="submit" style="border: none; background: none; cursor: pointer;">--}}
                                        {{--<i class='material-icons'>cancel</i>--}}
                                    {{--</button>--}}
                                    {{--{{ Form::close() }}--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            <td>
                                {{ csrf_field() }}
                                <a class="delete-job" data-workspace="{{ $workspace->id }}" data-job="{{ $job->id }}" href="#" data-toggle="tooltip" data-placement="top" title="Delete"><i class="material-icons" id="tt1">highlight_off</i></a>
                                {{-- <button type="submit"><i class="material-icons" id="tt1">highlight_off</i></button> --}}
                                <a href="{{ route('workspaces.jobs.edit', [$workspace, $job]) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons">create</i></a>
                                <a href="{{ route('workspaces.jobs.log', [$workspace, $job]) }}" data-toggle="tooltip" data-placement="top" title="Log"><i class="material-icons">error_outline</i></a>
                                {{-- <a href="" data-toggle="tooltip" data-placement="top" title="Run"><i class="material-icons">play_circle_outline</i></a> --}}
                                <span data-toggle="tooltip" data-placement="top" title="Run">
                                <a class="toggle-the-modal" data-job-key="{{ $job->key }}" data-workspace-id="{{ $workspace->id }}" data-job-id="{{ $job->id }}" data-email="{{ auth()->user()->email }}" data-toggle="modal" data-target="#myModal" title="Run" style="cursor: pointer;"><i class="material-icons">play_circle_outline</i></a>
                                </span>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Run ! -bashFile</h4>
          </div>
            <form id="run-job" method="GET" class="form-horizontal">
              <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="sel1">Nama Partisi</label>
                    <div class="col-sm-8">
                      <select name="partition" class="form-control" id="sel1">
                        <option value="zw">zwoelfkerne</option>
                        <option value="sun" >sun</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="sel2">Jumlah Node</label>
                    <div class="col-sm-8">
                      <select name="total_node" class="form-control" id="sel2">
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="8">8</option>
                        <option value="16">16</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Job</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="nama-job" type="text" value="nama-job" disabled>
                      <input id="job-name" name="job_name" type="hidden">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="nama-email" type="text" name="email" placeholder="Alamat email...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Error log file path</label>
                    <div class="col-sm-8">
                      <input class="form-control" type="text" id="nama-error-log" placeholder="Error log path..." disabled>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Run">
              </div>
          </form>
        </div>

      </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendors/mustache/mustache.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            let temp = '' +
                '<select class="form-control attribute-select">' +
                '@{{{ options }}}' +
                '</select>';
            let attrTemplate = '' +
                '<div class="mdl-card mdl-card--border mdl-shadow--2dp attribute-card">' +
                '<div class="attribute-card-title">@{{ attribute }}</div>  ' +
                '<div style="align: center; display: inline-block;">' +
                '<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect micro-fab add-attribute">' +
                '<i class="material-icons">add</i>' +
                '</button>' +
                '</div>' +
                '</div>' +
                '</div>';

            $('body').on('click', '.add-attribute', function () {
                let options = '', item, obj, optTemplate;
                item = $(this).parents('.mdl-list__item').find('.mdl-list__item-primary-content');
                obj = (item.data('values'));
                optTemplate = "<option value='@{{ value }}'>@{{ value }}</option>";
                $.each(obj, function (key, value) {
                    options += Mustache.render(optTemplate, {
                        value: value
                    })
                });

                console.log((options));

                $('#used-attribute').append(Mustache.render(attrTemplate, {
                    attribute: item.data('name'),
                    options: options
                }))
            })
        })
    </script>
    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        $(document).ready(function() {
            let PORT = window.location.port
            let BASE_URL = window.location.protocol + '//' + window.location.hostname
            if (PORT != '')
                BASE_URL = BASE_URL + ':' + PORT

            $('.delete-job').click(function() {
                let result = confirm("Apakah Anda yakin ingin menghapus job ini?")
                if (result) {
                    let _token = $("input[name='_token']").val()
                    let workspace = $(this).attr('data-workspace')
                    let job = $(this).attr('data-job')

                    console.log("Token " + _token + " workspace " + workspace + " job " + job)

                    $.ajax({
                        type: 'DELETE',
                        url: BASE_URL + "/workspaces/" + workspace + '/jobs/' + job + '/delete',
                        data: {
                            _token: _token
                        },
                        dataType: 'json',
                        success: function(data) {
                            window.location.reload()
                        },
                        error: function(error) {
                            alert("An error occured: " + error)
                        }
                    })
                }
            })

            $('.toggle-the-modal').click(function() {
                let jobKey = $(this).attr('data-job-key')
                let jobNameArray = jobKey.split("_").slice(6, jobKey.length)

                let jobName = jobNameArray.join(" ")
                let jobId = $(this).attr('data-job-id')
                let workspaceId = $(this).attr('data-workspace-id')
                let email = $(this).attr('data-email')

                $('#myModal').find('#run-job').attr('action', BASE_URL + '/workspaces/' + workspaceId + '/jobs/' + jobId + '/run')
                $('#myModal').find('#nama-email').val(email)
                $('#myModal').find('#job-name').val(jobName)
                $('#myModal').find('#nama-job').val(jobName)
                $('#myModal').find('#nama-error-log').val(jobKey + "/slurm.out")
            })
        })
    </script>
@endpush

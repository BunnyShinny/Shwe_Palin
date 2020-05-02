@extends('layouts.app', [ 'namePage' => 'Dashboard', 'class' => 'login-page
sidebar-mini ', 'activePage' => 'Feedback', 'backgroundImage' => asset('now') .
"/img/bg14.jpg", ]) @section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                      <h4 class="card-title">Feedback</h4>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Subject
                                    </th>                                  
                                    <th>
                                        Message
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($feedbacks as $key=> $feedback)

                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{$feedback->name}}</td>
                                    <td>{{$feedback->email}}</td>
                                    <td>{{$feedback->subject}}</td>
                                    <td>{{$feedback->message}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @push('js')
<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
    });
</script>
@endpush

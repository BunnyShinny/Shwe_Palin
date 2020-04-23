@extends('layouts.app', [
'namePage' => 'Dashboard',
'class' => 'login-page sidebar-mini ',
'activePage' => 'Reservationlist',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-5">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Update Reservation</h3>
        </div>
        <div class="card-body">
        <form class="" method="POST" action="{{route('reservations.update',$reservations->id)}}" enctype="multipart/form-data">  
                        @csrf 
                        @method('PUT')
                        <div class="book_Form">
                            <h3></h3>
                            <div class="row ">
                                <div class="col-lg-6">
                                    <div class="input_field mb_15">
                                        <input type="text" name="name" value="{{ old('name',$reservations->name) }}" class="form-control">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input_field mb_15">
                                        <input type="text"  name="phone" value="{{ old('phone',$reservations->phone) }}" class="form-control">
                                        @include('alerts.feedback', ['field' => 'phone'])
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input_field">
                                        <input id="datepicker2" type="date" name="date" value="{{ old('date',$reservations->date) }}" class="form-control">
                                        @include('alerts.feedback', ['field' => 'date'])
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input_field mb_15">
                                        <input type="number"  name="no_of_people" value="{{ old('no_of_people',$reservations->no_of_people) }}" class="form-control">
                                        @include('alerts.feedback', ['field' => 'no_of_people'])
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input_field">
                                        <select class="wide" name="branch">
                                            <option selected disabled>Select a Branch</option>
                                            @foreach($branches as $branch)
                                            <option value="{{$branch->id}}"{{$reservations->branch_id == $branch->id ? 'selected':''}}>{{$branch->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <button class="sumbit_btn" type="submit">Update</button>
                                </div>
                                <!-- <div class="col-lg-6">
                                    <div class="single_add d-flex">
                                        <div class="icon">
                                            <img src="img/svg_icon/address.svg" alt="">
                                        </div>
                                        <div class="ifno">
                                            <h4>Address</h4>
                                            <p>20/D, Kings road, Green lane</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single_add d-flex">
                                        <div class="icon">
                                            <img src="img/svg_icon/head.svg" alt="">
                                        </div>
                                        <div class="ifno">
                                            <h4>Reservation</h4>
                                            <p>+10 673 567 367</p>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
  $(document).ready(function () {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

  });
</script>
@endpush
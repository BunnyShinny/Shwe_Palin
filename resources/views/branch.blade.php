@extends('layouts.frontend')

@section('slider_area')
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Branch</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
@endsection

@section('content')
<!-- Delicious area start  -->
<div class="Delicious_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-50">
                    <h3>Branch</h3>
                </div>
            </div>
        </div>
        <div class="d-none d-sm-block mb-5 pb-4">
                    <div id="map" style="height: 480px; position: relative; overflow: hidden;"> </div>
                    <script>
                        function initMap() {
                            var uluru = {
                                lat: -25.363,
                                lng: 131.044
                            };
                            var grayStyles = [{
                                    featureType: "all",
                                    stylers: [{
                                            saturation: -90
                                        },
                                        {
                                            lightness: 50
                                        }
                                    ]
                                },
                                {
                                    elementType: 'labels.text.fill',
                                    stylers: [{
                                        color: '#ccdee9'
                                    }]
                                }
                            ];
                            var map = new google.maps.Map(document.getElementById('map'), {
                                center: {
                                    lat: -31.197,
                                    lng: 150.744
                                },
                                zoom: 9,
                                styles: grayStyles,
                                scrollwheel: false
                            });
                        }
                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&amp;callback=initMap">
                    </script>
    
                </div>
        

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                @foreach($branches as $branch)
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                            <a href="{{asset($branch->image)}}"><img src="{{asset($branch->image)}}" alt="" style="max-width: 232px; border-radiu: 232px"></a>
                            </div>
                            <div class="info">
                                <h3>{{$branch->name}}</h3>
                                <p>{{$branch->phone}}</p>
                                <p><a href="" class="buy-now btn btn-sm btn-secondary">Table Reserve</a></p>
                                <h3>Open-Close :<span>{{$branch->open_hour}}</span></h3>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                @endforeach
                    <!-- <div class="col-md-6 col-lg-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/branch/branch.jpg" alt="">
                            </div>
                            <div class="info">
                                <h3>Shwe Palin (Hantharwaddy Branch)</h3>
                                <p>09-xxxxxxxx</p>
                                <p><a href="" class="buy-now btn btn-sm btn-secondary">Table Reserve</a></p>
                                <h3>Open-Close:<span>9AM-9PM</span></h3>
                                
                                
                                
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/branch/branch.jpg" alt="">
                            </div>
                            <div class="info">
                                <h3>Shwe Palin (Hantharwaddy Branch)</h3>
                                <p>09-xxxxxxxx</p>
                                <p><a href="" class="buy-now btn btn-sm btn-secondary">Table Reserve</a></p>
                                <h3>Open-Close:<span>9AM-9PM</span></h3>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/branch/branch.jpg" alt="">
                            </div>
                            <div class="info">
                                <h3>Shwe Palin (Hantharwaddy Branch)</h3>
                                <p>09-xxxxxxxx</p>
                                <p><a href="" class="buy-now btn btn-sm btn-secondary">Table Reserve</a></p>
                                <h3>Open-Close:<span>9AM-9PM</span></h3>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/branch/branch.jpg" alt="">
                            </div>
                            <div class="info">
                                <h3>Shwe Palin (Hantharwaddy Branch)</h3>
                                <p>09-xxxxxxxx</p>
                                <p><a href="" class="buy-now btn btn-sm btn-secondary">Table Reserve</a></p>
                                <h3>Open-Close:<span>9AM-9PM</span></h3>
                                
                                
                                
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single_delicious d-flex align-items-center">
                            <div class="thumb">
                                <img src="frontend/img/branch/branch.jpg" alt="">
                            </div>
                            <div class="info">
                                <h3>Shwe Palin (Hantharwaddy Branch)</h3>
                                <p>09-xxxxxxxx</p>
                                <p><a href="" class="buy-now btn btn-sm btn-secondary">Table Reserve</a></p>
                                <h3>Open-Close:<span>9AM-9PM</span></h3>
                                
                                
                                
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
           
        </div>



    </div>
</div>
<!--/ Delicious area start  -->
@endsection
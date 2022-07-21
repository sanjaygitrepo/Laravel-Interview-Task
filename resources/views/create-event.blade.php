<!DOCTYPE html>
<html lang="en">

@include('header-link')

<body id="page-top" class="bg-light">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('topnavbar')

        <!-- Begin Page Content -->
        <div class="container">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Add Event</h1>
                <a href="{{route('events.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Back </a>
                </div>
            </div>
        </div>
         <div class="container">
            <div class="table-page card">
                <div class="card-body">
                    <form method="post" action="{{route('events.store')}}" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="user">Name</label>
                            <input type="text" class="form-control" placeholder="" value="{{old('name')}}" required name="name">
                            @error('name')<span class="text-danger">{{$message}}</span>@enderror

                        </div>
                        <div class="form-group">
                            <label for="user">Start Date</label>
                            <input type="date" class="form-control" min="{{date('Y-m-d')}}" placeholder="" required name="start_date" value="{{old('start_date')}}">
                            @error('start_date')<span class="text-danger">{{$message}}</span>@enderror

                        </div>
                        <div class="form-group">
                            <label for="user">End Date</label>
                            <input type="date" class="form-control" placeholder="" min="{{date('Y-m-d')}}" required name="end_date" value="{{old('end_date')}}">
                            @error('end_date')<span class="text-danger">{{$message}}</span>@enderror

                        </div>  

                        <div class="form-group">
                            <label for="user">Enter Location</label>
                                <input id="pac-input" type="text" class="form-control" placeholder="Enter a location" required="" name="location" value="{{old('location') }}">
                                <input type="hidden" id="lat" name="latitude" value="{{old('latitude') }}">
                                <input type="hidden" id="long" name="longitude" value="{{old('longitude') }}">
                                <div id="map"></div>
                                <input id="address" type="hidden" value="{{'India'}}">
                            @error('location')<span class="text-danger">{{$message}}</span>@enderror
                                

                        </div>                                                                        


                        <button type="submit" class="btn btn-primary">Submit</button>


                    </form>

                </div>

           </div>

        </div>
    </div>
</div>    
       



@include('footer')

<script src="{{asset('public/js/external.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7Q-4RyzDgzXbKu46XqobiQmFDTfO2fvw&libraries=places&callback=initMap" async defer></script>

</body>

</html>
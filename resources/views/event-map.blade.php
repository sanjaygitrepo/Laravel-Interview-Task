<!DOCTYPE html>
<html lang="en">

@include('header-link')

<body id="page-top" class="bg-light">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('topnavbar')

        <div class="container">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">View Event</h1>
                <a href="{{route('events.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Back </a>
                </div>
            </div>
        </div>
         <div class="container">
                <div class="mapouter"><div class="gmap_canvas"><iframe width="1000" height="600" id="gmap_canvas" src="https://maps.google.com/maps?q={{$event->location}}&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:600px;width:1000px;}</style><a href="https://www.embedgooglemap.net">embedded google maps in website</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:600px;width:1000px;}</style></div></div>

        </div>
    </div>
</div>    
       
@include('footer')
</body>

</html>
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
                <h1 class="h3 mb-0 text-gray-800">Events List</h1>
                <a href="{{route('events.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add Event</a>
                </div>
            </div>
        </div>
         <div class="container">
            <div class="table-page card">
                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">S.No</th>
                          <th scope="col">Name</th>
                          <th scope="col">Start Date</th>
                          <th scope="col">End Date</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$event->name}}</td>
                            <td>{{date('d M Y',strtotime($event->start_date))}}</td>
                            <td>{{date('d M Y',strtotime($event->end_date))}}</td>
                            <td><a href="{{route('events.show',[$event->id])}}" title="View Event" class="btn btn-sm btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{$events->links()}}                    
                </div>
           </div>

        </div>
    </div>
</div>    
       
@include('footer')
</body>

</html>
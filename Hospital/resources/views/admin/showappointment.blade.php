<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates,
                                and more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div align="center" style="padding: 50px;">
                <h1 style="padding: 20px; font-size:40px;">List Appointment</h1>
                <table>
                    <tr class="bg-success">
                        <th style="padding: 10px;font-size: 20px; color: white;">Customer Name</th>
                        <th style="padding: 10px;font-size: 20px; color: white;">Email</th>
                        <th style="padding: 10px;font-size: 20px; color: white;">Phone</th>
                        <th style="padding: 10px;font-size: 20px; color: white;">Doctor Name</th>
                        <th style="padding: 10px;font-size: 20px; color: white;">Date</th>
                        <th style="padding: 10px;font-size: 20px; color: white;">Message</th>
                        <th style="padding: 10px;font-size: 20px; color: white;">Status</th>
                        <th style="padding: 10px;font-size: 20px; color: white;">Approved</th>
                        <th style="padding: 10px;font-size: 20px; color: white;">Canceled</th>
                        <th style="padding: 10px;font-size: 20px; color: white;">Send Mail</th>

                    </tr>
                    @foreach($appoint as $appoints)
                    <tr>
                        <td style="padding: 10px;">{{$appoints->name}}</td>
                        <td style="padding: 10px;">{{$appoints->email}}</td>
                        <td style="padding: 10px;">{{$appoints->phone}}</td>
                        <td style="padding: 10px;">{{$appoints->doctor}}</td>
                        <td style="padding: 10px;">{{$appoints->date}}</td>
                        <td style="padding: 10px;">{{$appoints->message}}</td>
                        <td style="padding: 10px;">{{$appoints->status}}</td>
                        <td><a href="{{url('approved', $appoints->id)}}"
                                class="btn btn-primary text-center">Approved</a>
                        </td>
                        <td><a href="{{url('canceled', $appoints->id)}}" class="btn btn-danger text-center">Canceled</a>
                        </td>
                        <td><a href="{{url('emailview', $appoints->id)}}" class="btn btn-primary text-center">Send
                                Mail</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
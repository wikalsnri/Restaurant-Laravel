<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZwT" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Klassy Cafe</title>
    <!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-klassy-cafe.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
</head>


<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>

                            <!--
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>

                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>




                            <li class="scroll-to-section">
                                @auth

                                    <a href="{{ url('/showcart', Auth::user()->id) }}">

                                        Cart[{{ $count }}]
                                    </a>
                                @endauth


                                @guest
                                    Cart[0]
                                @endguest

                                </a>
                            </li>





                            <li>
                                @if (Route::has('login'))
                                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                        @auth
                                <li>

                                    <x-app-layout>

                                    </x-app-layout>

                                </li>
                            @else
                                <li><a href="{{ route('login') }}"
                                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                        in</a></li>

                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}"
                                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                    </li>
                                @endif
                            @endauth
                </div>
                @endif

                </li>

                </ul>

                <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="container mt-5 shadow">
        <div id="top">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>Nama Makanan</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        <form action="{{ url('orderconfirm') }}" method="POST">
                            @csrf
                            @include('sweetalert::alert')
                            @foreach ($cartItems as $no => $item)
                                <tr>

                                    <td>{{ $no + 1 }}</td>
                                    <td>

                                        <input type="text" name="foodname[]" value="{{ $item->food->title }}"
                                            hidden="">
                                        {{ $item->food->title }}
                                    </td>

                                    <td>
                                        <input type="text" name="price[]" value="{{ $item->food->price }}"
                                            hidden="">
                                        {{ $item->food->price }}.000
                                    </td>

                                    <td>
                                        <input type="text" name="quantity[]" value="{{ $item->food->quantity }}"
                                            hidden="">
                                        {{ $item->quantity }}
                                    </td>
                                    <td>
                                        <form action="{{ route('remove', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-warning">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </form>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="container mt-5" id="order">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"
            style="text-align: center; color: black;">
            Open Order Form
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Order Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulir -->
                    <form action="{{ url('orderconfirm') }}" method="POST">
                        @csrf

                        <!-- Loop through the cart items -->
                        @foreach ($cartItems as $item)
                            <div class="form-group">
                                <label for="foodname">Food Name:</label>
                                <input type="text" class="form-control" name="foodname[]"
                                    value="{{ $item->food->title }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" name="price[]"
                                    value="{{ $item->food->price }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="text" class="form-control" name="quantity[]"
                                    value="{{ $item->quantity }}" readonly>
                            </div>
                        @endforeach

                        <!-- Add other input fields as needed (Name, Phone, Address) -->
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter your name" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="number" class="form-control" name="phone" id="phone"
                                placeholder="Enter your phone number" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input class="form-control" name="address" id="address" rows="3"
                                placeholder="Enter your address" required></input>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                style="color: black;">Close</button>
                            <button type="submit" class="btn btn-primary" style="color: black;">Confirm
                                Order</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    </form>












    <!-- jQuery -->


    <script src="{{ asset('assets/js/jquery-2.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/accordions.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Add these script tags to include jQuery and Bootstrap JS files -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <!-- Link ke Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>
</body>

</html>

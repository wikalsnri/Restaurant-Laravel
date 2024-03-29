<!-- ***** Menu Area Starts ***** -->
<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Pilihan cake dengan rasa yang berkualitas.</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">

        @if (session('berhasil'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SUKSES!</strong> {{ session('berhasil') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">

                @foreach ($data as $data)
                    @if ($data->status == 1)
                        <form action="{{ url('/addcart', $data->id) }}" method="post">

                            @csrf
                            @include('sweetalert::alert')
                            <div class="item">
                                <div style="background-image:  url('/foodimage/{{ $data->image }}');" class='card'>
                                    <div class="price">
                                        <h6>{{ $data->price }}</h6>
                                    </div>
                                    <div class='info'>
                                        <h1 class='title'>{{ $data->title }}</h1>
                                        <p class='description'>{{ $data->description }}</p>
                                        <div class="main-text-button">
                                            <div class="scroll-to-section"><a href="#reservation">Make Reservation <i
                                                        class="fa fa-angle-down"></i></a></div>
                                        </div>
                                    </div>
                                </div>

                                <input type="number" name="quantity" min="1" value="1"
                                    style="width: 80px;">
                                <button type="submit"
                                    style="padding: 8px 12px; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Add
                                    to Cart</button>

                            </div>
                        </form>
                    @endif
                @endforeach



            </div>
        </div>
    </div>
    </div>
</section>
<!-- ***** Menu Area Ends ***** -->

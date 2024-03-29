<!-- ***** Reservation Us Area Starts ***** -->
<section class="section" id="reservation">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="left-text-content">
                    <div class="section-heading">
                        <h6>Contact Us</h6>
                        <h2>Kamu mau reservasi di sini atau datang langsung ke Klassy Cafe nih?</h2>
                    </div>
                    <p>Silahkan menghubungi contact person di bawah ini dan berikan kritik serta saran untuk kafe kami.
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="phone">
                                <i class="fa fa-phone"></i>
                                <h4>Phone Numbers</h4>
                                <span><a href="https://wa.me/6281122334455">0811-2233-4455</a><br><a
                                        href="https://wa.me/6289988776655">0899-8877-6655</a></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="message">
                                <i class="fa fa-envelope"></i>
                                <h4>Emails</h4>
                                <span><a
                                        href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=klassycafe@gmail.com">wika@gmail.com</a><br><a
                                        href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=wika@gmail.com">klassycafe@gmail.com</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
                    <form id="contact" action="{{ url('/reservation') }}" method="post">

                        @csrf

                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Table Reservation</h4>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" id="name" placeholder="Masukkan Nama"
                                        required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Masukkan Email" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="phone" type="text" id="phone" placeholder="Masukkan No. HP"
                                        required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="number" name="guest" placeholder="Jumlah Tamu" max="25"
                                    min="1" value="1">
                            </div>

                            <div class="col-lg-6">
                                <div id="filterDate2">
                                    <div class="input-group date" data-date-format="dd/mm/yyyy">
                                        <input name="date" id="date" type="text" class="form-control"
                                            placeholder="dd/mm/yyyy">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <input type="time" name="time">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <select name="id_meja" id="">
                                    <option value="">Pilih Meja</option>
                                    @foreach ($meja as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->status == '0' ? 'disabled' : '' }}>
                                            {{ $item->no_meja . ($item->status == '1' ? ' Tersedia' : ' Tidak Tersedia') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-button-icon">Make A
                                        Reservation</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Reservation Area Ends ***** -->

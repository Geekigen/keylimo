@extends('layouts.app')
@section('content')
<section class="w3l-contact-main" id="contact">
    <div class="contact-infhny py-5">
        <div class="container py-md-5">
            <div class="title-content text-center mb-md-5 mb-4">
                <h6 class="title-subw3hny">Send us a message</h6>
                <h3 class="title-w3l mx-lg-5">Keep In Touch With Us.</h3>
                <p class="text-para mt-2">Progressively syndicate user-centric schemas without front-end synergy. Monotonectally envisioneer.</p>
            </div>
            <div class="top-map">
                <div class="map-content-9">
                    <form action="#" method="post">
                        <div class="form-top1">

                            <div class="form-top">
                                <div class="form-top-righ">
                                    <textarea name="Message" id="Message" placeholder="Message*" required=""></textarea>
                                </div>
                                <div class="form-top-left">
                                    <input type="text" name="Name" id="Name" placeholder="Name" required="">
                                    <input type="number" name="Phone" placeholder="Your phone number" required="">
                                    <input type="email" name="Sender" id="Sender" placeholder="Email*" required="">

                                </div>

                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-style btn-primary">Submit Now <i class="far fa-paper-plane ml-lg-3"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
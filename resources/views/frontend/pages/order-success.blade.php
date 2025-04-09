@extends('frontend.layouts.master')

@section('content')
    <!--===========================
        BREADCRUMB START
    ============================-->
    <section class="wsus__breadcrumb" style="background: url(images/breadcrumb_bg.jpg);">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Order Completed</h1>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Order Completed</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
        BREADCRUMB END
    ============================-->


    <!--=============================
        PAYMENT START
    ==============================-->
    <section class="payment pt_95 xs_pt_75 pb_120 xs_pb_100">
        <div class="container">
            <h1>Thank you for your order</h1>
        </div>
    </section>
    <!--=============================
        PAYMENT END
    ==============================-->
@endsection

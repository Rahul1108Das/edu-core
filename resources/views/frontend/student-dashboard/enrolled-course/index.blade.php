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
                            <h1>Student Dashboard</h1>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Student Dashboard</li>
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


    <!--===========================
                DASHBOARD OVERVIEW START
            ============================-->
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                @include('frontend.student-dashboard.sidebar')
                <div class="col-xl-9 col-md-8">
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top">
                            <div class="wsus__dashboard_heading relative">
                                <h5>Courses</h5>
                                <p>Your enrolled courses.</p>
                            </div>
                        </div>

                        <div class="wsus__dash_course_table">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th class="image">
                                                        COURSES
                                                    </th>
                                                    <th class="details">

                                                    </th>
                                                    <th class="action">
                                                        ACTION
                                                    </th>
                                                </tr>
                                                @forelse ($enrollments as $enrollment)
                                                <tr>
                                                    <td class="image">
                                                        <div class="image_category">
                                                            <img src="{{ asset($enrollment->course->thumbnail) }}" alt="img"
                                                                class="img-fluid w-100">
                                                        </div>
                                                    </td>
                                                    <td class="details">
                                                        <p class="rating">
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                            <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                                                            <i class="far fa-star" aria-hidden="true"></i>
                                                            <span>(5.0)</span>
                                                        </p>
                                                        <a class="title" href="{{ route('student.course-player.index', $enrollment->course->slug) }}">{{ $enrollment->course->title }}</a>
                                                        <div class="text-muted">
                                                            By {{ $enrollment->course->instructor->name }}
                                                        </div>

                                                    </td>
                                                    <td class="status">
                                                        <p class="active">Active</p>
                                                    </td>
                                                    <td class="">
                                                        <a class="common_btn" href="{{ route('student.course-player.index', $enrollment->course->slug) }}">Watch course</a>
                                                    </td>
                                                </tr>
                                                    
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">No Data found!</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
                DASHBOARD OVERVIEW END
            ============================-->
@endsection

@extends('client.master_layout')
@section('content')
    <div class="container-fluid border-bottom px-5 pt-5">
        <!-- User Identety Brief-->
        <div class="profile-identity row"> 
            <div class="profile-card--avatar shadow-sm border rounded-circle">
                <img src="../../assets/client/images/user-profile-2.png" class="profile-avatar">
                <div class="inactive-dot rounded-circle"></div>
            </div>

            <div class="user-info color-black mt-5 py-0 col-md-8">
                <div class="username color-black">
                    <!-- <h5>اسم المستخدم</h5> -->
                    <h5>ضحى الخراساني</h5>
                </div>

                <div class="user-brief text-muted">
                    <p class="d-inline-block ms-3">
                        <!-- <i class="fas fa-briefcase"></i> <span class="me-1">التخصص</span> -->
                        <i class="fas fa-briefcase"></i> <span class="me-1">متخصصة في برمجة مواقع الويب Full Stack Developer</span>
                    </p>
                    <p class="d-inline-block">
                        <!-- <i class="fa-solid fa-location-dot"></i> <span class="me-1">البلد</span> -->
                        <i class="fa-solid fa-location-dot"></i> <span class="me-1">اليمن</span>
                    </p>
                </div>
            </div>
        </div>
        <!-- /User Identety Brief-->

        <!-- Profile Taps -->
        <div class="user-profile-tabs row d-flex justify-content-between align-items-center">
            <nav class="nav fw-bold col-auto">
                <a class="nav-link activated color-black" aria-current="page" href="">حول</a>
                <a class="nav-link color-black" href="#">الأعمال</a>
                <a class="nav-link color-black" href="#">التقييمات</a>
            </nav>

            <div class="kalefny-btn-div">
                <button type="button" class="btn-kalefny color-gray-lighter fw-bold" >
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>وكلني</span>
                </button>
            </div>
        </div>
        <!-- /Profile Taps -->
    </div>

    <main class="main-section container mt-1">
        <div class="row">
            <div class="col-sm-12 col-lg-7 color-black p-3">
                <!-- My Brief -->
                <div class="row">
                    <section class="card shadow-sm col-12 col-sm-12">
                        <div class="about-me">
                            <div class="section-title"><h5>نبذة عني</h5></div>
                            <div class="brief-content mt-3">
                                <p class="">
                                    <i class="fas fa-briefcase"></i>
                                    <span class="fs-6 fw-bold d-inll">التخصص:</span>
                                    <span class="me-1">متخصصة في برمجة مواقع الويب</span>
                                </p>
                                <p class=""> 
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span class="fs-6 fw-bold d-inll">البلد:</span>
                                    <span class="me-1">اليمن</span>
                                </p>
                                <p class=""> 
                                    <i class="fa-solid fa-circle-info"></i>
                                    <span class="fs-6 fw-bold d-inll">تفاصيل أكثر:</span>
                                    <span class="me-1">
                                        خريج حاسبات ومعلومات قسم هندسه برمجيات.
                                        full time backend dev في شركه wegroup pro alex.
                                        backend developer using php laravel and ai learner</span>
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- /My Brief -->

                <!-- /My Skills -->
                <div class="row">
                    <section class="card shadow-sm col-12 col-sm-12 mt-3">
                        <div class="my-skills">
                            <div class="section-title"><h5>مهاراتي</h5></div>
                            <div class="skills mt-3">
                                <a class="btn-tag color-gray-lighter" href="#" role="button">
                                    <i class="fa-solid fa-tags"></i>
                                    <span class="me-1">الإدارة</span>
                                </a>
                                <a class="btn-tag color-gray-lighter" href="#" role="button">
                                    <i class="fa-solid fa-tags"></i>
                                    <span class="me-1">إدارة مشاريع</span>
                                </a>
                                <a class="btn-tag color-gray-lighter" href="#" role="button">
                                    <i class="fa-solid fa-tags"></i>
                                    <span class="me-1">برمجة مواقع الويب</span>
                                </a>
                                <a class="btn-tag color-gray-lighter" href="#" role="button">
                                    <i class="fa-solid fa-tags"></i>
                                    <span class="me-1">التصميم</span>
                                </a>
                                <a class="btn-tag color-gray-lighter" href="#" role="button">
                                    <i class="fa-solid fa-tags"></i>
                                    <span class="me-1">التصوير</span>
                                </a>
                                <a class="btn-tag color-gray-lighter" href="#" role="button">
                                    <i class="fa-solid fa-tags"></i>
                                    <span class="me-1">الفوتوشوب</span>
                                </a>
                                <a class="btn-tag color-gray-lighter" href="#" role="button">
                                    <i class="fa-solid fa-tags"></i>
                                    <span class="me-1">تطبيقات اوفيس</span>
                                </a>
                                <a class="btn-tag color-gray-lighter" href="#" role="button">
                                    <i class="fa-solid fa-tags"></i>
                                    <span class="me-1">اللغة الإنجليزية</span>
                                </a>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- /My Skills -->
            </div>

            
        </div>
    </main>
@endsection

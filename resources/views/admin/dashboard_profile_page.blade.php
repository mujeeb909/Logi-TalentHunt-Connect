@extends('layouts.app')
@section('style')
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        <style>.page-content {
            background-color: white;
        }
    </style>
@endsection
@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper" style="background-color: white">
        <div class="page-content">
            <!--breadcrumb-->


            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Profile Page</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->


            <div class="row">

                <div class="header__wrapper container">
                    <header></header>
                    <div class="cols__container">
                        <div class="left__col">
                            <div class="img__container" style="left: -64px;">
                                <img src="assets/images/profile-page-imgs/user.jpg" alt="Anna Smith" />
                            </div>
                        </div>
                    </div>


                    <div class="text-start container mt-5 ml-4" style="margin-left: 3px;">
                        <nav>
                            <button class=" btn-custom" type="button"><svg class="i-icon"
                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 30 24">
                                    <path fill="white"
                                        d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>View as</button>
                            <button type="button" class="btn-custom">+ Add Section</button>
                            <button type="button" class="btn-custom"> <svg class="i-icon"
                                    xmlns="http://www.w3.org/2000/svg" width="3em" style="font-weight: 300"
                                    height="3em" viewBox="0 0 31 31">
                                    <path fill="white" fill-rule="evenodd"
                                        d="M16.5 2.25a3.25 3.25 0 0 0-3.2 3.824L8.57 9.386a.757.757 0 0 0-.068.053a3.25 3.25 0 1 0 0 5.121a.755.755 0 0 0 .068.054l4.73 3.312a3.25 3.25 0 1 0 .617-1.4l-4.479-3.135c.2-.422.312-.893.312-1.391s-.112-.97-.312-1.391l4.48-3.136A3.25 3.25 0 1 0 16.5 2.25M14.75 5.5a1.75 1.75 0 1 1 3.5 0a1.75 1.75 0 0 1-3.5 0M6.5 10.25a1.75 1.75 0 1 0 0 3.5a1.75 1.75 0 0 0 0-3.5m10 6.5a1.75 1.75 0 1 0 0 3.5a1.75 1.75 0 0 0 0-3.5"
                                        clip-rule="evenodd" />
                                </svg>Share Profile</button>
                        </nav>

                    </div>
                </div>
                <div class="container">

                    <form class="mt-4">
                        <div class="row mb-4">
                            <div class="col">
                                <div data-mdb-input-init class="form-outline">
                                    <label class="form-label label-custom" for="name">Name</label>
                                    <input type="text" id="name" class="form-control"
                                        value="{{ $userData->name }}" />

                                </div>
                            </div>
                            <div class="col">
                                <div data-mdb-input-init class="form-outline">
                                    <label class="form-label label-custom" for="nick">Nick Name</label>
                                    <input type="text" id="nick" class="form-control"
                                        value="{{ $userData->username }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div data-mdb-input-init class="form-outline">
                                    <label class="form-label label-custom" for="talent">Talent</label>
                                    <input type="text" id="talent" class="form-control"
                                        value="{{ $userData->designation }}" />

                                </div>
                            </div>
                            <div class="col">
                                <div data-mdb-input-init class="form-outline">
                                    <label class="form-label label-custom" for="email">Email address</label>
                                    <input type="email" id="email" class="form-control"
                                        value="{{ $userData->email }}" />

                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div data-mdb-input-init class="form-outline">
                                    <label class="form-label label-custom" for="state">State</label>
                                    <input type="text" id="state" class=" input-custom form-control"
                                        value="{{ $userData->address }}" />

                                </div>
                            </div>

                            <div class="col">
                                <div data-mdb-input-init class="form-outline">
                                    <label class="form-label label-custom" for="age">Age</label>
                                    <select id="age" class="form-control select-custom"
                                        style="border-radius: 15px; background-color:#F9F9F9">
                                        <option value="{{ $userData->age }}">{{ $userData->age }}</option>
                                        <option value="18-22">18-22</option>
                                        <option value="23-27">23-27</option>
                                        <option value="28-32">28-32</option>
                                        <option value="33-37">33-37</option>
                                        <option value="38-42">38-42</option>
                                        <option value="43-47">43-47</option>
                                        <option value="48-52">48-52</option>
                                        <option value="52+">52+</option>
                                    </select>
                                </div>
                            </div>

                        </div>




                        <!-- Submit button -->
                        <!-- <button data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4">Sign up</button> -->

                        <!-- Register buttons -->
                    </form>
                </div>
                <div class="container">
                    <p class="span-custom ">Tags</p>
                    <div class="scrollmenu">
                        @foreach ($tags as $tag)
                            <button class="tags">{{ $tag->name }}</button>
                        @endforeach
                    </div>

                </div>
                <div class="container">
                    <p class="span-custom mb-10 ">Bio</p>
                    <div>
                        <textarea name="" id="">{{ $userData->description }}</textarea>
                    </div>

                </div>
                {{-- <div class="container">
                    <p class="span-custom mb-10 ">Videos</p>
                    <div class="video-custom">

                        <div class="video-item">
                            <img class="video-custom video-img video-thumbnail mt-3"
                                src="assets/images/products/video.jpg" alt="Video Thumbnail">
                        </div>


                        <div class="video-item">
                            <img class="video-custom video-img video-thumbnail mt-3"
                                src="assets/images/products/video.jpg" alt="Video Thumbnail">
                        </div>

                        <div class="video-item">
                            <img class="video-custom video-img video-thumbnail mt-3"
                                src="assets/images/products/video.jpg" alt="Video Thumbnail">
                        </div>


                        <div class="video-item">
                            <img class="video-custom video-img video-thumbnail mt-3"
                                src="assets/images/products/video.jpg" alt="Video Thumbnail">
                        </div>

                    </div>
                </div> --}}
                <div class="" style="display: flex; justify-content:space-between">
                    <div class="video-title">
                        <p class="span-custom mb-10 ">Videos</p>
                    </div class="action-btn">
                    <div>
                        <button class="btn btn-default p-2" style="font-weight: 500"><i style="width: 40px; height:40px"
                                class='bx bx-plus'></i></button>
                        <Button cclass="btn btn-default p-2" style="font-weight: 500"><i style="font-size: 15px;"
                                class='bx bxs-grid'></i></Button>
                    </div>
                </div>

                <div class="video-custom">

                    <div class="container mb-5">
                        <div class="row">
                            <div class="col">
                                <img class="video-custom video-img video-thumbnail mt-3"
                                    src="assets/images/products/video.jpg" alt="Video Thumbnail">
                            </div>
                            <div class="col">
                                <img class="video-custom video-img video-thumbnail mt-3"
                                    src="assets/images/products/video.jpg" alt="Video Thumbnail">

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').click(function() {
                $(this).siblings('.btn-group').toggle();
            });

            $('.dropdown-menu').click(function(event) {
                event.stopPropagation();
            });
        });
    </script>
    <!--end page wrapper -->
@endsection

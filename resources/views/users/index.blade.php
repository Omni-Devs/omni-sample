@extends('layouts.app')
@section('content')
<div class="main-content">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Users management</h1>
            <ul>
                <li><a href=""> People </a></li>
                <!----> <!---->
            </ul>
            <div class="breadcrumb-action"></div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <div id="UserModal___BV_modal_outer_" style="position: absolute; z-index: 1050;">
    <div id="UserModal" role="dialog" aria-labelledby="UserModal___BV_modal_title_" aria-describedby="UserModal___BV_modal_body_" class="modal fade" aria-modal="true" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <span tabindex="0"></span>
            <div id="UserModal___BV_modal_content_" tabindex="-1" class="modal-content">
                <header id="UserModal___BV_modal_header_" class="modal-header">
                <h5 id="UserModal___BV_modal_title_" class="modal-title">Add</h5>
                <button type="button" aria-label="Close" class="close" data-bs-dismiss="modal">×</button>
                </header>
                <div id="UserModal___BV_modal_body_" class="modal-body">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="role" value="user">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <span>
                            <div id="my-strictly-unique-vue-upload-multiple-image">
                                <fieldset class="form-group text-left" id="__BVID__381">
                                    <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__381__BV_label_">User Image</legend>
                                    <div>
                                        <div data-v-6ff5a0de="" aria-describedby="UserImage-feedback" style="outline: none;">
                                        <div data-v-6ff5a0de="" class="image-container position-relative text-center">
                                            <div data-v-6ff5a0de="" class="image-center position-absolute display-flex flex-column justify-content-center align-items-center">
                                                <div data-v-6ff5a0de="">
                                                    <svg data-v-6ff5a0de="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="image-icon-drag">
                                                    <path data-v-6ff5a0de="" d="M383.6 229l-.5 1.5.7 1.7c-.2-1.1-.2-2.2-.2-3.2zm-119.7-5.4l-.3 1.4.6 1.3c-.2-.8-.3-1.8-.3-2.7zm62.4 3.8l-.2 1 .5 1.1-.3-2.1z"></path>
                                                    <path data-v-6ff5a0de="" d="M483 326.2l-43.5-100.5c-3.6-8.4-10.3-14.9-18.7-18.4-8.5-3.6-17.8-3.5-26.1.1L391 209c-3.3 1.4-6.1 3.6-8.4 6.3-3.6-8.2-10.2-14.6-18.6-18-8.5-3.4-17.7-3.3-26.1.3-6.1 2.7-10.9 6.8-13.9 12-3.7-8-10.2-14.3-18.4-17.6-8.5-3.4-17.8-3.3-26.1.3l-3.7 1.6c-6.3 2.7-11.2 7.1-14.3 12.4l-20.3-46.9c-4.2-9.8-10.7-16.8-18.7-20.2-8.1-3.5-17.2-3.2-26.5.8l-3.7 1.6c-8 3.5-13.3 9.3-15.5 16.9-2.1 7.3-1 16.2 3.1 25.6l83.4 188.2-64.7-39.8c-11.2-6.8-25.7-4.7-34.4 5.1-11.3 12.5-10.3 31.9 2 43.3l55.8 51.5 50.8 43.4c17.6 16.7 38.2 28.1 59.6 32.9 7.7 1.7 15.5 2.5 23.2 2.5 14.9 0 29.7-3.1 44.2-9.4l27.9-12.1c31.2-13.5 52.8-37.1 62.6-68.4 9.2-29.2 6.6-63-7.3-95.1zM383.6 229c0 1 .1 2.1.2 3.1l-.7-1.7.5-1.4zM281.7 466.6c-.2-.2-.5-.5-.7-.6l-50.4-43.1-55.6-51.5c-7.3-6.7-7.9-18.2-1.2-25.6 4.7-5.3 12.5-6.4 18.5-2.6l65.6 40.2c4.7 2.9 10.4 2.4 14.5-1.3 4.1-3.6 5.3-9.2 3.2-14.2l-83.7-189c-3.2-7.4-3.9-13.4-2.1-18.1 1.7-4.3 5.2-6.5 7.9-7.7l3.7-1.6c12.3-5.3 22.8-.6 28.6 12.9L310.2 350c1.4 3.2 5.1 4.6 8.3 3.3 3.2-1.4 4.7-5.1 3.3-8.3l-48.7-112.5c-2.2-5.2-3-10.8-2-15.4 1.1-5.4 4.5-9.3 9.9-11.7l3.7-1.6c5.3-2.3 11.1-2.3 16.4-.2 5.3 2.2 9.5 6.3 11.8 11.6l43.9 101.5c.7 1.6 1.9 2.7 3.5 3.4 1.6.6 3.3.6 4.8-.1 3.2-1.4 4.7-5.1 3.3-8.3l-32.8-75.9c-8.2-18.9 4.8-25.6 7.5-26.8 10.8-4.7 23.5.4 28.2 11.3l28.9 66.7c1.4 3.2 5.1 4.7 8.3 3.3 3.2-1.4 4.7-5.1 3.3-8.3l-19.4-44.8c-1.3-3-4.9-13.2 3.8-16.9l3.7-1.6c5.2-2.3 11.1-2.3 16.4 0 5.3 2.3 9.6 6.4 11.9 11.8L471.7 331c12.7 29.3 15.1 59.9 6.8 86.3-8.7 27.6-27.9 48.5-55.6 60.5L395 489.9c-38.9 16.9-80.1 8.4-113.3-23.3zm44.6-239.2l.3 2.1-.5-1.1.2-1zm-62.4-3.8l.3 2.7-.6-1.3.3-1.4zM31 217c3.2 0 6-2.6 6-5.7v-40c0-3.2-2.8-5.7-6-5.7s-6 2.6-6 5.7v40c0 3.2 2.8 5.7 6 5.7zm0-66.3c3.2 0 6-2.6 6-5.7v-40c0-3.2-2.8-5.7-6-5.7s-6 2.6-6 5.7v40c0 3.1 2.8 5.7 6 5.7zM148 296h-40c-3.2 0-5.7 2.3-5.7 5.5s2.6 5.5 5.7 5.5h40c3.2 0 5.7-2.3 5.7-5.5s-2.6-5.5-5.7-5.5zM37 237.6c0-3.2-2.8-5.7-6-5.7s-6 2.6-6 5.7v40c0 3.2 2.8 5.7 6 5.7s6-2.6 6-5.7v-40zM31 84.4c3.2 0 6-2.6 6-5.7v-40c0-3.2-2.8-5.7-6-5.7s-6 2.6-6 5.7v40c0 3.1 2.8 5.7 6 5.7zM81.6 296H49.1c-1.7 0-3.4-.6-5-1.3-2.9-1.3-6.3-.1-7.5 2.8-1.3 2.9 0 6.3 2.9 7.5 3 1.3 6.3 2 9.6 2h32.5c3.2 0 5.7-2.3 5.7-5.5s-2.5-5.5-5.7-5.5zm60.6-281c3.2 0 5.7-2.8 5.7-6s-2.6-6-5.7-6h-40c-3.2 0-5.7 2.8-5.7 6s2.6 6 5.7 6h40z"></path>
                                                    <path data-v-6ff5a0de="" d="M323 122.4c-3.2 0-6 2.6-6 5.7v39.2c0 3.2 2.8 5.7 6 5.7s6-2.6 6-5.7v-39.2c0-3.1-2.8-5.7-6-5.7zm6-60.6c0-3.2-2.8-5.7-6-5.7s-6 2.6-6 5.7v40c0 3.2 2.8 5.7 6 5.7s6-2.6 6-5.7v-40zM301.2 15h3.6c6.8 0 12.2 5.6 12.2 12.4v8.1c0 3.2 2.8 5.7 6 5.7s6-2.6 6-5.7v-8.1C329 14.3 317.9 3 304.8 3h-3.6c-3.2 0-5.7 2.8-5.7 6s2.5 6 5.7 6zm-66.3 0h40c3.2 0 5.7-2.8 5.7-6s-2.6-6-5.7-6h-40c-3.2 0-5.7 2.8-5.7 6s2.5 6 5.7 6zm-60.6 292h40c3.2 0 5.7-2.3 5.7-5.5s-2.6-5.5-5.7-5.5h-40c-3.2 0-5.7 2.3-5.7 5.5s2.5 5.5 5.7 5.5zm-5.8-292h40c3.2 0 5.7-2.8 5.7-6s-2.6-6-5.7-6h-40c-3.2 0-5.7 2.8-5.7 6s2.6 6 5.7 6zM37.1 19.8c1.4 0 2.7-.6 3.8-1.5 2.3-2 5.2-3.2 8.2-3.2h26.8c3.2 0 5.7-2.8 5.7-6s-2.6-6-5.7-6H49.1c-5.9 0-11.5 2.5-15.9 6.5-2.3 2.1-2.5 5.9-.4 8.2 1.1 1.2 2.7 2 4.3 2z"></path>
                                                    </svg>
                                                </div>
                                                <div data-v-6ff5a0de="" class="text-center"><label data-v-6ff5a0de="" class="drag-text">Drag
                                                    &amp; Drop image</label> <br data-v-6ff5a0de=""> <a data-v-6ff5a0de="" class="browse-text">(or) Select</a>
                                                </div>
                                                <div data-v-6ff5a0de="" class="image-input position-absolute full-width full-height"><label data-v-6ff5a0de="" for="myIdUpload" class="full-width full-height cursor-pointer"></label></div>
                                            </div>
                                        </div>
                                        <!----> 
                                        <div data-v-6ff5a0de=""><input data-v-6ff5a0de="" id="myIdUpload" name="" accept="image/gif,image/jpeg,image/png,image/bmp,image/jpg" type="file" class="display-none"> <input data-v-6ff5a0de="" id="image-edit" name="" accept="image/gif,image/jpeg,image/png,image/bmp,image/jpg" type="file" class="display-none"></div>
                                        <div data-v-3f78f595="" data-v-6ff5a0de="" class="modal-mask" style="display: none;">
                                            <div data-v-3f78f595="" class="modal-container">
                                                <div data-v-3f78f595="" class="vue-lightbox-content">
                                                    <div data-v-3f78f595="" class="vue-lightbox-header">
                                                    <span data-v-3f78f595=""></span> 
                                                    <button data-v-3f78f595="" type="button" title="Close (Esc)" class="vue-lightbox-close">
                                                        <span data-v-3f78f595="">
                                                            <svg data-v-3f78f595="" fill="white" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 512 512">
                                                                <path data-v-3f78f595="" d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4 L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1 c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1 c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    </div>
                                                    <div data-v-3f78f595="" class="vue-lightbox-figure">
                                                    <div data-v-3f78f595="" class="swiper-container vue-lightbox-figure swiper-container-initialized swiper-container-horizontal">
                                                        <div class="swiper-wrapper" style="transition-duration: 0ms;"></div>
                                                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                                    </div>
                                                    <div data-v-3f78f595="" class="vue-lightbox-footer">
                                                        <div data-v-3f78f595="" class="vue-lightbox-footer-info"></div>
                                                        <div data-v-3f78f595="" class="vue-lightbox-footer-count">
                                                            1/0
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div data-v-3f78f595="" class="vue-lightbox-thumbnail-wrapper" style="display: none;">
                                                    <div data-v-3f78f595="" class="vue-lightbox-thumbnail">
                                                    <button data-v-3f78f595="" type="button" title="Previous" class="swiper-button-prev vue-lightbox-thumbnail-arrow vue-lightbox-thumbnail-left" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false">
                                                        <span data-v-3f78f595="">
                                                            <svg data-v-3f78f595="" fill="white" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 512 512">
                                                                <path data-v-3f78f595="" d="M213.7,256L213.7,256L213.7,256L380.9,81.9c4.2-4.3,4.1-11.4-0.2-15.8l-29.9-30.6c-4.3-4.4-11.3-4.5-15.5-0.2L131.1,247.9 c-2.2,2.2-3.2,5.2-3,8.1c-0.1,3,0.9,5.9,3,8.1l204.2,212.7c4.2,4.3,11.2,4.2,15.5-0.2l29.9-30.6c4.3-4.4,4.4-11.5,0.2-15.8 L213.7,256z"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    <div data-v-3f78f595="" class="swiper-container swiper-container-initialized swiper-container-horizontal">
                                                        <div class="swiper-wrapper" style="transition-duration: 0ms;"></div>
                                                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                                    </div>
                                                    <button data-v-3f78f595="" type="button" title="Next" class="swiper-button-next vue-lightbox-thumbnail-arrow vue-lightbox-thumbnail-right" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false">
                                                        <span data-v-3f78f595="">
                                                            <svg data-v-3f78f595="" fill="white" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 512 512">
                                                                <path data-v-3f78f595="" d="M298.3,256L298.3,256L298.3,256L131.1,81.9c-4.2-4.3-4.1-11.4,0.2-15.8l29.9-30.6c4.3-4.4,11.3-4.5,15.5-0.2l204.2,212.7 c2.2,2.2,3.2,5.2,3,8.1c0.1,3-0.9,5.9-3,8.1L176.7,476.8c-4.2,4.3-11.2,4.2-15.5-0.2L131.3,446c-4.3-4.4-4.4-11.5-0.2-15.8 L298.3,256z"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    </div>
                                                </div>
                                                <button data-v-3f78f595="" type="button" title="Previous" class="swiper-button-prev vue-lightbox-arrow vue-lightbox-left" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false">
                                                    <span data-v-3f78f595="">
                                                    <svg data-v-3f78f595="" fill="white" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 512 512">
                                                        <path data-v-3f78f595="" d="M213.7,256L213.7,256L213.7,256L380.9,81.9c4.2-4.3,4.1-11.4-0.2-15.8l-29.9-30.6c-4.3-4.4-11.3-4.5-15.5-0.2L131.1,247.9 c-2.2,2.2-3.2,5.2-3,8.1c-0.1,3,0.9,5.9,3,8.1l204.2,212.7c4.2,4.3,11.2,4.2,15.5-0.2l29.9-30.6c4.3-4.4,4.4-11.5,0.2-15.8 L213.7,256z"></path>
                                                    </svg>
                                                    </span>
                                                </button>
                                                <button data-v-3f78f595="" type="button" title="Next" class="swiper-button-next vue-lightbox-arrow vue-lightbox-right" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false">
                                                    <span data-v-3f78f595="">
                                                    <svg data-v-3f78f595="" fill="white" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 512 512" xml:space="preserve">
                                                        <path data-v-3f78f595="" d="M298.3,256L298.3,256L298.3,256L131.1,81.9c-4.2-4.3-4.1-11.4,0.2-15.8l29.9-30.6c4.3-4.4,11.3-4.5,15.5-0.2l204.2,212.7 c2.2,2.2,3.2,5.2,3,8.1c0.1,3-0.9,5.9-3,8.1L176.7,476.8c-4.2,4.3-11.2,4.2-15.5-0.2L131.3,446c-4.3-4.4-4.4-11.5-0.2-15.8 L298.3,256z"></path>
                                                    </svg>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                        <div id="UserImage-feedback" class="invalid-feedback">{
                                        "untouched": true,
                                        "touched": false,
                                        "dirty": false,
                                        "pristine": true,
                                        "valid": false,
                                        "invalid": false,
                                        "validated": false,
                                        "pending": false,
                                        "required": false,
                                        "changed": false,
                                        "passed": false,
                                        "failed": false,
                                        "errors": [],
                                        "classes": {
                                        "untouched": true,
                                        "touched": false,
                                        "dirty": false,
                                        "pristine": true,
                                        "validated": false,
                                        "pending": false,
                                        "required": false,
                                        "changed": false,
                                        "passed": false,
                                        "failed": false
                                        },
                                        "failedRules": {},
                                        "ariaInput": {
                                        "aria-invalid": "false",
                                        "aria-required": "false",
                                        "aria-errormessage": "vee_UserImage"
                                        },
                                        "ariaMsg": {
                                        "id": "vee_UserImage",
                                        "aria-live": "off"
                                        }
                                        }
                                        </div>
                                        <!----><!----><!---->
                                    </div>
                                </fieldset>
                            </div>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <span>
                            <fieldset class="form-group" id="__BVID__388">
                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__388__BV_label_">User # *</legend>
                                <div>
                                    <input type="text" placeholder="User #" class="form-control" aria-describedby="UserNo-feedback" label="UserNo" id="__BVID__389" name="id" value="{{ $nextUserId }}" readonly> 
                                    <div id="UserNo-feedback" class="invalid-feedback"></div>
                                    <!----><!----><!---->
                                </div>
                            </fieldset>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                            <fieldset class="form-group" id="__BVID__391">
                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__391__BV_label_">Full Name *</legend>
                                <div>
                                    <input type="text" placeholder="Full Name" class="form-control" aria-describedby="FullName-feedback" label="FullName" id="__BVID__392" name="name"> 
                                    <div id="FullName-feedback" class="invalid-feedback"></div>
                                    <!----><!----><!---->
                                </div>
                            </fieldset>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                            <fieldset class="form-group" id="__BVID__394">
                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__394__BV_label_">Username *</legend>
                                <div>
                                    <input type="text" placeholder="Username" class="form-control" aria-describedby="Username-feedback" label="Username" id="__BVID__395" name="username"> 
                                    <div id="Username-feedback" class="invalid-feedback"></div>
                                    <!----><!----><!---->
                                </div>
                            </fieldset>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                            <fieldset class="form-group" id="__BVID__397">
                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__397__BV_label_">Email *</legend>
                                <div>
                                    <input type="text" placeholder="Email" class="form-control" aria-describedby="Email-feedback" label="Email" id="__BVID__398" name="email"> 
                                    <div id="Email-feedback" class="invalid-feedback"></div>
                                    <!----><!----><!---->
                                </div>
                            </fieldset>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                            <fieldset class="form-group" id="__BVID__400">
                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__400__BV_label_">Password *</legend>
                                <div>
                                    <input type="password" placeholder="Password" class="form-control" aria-describedby="Password-feedback" label="Password" id="__BVID__401" name="password"> 
                                    <div id="Password-feedback" class="invalid-feedback"></div>
                                    <!----><!----><!---->
                                </div>
                            </fieldset>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                            <fieldset class="form-group" id="__BVID__403">
                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__403__BV_label_">Mobile #</legend>
                                <div>
                                    <input type="text" placeholder="Mobile #" class="form-control" aria-describedby="MobileNo-feedback" label="MobileNo" id="__BVID__404" name="mobile_number"> 
                                    <div id="MobileNo-feedback" class="invalid-feedback"></div>
                                    <!----><!----><!---->
                                </div>
                            </fieldset>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                            <fieldset class="form-group" id="__BVID__406">
                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__406__BV_label_">Landline #</legend>
                                <div>
                                    <input type="text" placeholder="Landline #" class="form-control" aria-describedby="LandlineNo-feedback" label="LandlineNo" id="__BVID__407"> 
                                    <div id="LandlineNo-feedback" class="invalid-feedback"></div>
                                    <!----><!----><!---->
                                </div>
                            </fieldset>
                            </span>
                        </div>
                        <div class="col-md-12">
                            <span>
                            <fieldset class="form-group" id="__BVID__409">
                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__409__BV_label_">Address</legend>
                                <div>
                                    <textarea aria-describedby="Adress-feedback" placeholder="Address" class="form-control" name="address"></textarea>
                                    <div id="Adress-feedback" class="invalid-feedback"></div>
                                    <!----><!----><!---->
                                </div>
                            </fieldset>
                            </span>
                        </div>
                        <div class="mt-4 col-sm-12">
                            <span>
                            <fieldset class="form-group" id="__BVID__411">
                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__411__BV_label_">Branch *</legend>
                                <div id="app">
                                    <v-select
                                        multiple
                                        :options='@json($branches)'
                                        label="name"
                                        :reduce="branch => branch.id"
                                        v-model="selectedBranches"
                                        placeholder="Select Branch"
                                        clearable
                                    ></v-select>

                                    <!-- Hidden inputs so Laravel receives an array -->
                                    <input v-for="id in selectedBranches"
                                        type="hidden"
                                        name="branch_id[]"
                                        :value="id">

                                    <div id="Branches-feedback" class="invalid-feedback"></div>
                                </div>
                            </fieldset>
                            </span>
                        </div>
                        <div class="mt-4 col-md-12">
                            <div class="d-flex">
                            <div class="mr-2">
                                <div class="b-overlay-wrap position-relative d-inline-block btn-loader">
                                    <button type="submit" class="btn btn-primary"><i class="i-Yes me-2 font-weight-bold"></i>
                                    Submit</button><!---->
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="i-Close me-2 font-weight-bold"></i>
                            Cancel
                            </button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <!---->
            </div>
            <span tabindex="0"></span>
        </div>
    </div>
    {{-- <div id="UserModal___BV_modal_backdrop_" class="modal-backdrop"></div> --}}
    </div>
    <div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-30 text-center">
                <!----><!---->
                <div class="card-body">
                    <!----><!---->
                    <div class="content align-items-center">
                        <p class="text-muted mt-2 mb-0 text-uppercase">
                            User Licenses
                        </p>
                        <p class="text-primary text-24 line-height-1 mb-2">
                            {{ $users->count() }}
                        </p>
                    </div>
                </div>
                <!----><!---->
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-30 text-center">
                <!----><!---->
                <div class="card-body">
                    <!----><!---->
                    <div class="content align-items-center">
                        <p class="text-muted mt-2 mb-0 text-uppercase">
                            Active Users
                        </p>
                        <p class="text-primary text-24 line-height-1 mb-2">
                            {{ $users->where('active', 1)->count() }}
                        </p>
                    </div>
                </div>
                <!----><!---->
                </div>
            </div>
        </div>
        <div class="card">
            <!----><!---->
            <nav class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item"><a href="#" target="_self" class="nav-link active">
                    Active
                    </a>
                </li>
                <li class="nav-item"><a href="#" target="_self" class="nav-link">
                    Archived
                    </a>
                </li>
                </ul>
            </nav>
            <div class="card-body">
                <!----><!---->
                <div class="vgt-wrap ">
                <!----> 
                <div class="vgt-inner-wrap">
                    <!----> 
                    <div class="vgt-global-search vgt-clearfix">
                        <div class="vgt-global-search__input vgt-pull-left">
                            <form role="search">
                            <label for="vgt-search-1666469488712">
                                <span aria-hidden="true" class="input__icon">
                                    <div class="magnifying-glass"></div>
                                </span>
                                <span class="sr-only">Search</span>
                            </label>
                            <input id="vgt-search-1666469488712" type="text" placeholder="Search this table" class="vgt-input vgt-pull-left">
                            </form>
                        </div>
                        <div class="vgt-global-search__actions vgt-pull-right">
                            <div class="mt-2 mb-3">
                            <div id="dropdown-form" class="dropdown b-dropdown m-2 btn-group" rounded="">
                                <!----><button id="dropdown-form__BV_toggle_" aria-haspopup="menu" aria-expanded="false" type="button" class="btn dropdown-toggle btn-light dropdown-toggle-no-caret"><i class="i-Gear"></i></button>
                                <ul role="menu" tabindex="-1" aria-labelledby="dropdown-form__BV_toggle_" class="dropdown-menu dropdown-menu-right">
                                    <li role="presentation">
                                        <header id="dropdown-header-label" class="dropdown-header">
                                        Columns
                                        </header>
                                    </li>
                                    <li role="presentation" style="width: 220px;">
                                        <form tabindex="-1" class="b-dropdown-form p-0">
                                        <section class="ps-container ps">
                                            <div class="px-4" style="max-height: 400px;">
                                                <ul class="list-unstyled">
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__246"><label class="custom-control-label" for="__BVID__246">Date and Time Created</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__247"><label class="custom-control-label" for="__BVID__247">Created By</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__248"><label class="custom-control-label" for="__BVID__248">User #</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__249"><label class="custom-control-label" for="__BVID__249">Full Name</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__250"><label class="custom-control-label" for="__BVID__250">Permission</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__251"><label class="custom-control-label" for="__BVID__251">Username</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__252"><label class="custom-control-label" for="__BVID__252">Password</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__253"><label class="custom-control-label" for="__BVID__253">Email</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__254"><label class="custom-control-label" for="__BVID__254">Mobile #</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__255"><label class="custom-control-label" for="__BVID__255">Landline #</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__256"><label class="custom-control-label" for="__BVID__256">Address</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__257"><label class="custom-control-label" for="__BVID__257">Action</label></div>
                                                    </li>
                                                    <li><button type="button" class="btn mt-2 mb-3 btn-primary btn-sm">Save</button></li>
                                                </ul>
                                            </div>
                                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                            </div>
                                            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                            </div>
                                        </section>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-outline-info ripple m-1 btn-sm collapsed" aria-expanded="false" aria-controls="sidebar-right" style="overflow-anchor: none;"><i class="i-Filter-2"></i>
                            Filter
                            </button> <button type="button" class="btn btn-outline-success ripple m-1 btn-sm"><i class="i-File-Copy"></i> PDF
                            </button> <button class="btn btn-sm btn-outline-danger ripple m-1"><i class="i-File-Excel"></i> EXCEL
                             </button> <button type="button" class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#UserModal">
                                <i class="i-Add"></i> Add
                            </button>
                            </div>
                        </div>
                    </div>
                    <!----> 
                    <div class="vgt-fixed-header">
                        <!---->
                    </div>
                    <div class="vgt-responsive">
                        <table id="vgt-table" class="tableOne table-hover vgt-table ">
                            <colgroup>
                            <col id="col-0">
                            <col id="col-1">
                            <col id="col-2">
                            <col id="col-3">
                            <col id="col-4">
                            <col id="col-5">
                            <col id="col-6">
                            <col id="col-7">
                            <col id="col-8">
                            <col id="col-9">
                            <col id="col-10">
                            <col id="col-11">
                            </colgroup>
                            <thead>
                            <tr>
                                <!----> 
                                <th scope="col" class="vgt-checkbox-col"><input type="checkbox"></th>
                                <!----><!---->
                                <th scope="col" aria-sort="descending" aria-controls="col-2" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>User #</span> <button><span class="sr-only">
                                    Sort table by User # in descending order
                                    </span></button>
                                </th>
                                <th scope="col" aria-sort="descending" aria-controls="col-3" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Full Name</span> <button><span class="sr-only">
                                    Sort table by Full Name in descending order
                                    </span></button>
                                </th>
                                <th scope="col" aria-sort="descending" aria-controls="col-4" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Permission</span> <button><span class="sr-only">
                                    Sort table by Permission in descending order
                                    </span></button>
                                </th>
                                <th scope="col" aria-sort="descending" aria-controls="col-5" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Username</span> <button><span class="sr-only">
                                    Sort table by Username in descending order
                                    </span></button>
                                </th>
                                <th scope="col" aria-sort="descending" aria-controls="col-6" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Password</span> <button><span class="sr-only">
                                    Sort table by Password in descending order
                                    </span></button>
                                </th>
                                <th scope="col" aria-sort="descending" aria-controls="col-7" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Email</span> <button><span class="sr-only">
                                    Sort table by Email in descending order
                                    </span></button>
                                </th>
                                <th scope="col" aria-sort="descending" aria-controls="col-8" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Mobile #</span> <button><span class="sr-only">
                                    Sort table by Mobile # in descending order
                                    </span></button>
                                </th>
                                <!----><!---->
                                <th scope="col" aria-sort="descending" aria-controls="col-11" class="vgt-left-align text-right" style="min-width: auto; width: auto;">
                                    <span>Action</span> <!---->
                                </th>
                            </tr>
                            <!---->
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                            <!----> 
                            <tr class="">
                                <!----> 
                                <th class="vgt-checkbox-col"><input type="checkbox"></th>
                                <!----><!---->
                                <td class="vgt-left-align text-left"><span>
                                    {{ $user->id }}
                                    </span>
                                </td>
                                <td class="vgt-left-align text-left"><span>
                                    {{ $user->username }}
                                    </span>
                                </td>
                                <td class="vgt-left-align text-left">
                                    <span>
                                        <ul class="list-unstyled">
                                        <li>
                                            {{ $user->role }}
                                        </li>
                                        </ul>
                                    </span>
                                </td>
                                <td class="vgt-left-align text-left"><span>
                                    {{ $user->username }}
                                    </span>
                                </td>
                                <td class="vgt-left-align text-left"><span>
                                    {{ $user->password }}
                                    </span>
                                </td>
                                <td class="vgt-left-align text-left"><span>
                                    {{ $user->email }}
                                    </span>
                                </td>
                                <td class="vgt-left-align text-left"><span>
                                    {{ $user->mobile_number }}
                                    </span>
                                </td>
                                <!----><!---->
                                <td class="vgt-left-align text-right">
                                    <span>
                                        <div>
                                        <div id="dropdown-right" class="dropdown b-dropdown btn-group">
                                            <!---->
                                            <button id="dropdown-right__BV_toggle_" aria-haspopup="menu" aria-expanded="false" type="button" class="btn dropdown-toggle btn-link btn-lg text-decoration-none dropdown-toggle-no-caret">
                                                <span class="_dot _r_block-dot bg-dark"></span> <span class="_dot _r_block-dot bg-dark"></span> <span class="_dot _r_block-dot bg-dark"></span> <!---->
                                            </button>
                                            <ul role="menu" tabindex="-1" aria-labelledby="dropdown-right__BV_toggle_" class="dropdown-menu dropdown-menu-right">
                                                <li role="presentation"><a role="menuitem" href="#" target="_self" class="dropdown-item"><i class="nav-icon i-Edit font-weight-bold mr-2"></i>
                                                    Edit User Profile
                                                    </a>
                                                </li>
                                                <li role="presentation"><a title="Print Profile" role="menuitem" href="#" target="_self" class="dropdown-item"><i class="nav-icon i-Eye font-weight-bold mr-2"></i>
                                                    View User Profile
                                                    </a>
                                                </li>
                                                <li role="presentation"><a role="menuitem" href="#" target="_self" class="dropdown-item" title="Delete"><i class="nav-icon i-Letter-Close font-weight-bold mr-2"></i>
                                                    Move to Archive
                                                    </a>
                                                </li>
                                                <li role="presentation"><a role="menuitem" href="#" target="_self" class="dropdown-item"><i class="nav-icon i-Computer-Secure font-weight-bold mr-2"></i>
                                                    Logs
                                                    </a>
                                                </li>
                                                <li role="presentation"><a role="menuitem" href="#" target="_self" class="dropdown-item"><i class="nav-icon i-Mail-Attachement font-weight-bold mr-2"></i>
                                                    Remarks
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            <!---->
                            @endforeach
                            </tbody>
                            <!---->
                        </table>
                    </div>
                    <!----> 
                    <div class="vgt-wrap__footer vgt-clearfix">
                        <div class="footer__row-count vgt-pull-left">
                            <form>
                            <label for="vgt-select-rpp-835833998041" class="footer__row-count__label">Rows per page:</label> 
                            <select id="vgt-select-rpp-835833998041" autocomplete="off" name="" aria-controls="vgt-table" class="footer__row-count__select">
                                <option value="10">
                                    10
                                </option>
                                <option value="20">
                                    20
                                </option>
                                <option value="30">
                                    30
                                </option>
                                <option value="40">
                                    40
                                </option>
                                <option value="50">
                                    50
                                </option>
                                <option value="-1">All</option>
                            </select>
                            </form>
                        </div>
                        <div class="footer__navigation vgt-pull-right">
                            <div data-v-347cbcfa="" class="footer__navigation__page-info">
                            <div data-v-347cbcfa="">
                                1 - 9 of 9
                            </div>
                            </div>
                            <!----> <button type="button" aria-controls="vgt-table" class="footer__navigation__page-btn disabled"><span aria-hidden="true" class="chevron left"></span> <span>prev</span></button> <button type="button" aria-controls="vgt-table" class="footer__navigation__page-btn disabled"><span>next</span> <span aria-hidden="true" class="chevron right"></span></button> <!---->
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!----><!---->
        </div>
    </div>
    <div tabindex="-1" class="b-sidebar-outer">
        <!---->
        <div id="sidebar-right" tabindex="-1" role="dialog" aria-modal="false" aria-hidden="true" aria-labelledby="sidebar-right___title__" class="b-sidebar shadow b-sidebar-right bg-white text-dark" style="display: none;">
            <header class="b-sidebar-header">
                <button type="button" aria-label="Close" class="close text-dark">
                <svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" aria-label="x" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-x b-icon bi">
                    <g>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                    </g>
                </svg>
                </button>
                <strong id="sidebar-right___title__">Filter</strong>
            </header>
            <div class="b-sidebar-body">
                <div class="px-3 py-2">
                <div class="row">
                    <div class="col-md-12">
                        <fieldset class="form-group" id="__BVID__216">
                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__216__BV_label_">User Code</legend>
                            <div>
                            <input type="text" placeholder="Filter by User Code" class="form-control" label="UserCode" id="__BVID__217"><!----><!----><!---->
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <fieldset class="form-group" id="__BVID__218">
                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__218__BV_label_">Full Name</legend>
                            <div>
                            <input type="text" placeholder="Filter by Full Name" class="form-control" label="FullName" id="__BVID__219"><!----><!----><!---->
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <fieldset class="form-group" id="__BVID__220">
                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__220__BV_label_">Branch</legend>
                            <div>
                            <div dir="auto" class="v-select vs--single vs--searchable">
                                <div id="vs1__combobox" role="combobox" aria-expanded="false" aria-owns="vs1__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                                    <div class="vs__selected-options"> <input placeholder="Filter by Branch" aria-autocomplete="list" aria-labelledby="vs1__combobox" aria-controls="vs1__listbox" type="search" autocomplete="off" class="vs__search"></div>
                                    <div class="vs__actions">
                                        <button type="button" title="Clear Selected" aria-label="Clear Selected" class="vs__clear" style="display: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10">
                                            <path d="M6.895455 5l2.842897-2.842898c.348864-.348863.348864-.914488 0-1.263636L9.106534.261648c-.348864-.348864-.914489-.348864-1.263636 0L5 3.104545 2.157102.261648c-.348863-.348864-.914488-.348864-1.263636 0L.261648.893466c-.348864.348864-.348864.914489 0 1.263636L3.104545 5 .261648 7.842898c-.348864.348863-.348864.914488 0 1.263636l.631818.631818c.348864.348864.914773.348864 1.263636 0L5 6.895455l2.842898 2.842897c.348863.348864.914772.348864 1.263636 0l.631818-.631818c.348864-.348864.348864-.914489 0-1.263636L6.895455 5z"></path>
                                        </svg>
                                        </button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" role="presentation" class="vs__open-indicator">
                                        <path d="M9.211364 7.59931l4.48338-4.867229c.407008-.441854.407008-1.158247 0-1.60046l-.73712-.80023c-.407008-.441854-1.066904-.441854-1.474243 0L7 5.198617 2.51662.33139c-.407008-.441853-1.066904-.441853-1.474243 0l-.737121.80023c-.407008.441854-.407008 1.158248 0 1.600461l4.48338 4.867228L7 10l2.211364-2.40069z"></path>
                                        </svg>
                                        <div class="vs__spinner" style="display: none;">Loading...</div>
                                    </div>
                                </div>
                                <ul id="vs1__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                            </div>
                            <!----><!----><!---->
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <fieldset class="form-group" id="__BVID__225">
                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__225__BV_label_">Permission</legend>
                            <div>
                            <div dir="auto" class="v-select vs--single vs--searchable">
                                <div id="vs2__combobox" role="combobox" aria-expanded="false" aria-owns="vs2__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                                    <div class="vs__selected-options"> <input placeholder="Filter by Permission" aria-autocomplete="list" aria-labelledby="vs2__combobox" aria-controls="vs2__listbox" type="search" autocomplete="off" class="vs__search"></div>
                                    <div class="vs__actions">
                                        <button type="button" title="Clear Selected" aria-label="Clear Selected" class="vs__clear" style="display: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10">
                                            <path d="M6.895455 5l2.842897-2.842898c.348864-.348863.348864-.914488 0-1.263636L9.106534.261648c-.348864-.348864-.914489-.348864-1.263636 0L5 3.104545 2.157102.261648c-.348863-.348864-.914488-.348864-1.263636 0L.261648.893466c-.348864.348864-.348864.914489 0 1.263636L3.104545 5 .261648 7.842898c-.348864.348863-.348864.914488 0 1.263636l.631818.631818c.348864.348864.914773.348864 1.263636 0L5 6.895455l2.842898 2.842897c.348863.348864.914772.348864 1.263636 0l.631818-.631818c.348864-.348864.348864-.914489 0-1.263636L6.895455 5z"></path>
                                        </svg>
                                        </button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" role="presentation" class="vs__open-indicator">
                                        <path d="M9.211364 7.59931l4.48338-4.867229c.407008-.441854.407008-1.158247 0-1.60046l-.73712-.80023c-.407008-.441854-1.066904-.441854-1.474243 0L7 5.198617 2.51662.33139c-.407008-.441853-1.066904-.441853-1.474243 0l-.737121.80023c-.407008.441854-.407008 1.158248 0 1.600461l4.48338 4.867228L7 10l2.211364-2.40069z"></path>
                                        </svg>
                                        <div class="vs__spinner" style="display: none;">Loading...</div>
                                    </div>
                                </div>
                                <ul id="vs2__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                            </div>
                            <!----><!----><!---->
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <fieldset class="form-group" id="__BVID__230">
                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__230__BV_label_">Created By</legend>
                            <div>
                            <input type="text" placeholder="Filter by Created by" class="form-control" label="CreatedBy" id="__BVID__231"><!----><!----><!---->
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <fieldset class="form-group" id="__BVID__232">
                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__232__BV_label_">Created Date</legend>
                            <div>
                            <div data-v-1ebd09d2="" class="vue-daterange-picker">
                                <div data-v-1ebd09d2="" class="form-control reportrange-text"><i data-v-1ebd09d2="" class="glyphicon glyphicon-calendar fa fa-calendar"></i> <span data-v-1ebd09d2=""> - </span><b data-v-1ebd09d2="" class="caret"></b></div>
                                <!---->
                            </div>
                            <button type="button" class="btn btn-danger btn-badge btn-sm">
                            Clear Date Range
                            </button><!----><!----><!---->
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-12 col-md-6"><button type="button" class="btn btn-primary m-1 btn-sm btn-block"><i class="i-Filter-2"></i>
                        Filter
                        </button>
                    </div>
                    <div class="col-sm-12 col-md-6"><button type="button" class="btn btn-danger m-1 btn-sm btn-block"><i class="i-Power-2"></i>
                        Reset
                        </button>
                    </div>
                </div>
                </div>
            </div>
            <!---->
        </div>
        <!----><!---->
    </div>
    <span>
        <!---->
    </span>
    <!---->
</div>
@endsection
@section('scripts')
<script>
Vue.component('v-select', VueSelect.VueSelect);

new Vue({
  el: '#app',
  data: {
    selectedBranches: [], // will hold selected branch IDs
  }
});
</script>
@endsection
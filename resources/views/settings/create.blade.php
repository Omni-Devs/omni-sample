@extends('layouts.app')
@section('content')

<div class="main-content">
   <div>
         <div>
      <div class="breadcrumb">
         <h1 class="mr-3">Create Product</h1>
         <ul>
            <li><a href=""> Inventory </a></li>
            <!----> <!---->
         </ul>
         <div class="breadcrumb-action"></div>
      </div>
      <div class="separator-breadcrumb border-top"></div>
   </div>
   <!----> 
   <div class="wrapper">
      <span>
         <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
     

      <span>
      <div class="card-body">
   <!----><!---->
   <div class="row">
      <div class="col-sm-12 col-md-8 col-lg-8">
         <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
               <span>
                        <fieldset class="form-group" id="__BVID__3161">
                           <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__3161__BV_label_">Default Currency *</legend>
                           <select id="default_currency" name="default_currency" class="form-control">
                              <option value="PHP">Philippine Peso (PHP)</option>
                              <option value="USD">United States Dollar (USD)</option>
                        </select>
                        </fieldset>
                  </span>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
               <span>
                  <fieldset class="form-group" id="__BVID__186">
                     <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__186__BV_label_">Company Name *</legend>
                     <div>
                        <input type="text" placeholder="Company Name" id="company_name" name="company_name" class="form-control"> 
                        <div id="Company-feedback" class="invalid-feedback"></div>
                     </div>
                  </fieldset>
               </span>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
               <span>
                  <fieldset class="form-group" id="__BVID__189">
                     <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__189__BV_label_">Developed by *</legend>
                     <div>
                        <input type="text" id="developed_by" name="developed_by" class="form-control" value="Omnisystems Solutions, Inc." readonly>
                  </fieldset>
               </span>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                  <span>
                        <fieldset class="form-group" id="__BVID__3161">
                           <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__3161__BV_label_">Footer *</legend>
                           <div>
                              <input type="text" id="footer" name="footer" class="form-control" value="Omnisystems Solutions, Inc." readonly>
                              <!----><!----><!---->
                           </div>
                        </fieldset>
                  </span>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
               <span>
                        <fieldset class="form-group" id="__BVID__3161">
                           <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" for="default_language">Default Language *</legend>
                           <select id="default_language" name="default_language" class="form-control">
                                 <option value="en">English</option>
                                 <option value="es">Spanish</option>
                                 <option value="fr">French</option>
                                 <option value="de">German</option>
                                 <option value="it">Italian</option>
                                 <option value="ja">Japanese</option>
                                 <option value="ko">Korean</option>
                                 <option value="pt">Portuguese</option>
                                 <option value="ru">Russian</option>
                                 <option value="zh">Chinese</option>
                           </select>

                        </fieldset>
                  </span>
            </div>
            @php
               $timezones = DateTimeZone::listIdentifiers();
            @endphp

            <div class="col-sm-12 col-md-6 col-lg-6">
               <fieldset class="form-group" id="__BVID__200">
                  <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__200__BV_label_">Time Zone</legend>
                  <select id="time_zone" name="time_zone" class="form-control" required>
                  @foreach ($timezones as $tz)
                        @php
                           $dt = new DateTime('now', new DateTimeZone($tz));
                           $offset = $dt->format('P');
                        @endphp
                        <option value="{{ $tz }}" {{ old('timezone', 'Asia/Singapore') == $tz ? 'selected' : '' }}>
                           UTC/GMT {{ $offset }} - {{ $tz }}
                        </option>
                  @endforeach
               </select>
            </div>
         </div>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-4">
         <span>
            <fieldset class="form-group" id="__BVID__206">
               <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__206__BV_label_">Change Logo</legend>
               <div>
                  <div data-v-6ff5a0de="" style="outline: none;">
                     <div data-v-6ff5a0de="" class="image-container position-relative text-center image-list">
                        <div data-v-6ff5a0de="">
                           <div data-v-6ff5a0de="" class="preview-image full-width position-relative cursor-pointer">
                              <div data-v-6ff5a0de="" class="image-overlay position-relative full-width full-height"></div>
                              <div data-v-6ff5a0de="" class="image-overlay-details full-width">
                                 <svg data-v-6ff5a0de="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="icon-overlay">
                                    <path data-v-6ff5a0de="" d="M283.9 186.4h-64.6l-.4-71.1c-.1-8.8-7.2-15.9-16-15.9h-.1c-8.8.1-16 7.3-15.9 16.1l.4 70.9h-64.4c-8.8 0-16 7.2-16 16s7.2 16 16 16h64.6l.4 71.1c.1 8.8 7.2 15.9 16 15.9h.1c8.8-.1 16-7.3 15.9-16.1l-.4-70.9h64.4c8.8 0 16-7.2 16-16s-7.1-16-16-16z"></path>
                                    <path data-v-6ff5a0de="" d="M511.3 465.3L371.2 325.2c-1-1-2.6-1-3.6 0l-11.5 11.5c31.6-35.9 50.8-82.9 50.8-134.3C406.9 90.3 315.6-1 203.4-1 91.3-1 0 90.3 0 202.4s91.3 203.4 203.4 203.4c51.4 0 98.5-19.2 134.3-50.8l-11.5 11.5c-1 1-1 2.6 0 3.6l140.1 140.1c1 1 2.6 1 3.6 0l41.4-41.4c.9-.9.9-2.5 0-3.5zm-307.9-92.5C109.5 372.8 33 296.4 33 202.4S109.5 32.1 203.4 32.1s170.4 76.4 170.4 170.4-76.4 170.3-170.4 170.3z"></path>
                                 </svg>
                              </div>
                              <div data-v-6ff5a0de="" class="show-image centered"><img data-v-6ff5a0de="" src="/images/logo-default.png" class="show-img img-responsive"></div>
                           </div>
                           <div data-v-6ff5a0de="" class="image-bottom display-flex position-absolute full-width align-items-center justify-content-between">
                              <div data-v-6ff5a0de="" class="image-bottom-left display-flex align-items-center">
                                 <div data-v-6ff5a0de="" class="display-flex align-items-center">
                                    <span data-v-6ff5a0de="" class="image-primary display-flex align-items-center">
                                       <svg data-v-6ff5a0de="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="image-icon-primary">
                                          <circle data-v-6ff5a0de="" fill="#10BC83" cx="256" cy="256" r="256"></circle>
                                          <path data-v-6ff5a0de="" fill="#FFF" d="M216.7 350.9h-.1c-5.1 0-9.9-2.1-13.4-5.7l-74.2-76c-7.4-7.5-7.2-19.5.4-26.8 7.5-7.4 19.5-7.2 26.8.4L217 305l139.7-138.5c7.5-7.4 19.5-7.4 26.8.1s7.4 19.5-.1 26.8l-153.2 152c-3.7 3.5-8.5 5.5-13.5 5.5z"></path>
                                       </svg>
                                       success
                                    </span>
                                    <span data-v-6ff5a0de="">
                                       <span style="display: none;">
                                          <div data-v-6ff5a0de="" class="popper popper-custom">
                                             have been
                                             successfully uploaded
                                          </div>
                                       </span>
                                       <i data-v-6ff5a0de="" class="cursor-pointer display-flex align-items-center">
                                          <svg data-v-6ff5a0de="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="image-icon-info">
                                             <path data-v-6ff5a0de="" d="M256 32c30.3 0 59.6 5.9 87.2 17.6 26.7 11.3 50.6 27.4 71.2 48s36.7 44.5 48 71.2c11.7 27.6 17.6 56.9 17.6 87.2s-5.9 59.6-17.6 87.2c-11.3 26.7-27.4 50.6-48 71.2s-44.5 36.7-71.2 48C315.6 474.1 286.3 480 256 480s-59.6-5.9-87.2-17.6c-26.7-11.3-50.6-27.4-71.2-48s-36.7-44.5-48-71.2C37.9 315.6 32 286.3 32 256s5.9-59.6 17.6-87.2c11.3-26.7 27.4-50.6 48-71.2s44.5-36.7 71.2-48C196.4 37.9 225.7 32 256 32m0-32C114.6 0 0 114.6 0 256s114.6 256 256 256 256-114.6 256-256S397.4 0 256 0z"></path>
                                             <path data-v-6ff5a0de="" d="M304.2 352H296c-4.4 0-8-3.6-8-8v-94.8c0-15.3-11.5-28.1-26.7-29.8-2.5-.3-4.8-.5-6.7-.5-23.7 0-44.6 11.9-57 30.1l-.1.1v-.1c-1 2-1.7 5.3.7 6.5.6.3 1.2.5 1.8.5h16c4.4 0 8 3.6 8 8v80c0 4.4-3.6 8-8 8h-8.2c-8.7 0-15.8 7.1-15.8 15.8v.3c0 8.7 7.1 15.8 15.8 15.8h96.4c8.7 0 15.8-7.1 15.8-15.8v-.3c0-8.7-7.1-15.8-15.8-15.8zM256 128c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32z"></path>
                                          </svg>
                                       </i>
                                    </span>
                                 </div>
                                 <a data-v-6ff5a0de="" class="text-small mark-text-primary cursor-pointer" style="display: none;">success</a>
                              </div>
                              <div data-v-6ff5a0de="" class="display-flex">
                                 <!----> 
                                 <a data-v-6ff5a0de="" class="image-delete display-flex cursor-pointer">
                                    <svg data-v-6ff5a0de="" xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512" class="image-icon-delete">
                                       <path data-v-6ff5a0de="" d="M448 64h-96V0H159.9l.066 64H32v32h32v416h384V96h32V64h-32zM192 32h128v32H192V32zm224 448H96V96h320v384zM192 160h32v256h-32V160zm96 0h32v256h-32V160z"></path>
                                    </svg>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!----> 
                     <div data-v-6ff5a0de=""><input data-v-6ff5a0de="" id="myIdUpload" name="images" accept="image/gif,image/jpeg,image/png,image/bmp,image/jpg" type="file" class="display-none"> <input data-v-6ff5a0de="" id="image-edit" name="image" accept="image/gif,image/jpeg,image/png,image/bmp,image/jpg" type="file" class="display-none"></div>
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
                                    <div class="swiper-wrapper" style="transition-duration: 0ms;">
                                       <div data-v-3f78f595="" class="swiper-slide">
                                          <img data-v-3f78f595="" src="/images/logo-default.png" srcset="" class="vue-lightbox-modal-image"> <!---->
                                       </div>
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                 </div>
                                 <div data-v-3f78f595="" class="vue-lightbox-footer">
                                    <div data-v-3f78f595="" class="vue-lightbox-footer-info"></div>
                                    <div data-v-3f78f595="" class="vue-lightbox-footer-count">
                                       1/1
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
                                    <div class="swiper-wrapper" style="transition-duration: 0ms;">
                                       <div data-v-3f78f595="" class="swiper-slide">
                                          <div data-v-3f78f595="" data-src="/images/logo-default.png" class="vue-lightbox-modal-thumbnail vue-lightbox-modal-thumbnail-active" lazy="loading" style="background-image: url(&quot;/images/vendor/vue-image-lightbox-carousel/src/loading.gif?640ba98c18515b2fa7e7a10a23ebf13d&quot;);"></div>
                                       </div>
                                    </div>
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
                           </button>
                        </div>
                     </div>
                  </div>
                  <div id="Logo-feedback" class="invalid-feedback"></div>
                  <!----><!----><!---->
               </div>
            </fieldset>
         </span>
      </div>
      <div class="mt-2 col-md-12">
         <fieldset class="form-group" id="__BVID__216">
            <!---->
            <div>
               <button type="submit" class="btn btn-primary"><i class="i-Yes me-2 font-weight-bold"></i>
               Submit</button><!----><!----><!---->
            </div>
         </fieldset>
      </div>
   </div>
</div>
</form>
            </span>
@endsection
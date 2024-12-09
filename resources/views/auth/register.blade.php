@extends('layouts.main')
@section('content')
     <!-- breadcrumb-area-start -->
     <div class="breadcrumb__area pt-5 pb-5">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="tp-breadcrumb__content">
                  <div class="tp-breadcrumb__list">
                     <span class="tp-breadcrumb__active"><a href="index.html">Home</a></span>
                     <span class="dvdr">/</span>
                     <span>Sign in</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- breadcrumb-area-end -->

   <!-- track-area-start -->
   <section class="track-area pb-40">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-12">
               <div class="tptrack__product mb-40">
                  <div class="tptrack__content grey-bg">
                     <div class="tptrack__item d-flex mb-20">
                        <div class="tptrack__item-icon">
                           <i class="fal fa-lock"></i>
                        </div>
                        <div class="tptrack__item-content">
                           <h4 class="tptrack__item-title">Sign Up</h4>
                        </div>
                     </div>
                     @if($errors->any())
                        @foreach ($errors->all() as $error)
                           <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>{{ $error }}</strong>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>
                        @endforeach
                     @endif
                     <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="tptrack__id mb-10">
                           <div class="input">
                              <span><i class="fal fa-user"></i></span>
                              <input type="text" name="name" placeholder="full name">
                           </div>
                        </div>
                        <div class="tptrack__id mb-10">
                           <div class="input">
                              <span><i class="fal fa-envelope"></i></span>
                              <input type="email" name="email" placeholder="Email address">
                           </div>
                        </div>
                        <div class="tptrack__email mb-10">
                           <div class="input">
                               <span><i class="fal fa-phone"></i></span>
                              <input type="text" id="phone" name="phone" class="@error('phone') is-valid @enderror">
                              {{-- <input type="text" hidden name="phone" id="phone_number"> --}}
                           </div>
                       </div>
                        <div class="tptrack__email mb-10">
                           <div class="input input-group" id="Password-toggle">
                              <span><i class="fal fa-key"></i></span>
                              <input type="password" name="password" placeholder="Password">
                              <a href="javascript:void(0);" class="" id="Password-toggle-btn">
                                 <i class="fal fa-eye-slash" aria-hidden="true"></i>
                             </a>
                           </div>
                        </div>
   
                        <div class="tptrack__email mb-10">
                           <div class="input" id="Password-toggle1">
                              <span><i class="fal fa-key"></i></span>
                              <input type="password" name="password_confirmation" placeholder="Confirm Password">
                              <a href="javascript:void(0);" class="" id="Password-toggle-btn">
                                 <i class="fal fa-eye-slash" aria-hidden="true"></i>
                             </a>
                           </div>
                        </div>
                        <div class="tptrack__btn mb-15">
                           <button type="submit" class="tptrack__submition tpsign__reg">Register Now<i class="fal fa-long-arrow-right"></i></button>
                        </div>
                     </form>
                     <div class="tpsign__account text-center">
                        <p>Already have an account? <a href="/login">Login</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- track-area-end -->
@endsection
@push('scripts')

<script>
const phoneInputField = document.getElementById("phone");
const form = document.querySelector("form");
// const phoneNumber = document.getElementById("phone_number");
const phoneInput = intlTelInput(phoneInputField, {
    initialCountry: "ng",     
    onlyCountries: ["ng"],    
    separateDialCode: true,   
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
});

form.addEventListener("submit", function(e) {
    // Get the phone input
    const phoneNumberField = document.getElementById('phone_number');

    // Check if number is valid
    if (!phoneInput.isValidNumber()) {
        e.preventDefault();
        alert("Please enter a valid phone number");
        return;
    }
    
    // Get full number
    const full_number = phoneInput.getNumber(intlTelInputUtils.numberFormat.E164);
    
    // Set value to hidden input
    phoneNumberField.value = full_number;
    
    // Log for debugging
    console.log("Full Phone Number:", full_number);
});
</script>
@endpush
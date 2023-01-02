@extends('master.frontend')
@section('content')
    <section id="ContactUs">
        <div class="container">
            <div class="row my-5">
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="formBox">
                        <div class="title">
                            <h2>@lang('frontend.contact-us')</h2>
                        </div>
                        <hr>
                        <form action="{{ route('frontend.addContact') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="">
                                @lang('frontend.name-surname')
                                <input type="text" name="name" placeholder="@lang('frontend.name-surname')">
                            </label>
                            <label for="">
                                @lang('frontend.phone')
                                <input type="text" name="phone" id="" placeholder="+9947778899">
                            </label>
                            <label for="">
                                E-mail
                                <input type="email" name="email" id="" placeholder="example@gmail.com">
                            </label>
                            <label for="">
                                @lang('frontend.message')
                                <textarea name="message" id="" cols="30" rows="10" placeholder="@lang('frontend.message')"></textarea>
                            </label>
                            <div class="sendBtn">
                                <button type="submit"><i class="fab fa-telegram-plane"></i>@lang('frontend.send')</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1739.1089156087835!2d49.83125810523454!3d40.37234442339093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307dc9d688b8c9%3A0x90084deb3c826ba3!2sGo%20and%20Study!5e0!3m2!1saz!2s!4v1669025329147!5m2!1saz!2s" width="100%" height="608" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="row my-5 socialBox">
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="socialContent">
                        <a href="tel:{{ setting('goandstudy') }}" target="_blank" >Go and Study : {{ setting('goandstudy') }}</a>
                        <a href="tel:{{ setting('goandplay1') }}" target="_blank" >Go and play : {{ setting('goandplay1') }}</a>
                        <a href="tel:{{ setting('goandplay2') }}" target="_blank" >Go and play : {{ setting('goandplay2') }}</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="socBox">
                        <a  target="_blank" href="{{ setting('instagram') }}"><i class="fab fa-instagram"></i></a>
                        <a  target="_blank" href="{{ setting('facebook') }}"><i class="fab fa-facebook-square"></i></a>
                        <a  target="_blank" href="{{ setting('linkedin') }}"><i class="fab fa-linkedin"></i></a>
                        <a  target="_blank" href="{{ setting('transfermkr') }}"><i class="far fa-futbol"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

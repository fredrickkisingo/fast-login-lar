@extends('layouts.app')
@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class ="col-md-8">
            <div class="card">
                <div class="card-header">{{_('Login')}}</div>
                 <div class="card-body">
                    <form id="login-form" method = "POST" action="{{ route('post-login')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form label text-md-right">{{_('Email')}}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" >
                                    <span class="email-error-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form label text-md-right">{{_('Password')}}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >
                                    <span class="password-error error-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="g-recaptcha" data-sitekey="{{ config('app.CAPTCHA_KEY',null)}}">
                                    @if($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" style="diplay:block">
                                        <strong> {{ $errors->first('g-recaptcha-response')}} </strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    
                        <div classs="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{_('Login')}}
                                </button>
                              </div>
                        </div>


                    </form>
                    <a href="{{'register'}}">Register Here</a>
                </div>
            </div>
        </div>
    </div>
</div>
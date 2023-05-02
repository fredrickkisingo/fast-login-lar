@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:100px">
    <div class="row justify-content-center">
        <div class ="col-md-8">
            <div class="card">
                <div class="card-header">{{_('Register')}}</div>
                <div class="card-body">
                    <form id="registration-form" method = "POST" action="{{ route('post-register')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form label text-md-right">{{_('First Name')}}</label>
                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="first_name" autofocus>
                                    <span class="error-feedback" style="display:none"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname"  autofocus>
                                <span class="surname-error error-feedback" id ="surname-error" style="display:none"></span>
                            </div>
                       </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form label text-md-right">{{_('Last Name')}}</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" autofocus>
                                    <span class="lastname-error error-feedback" id="lastname-error" style="display:none"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form label text-md-right">{{_('Email')}}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" autofocus>
                                    <span class="email-error error-feedback" id= "email-error" style="display:none"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="qualification" class="col-md-4 col-form label text-md-right">{{_('Qualifications')}}</label>
                            <div class="col-md-6">
                                <input id="qualification" type="text" class="form-control" name="qualification" autofocus>
                                    <span class="qualification-error error-feedback" id="qualification-error" style="display:none"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form label text-md-right">{{_('Country')}}</label>
                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" autofocus>
                                    <span class="country-error error-feedback" id="country-error" style="display:none"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form label text-md-right">{{_('City')}}</label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" autofocus>
                                    <span class="city-error error-feedback" id="city-error" style="display:none"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form label text-md-right">{{_('phone_number')}}</label>
                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control" name="phone_number" autofocus>
                                    <span class="phone_number-error error-feedback" id="phone_number-error" style="display:none"></span>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form label text-md-right">{{_('addresss')}}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" autofocus>
                                    <span class="address-error error-feedback" id="address-error" style="display:none"></span>
                            </div>
                        </div>
                       

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form label text-md-right">{{_('Password')}}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" autofocus>
                                    <span class="password-error error-feedback" id="password-error" style="display:none"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirm-password" class="col-md-4 col-form label text-md-right">{{_('Confirm Password')}}</label>
                            <div class="col-md-6">
                                <input id="confirm-password" type="password" class="form-control" name="confirm-password" autofocus>
                                    <span class="confirm-password-error error-feedback" id="confirm-password-error" style="display:none"></span>
                            </div>
                        </div>
                        
                        <div classs="form-group row">
                            <label for ="file">Choose Resume File</label>
                            <div class="col-md-6">
                            <input type="file" name="resume_file" id="file" class="form-control-file">
                            <span class="resume-error error-feedback" id="resume-error" style="display:none"></span>

                            </div>
                        </div> 
                        <div classs="form-group row">
                            <label for ="file">Choose Profile Image</label>
                            <div class="col-md-6">
                            <input type="file" name="profile_image" id="profile_image" class="form-control-file">
                            <span class="profile-error error-feedback"  id="profile-error" style="display:none"></span>
                            </div>
                        </div> 
                       
                        <div classs="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{_('Register')}}
                                </button>
                        </div>

                    </form>
                    <a href="{{'login'}}">Already have an account?</a>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- the logic for form validation begins here --}}
<script>
    document.getElementById('registration-form').addEventListener('submit',function(event){

        //prevent form from submitting automatically here
        event.preventDefault();

        var firstname = document.getElementById('firstname');

        var firstNameError = document.querySelector('#firstname + .error-feedback');
        if(firstname.value.trim() === ''){
            firstNameError.textContent = 'First Name is required';
            firstNameError.style.display = 'block';

            setTimeout(function(){
                firstNameError.textContent ='';
                firstNameError.style.display = 'none';
            },4000);
            return;
        }else{
            firstNameError.style.display = 'none'
        }

        var firstname = document.getElementById('firstname');

        var firstNameError = document.querySelector('#firstname + .error-feedback');
        if(firstname.value.trim() === ''){
            firstNameError.textContent = 'First Name is required';
            firstNameError.style.display = 'block';
            return;
        }else{
            firstNameError.style.display = 'none'
        }


        var surname = document.getElementById('surname');
            var surnameError = document.getElementById('surname-error');
            if (surname.value.trim() === '') {
                surnameError.textContent = 'Surname is required';
                surnameError.style.display = 'block';
                setTimeout(function() {
                    surnameError.textContent = '';
                    surnameError.style.display = 'none';
                }, 4000);
                return;
            } else {
                surnameError.style.display = 'none';
            }

            var lastname = document.getElementById('lastname');
            var lastnameError = document.getElementById('lastname-error');
            if (lastname.value.trim() === '') {
                lastnameError.textContent = 'Last Name is required';
                lastnameError.style.display = 'block';
                setTimeout(function() {

                    lastnameError.textContent = '';
                    lastnameError.style.display = 'none';

                }, 4000);
                return;
            } else {
                lastnameError.style.display = 'none';
            }

            var qualifications = document.getElementById('qualification');
            var qualificationsError = document.getElementById('qualification-error');
            if (qualifications.value.trim() === '') {
                qualificationsError.textContent = 'Qualifications is required';
                qualificationsError.style.display = 'block';
                setTimeout(function() {

                    qualificationsError.textContent = '';
                    qualificationsError.style.display = 'none';

                }, 4000);
                return;
            } else {
                qualificationsError.style.display = 'none';
            }

            var country = document.getElementById('country');
            var countryError = document.getElementById('country-error');
            if (country.value.trim() === '') {
                countryError.textContent = 'Country is required';
                countryError.style.display = 'block';
                setTimeout(function() {

                    countryError.textContent = '';
                    countryError.style.display = 'none';

                }, 4000);
                return;
            } else {
                countryError.style.display = 'none';
            }

            var address = document.getElementById('address');
            var addressError = document.getElementById('address-error');
            if (address.value.trim() === '') {
                addressError.textContent = 'Address is required';
                addressError.style.display = 'block';
                setTimeout(function() {

                    addressError.textContent = '';
                    addressError.style.display = 'none';

                }, 4000);
                return;
            } else {
                addressError.style.display = 'none';
            }

            var email = document.getElementById('email');
            var emailError = document.getElementById('email-error');
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if(!emailRegex.test(email.value.trim())){
                emailError.textContent = 'Invalid email format';
                emailError.style.display = 'block';

                setTimeout(function() {
                emailError.textContent = '';
                lastameError.style.display = 'none';
                }, 4000);
                return;
            }else{
                emailError.style.display = 'none';

            }
            if (email.value.trim() === '') {
                emailError.textContent = 'Email is required';
                emailError.style.display = 'block';
                setTimeout(function() {

                    emailError.textContent = '';
                    emailError.style.display = 'none';

                }, 4000);
                return;
            } else {
                emailError.style.display = 'none';
            }

            var password = document.getElementById('password');
            var confirmPassword = document.getElementById('confirm-password');
            var passwordError = document.getElementById('password-error')

            if(!password.value){
                passwordError.textContent = 'Please type a valid password';
                setTimeout(function() {

                    passwordError.textContent = '';
                    passwordError.style.display = 'none';

                }, 4000);
                return;
            }
             if(!confirmPassword.value){
                passwordError.textContent = 'Please re-type your  password';
                passwordError.style.display = 'block';

                setTimeout(function() {

                    passwordError.textContent = '';
                    passwordError.style.display = 'none';

                }, 4000);
                return;
            }

            if(password.value !== confirmPassword.value){
                passwordError.textContent= 'Passwords do not match';
                passwordError.style.display = 'block';
                setTimeout(function() {

                passwordError.textContent = '';
                passwordError.style.display = 'none';

                }, 4000);
                return;
            }else{
                passwordError.style.display = 'none';

            }


            var fileInput = document.getElementById('file')
            var fileInputError = document.getElementById('resume-error')
            if(fileInput.files.length  === 0){
                fileInputError.textContent= 'Resume file is required';
                fileInputError.style.display = 'block';

                setTimeout(function() {

                fileInputError.textContent = '';
                fileInputError.style.display = 'none';

                }, 4000);
                return;

            }else{
                fileInputError.style.display = 'none';

            }

            
            var profileInput = document.getElementById('profile_image')
            var profileInputError = document.getElementById('profile-error')
            if(profileInput.files.length  === 0){
                profileInputError.textContent= 'Profile Image is required';
                profileInputError.style.display = 'block';

                setTimeout(function() {

                profileInputError.textContent = '';
                profileInputError.style.display = 'none';

                }, 4000);
                return;

            }else{
                profileInputError.style.display = 'none';

            }
        //here all fields are valid so submit form
        this.submit();
    })
</script>

@endsection
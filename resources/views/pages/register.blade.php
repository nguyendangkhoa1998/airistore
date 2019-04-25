@extends('master')
@section('title','Register Airi')
@section('Breadcrumb')
<div class="breadcrumb-area bg--white-6 breadcrumb-bg-1 pt--60 pb--70 pt-lg--40 pb-lg--50 pt-md--30 pb-md--40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title">Register</h1>
                <ul class="breadcrumb justify-content-center">
                    <li><a href="index.html">Home</a></li>
                    <li class="current"><span>Register</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div id="content" class="main-content-wrapper">
    <div class="page-content-inner">
        <div class="container">
            <div class="row pt--75 pt-md--55 pt-sm--35 pb--80 pb-md--60 pb-sm--40">
                <div class="col-md-12">
                    <div class="register-box">
                        <h4 class="mb--35 mb-sm--20">Register</h4>
                        @if(session('alert'))
                        <div class="alert alert-success" style="margin-bottom: 0px" role="alert">
                          {{session('alert')}}
                      </div>
                      @endif
                      @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                      @endif
                      <form action="" method="post" class="form form--login">
                        @csrf
                        <div class="form__group mb--20">
                            <label class="form__label form__label--2" for="email">Name <span class="required">*</span></label>
                            <input type="text" class="form__input form__input--3" id="name" name="name">
                        </div>

                        <div class="form__group mb--20">
                            <label class="form__label form__label--2" for="email">Email<span class="required">*</span></label>
                            <input type="email" class="form__input form__input--3" id="email" name="email">
                        </div>

                        <div class="form__group mb--20">
                            <label class="form__label form__label--2" for="email">Phone number<span class="required">*</span></label>
                            <input type="text" class="form__input form__input--3" id="phone_number" name="phone_number">
                        </div>

                        <div class="form__group mb--20">
                            <label class="form__label form__label--2" for="email">Address<span class="required">*</span></label>
                            <input type="text" class="form__input form__input--3" id="address" name="address">
                        </div>

                        <div class="form__group mb--20">
                         <label class="form__label form__label--2" for="password">Password <span class="required">*</span></label>
                         <input type="password" class="form__input form__input--3" id="password" name="password">
                     </div>
                     <div class="form__group">
                        <input type="submit" value="Register" class="btn btn-submit btn-style-1">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
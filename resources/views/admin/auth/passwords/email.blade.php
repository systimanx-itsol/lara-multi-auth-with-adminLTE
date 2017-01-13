@extends('admin.layouts.app')
@section('htmlheader_title')
Admin - Login
@endsection
@section('content') 
<div class="container">
    <div style="margin-bottom:80px;"></div>
    <?php
    $luk2_image = "img/timthumb.png";
    foreach ($setting as $setting_data) {
        $luk2_name = $setting_data->sitename;
        if ($setting_data->setting_logo != '') {
            $luk2_image = "/uploads/settings/" . $setting_data->setting_logo;
        }
    }
    ?> 
    <div class="row">
         <div class="login-logo"><img alt="<?php echo $luk2_name; ?>" title="<?php echo $luk2_name; ?>" src="{{ asset($luk2_image) }}">  </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i>Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

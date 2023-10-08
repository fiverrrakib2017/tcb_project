<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>টিসিবি ভাতা প্রদান লগিন করুন</title>
    <link href="{{asset('asset/backend/css/style.default.css')}}" rel="stylesheet">
    <style>
        body {
            font-family: SolaimanLipiNormal !important;
            font-size: 14px !important;
            color: #636E7B !important;
            background-color: #798e76 !important;
        }
    </style>
</head>

<body>

<section>

    <div class="panel panel-signin">
        <div class="panel-body">
            <div style="font-size: 24px;
					text-align: center;
					color: #428bca;">
                লগইন
            </div>

            <div class="mb30"></div>

            <form method="POST" action="">
                @csrf

                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="email" name="email" class="form-control" placeholder="Username">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div><!-- input-group -->
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div><!-- input-group -->


        </div><!-- panel-body -->
        <div class="panel-footer">
            <center>
                <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-log-in"></i> লগইন</button>
                <center>
        </div><!-- panel-footer -->
        </form>
    </div><!-- panel -->

</section>


<script src="{{asset('asset/backend/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('asset/backend/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('asset/backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('asset/backend/js/modernizr.min.js')}}"></script>
<script src="{{asset('asset/backend/js/pace.min.js')}}"></script>
<script src="{{asset('asset/backend/js/retina.min.js')}}"></script>
<script src="{{asset('asset/backend/js/jquery.cookies.js')}}"></script>

<script src="js/custom.js')}}"></script>

</body>
</html>

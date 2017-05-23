@include('layouts.head')
<script>
    $(document).ready(function() {
        $('#form-login').bootstrapValidator({
            message : 'This value is not valid',
            feedbackIcons : {
                valid : 'glyphicon glyphicon-ok',
                invalid : 'glyphicon glyphicon-remove',
                validating : 'glyphicon glyphicon-refresh'
            },
            fields : {
                email : {
                    validators : {
                        notEmpty : {
                            message : 'The username is required and can not be empty!'
                        }
                    }
                },
                password : {
                    validators : {
                        notEmpty : {
                            message : 'The password is required and can not be empty!'
                        }
                    }
                }
            }
        });
    });
</script>

<body class="hold-transition login-page">
<div style="">
    <div style="border: 1px solid #B9292D; margin-bottom: 10px;"></div>
    <div class="">
        <div class="container">
            <div class="col-sm-12 text-center">
            </div>
        </div>
    </div>
    <!-- Close hidden xs -->
</div>
<div class="login-box">
    <div class="login-logo">
        <img src="{{asset('images/hmfm/hmfm.png')}}" />
    </div>
    <div class="login-box-body">
        <h3 class="login-box-msg">Admin | Login</h3>
        <div class="clearfix"></div>
        <form id="form-login" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="form-group has-feedback {{ $errors->has('userName') ? ' has-error' : '' }}">
                <input type="text" class="form-control" placeholder="Username" name="userName" id="userName" value="{{ old('userName') }}" required>
                @if ($errors->has('userName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('userName') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control"  placeholder="Password" name="password" id="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-8" style="padding-top: 10px;"></div>
                <div class="col-sm-4" style="float: right">
                    <button type="submit" id="login" name="button" class="btn btn-primary btn-block btn-flat">Login</button>
                </div>
            </div>
        </form>
    </div>
    <div>
    <div class="clearfix"></div>
    </div>
    <img src="{{asset('/images/shadow.png')}}" style="width: 100%;" />
    <!-- /.login-box-body -->
    
</div>

<!-- /.login-box -->

</body>
</html>
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
        var docHeight = $(window).height();
        var footerHeight = $('#footer').height();
        var footerTop = $('#footer').position().top + footerHeight;
        if (footerTop < docHeight) {
            //$('#footer').css('margin-top', 20+ (docHeight - footerTop) + 'px');
            //$('#footer').css('margin-top', 100 + (docHeight - footerTop) + 'px');
        }
    });
</script>

<body class="hold-transition login-page" ng-app="viewDatabase">
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
        <img src="images/hmfm/hmfm.png" />
    </div>
    <div class="login-box-body">
        <h3 class="login-box-msg">Admin | Login</h3>
        <div class="clearfix"></div>
        <form id="form-login" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" placeholder="Email Address" name="email" id="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
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
    <img src="images/shadow.png" style="width: 100%;" />
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script src="js.mine/function.mine.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Signup</title>
        <!--Include Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!--Include Bootstrap-->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <style>

            body{
                background-image: url("<?php echo base_url(); ?>assets/images/body-bg.jpeg");
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }

            #login .container #login-row #login-column #login-box {
                margin-top: 60px;
                max-width: 600px;
                background-color: #f7f6f6;
            }

            #login .container #login-row #login-column #login-box #login-form {
                padding: 20px;
            }

            #response{
                color: red;
            }
        </style>
    </head>
    <body>
        <div class="login-wrap">
            <div id="login">
                <h3 class="text-center text-white pt-5">Signup</h3>
                <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-6">
                            <div id="login-box" class="col-md-12">
                                <!--HTML FORM-->
                                <form id="from_signup">
                                <div id="login-form" class="form">
                                    <h3 class="text-info">Signup</h3>
                                    <p id="response"></p>
                                    <div class="form-group">
                                        <label for="username" class="text-info">Username:</label><br>
                                        <input type="text" name="username" id="username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="fullname" class="text-info">Fullname:</label><br>
                                        <input type="text" name="fullname" id="fullname" class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="password1" class="text-info">Password:</label><br>
                                        <input type="text" name="password1" id="password1" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password2" class="text-info">Password Confirm:</label><br>
                                        <input type="text" name="password2" id="password2" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" id="btn_signup" name="submit" class="btn btn-info btn-md" value="submit">
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>

            $('#btn_signup').on('click', function (e) {
                
                e.preventDefault();
                
                var flag = 0;
                /*Checking the value of inputs*/
                var username = $('#username').val();
                var fullname = $('#fullname').val();
                var password1 = $('#password1').val();
                var password2 = $('#password2').val();
                /*Validating the values of inputs that it is neither null nor undefined.*/
                if (username == '' || username == undefined) {
                    $('#username').css('border', '1px solid red');
                    console.log('this');
                    flag = 1;
                }
                if (fullname == '' || fullname == undefined) {
                    $('#fullname').css('border', '1px solid red');
                    console.log('this');
                    flag = 1;
                }
                if (password1 == '' || password1 == undefined) {
                    $('#password1').css('border', '1px solid red');
                    console.log('this');
                    flag = 1;
                }
                if (password2 == '' || password2 == undefined) {
                    $('#password2').css('border', '1px solid red');
                    console.log('this');
                    flag = 1;
                }
                if (password1 != password2) {
                    $('#password1').css('border', '1px solid red');
                    $('#password2').css('border', '1px solid red');
                    console.log('this');
                    flag = 1;
                }
                /*if there is no error, go to flag==0 condition*/
                if (flag == 0) {
                    /*Ajax call*/
                    $.ajax({
                        url: "<?php echo base_url('LoginController/signupfun') ?>",
                        method: 'post',
                        data: $('#from_signup').serialize(),
                        success: function (result) {
                            /*result is the response from LoginController.php file under getLogin.php function*/
                            if (result == 1) {
                    console.log('this');
                                /*if response result is 1, it means it is successful.*/
                                $('#username').css('border', '1px solid green');
                                $('#fullname').css('border', '1px solid green');
                                $('#password1').css('border', '1px solid green');
                                $('#password2').css('border', '1px solid green');
                                setTimeout(function () {
                                    /*Redirect to login page after 1 sec*/
                                    window.location.href = '<?php echo base_url("LoginController/signup") ?>';
                                 
                                }, 500)
                            } else if (result == 2) {
                    console.log('this');
                                /*if response result is 2, it means, username is invalid.*/
                                $('#username').css('border', '1px solid red');
                                $('#response').html('Invalid Username');
                                console.log(result);

                            } else if (result == 3) {
                    console.log('this');
                                /*if response result is 3, it means, password is invalid.*/
                                $('#password1').css('border', '1px solid red');
                                alert('Invalid Password');
                            } else if (result == 4 || result == 5) {
                    console.log('this');
                                /*if response result is 4 or 5, it means, username & password are invalid.*/
                                $('#username').css('border', '1px solid red');
                                $('#password1').css('border', '1px solid red');

                                $('#response').html('Invalid Username & Passowrd');
                            } else if (result == 6) {
                                $('#response').html('Username exist');
                            }
                            
                            else {

                                console.log('this');
                                $('#response').html('Something went wrong');
                            }
                        }
                    });
                } else {
                    console.log('this');
                    $('#response').html('Something went wrong');
                }
            }); 
        </script>
    </body>
</html>
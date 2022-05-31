<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
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
                height: 320px;
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
                <h3 class="text-center text-white pt-5">Login</h3>
                <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-6">
                            <div id="login-box" class="col-md-12">
                                <!--HTML FORM-->
        <?php 
        $attribute = array('id' => 'login_form');
        echo form_open('', $attribute);
        ?>
                                <div id="login-form" class="form">
                                    <h3 class="text-info">Login</h3>
                                    <p id="response"></p>
                                    <div class="form-group">
                                        <label for="username" class="text-info">Username:</label><br>
                                        <input type="text" name="username" id="username" val="<?php if (isset($_COOKIE['username_cookie'])) {echo $_COOKIE['username_cookie'];} ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="text-info">Password:</label><br>
                                        <input type="text" name="password" id="password"  val="<?php if (isset($_COOKIE['password_cookie'])) {echo $_COOKIE['password_cookie'];} ?>" class="form-control" >
                                    </div>
                                    <div class="">
                                        <input name="rememberme" id="rememberme" type="checkbox"> Remember me
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="submit" class="btn btn-info btn-md" value="submit" id="btn_login">
                                    </div>
        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>

           
                $('#btn_login').on('click', function (e) {

                e.preventDefault();
                var remember = 0;
                var flag = 0;
                /*Checking the value of inputs*/
                var username = $('#username').val();
                var password = $('#password').val();
                /*Validating the values of inputs that it is neither null nor undefined.*/
                if (username == '' || username == undefined) {
                    $('#username').css('border', '1px solid red');
                    flag = 1;
                }
                if (password == '' || password == undefined) {
                    $('#password').css('border', '1px solid red');
                    flag = 1;
                }
                /*if there is no error, go to flag==0 condition*/
                if (flag == 0) {
                    /*Ajax call*/
                    $.ajax({
                        url: "<?php echo base_url('LoginController/getLogin') ?>",
                        method: 'POST',
                        data: $('#login_form').serialize(),
                        success: function (result) {
                            /*result is the response from LoginController.php file under getLogin.php function*/
                            if (result == 1) {
                                /*if response result is 1, it means it is successful.*/
                                $('#username').css('border', '1px solid green');
                                $('#password').css('border', '1px solid green');
                                $('#response').html('Valid User !');
                                $('#response').css('color','green');
                                setTimeout(function () {
                                    /*Redirect to login page after 1 sec*/
                                    window.location.href = '<?php echo base_url("") ?>';
                                    console.log($data);
                                }, 1000)
                            } else if (result == 2) {
                                /*if response result is 2, it means, username is invalid.*/
                                $('#username').css('border', '1px solid red');
                                $('#response').html('Invalid Username');

                            } else if (result == 3) {
                                /*if response result is 3, it means, password is invalid.*/
                                $('#password').css('border', '1px solid red');
                                alert('Invalid Password');
                            } else if (result == 4) {
                                /*if response result is 4 or 5, it means, username & password are invalid.*/
                                $('#username').css('border', '1px solid red');
                                $('#password').css('border', '1px solid red');

                                $('#response').html('Invalid Username & Passowrd');
                            }
                            else if (result == 5){
                                $('#username').css('border', '1px solid red');
                                $('#password').css('border', '1px solid red');

                                $('#response').html('aap jo dhundh rahe ho wahi hai');

                            }else {

                                $('#response').html('Something went wrong !');
                            }
                        }
                    });
                } else {
                    $('#response').html('Something went wrong');
                }
            });
        </script>
    </body>
</html>
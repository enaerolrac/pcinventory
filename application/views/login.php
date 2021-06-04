<?php defined("BASEPATH") or exit("No direct script access allowed"); ?>

<div class ="container-fluid">
    <div class="row">
        <div class="col-lg-4 mx-auto">
            <div class="row">
        <div class="col-lg-8 mx-auto">
        <img class="img-fluid" src="<?php echo site_url('assets/images/logo.png'); ?>" alt="">
        </div>
    </div>
            <div class = "col-lg-12">
                    <div class>
                        <form method="POST" class=""  action=<?php echo site_url('user/login');?> id="loginUser">
                            <div class = "form-group">
                                <label for = "Username">Username</label>
                                <input class = "form-control" type = "text" name="username" required>
                            </div>

                            <div class = "form-group">
                                <label for="Password">Password</label>
                                <input class="form-control" type="password" name="password" required>
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" class ="btn btn-success" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>


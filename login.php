<?php include 'inc/header.php';?>

<?php include "inc/nav.php";?>

 
<div class="container text-white">
    <div class="row">
      <div class="col-md-12 my-5">
        <div class="page_header text-center">
            <h2>Shop - Account</h2>
           
        </div>
      </div>


        <div class="col-md-12">
    <div class="row shop-login">
    <div class="col-md-6">
        <div class="box-content">
            <h3 class="heading text-center">I'm a Returning Customer</h3>
            <div class="clearfix space40"></div>
            <form class="logregform" action="loginProses.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Username or E-mail Address</label>
                            <input type="text" value="" class="form-control" name="email">
                        </div>
                    </div>
                </div>
                <div class="clearfix space20"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <!-- <a class="pull-right text-white" href="#">(Lost Password?)</a> -->
                            <label>Password</label>
                            <input type="text"  class="form-control" name="password">
                        </div>
                    </div>
                </div>
                <div class="clearfix space20"></div>
                <div class="row">
                    <!-- <div class="col-md-12">
                        <span class="remember-box checkbox">
                        <label for="rememberme">
                        <input type="checkbox" id="rememberme" name="rememberme">Remember Me
                        </label>
                        </span>
                    </div> -->
                    <div class="col-md-12">
                        <button type="submit" class="btn button btn-md pull-right" name="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box-content">
            <h3 class="heading text-center">Register An Account</h3>
            <div class="clearfix space40"></div>
            <form class="logregform" method="post" action="AccRegister.php">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>E-mail Address</label>
                            <input type="text" value="" class="form-control" name="email">
                        </div>
                    </div>
                </div>
                <div class="clearfix space20"></div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Password</label>
                            <input type="password" value="" class="form-control" name="password">
                        </div>
                        <!-- <div class="col-md-12">
                            <label>Re-enter Password</label>
                            <input type="password" value="" class="form-control">
                        </div> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="space20"></div>
                        <button type="submit" class="btn button btn-md pull-right" name="submit">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


                
        </div>
    </div>

   

   
</div>


<?php include "inc/footer.php";?>




 

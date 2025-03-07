<?php 
// require_once "../healper/healper.php";
// if(isset($_SESSION['errors'])){
// var_dump($_SESSION['errors']);
// exit;
// }
 ?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index-2.html">home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<section class="account">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="account-contents"
                    style="background: url('assets/img/about/about1.jpg'); background-size: cover;">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="account-thumb">
                                <h2>Login now</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique
                                    deleniti pariatur enim cumque eum</p>
                            </div>
                            
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="account-content">
                                <?php 
                                if(isset($_SESSION['errors']['general'])):
                                ?>
                                <div class="alert alert-danger"><?=$_SESSION['errors']['general']?></div>
                                <?php 
                                endif;
                                unset($_SESSION['errors']['general']);
                                ?>
                                <form action="../public/index.php?page=LogInController" method="post">
                                    <div class="single-acc-field">
                                    <?php 
                                if(isset($_SESSION['errors']['email'])):
                                ?>
                                <div class="alert alert-danger"><?=$_SESSION['errors']['email']?></div>
                                <?php 
                                endif;
                                unset($_SESSION['errors']['email']);
                                ?>
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" placeholder="Enter your Email">
                                    </div>
                                    <div class="single-acc-field">
                                    <?php 
                                if(isset($_SESSION['errors']['password'])):
                                ?>
                                <div class="alert alert-danger"><?=$_SESSION['errors']['password']?></div>
                                <?php 
                                endif;
                                unset($_SESSION['errors']['password']);
                                ?>
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password"
                                            placeholder="Enter your password">
                                    </div>
                                    <div class="single-acc-field boxes">
                                        <input type="checkbox" id="checkbox">
                                        <label name="checkbox" for="checkbox">Remember me</label>
                                    </div>
                                    <div class="single-acc-field">
                                        <button type="submit">Login Account</button>
                                    </div>
                                    <a href="../public/index.php?page=forget-password">Forget Password?</a>
                                    <a href="../public/index.php?page=register">Not Account Yet?</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
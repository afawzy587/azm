
<?php include('layouts/header.php'); ?>

<section class="section">
    <?php include('layouts/navbar.php'); ?>
    <!-- END nav -->
    <div class="container mt-5">
        <h2>Login</h2>
        <div class="login-page">
            <div class="form">
                <?php if(!empty($errors)){ foreach ($errors as $error){ echo '<span>'.$error.'</span>';}}?>
                <form class="login-form " action="<?php echo \App\Helpers\Helper::getBaseUrl().'/login\process'?>" method="post">
                    <h2>SIGN IN TO YOUR ACCOUNT</h2>
                    <input type="text" oninput="return nameValid()"  placeholder="Username" name="username" value="user" id="user" autocomplete="off" required />
                    <span id="vaild-user"></span>
                    <input oninput="return passValid()" type="password" name="password" required placeholder="Password" value="p@ss1234" id="pass" autocomplete="off" />
                    <img src="https://cdn2.iconfinder.com/data/icons/basic-ui-interface-v-2/32/hide-512.png"
                         onclick="show()" id="showimg">
                    <span id="vaild-pass"></span>
                    <button type="submit">SIGN IN</button>
                </form>
            </div>
        </div>
    </div>
</section>


<script>
    function nameValid() {
        var Username = document.getElementById("user").value;

        if (Username.length < 4) {
            document.getElementById("vaild-user").innerHTML = "Minimum 5 characters";
            return false;
        } else if (!/^[a-zA-Z0-9]+$/.test(Username)) {
            document.getElementById("vaild-user").innerHTML = 'Username can only contain letters and numbers';
        } else {
            document.getElementById("vaild-user").innerHTML = "";
        }
    }
    function passValid() {
        var vaildpass = document.getElementById("pass").value;
        if (vaildpass.length < 8 ) {
            document.getElementById("vaild-pass").innerHTML = "Minimum 8 characters";
            return false;
        } else {
            document.getElementById("vaild-pass").innerHTML = "";
        }


    }

    function show() {
        var x = document.getElementById("pass");
        if (x.type === "password") {
            x.type = "text";
            document.getElementById("showimg").src =
                "https://static.thenounproject.com/png/777494-200.png";
        } else {
            x.type = "password";
            document.getElementById("showimg").src =
                "https://cdn2.iconfinder.com/data/icons/basic-ui-interface-v-2/32/hide-512.png";
        }
    }
</script>
<?php include('layouts/footer.php'); ?>


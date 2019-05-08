<body class="loginpage">
<div class="loginpanel">
    <div class="loginpanelinner" style="background:#09f;padding:20px 50px;box-shadow:0px 0px 900px #000;border:solid 1px #ccc;">
        <div class="logo animate0 bounceIn" style="color: #fff;font-size:20px;">Inventaris Application Login</div>
        <?=form_open('action/login')?>
            <div style="<?=$error;?>">
                <div class="alert alert-error">Invalid Employee Code or Password
                <?php echo anchor('home', 'x', "style='float:right;'") ?>
                </div>
            </div>
            <div class="inputwrapper animate1 bounceIn">
                <input type="text" name="employee_code" id="employee_code" placeholder="Employee Code" />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="password" id="password" placeholder="Password" />
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button name="submit">Sign In</button>
            </div>
            <div class="inputwrapper animate4 bounceIn">
                <label><input type="checkbox" class="remember" name="signin" /> Keep me sign in</label>
            </div>
        <?=form_close()?>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

<div class="loginfooter">
    <p>&copy; 2014. Noric and Kreuzhev Application Development. All Rights Reserved.</p>
</div>
</body>
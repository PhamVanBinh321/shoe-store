

<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="../images/image1.png" width="100%">
            </div>
            <div class="col-2">
            <?php if (isset($_SESSION['user_id'])): // Kiểm tra xem người dùng đã đăng nhập chưa ?>
                        <h2>Hãy quay lại sớm nhé! Chúng tớ sẽ luôn luôn đợi cậu</h2>
                        <form   method="POST">
                            
                            <button type="submit" name="logout" class="btn">Đăng xuất</button>
                        
                        </form>
                        <?php else: // Nếu chưa đăng nhập ?>
                <div class="form-container">
                    

                   
                        <div class="form-btn">
                            <span onclick="login()">Đăng nhập</span>
                            <span onclick="register()">Đăng ký</span>
                            <hr id="Indicator">
                        </div>
                        <form id="LoginForm" method="POST"  >
                        <div id="alertt" class="success-alert" ></div>
                            <input type="text" name="username" placeholder="Tài khoản" required>
                            <input type="password" name="password" placeholder="Mật khẩu" required>
                            <button type="submit" name="login" class="btn">Đăng nhập</button>
                            <a href="index.php?act=loadforgotpass">Quên mật khẩu</a>
                        </form>

                        <form id="RegForm" method="POST">
                        <div id="alert" class="success-alert" ></div>
                            <input type="text" name="username" placeholder="Tài khoản" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="password" name="password" placeholder="Mật khẩu" required>
                            <button type="submit" name="register" class="btn">Đăng ký</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


    <script>
       

        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");

        function register() {
            RegForm.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            Indicator.style.transform = "translateX(100px)";
        }

        function login() {
            RegForm.style.transform = "translateX(300px)";
            LoginForm.style.transform = "translateX(300px)";
            Indicator.style.transform = "translateX(0px)";
        }
        
    </script>
    



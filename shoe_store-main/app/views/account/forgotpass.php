

<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="../images/image1.png" width="100%">
            </div>
            <div class="col-2">
                <div class="form-container">
                    <div class="form-btn">
                        <span style="width: 200px;">Quên mật khẩu</span>
                        <hr id="Indicatorfp">
                    </div>
                    
                    <!-- Forgot Password Form -->
                    <form id="RegForm" method="POST" action="index.php?act=forgotpass">
                        <div id="alertttt" class="success-alert" style="display: none;"></div>
                        <input type="text" name="username" placeholder="Tài khoản" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <button type="submit" name="reset_password" class="btn">Gửi yêu cầu đặt lại mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Show success alert for 3 seconds
    function showAlert(message) {
        const alertDiv = document.getElementById("alertttt");
        alertDiv.innerText = message;
        alertDiv.style.display = "block";
        setTimeout(() => {
            alertDiv.style.display = "none";
        }, 3000);
    }
</script>


    



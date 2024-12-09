    
        <!----------------------------------footer------------------------------------->
        <div class ="footer">
        <div class="container">
            
            <div class="row">
                <div class="footer-col-1">
                    <h3>Tải ứng dụng của chúng tôi</h3>
                    <p>Thích hợp trên cả IOS và Android</p>
                    <div class="app-logo">
                        <img src="../images/play-store.png" alt="">
                        <img src="../images/app-store.png" alt="">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="../images/logo-white.jpg">
                    <p>Khách hàng là thượng đế, chúng tôi cam kết đem đến khách hàng trải nghiệm tốt nhất</p>
                </div>
                <div class="footer-col-3">
                    <h3>Địa chỉ:</h3>
                   <ul>
                       <li>02 Võ Oanh, Phường 25, Bình Thạnh, Hồ Chí Minh, Việt Nam </li>
                       
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Theo dõi chúng tôi trên</h3>
                   <ul>
                       <li>Facebook</li>
                       <li>Twitter</li>
                       <li>Instagram</li>
                       <li>Youtube</li>
                    </ul>
                </div>
                
            </div>
            
            <hr><!--horizontal line-->
            <p class="copyright">Copyright 2024 - abcd</p>
            
        </div>
    </div>
        
        
        <!-----------------------------------js for toggle menu----------------------------------------------->
        <script>
            var menuItems=document.getElementById("MenuItems");
            
            MenuItems.style.maxHeight="0px";
            function menutoggle(){
                if(MenuItems.style.maxHeight == "0px"){
                    MenuItems.style.maxHeight="200px";
                }
                else{
                    MenuItems.style.maxHeight="0px";
                }
            }
        </script>
    </body>
</html>
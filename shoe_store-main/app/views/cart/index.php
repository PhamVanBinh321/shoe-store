<div class="small-container cart-page">
    <h1  style="font-family: Arial, sans-serif;">Giỏ hàng của bạn:</h1>

    <table>
        <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        <?php 
        $total = 0;
        if (!empty($cartItems)) { // Check if $cart has items
            foreach ($cartItems as $item) {
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
        ?>
        <tr>
            <td>
                <div class="cart-info">
                <img src="<?php echo htmlspecialchars($item['image']); ?>" 
                alt="<?php echo htmlspecialchars($item['name']); ?>" width="50">

                    <div>
                        <p><?php echo htmlspecialchars($item['name']); ?></p>
                        <small>Price: $<?php echo number_format($item['price'], 2); ?></small><br>
                        <small>Size: <?php echo $item['size']; ?></small><br>
                        <a href="index.php?act=deleteitemintcart&product_id=<?php echo $item['product_id']; ?>&size=<?php echo $item['size']; ?>">Xóa khỏi giỏ hàng</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="<?php echo $item['quantity']; ?>" min="1" readonly></td>
            <td>$<?php echo number_format($subtotal, 2); ?></td>
        </tr>
        <?php } 
        } else { ?>
            <tr>
                <td colspan="3" style="text-align: center;">Giỏ hàng của bạn trống</td>
            </tr>
        <?php } ?>
    </table>

    <?php if (!empty($cartItems)) { ?>
    <div class="total-price">
        <table>
            <tr>
                <td>Tổng cộng</td>
                <td>$<?php echo number_format($total, 2); ?></td>
            </tr>
            <tr>
                <td>Thuế</td>
                <td>$<?php echo number_format($total * 0.1, 2); ?></td>
            </tr>
            <tr>
                <td>Sau cùng</td>
                <td>$<?php echo number_format($total * 1.1, 2); ?></td>
            </tr>
        </table>
    </div>
    <a href="index.php?act=confirmOrder" class="btn">Đặt hàng</a>
    <?php } ?>
</div>

<div class="small-container order-page">
    <h1>Đơn hàng của bạn:</h1>
    
    <?php if (!empty($orders)) { ?>
        <?php foreach ($orders as $order) { ?>
            <div class="order-summary">
                <h3>Đơn #<?php echo $order['id']; ?></h3>
                <p>Trạng thái: <?php echo ucfirst($order['status']); ?></p>
                <p>Tổng cộng: $<?php echo number_format($order['total_price'], 2); ?></p>
                <p>Ngày đặt hàng: <?php echo date("d/m/Y - H:i", strtotime($order['created_at'])); ?></p>

                <h4>Các món hàng:</h4>
                <table>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Size</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php foreach ($order['items'] as $item) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo $item['size']; ?></td>
                            <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <hr>
        <?php } ?>
    <?php } else { ?>
        <p>Bạn chưa có đơn nào cả.</p>
    <?php } ?>
</div>


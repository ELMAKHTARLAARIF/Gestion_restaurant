<h2>Order Confirmation</h2>

<p>Hello {{ $order->customer->name }},</p>

<p>Your order has been successfully placed </p>

<p><strong>Order ID:</strong> {{ $order->id }}</p>
<p><strong>Total:</strong> {{ $order->Total_Price }} MAD</p>
<p><strong>Status:</strong> {{ $order->status }}</p>

<p>Thank you for your order!</p>
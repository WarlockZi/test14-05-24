<?php $orders = json_decode($orders);?>
<?php foreach ($orders as $order): ?>
<div class="row">

    <?= $order->first_name ?>
    <?= $order->second_name ?>
    <?= $order->title ?>
    <?= $order->price ?>
</div>
<?php endforeach; ?>

<h1 class="mb-4">Dashboard</h1>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Customers</h5>
                <p class="card-text"><?php echo count($customers); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Orders</h5>
                <p class="card-text"><?php echo count($orders); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Inventory</h5>
                <p class="card-text"><?php echo array_sum(array_column($inventory, 'quantity')); ?></p>
            </div>
        </div>
    </div>
</div>


<h1 class="mb-4">Inventory</h1>
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addInventoryModal">
    Add Inventory
</button>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Jar Type</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($inventory as $item): ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['jar_type']; ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td>
                <button class="btn btn-sm btn-info">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Add Inventory Modal -->
<div class="modal fade" id="addInventoryModal" tabindex="-1" aria-labelledby="addInventoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInventoryModalLabel">Add Inventory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="index.php?page=inventory&action=create" method="POST">
                    <div class="mb-3">
                        <label for="jar_type" class="form-label">Jar Type</label>
                        <input type="text" class="form-control" id="jar_type" name="jar_type" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required min="0">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required step="0.01">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Inventory</button>
                </form>
            </div>
        </div>
    </div>
</div>


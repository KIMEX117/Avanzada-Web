<!-- Modal: "AÑADIR" -->
<div class="modal fade" id="añadirModal" tabindex="-1" aria-labelledby="añadirModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="añadirModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data" method="post" action="../app/ProductsController.php">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                        <input id="name" type="text" name="name" class="form-control" placeholder="Product name">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Slug</span>
                        <input id="slug" type="text" name="slug" class="form-control" placeholder="Product slug">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Description</span>
                        <input id="description" type="text" name="description" class="form-control" placeholder="Product description">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Features</span>
                        <input id="features" type="text" name="features" class="form-control" placeholder="Product features">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Brand_id</span>
                        <select name="brand_id" id="brand_id" class="form-select">
                            <option value="" selected disabled>Seleccione una opción de la lista</option>
                            <?php foreach($brands as $item): ?>      
                                <option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option> 
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Cover</span>
                        <input type="file" name="cover" class="form-control" placeholder="* * * * *" accept="image/*">
                    </div>
                </div>
                <input id="ocultoInput" type="hidden" name="action" value="">
                <input type="hidden" id="id" name="id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: "EDITAR" -->
<!-- <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php for ($i=0; $i < 6; $i++): ?> 
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="* * * * *" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                <?php endfor; ?> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->
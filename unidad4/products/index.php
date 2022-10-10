<?php
    include '../app/ProductsController.php';
    include '../app/BrandsController.php';

    $producto = new ProductsController();
    $brand = new BrandsController();

    $productos = $producto -> getProducts();
    $brands = $brand -> getBrands();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../layouts/head.template.php" ?>
</head>
<body>
    <!-- NAVBAR -->
    <?php include "../layouts/nav.template.php" ?>

    <!-- CONTAINER -->
    <div class="container-fluid">

        <div class="row">
            <!-- SIDEBAR -->
            <?php include "../layouts/sidebar.template.php" ?>

            <!-- CONTENT -->
            <div class="col-lg-10 col-sm-12 bg-white">

                <!-- BREAD -->
                <div class="border-bottom">
                    <div class="row m-2">
                        <div class="col">
                            <h4>Productos</h4>
                        </div>
                        <div class="col">
                            <button onclick="addProduct()" data-product='<?=json_encode($productos);?>' class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#añadirModal">Añadir producto</button>
                        </div>
                    </div>
                </div>

                <!-- CARD -->
                <div class="row">
                    <?php foreach ($productos as $item): ?> 
                        <div class="col-sm-6 col-xl-4 col-xxl-3 p-2">
                            <div class="card mb-1 ">
                                <img src="<?php echo $item->cover ?>" class="card-img-top text-center" alt="No hay imagen disponible">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?php echo $item->name ?></h5>
                                    <h6 class="card-subtitle text-center"><i><?php if(isset($item->brand->name)) echo $item->brand->name; else echo "No hay brand"; ?></i></h6>
                                    <p class="card-text" style="text-align: justify;"><?php echo $item->description ?></p>
                                    <div class="row">
                                        <a data-product='<?php echo json_encode($item)?>' onclick="editProduct(this)" class="btn btn-warning col-6" data-bs-toggle="modal" data-bs-target="#añadirModal">Editar</a>
                                        <a class="btn btn-danger col-6" onclick="remove(<?php echo $item->id ?>)">Eliminar</a>
                                        <a href='<?= BASE_PATH."stock/".$item->slug ?>' class="btn btn-info col-12">Detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
            </div>
        </div>
    </div>

    <?php include "../layouts/modals.template.php" ?>

    <?php include "../layouts/scripts.template.php" ?>
    
</body>
</html>
<?php
    include '../app/ProductsController.php';

    $producto = new ProductsController();
    $productoDetalle = $producto -> getProductBySlug($_GET['slug']);
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
                            <button class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#añadirModal">Añadir producto</button>
                        </div>
                    </div>
                </div>

                <!-- CARD -->
                <div class="col-sm-6 col-xl-4 col-xxl-3 p-2">
                     <div class="card mb-1 ">
                        <img src="<?php echo $productoDetalle->cover ?>" class="card-img-top text-center" alt="No hay imagen disponible">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $productoDetalle->name ?></h5>
                            <h6 class="card-subtitle text-center"><b>Slug: </b><i><?php echo $productoDetalle->slug; ?></i></h6>
                            <h6 class="card-subtitle text-center"><b>Brand: </b><i><?php if(isset($productoDetalle->brand->name)) echo $productoDetalle->brand->name; else echo "No hay brand"; ?></i></h6>
                            <p class="card-text" style="text-align: justify;"><?php echo $productoDetalle->description ?></p>
                            <h6 class="card-subtitle text-center"><b>Categorías:</b></h6>
                            <ul>
                                <?php if(isset($productoDetalle->categories[0])) foreach($productoDetalle->categories as $item): ?>
                                <li>ID #<?php echo $item->id ?> - <?php echo $item->name ?></li>
                                <?php endforeach; else echo "<li>No hay categorías</li>";?>
                            </ul>
                            <h6 class="card-subtitle text-center"><b>Tags:</b></h6>
                            <ul>
                                <?php if(isset($productoDetalle->tags[0])) foreach($productoDetalle->tags as $item): ?>
                                <li>ID #<?php echo $item->id ?> - <?php echo $item->name ?></li>
                                <?php endforeach; else echo "<li>No hay tags</li>"; ?>
                            </ul>
                            <div class="row">
                                <a class="btn btn-warning col-6" data-bs-toggle="modal" data-bs-target="#editarModal">Editar</a>
                                <a href="#" class="btn btn-danger col-6" onclick="remove(this)">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "../layouts/modals.template.php" ?>

    <?php include "../layouts/scripts.template.php" ?>

</body>
</html>
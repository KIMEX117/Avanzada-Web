<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function remove (id) {
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
            });

            var bodyFormData = new FormData();
            bodyFormData.append('id', id);
            bodyFormData.append('action', 'delete');
            bodyFormData.append('global_token', '<?= $_SESSION['global_token'] ?>');

            axios.post('<?= BASE_PATH ?>stock/check', bodyFormData)
            .then(function (response) {
                console.log(response);

                location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });

        } else {
            swal("Your imaginary file is safe!");
        }
        });
    }

    function addProduct() {
        document.getElementById("ocultoInput").value = "create";
    }

    function editProduct(target) {
        document.getElementById("ocultoInput").value = "update";
        let product = JSON.parse(target.getAttribute('data-product'));
        console.log(product);

        document.getElementById("name").value = product.name;
        document.getElementById("slug").value = product.slug;
        document.getElementById("description").value = product.description;
        document.getElementById("features").value = product.features;
        document.getElementById("brand_id").value = product.brand_id;
        document.getElementById("id").value = product.id;
        
    }

</script>
<?php

//session_start();
include_once "config.php";

if (isset($_POST['action'])) {
    if (isset($_POST['global_token']) && ($_POST['global_token'] == $_SESSION['global_token'])) {
        switch ($_POST['action']) {
            case 'create':
                $name = strip_tags($_POST['name']);
                $slug = strip_tags($_POST['slug']);
                $description = strip_tags($_POST['description']);
                $features = strip_tags($_POST['features']);
                $brand_id = strip_tags($_POST['brand_id']);

                if(isset($_FILES['cover']) && $_FILES["cover"]["error"] == 0) {
                    $cover = $_FILES["cover"]["tmp_name"];

                    $productController = new ProductsController();
                    $productController -> createProduct($name, $slug, $description, $features, $brand_id, $cover);
                }else{
                    header ("Location:".BASE_PATH."/products?errorImage=true");
                }
            break;

            case 'update':
                $name = strip_tags($_POST['name']);
                $slug = strip_tags($_POST['slug']);
                $description = strip_tags($_POST['description']);
                $features = strip_tags($_POST['features']);
                $brand_id = strip_tags($_POST['brand_id']);
                $id = strip_tags($_POST['id']);

                $productController = new ProductsController();
                $productController -> updateProduct($name, $slug, $description, $features, $brand_id, $id);
            break;

            case 'delete':
                $id = strip_tags($_POST['id']);

                $productController = new ProductsController();
                $productController -> deleteProduct($id);
            break;
            
        }
    }
    
}

class ProductsController {

    //GET PRODUCTS (OBTENER TODOS LOS PRODUCTOS DE LA API)
    public function getProducts(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
            //'Cookie: XSRF-TOKEN=eyJpdiI6ImJBaUMvNExtS0J0aG9vRlV0NVBsQ0E9PSIsInZhbHVlIjoiYmt1SndyYmpQVFRQd2wzYXJ0cHFKRVlKc29ndklTVXB1WHh3VHd4M2IxcW56dVZPTERzWDFqK2JPWFdVN3FTVHM1ZHpUSHhxRFRwT01zaExzUWErYWdiaGR2VnI2aFBlMXBKY2lLOG9YWFNSUUJZYUx6K3lzcjNGOWdSZkt2bHkiLCJtYWMiOiIyZDUwNGQ4ZWU0MGM0NThkOTI0MDVhZTE3NmQwNWRhMDM1ZjEyNDQ4YWE3MjBhZDBmZmJkNDg0NzQwYTBlZWEyIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImwySVp6SUVGVUJJSk9tWWdQUm10RGc9PSIsInZhbHVlIjoiM0x2QkJMRWVqQis2Q1oycjNlb3EzRUZ5R0VPMC9sbFkwU3pCUzJNK1pGd3JORUt5NnpVY09qbXRtb201TWRkVm5RYkE5T3Y1MmxCRzVNVWF0RldtV3psNVgwRFArdlBwSTVsNThlZEdpa244VTN5bFliZnB4ODVQTy9MUDZrVzIiLCJtYWMiOiI5MWJkOGY0NDBkMjU2NWE5YzQ0NzlmOWRmZGYzYWNiZDY5YWVlZmVlNmRkYTJmYWE1MjliODIwNmMxNzIyMTU5IiwidGFnIjoiIn0%3D'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;

        $response = json_decode($response);

        if( isset($response->code) &&  $response->code > 0) {
            return $response -> data;
        } else {
            return array();
        }
    }

    //CREATE PRODUCT (CREAR UN NUEVO PRODUCTO)
    public function createProduct($name, $slug, $description, $features, $brand_id, $cover) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('name' => $name,'slug' => $slug,'description' => $description,'features' => $features,'brand_id' => $brand_id, 'cover'=> new CURLFILE($cover)),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;


        $response = json_decode($response);

        if( isset($response->code) &&  $response->code > 0) {
            header ("Location:".BASE_PATH."/products?success=true");
        } else {
            header ("Location:".BASE_PATH."/products?error=true");
        }
    }

    //GET PRODUCT BY SLUG (TEXTO PROVENIENTE DE LA URL QUE USA GUIONES)
    public function getProductBySlug($slug) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/'.$slug,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'],
            //'Cookie: XSRF-TOKEN=eyJpdiI6Ik82K1pFcHpmTDdMaXF2cmVVcktEc3c9PSIsInZhbHVlIjoiek9LemJjcmhOY3dzYkgrRkZnYURRN1pYYkxRb3laajdnYk1rVk1kQ2VYTnVBOEhMdTRKY1NpMlA0RVBJNW16MEorOGkwNEZmMUV6eGZMTFlKMm9STWV0UWY4ZVUzMGw2N0lPcTg5UC9CUzUwYUgwTEI4Vm5zdHhqKzJtTy9rd1MiLCJtYWMiOiI0YWI2YmIzMTc0NmZlNWU2MzdmM2UwMGIyMjU1ZWEwMDQ5ODIyODQ4MDUwOTcwNjVmYmZlMDgwYWY0ZWM5MTljIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6ImdaR3hXQmpwNFJpa2VRdGZteEtSaVE9PSIsInZhbHVlIjoiT292NmhQZjR4RHlwNkpMYXpRYys3VWxSRlJQSmxCQXdmUm1GRkhTU250K1c1UHdHbkhUaXhuLyt2VDYrcHNYTmRNZlJSVXBwWkhManFFQ243VWJNU1ZXZ05uek0zNWx6SFBRM3AvaGJrMGE4V09DRFdrUVRwelNmNzNPenRHYmYiLCJtYWMiOiJjMWEwNzEzMDMyNTQ2OTM1ODcxZGIxMjcyYjM5MGM1MmE2NDhiMjc1NzdkMjhmYWQzZjRjNjNhMGM0NGQxYjg0IiwidGFnIjoiIn0%3D'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;

        $response = json_decode($response);

        if( isset($response->code) &&  $response->code > 0) {
            return $response -> data;
        } else {
            header ("Location:".BASE_PATH."/products?error=true");
        }

    }

    //UPDATE PRODUCT (ACTUALIZAR LOS DATOS DE UN PRODUCTO)
    public function updateProduct($name, $slug, $description, $features, $brand_id, $id){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 'name='.$name.'&slug='.$slug.'&description='.$description.'&features='.$features.'&brand_id='.$brand_id.'&id='.$id,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'],
            'Content-Type: application/x-www-form-urlencoded'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;

        $response = json_decode($response);

        if( isset($response->code) &&  $response->code > 0) {
            header ("Location:".BASE_PATH."/products?success=true");
        } else {
            header ("Location:".BASE_PATH."/products?error=true");
        }

    }


    //DELETE PRODUCT (ELIMINAR UN PRODUCTO POR ID)
    public function deleteProduct($id) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;

        $response = json_decode($response);

        if( isset($response->code) &&  $response->code > 0) {
            return true;
        } else {
            return false;
        }

    }

}



?>
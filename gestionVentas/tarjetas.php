<?php

function component($productname, $productprice, $productimg, $productid){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"menuProd.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>
                            <p class=\"card-text\">
                                
                            </p>
                            <h5>
                                <small><s class=\"text-secondary\"></s></small>
                                <span class=\"price\">Bs. $productprice</span>
                            </h5>

                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Añadir al carrito <i class=\"fas fa-shopping-cart\" style=\"color: black\"></i></button>
                             <input type='hidden' name='id_prod' value='$productid'>

                        
                             <a href=\"prodIndvl.php?id_prod=$productid\" class=\"btn btn-dark my-3\">Detalles</a>

                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}


function cartElement($productimg, $productname, $productprice, $productid, $quantity){
    // Verificar si $quantity es numérico, de lo contrario establecer a 1
    // Obtener la cantidad actual del producto en el carrito
$currentQuantity = 1;
if (isset($_SESSION['cart'][$productid]['quantity'])) {
    $currentQuantity = $_SESSION['cart'][$productid]['quantity'];
}


    $element = "
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
        <div class=\"border rounded\">
            <div class=\"row bg-white\">
                <div class=\"col-md-3 pl-0\">
                    <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                </div>
                <div class=\"col-md-6\">
                    <h5 class=\"pt-2\">$productname</h5>
                    <small class=\"text-secondary\"></small>
                    <h5 class=\"pt-2\">Bs. $productprice</h5>
                    <button type=\"submit\" class=\"btn btn-warning\" name=\"guardar\">Guardar</button>
                    <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Quitar</button>
                </div>
                <div class=\"col-md-3 py-5\">
                    <div>
                        <button type=\"button\" class=\"btn bg-light border rounded-circle decrement-btn\" name=\"minus\" data-productid=\"$productid\"><i class=\"fas fa-minus\"></i></button>
                        <input type=\"text\" value=\"" . intval($currentQuantity) . "\" class=\"form-control w-25 d-inline quantity-input\" id=\"quantity-$productid\" name=\"quantity\" readonly>
                        <button type=\"button\" class=\"btn bg-light border rounded-circle increment-btn\" name=\"plus\" data-productid=\"$productid\"><i class=\"fas fa-plus\"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>"; 
    echo $element;
}











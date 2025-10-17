<?php

header('Access-Control-Allow-Origin: *');
//Creamos productos y añadimos img y categoria.
$productos = [
    [
        "id" => 1,
        "nombre" => "Camiseta básica",
        "descripcion" => "Camiseta de algodón 100% en varios colores.",
        "precio" => 12.99,
        "img" => "https://www.tien21.es/blog/wp-content/uploads/2021/08/ropa-color.jpg",
        "categoria" => "Ropa"
    ],
    [
        "id" => 2,
        "nombre" => "Pantalón vaquero",
        "descripcion" => "Pantalón de mezclilla azul clásico.",
        "precio" => 29.95,
        "img" => "https://lavalux.es/wp-content/uploads/2023/01/cuidados-pantalon-vaquero.jpg",
        "categoria" => "Ropa"
    ],
    [
        "id" => 3,
        "nombre" => "Zapatillas deportivas",
        "descripcion" => "Zapatillas ligeras y cómodas para el día a día.",
        "precio" => 45.50,
        "img" => "https://m.media-amazon.com/images/I/713W7vaP2iL._UY900_.jpg",
        "categoria" => "Calzado"
    ],
    [

        "id" => 4,
        "nombre" => "Reloj de pulsera",
        "descripcion" => "Reloj analógico.",
        "precio" => 89.99,
        "img" => "https://storage.googleapis.com/catalog-pictures-carrefour-es/catalog/pictures/hd_510x_/4549526285165_1.jpg",
        "categoria" => "Accesorios"
    ],
    [
        "id" => 5,
        "nombre" => "Mochila urbana",
        "descripcion" => "Mochila resistente.",
        "precio" => 39.90,
        "img" => "https://cdn.palbincdn.com/users/9531/images/Mochila-urban-groove-city-yellow-amarillo-1437791924-1-1697047943.jpg",
        "categoria" => "Accesorios"
    ],
    [
        "id" => 6,
        "nombre" => "Gafas de sol",
        "descripcion" => "Gafas con protección UV400.",
        "precio" => 19.99,
        "img" => "https://opticaval.es/wp-content/uploads/2023/03/190605349090.jpg",
        "categoria" => "Accesorios"
    ],
    [
        "id" => 7,
        "nombre" => "Chaqueta impermeable",
        "descripcion" => "Chaqueta ligera y resistente al agua.",
        "precio" => 59.95,
        "img" => "https://images.napali.app/global/quiksilver-products/all/default/xlarge/eqyjk03713_quiksilver,w_cre0_frt1.jpg",
        "categoria" => "Ropa"
    ],
    [
        "id" => 8,
        "nombre" => "Botas de montaña",
        "descripcion" => "Botas resistentes para senderismo.",
        "precio" => 75.00,
        "img" => "https://peralimonerashop.com/32044-large_default/paredes-botas-trekking-camel.jpg",
        "categoria" => "Calzado"
    ],
    [
        "id" => 9,
        "nombre" => "Cinturón de cuero",
        "descripcion" => "Cinturón ajustable de cuero genuino.",
        "precio" => 25.00,
        "img" => "https://storage.googleapis.com/catalog-pictures-carrefour-es/catalog/pictures/hd_510x_/8435583560993_1.jpg",
        "categoria" => "Accesorios"
    ]
];

if (isset($_GET['id'])) {
    header('Content-Type: application/json');
    $id = intval($_GET['id']);
    foreach ($productos as $p) {
        if ($p['id'] === $id) {
            echo json_encode($p);
            exit;
        }
    }
    echo json_encode(["error" => "Producto no encontrado"]);
 }else if (isset($_GET['modo']) && $_GET['modo'] === 'texto') {
    header('Content-Type: text/html; charset=UTF-8');
    mostrarProductosJSON($productos);
} //Pista debes detectar el max con  el get para el ejercicio--> Ejercicio 4: Filtrado de productos por GET, http://localhost/ra1clienteservidorexmamen/servidor/api.php?max=5
else if (isset($_GET['max'])) {
    header('Content-Type: application/json');
    $max = intval($_GET['max']);
    $productosFiltrados = array_filter($productos, fn($p) => $p['precio'] <= $max);
    echo json_encode($productosFiltrados);
}
else {
    echo json_encode($productos);
}


///Función que muestra por pantalla un listado de productos.
//http://localhost/ra1clienteservidorexmamen/servidor/api.php?modo=texto
function mostrarProductosJSON($productos) {
    echo "--- Lista de productos ---<br>";
    $json = json_encode($productos);
    $array = json_decode($json, true);
    //Crear un foreach para recorrerlo  y pintar por pantalla, el id, nombre y precio del producto
    foreach ($array as $producto) {
        echo "ID: " . $producto['id'] . "<br>";
        echo "Nombre: " . $producto['nombre'] . "<br>";
        echo "Precio: $" . $producto['precio'] . "<br>";
        echo "<hr>";
    }
}

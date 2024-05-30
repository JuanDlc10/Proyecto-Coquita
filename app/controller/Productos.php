<?php

namespace controller;

use config\Config;
use config\View;
use model\TablaProductos;
class Productos extends View
{
    public function index()
    {
        $config = new Config();
        $config -> verificar_sesion(); 
        $consulta = new TablaProductos();
        $datos = $consulta->consulta()->all();
        return parent::vista('Productos/productos', $datos);
    }
    public function agregar_vista()
    {
        $config = new Config();
        $config->verificar_sesion(); 
        return parent::vista('Productos/agregar');
    }
    public function editar_vista($id)
    {
        $config = new Config();
        $config->verificar_sesion(); 
        $consulta = new TablaProductos;
        $datos = $consulta->consulta()->where('id_producto', $id)->first();
        return parent::vista('Productos/editar', $datos);
    }
    public function agregar()
    {
        $config = new Config();
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST['nombre'];
                $marca = $_POST['marca'];
                $precio = $_POST['precio'];
                $cantidad = $_POST['cantidad'];

                if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                    $imagenTmp = $_FILES['imagen']['tmp_name'];
                    $imagenNombre = basename($_FILES['imagen']['name']);

                    $rutaBase = '/srv/http/proyecto.local/public/img/productos/';
                    $imagenDestino = $rutaBase . $imagenNombre;

                    if (!file_exists($rutaBase)) {
                        echo json_encode(["error" => "La ruta base no existe: $rutaBase"]);
                        return;
                    }

                    if (move_uploaded_file($imagenTmp, $imagenDestino)) {
                        $producto = new TablaProductos();
                        $datos = $producto->insercion([
                            'nombre' => $nombre,
                            'marca' => $marca,
                            'precio' => $precio,
                            'cantidad' => $cantidad,
                            'imagen' => $imagenNombre
                        ]);

                        if ($datos) {
                            $config->redirigir('inicio');
                        } else {
                            echo json_encode(["error" => "Error al insertar el producto en la base de datos"]);
                        }
                    } else {
                        echo json_encode(["error" => "Error al mover la imagen a la carpeta de destino"]);
                    }
                } else {
                    echo json_encode(["error" => "Error al subir la imagen"]);
                }
            } else {
                echo json_encode(["error" => "La solicitud debe ser de tipo POST"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    public function actualizar()
    {
        $config = new Config();
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $marca = $_POST['marca'];
                $precio = $_POST['precio'];
                $cantidad = $_POST['cantidad'];
                $imagenOld = $_POST['imagenOld'];

                $imagenFinal = $imagenOld;

                if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                    $imagenTmp = $_FILES['imagen']['tmp_name'];
                    $imagenNombre = basename($_FILES['imagen']['name']);

                    $rutaBase = '/srv/http/proyecto.local/public/img/productos/';
                    $imagenDestino = $rutaBase . $imagenNombre;

                    if (!file_exists($rutaBase)) {
                        echo json_encode(["error" => "La ruta base no existe: $rutaBase"]);
                        return;
                    }

                    if (move_uploaded_file($imagenTmp, $imagenDestino)) {

                        $imagenAntigua = $rutaBase . $imagenOld;
                        if (file_exists($imagenAntigua)) {
                            unlink($imagenAntigua);
                        }
                        $imagenFinal = $imagenNombre;
                    } else {
                        echo json_encode(["error" => "Error al mover la imagen a la carpeta de destino"]);
                        return;
                    }
                }

                $producto = new TablaProductos();
                $datos = $producto->actualizar([
                    'nombre' => $nombre,
                    'marca' => $marca,
                    'precio' => $precio,
                    'cantidad' => $cantidad,
                    'imagen' => $imagenFinal
                ])->where('id_producto', $id)->get();

                if ($datos) {
                    $config->redirigir('inicio');
                } else {
                    echo json_encode(["error" => "Error al actualizar el producto en la base de datos"]);
                }
            } else {
                echo json_encode(["error" => "La solicitud debe ser de tipo POST"]);
            }
        } catch (\Throwable $th) {
            echo json_encode(["error" => $th->getMessage()]);
        }
    }
    public function eliminar($id)
    {
        $producto = new TablaProductos();
        $producto->eliminar()->where('id_producto', $id)->get();
        header("Location: /inicio");
        exit();
    }




}
$controlador = new Productos();

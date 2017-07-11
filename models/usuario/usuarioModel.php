<?php

require_once "models/conexion.php";
class usuario extends conexion
{

    #INGRESO USUARIO
    #-------------------------------------
    public function ingresoUsuarioModel($datosModel, $tabla)
    {

        $stmt = conexion::conectar()->prepare("SELECT usuarioCliente,passwordCliente,intentosCliente,idCliente FROM $tabla WHERE usuarioCliente = :usuario");
        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

    }

    #INTENTOS USUARIO
    #-------------------------------------

    public function intentosUsuarioModel($datosModel, $tabla)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentosCliente = :intentos WHERE usuarioCliente = :usuario");
        $stmt->bindParam(":intentos", $datosModel["actualizarIntentos"], PDO::PARAM_INT);
        $stmt->bindParam(":usuario", $datosModel["usuarioActual"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "success";

        } else {

            return "error";

        }

        $stmt->close();
    }
    public function getCliente($cliente)
    {
    	$stmt=Conexion::conectar()->prepare("SELECT idCliente,nombreCliente,apellidoCliente,usuarioCliente FROM clientes WHERE idCliente = :cliente");
    	$stmt->bindParam(":cliente",$cliente,PDO::PARAM_INT);
    	$stmt->execute();

    	return $stmt->fetch();

    	$stmt->close();
    }
}

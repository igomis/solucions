<?php

function allClients($conn){
    $sth = $conn->prepare("SELECT * FROM clientes");
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_OBJ);
}

function findClient($conn,$id){
    $sth = $conn->prepare("SELECT * FROM clientes WHERE dni = :id");
    $sth->bindParam(':id',$id);
    $sth->execute();
    if (!$sth->rowCount()) throw new Exception('Client no trobat');
    return $sth->fetch(PDO::FETCH_OBJ);
}

function deleteClient($conn,$id){
    $sth = $conn->prepare("DELETE FROM clientes WHERE dni = :id");
    $sth->bindParam(':id',$id);
    $sth->execute();
    if (!$sth->rowCount()) throw new Exception('No he pogut esborrar client');
    return true;
}

function addClient($conn,$dni,$nombre,$direccion,$telefono){
    $sth = $conn->prepare("INSERT INTO clientes (dni,nombre,direccion,telefono) VALUES (:dni,:nombre,:direccion,:telefono)");
    $sth->execute(array(':dni'=>$dni,':nombre'=>$nombre,':direccion'=>$direccion,':telefono'=>$telefono));
    if (!$sth->rowCount()) throw new Exception('No he pogut afegir el client');
    return true;
}

function modifyClient($conn,$id,$dni,$nombre,$direccion,$telefono){
    $sth = $conn->prepare("UPDATE clientes SET `dni` = :dni,`nombre` = :nombre,`direccion` = :direccion,`telefono` = :telefono WHERE dni = :id");
    $sth->execute(array(':dni'=>$dni,':nombre'=>$nombre,':direccion'=>$direccion,':telefono'=>$telefono,':id'=>$id));


    if (!$sth->rowCount()) throw new Exception('No he pogut modificar el client');
    return true;
}
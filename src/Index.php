<?php
namespace App;

use App\Database\Conection;

$pdo = new Conection();

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['id']))
    {
        $sql = $pdo->prepare("SELECT * FROM contactos WHERE id=:id");
        $sql->bindValue(':id', $_GET['id']);
        $sql->execute();
        header("HTTP/1.1 200 hay datox tortiux");
        echo json_encode($sql->fetchAll());
        exit;
    }else {
        $sql = $pdo->prepare("SELECT * FROM contactos");
        $sql->execute();
        header("HTTP/1.1 200 hay datox con tacox");
        echo json_encode($sql->fetchAll());
        exit;
    }
}

if($_SERVER['REQUEST_METHOD'] ==='POST') {
    $sql = "INSERT INTO contactos (nombre, telefono, email)
            VALUES (:nombre, :telefono, :email)";
    $smtm = $pdo->prepare($sql);
    // $smtm->bindValue(':nombre', $_POST['nombre']);
    // $smtm->bindValue(':telefono', $_POST['telefono']);
    // $smtm->bindValue(':email', $_POST['email']);
    //$smtm->execute();
    $smtm->execute([
        ':nombre' => $_POST['nombre'],
        ':telefono' => $_POST['telefono'],
        ':email' => $_POST['email'],
    ]);
    $idPost = $pdo->lastInsertId();
    if($idPost){
        header("HTTP/1.1 200 Datos cargados ok");
        echo json_encode($idPost);
        exit;
    }
}

if($_SERVER['REQUEST_METHOD'] ==='PUT') {
    $sql = "UPDATE contactos SET nombre=:nombre, telefono=:telefono, email=:email
            WHERE id=:id";
        $smtm = $pdo->prepare($sql);
        $smtm->bindValue(':nombre', $_GET['nombre']);
        $smtm->bindValue(':telefono', $_GET['telefono']);
        $smtm->bindValue(':email', $_GET['email']);
        $smtm->bindValue(':id', $_GET['id']);
        $smtm->execute();
        // $smtm->execute([
        //     ':id'   => $_GET['id'],
        //     ':nombre' => $_GET['nombre'],
        //     ':telefono' => $_GET['telefono'],
        //     ':email' => $_GET['email'],
        // ]);

        header("HTTP/1.1 200 ok");
        exit;
        
}

if($_SERVER['REQUEST_METHOD'] ==='DELETE') {
    $sql = "DELETE FROM contactos WHERE id=:id";            
        $smtm = $pdo->prepare($sql);        
        $smtm->bindValue(':id', $_GET['id']);
        $smtm->execute();
        
        header("HTTP/1.1 200 ok");
        exit;
        
}



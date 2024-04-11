<?php
if(isset($_POST['title'])){
    require'../banco.php';
    $title = $_POST['title'];

    if(empty($title)){
        header("location: ../index?mess=error");
    }else{
        $stmt = $conn->prepare("INSERT INTO todos(title) VALUE (?)");
        $res = $stmt->execute([$title]);

        if($res){
            header("location: ../index?mess=sucess");
        }else{
            header("location: ../index");
        }
        $conn = null;
        exit();
    }
}else{
    header("location: ../index?mess=error");
}

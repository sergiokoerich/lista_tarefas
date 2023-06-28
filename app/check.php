<?php
if(isset($_POST['id'])){
    require '../config.php';

    $id = $_POST['id'];

    if(empty($id)){
       echo 'error';
    } else {
        $stmt = $conn->prepare("SELECT id, checked FROM tarefas WHERE id=?");
        $stmt->execute([$id]);

        $tarefa = $stmt->fetch();
        $uId = $id;
        $checked = $tarefa['checked'];

        $uChecked = !$checked;

        $stmt = $conn->prepare("UPDATE tarefas SET checked=? WHERE id=?");
        $stmt->execute([$uChecked, $uId]);

        if($stmt->rowCount() > 0){
            echo $uChecked;
        } else {
            echo "error";
        }
        $conn = null;
        exit();
    }
} else {
    header("Location: ../index.php?msg=error");
}
?>






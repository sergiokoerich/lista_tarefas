<?php
if (isset($_POST['titulo'])) {
    require '../config.php';
        
    $title = $_POST['titulo'];
    $descricao = $_POST['descricao'];   
    $prazo_conclusao = $_POST['prazo_conclusao'];

    if (empty($title)) {
        header("Location: ../index.php?msg=error");
    } else {
        $stmt = $conn->prepare("INSERT INTO tarefas (titulo, descricao, prazo_conclusao) VALUES (?, ?, ?)");
        $res = $stmt->execute([$title, $descricao, $prazo_conclusao]);

        if ($res) {
            header("Location: ../index.php?msg=success");
        } else {
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
} else {
    header("Location: ../index.php?msg=error");
}
?>

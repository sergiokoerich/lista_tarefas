<?php
require 'config.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    if(isset($_POST['titulo'])) {
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $prazo = $_POST['prazo_conclusao'];

        $stmt = $conn->prepare("UPDATE tarefas SET titulo=?, descricao=?, prazo_conclusao=? WHERE id=?");
        $stmt->bind_param("sssi", $titulo, $descricao, $prazo, $id);
        $stmt->execute();

        header("Location: index.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM tarefas WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 0) {
        header("Location: index.php");
        exit();
    }

    $tarefa = $result->fetch_assoc();
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Editar Tarefa</h1>
    <div class="main-section">
        <div class="add-section">
            <form action="" method="POST" autocomplete="off">
                <input type="text" name="titulo" value="<?php echo $tarefa['titulo']; ?>" />
                <textarea name="descricao"><?php echo $tarefa['descricao']; ?></textarea>
                <input type="date" name="prazo_conclusao" value="<?php echo $tarefa['prazo_conclusao']; ?>">
                <button type="submit">Atualizar</button>
            </form>
        </div>
    </div>
</body>
</html>
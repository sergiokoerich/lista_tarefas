<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Lista de Tarefas</h1>
    <div class="main-section">
        <div class="add-section">
            <form action="app/add.php" method="POST" autocomplete="off">
                <?php if (isset($_GET['msg']) && $_GET['msg'] == 'error') { ?>
                    <input type="text"
                        name="titulo"
                        style="border: 2px solid #ff6666"
                        placeholder="Este campo é obrigatório"/>
                    <textarea name="descricao" 
                        placeholder="Descrição" ></textarea>
                    <input type="date" 
                        name="prazo_conclusao">
                    <button type="submit">Adicionar +</button>
                <?php } else { ?>    
                    <input type="text"
                        name="titulo"
                        placeholder="Adicionar uma tarefa"/>
                    <textarea name="descricao" 
                        placeholder="Descrição" ></textarea>
                    <input type="date" 
                        name="prazo_conclusao">
                    <button type="submit">Adicionar</button>
                <?php }?>
            </form>
        </div>
        <?php
            $tarefas = $conn->query("SELECT * FROM tarefas ORDER BY id DESC")
            
        ?>

        <div class="show-todo-section">
            <?php if($tarefas->num_rows === 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/listas-de-tarefas.jpeg" alt="lista de tarefas com lapis ao lado" width="90%">
                        <img src="img/Ellipsis-1s-200px.svg" alt="bolas girando" width="20%">
                    </div>
                </div>
            <?php } ?>
            
            <?php while ($tarefa = $tarefas->fetch_assoc()) { ?>
                <div class="todo-item">
                    <span id="<?php echo $tarefa['id']; ?>" class="remove-to-do"><img src="img/delete.svg" alt="botao de editar"></span>
                    <?php if($tarefa['checked']) { ?>
                        <input type="checkbox"
                                class="check-box"
                                data-todo-id="<?php echo $tarefa['id']; ?>"
                                checked />
                        <h2 class="checked"><?php echo $tarefa['titulo'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                                data-todo-id="<?php echo $tarefa['id']; ?>"
                                class="check-box" />
                        <h2><?php echo $tarefa['titulo'] ?></h2>
                    <?php }?> 
                    <p>Descrição: <?php echo $tarefa['descricao'] ?></p>
                    <br/>
                    <div class="editar">
                        <div>
                            <small>Criado em: <?php echo $tarefa['data_criacao'] ?></small>
                            <small>Realizar até: <?php echo $tarefa['prazo_conclusao'] ?></small>
                        </div>                        
                        <a href="editar.php?id=<?php echo $tarefa['id']; ?>" class="edit-button"><img src="img/edit.svg" alt="botao de editar"></a>
                    </div>
                </div>  
            <?php } ?>

    </div>
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');

                $.post("app/remove.php",
                    {
                        id: id
                    },
                    (data) => {
                        if(data){
                            $(this).parent().hide(600);
                        }
                    }
                );
            });

            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');
                
                $.post('app/check.php', 
                      {
                          id: id
                      },
                      (data) => {
                          if(data != 'error'){
                              const h2 = $(this).next();
                            if (data !== 'error') {
                                h2.toggleClass('checked');
                            }
                          }
                      }
                );
            });
        });
    </script>
</body>
</html>
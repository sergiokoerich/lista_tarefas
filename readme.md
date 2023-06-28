Lista de Tarefas
<br/>
    Este é um aplicativo web simples para gerenciar uma lista de tarefas. Ele permite adicionar, editar, remover e marcar como concluídas as tarefas.
<br/>
Pré-requisitos
<br/>
    Antes de executar o aplicativo, verifique se você possui os seguintes requisitos:

        PHP (versão 7.0 ou superior)
        MySQL (ou outro sistema de gerenciamento de banco de dados)

Instalação
<br/>
    Siga as etapas abaixo para configurar o aplicativo:

        1- Clone o repositório para o seu ambiente local.
        2- Importe o arquivo database.sql para criar a tabela necessária no seu banco de dados.
        3- Configure as informações de conexão com o banco de dados no arquivo config.php.
        4- Certifique-se de que o diretório css contenha o arquivo style.css.
        5- Certifique-se de que o diretório js contenha o arquivo jquery-3.2.1.min.js.
        
Uso<br/>
    Abra o arquivo index.php em um navegador da web.<br/>
    Na seção "Adicionar Tarefa", preencha o título, descrição e prazo de conclusão da tarefa e clique em "Adicionar".<br/>
    A tarefa será exibida na lista de tarefas.<br/>
    Você pode marcar uma tarefa como concluída clicando na caixa de seleção ao lado dela.<br/>
    Para editar uma tarefa, clique no ícone de edição ao lado dela e preencha os novos detalhes no formulário de edição.<br/>
    Para remover uma tarefa, clique no ícone de exclusão ao lado dela.<br/>
    As mensagens de erro e sucesso serão exibidas conforme necessário.

function limpaCampo() {
    // Limpar os valores dos campos de entrada
    document.getElementById("nome").value = "";
    document.getElementById("usuario").value = "";
    document.getElementById("senha").value = "";
  }
  
function selecionarUsuario(_id, nome, usuario, senha) {
  document.getElementById("nome").value = nome;
  document.getElementById("usuario").value = usuario;
  document.getElementById("senha").value = senha;
}

function alterarCampo() {
  $(document).ready(function() {
    $("#salvar").click(function(event) {
      event.preventDefault(); // Evita o comportamento padrão do botão de enviar
  
      // Obtenha os valores dos campos do formulário
      var nome = $("#nome").val();
      var usuario = $("#usuario").val();
      var senha = $("#senha").val();
  
      // Faça a atualização dos campos do usuário
      var query = "UPDATE usuario SET nome = ?, usuario = ?, senha = ? WHERE id = ?";
      var values = [nome, usuario, senha, 1]; // substitua 1 pelo ID do usuário que você deseja atualizar
  
      // Execute a atualização no banco de dados
      conexao.query(query, values, function(err, result) {
        if (err) {
          console.error('Erro ao atualizar os dados: ' + err.stack);
          return;
        }
  
        console.log('Dados atualizados com sucesso!');
  
        // Exibir uma mensagem de sucesso, recarregar a página, etc.
      });
    });
  });
}

  



  
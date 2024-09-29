<?php

class cliente
{
    private $db;
    //construção do databank, vai ser chamado sempre que faço uma instancia da classe
    public function __construct($db)
    {
        //O $this se refere ao Private $db, enquanto o $db se refere ao parâmetro
        $this->db = $db;
    }

    public function buscarTodos()
    {
        $query = 'SELECT * FROM Cliente';

        return $this->db->query($query);
    }

    public function buscarPorId($id)
    {
        //stmt é statement, convenção do método prepare, que realiza uma busca segura no DB, já que estamos com dados do user no parametro, o ? é um placeholder q será substituído pelo parâmetro
        $stmt = $this->db->prepare('SELECT * FROM Cliente WHERE ID = ?');

        //insere os  dados no placeholder, o i é abreviação de int
        $stmt->bind_param('i', $id);

        //executa a consulta
        $stmt->execute();

        //pega a consulta e retorna
        return $stmt->get_result();
    }

    //sql injection: 1 OR 1=1, isso ficaria no parâmetro, ou seja: WHERE ID = 1 OR 1+1', isso iria ser verdadeiro e o infrator teria acesso irrestrito

    public function inserir($dados)
    {
        $stmt = $this->db->prepare('INSERT INTO Cliente(Nome, Telefone, CPF, Email, Senha, Endereco) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('ssssss', $dados['nome'], $dados['telefone'], $dados['cpf'], $dados['email'], $dados['senha'], $dados['endereco']);

        //permite saber se a inserção foi bem sucedida ou não
        return $stmt->execute();
    }

    public function atualizar($dados, $id)
    {
        $stmt = $this->db->prepare('UPDATE Client SET Nome = ?, Telefone = ?, CPF = ?, Email = ?, Senha = ?, Endereco = ? WHERE ID = ?');
        $stmt->bind_param('ssssssi', $dados['nome'], $dados['telefone'], $dados['cpf'], $dados['email'], $dados['senha'], $dados['endereco'], $id);

        return $stmt->execute();
    }

    public function deletar($id)
    {
        $stmt = $this->db->prepare('DELETE FROM Cliente WHERE ID = ?');
        $stmt->bind_param('i', $id);

        return $stmt->execute;
    }




    public function buscarPorEmailSenha($email, $senha)
    {
        $stmt = $this->db->prepare('SELECT * FROM Cliente WHERE Email = ? AND Senha = ?');
        $stmt->bind_param('ss', $email, $senha);
        $stmt->execute();

        return $stmt->get_result();
    }
}

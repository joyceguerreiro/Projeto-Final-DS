<?php
class OutrasFormacoes {
    private $idoutrasformacoes;
    private $idusuario;
    private $inicio;
    private $fim;
    private $descricao;

    // ID
    public function getIdOutrasFormacoes() {
        return $this->idoutrasformacoes;
    }

    public function setIdOutrasFormacoes($idoutrasformacoes) {
        $this->idoutrasformacoes = $idoutrasformacoes;
    }

    // ID Usuário
    public function getIdUsuario() {
        return $this->idusuario;
    }

    public function setIdUsuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    // Início
    public function getInicio() {
        return $this->inicio;
    }

    public function setInicio($inicio) {
        $this->inicio = $inicio;
    }

    // Fim
    public function getFim() {
        return $this->fim;
    }

    public function setFim($fim) {
        $this->fim = $fim;
    }

    // Descrição
    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    // Inserir no banco de dados
    public function inserirBD() {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO outrasformacoes (idusuario, inicio, fim, descricao)
                VALUES ('" . $this->idusuario . "', '" . $this->inicio . "', '" . $this->fim . "', '" . $this->descricao . "')";

        if ($conn->query($sql) === true) {
            $this->idoutrasformacoes = mysqli_insert_id($conn);
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    // Excluir do banco de dados
    public function excluirBD($id) {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM outrasformacoes WHERE idoutrasformacoes = '" . $id . "'";

        if ($conn->query($sql) === true) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    // Listar formações por usuário
    public function listaFormacoes($idusuario) {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM outrasformacoes WHERE idusuario = '" . $idusuario . "'";
        $res = $conn->query($sql);
        $conn->close();
        return $res;
    }
}
?>

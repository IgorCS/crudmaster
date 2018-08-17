<?php


/**
 *
 * @Entity
 * @Table(name="usuario")
 */
class usuario
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="IDENTITY")
     */
    public $id = 0;


    /**
     * @Column(type="string", columnDefinition="VARCHAR(50) NOT NULL")
     */
    public $nome = 0;


    /**
     * @Column(type="string", columnDefinition="VARCHAR(50) NOT NULL")
     */
    public $email = 0;


    /**
     * @Column(type="string", length=32, nullable=true)
     * @var type
     */
    public $telefone = '';


    /**
     * @Column(type="string", length=32, nullable=true)
     * @var type
     */
    public $celular = '';

    /**
     * @Column(type="integer", nullable=true)
     * @var type
     */
    public $idade;

    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

}


/* End of file usuario.php */
/* Location: ./application/model/usuario.php */
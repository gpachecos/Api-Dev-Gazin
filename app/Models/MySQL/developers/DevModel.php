<?php

namespace App\Models\MySQL\developers;

final class DevModel
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $sexo;

    /**
     * @var int
     */
    private $idade;

    /**
     * @var string
     */
    private $hobby;

    private $datanascimento;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): DevModel
    {
        $this->id = $id;
        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    public function setNome(string $nome): DevModel
    {
        $this->nome = $nome;
        return $this;
    }

    public function getSexo(): string
    {
        return $this->sexo;
    }
    public function setSexo(string $sexo): DevModel
    {
        $this->sexo = $sexo;
        return $this;
    }

    public function getIdade(): int
    {
        return $this->idade;
    }
    public function setIdade(int $idade): DevModel
    {
        $this->idade = $idade;
        return $this;
    }

    public function getHobby(): string
    {
        return $this->hobby;
    }
    public function setHobby(string $hobby): DevModel
    {
        $this->hobby = $hobby;
        return $this;
    }

    public function getDataNascimento(): string
    {
        return $this->datanascimento;
    }
    public function setDataNascimento(string $datanascimento): DevModel
    {
        $this->datanascimento = $datanascimento;
        return $this;
    }
}
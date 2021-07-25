<?php

namespace App\DAO\MySQL\Developers;

use App\Models\MySQL\developers\DevModel;

class DevsDAO extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllDevs(): array
    {
        $devs = $this->pdo
            ->query('Select
                        id,
                        nome, 
                        sexo,
                        idade,
                        hobby,
                        datanascimento
                     From devs;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        
        return $devs;
    }

    public function getDevByPagination(int $limit, int $offset): array
    {
        $sql = "SELECT
                        d.id
                        ,d.nome
                        ,d.sexo
                        ,d.idade
                        ,d.hobby
                        ,d.datanascimento
                    FROM devs d LIMIT :limit OFFSET :offset;
            ";
            $statement = $this->pdo->prepare($sql);   
            $statement->bindParam(':limit',$limit, \PDO::PARAM_INT);
            $statement->bindParam(':offset',$offset, \PDO::PARAM_INT);
            $statement->execute();
            $devs = $statement->fetchAll(\PDO:: FETCH_ASSOC); 

            return $devs;
    }

    public function getDevById(int $id): array
    {
        $statement = $this->pdo
            ->prepare('SELECT * FROM devs WHERE id = :id;
                    ');
        $statement->bindParam(':id',$id, \PDO::PARAM_INT);
        $statement->execute();
        $devs = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $devs;
    }

    public function insertDev(DevModel $dev): void
    {
        $statement = $this->pdo
            ->prepare('INSERT INTO devs VALUES(
                null,
                :nome,
                :sexo,
                :idade,
                :hobby,
                :datanascimento
            );');
            $statement->execute([
                'nome' => $dev->getNome(),
                'sexo' => $dev->getSexo(),
                'idade' => $dev->getIdade(),
                'hobby' => $dev->getHobby(),
                'datanascimento' => $dev->getDataNascimento()
            ]);
    }

    public function updateDev(DevModel $dev): void
    {
        $statement = $this->pdo
            ->prepare('UPDATE devs 
                          SET nome = :nome,
                              sexo = :sexo,
                              idade = :idade,
                              hobby = :hobby,
                              datanascimento = :datanascimento
                         where id = :id
                    ;');
            $statement->execute([
                'nome' => $dev->getNome(),
                'sexo' => $dev->getSexo(),
                'idade' => $dev->getIdade(),
                'hobby' => $dev->getHobby(),
                'datanascimento' => $dev->getDataNascimento(),
                'id' => $dev->getId()
            ]);

    }

    public function deleteDev(int $id): void
    {
        $statement = $this->pdo
            ->prepare('DELETE FROM devs WHERE id = :id;
                    ');
            $statement->execute([
                'id' =>$id
            ]);
    }

    public function count(): int
    {
        $devs = $this->pdo
            ->query('Select
                        count(id) as qtde
                     From devs;')
            ->fetch(\PDO::FETCH_ASSOC);
        
        return $devs['qtde'];
    }
}
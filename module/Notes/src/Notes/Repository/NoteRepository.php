<?php

namespace Notes\Repository;

use Doctrine\ORM\EntityRepository;

class NoteRepository extends EntityRepository
{
    public function save($entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }
    public function deleteById($id)
    {
        $entity = $this->findOneBy(['id' => $id]);
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }
}

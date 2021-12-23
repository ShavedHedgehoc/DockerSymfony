<?php

namespace App\Repository;

// use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class BatchRepository
{
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findBoilData($param)
    {
        $sql = "SELECT 
            BatchName,
            BatchDate,
            Plant,
            ProductId,
            ProductName,
            Quantity,
            Total
            FROM boilview b
            WHERE b.BatchName=?
            ORDER BY b.ProductName ASC";
        $connection = $this->entityManager->getConnection();
        return $connection->fetchAllAssociative($sql, array($param));
    }

    public function findWeightData($param)
    {
        $sql = "SELECT 
            BatchName,
            ProductId,
            ProductName,
            LotName,
            AuthorName,
            Quantity,
            CreateDate
            FROM batchview w 
            WHERE w.BatchName=?
            ORDER BY w.ProductName ASC";
        $connection = $this->entityManager->getConnection();
        return $connection->fetchAllAssociative($sql, array($param));
    }

    public function findLoadData($param)
    {
        $sql = "SELECT 
            BatchName,
            ProductId,
            ProductName,
            LotName,
            AuthorName,
            CreateDate 
            FROM loadview l 
            WHERE l.BatchName=?
            ORDER BY l.ProductName ASC";
        $connection = $this->entityManager->getConnection();
        return $connection->fetchAllAssociative($sql, array($param));
    }
}
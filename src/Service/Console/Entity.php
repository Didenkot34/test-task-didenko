<?php
/**
 * Created by PhpStorm.
 * User: ura
 * Date: 21.03.2018
 * Time: 23:57
 */

namespace App\Service\Console;


abstract class Entity
{
    private $data;
    private $entityManager;
    private $strategy;

    /**
     * Entity constructor.
     * @param $data
     * @param $entityManager
     * @param CreateStrategy $strategy
     */
    public function __construct($data, $entityManager, CreateStrategy $strategy)
    {
        $this->data = $data;
        $this->entityManager = $entityManager;
        $this->strategy = $strategy;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @return array
     */
    public function create(): array
    {
        return $this->strategy->create($this);
    }
}
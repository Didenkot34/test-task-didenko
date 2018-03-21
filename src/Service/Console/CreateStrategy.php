<?php

namespace App\Service\Console;


abstract class CreateStrategy
{

    /**
     * The method for creating data in Entity using needed Strategy
     * @param Entity $entity
     * @return mixed
     */
    public abstract function create(Entity $entity);
}
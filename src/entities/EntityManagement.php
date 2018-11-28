<?php
namespace MyModule\entities;

/**
*Class concerning the hydration of the different entities.
*/
class EntityManagement
{
    public function __construct($data)
    {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($name);

            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
    }
}

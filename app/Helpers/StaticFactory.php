<?php

namespace App\Helpers;

class StaticFactory
{
    protected string $store;
    protected array $data = [];

    public static function make(string $store, array $data) : self
    {
        return (new static)->setStore($store)->setData($data);
    }

    public function getStore() : string{
        return $this->store ;
    }

    public function setStore(string $store) : self{
        $this->store = $store;
        return $this;
    }

    public function getData() : array{
        return $this->data;
    }

    public function setData(array $data) : self{
        $this->data = $data;
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function save(): void
    {
        switch ($this->getStore()){
            case 'database':
                $this->saveToDatabase();
                break;
            case 'email':
                $this->saveToEmail();
                break;
            default:
                throw new \Exception('не измветный тип');
        }
    }
    protected function saveToDatabase(){
        $data = $this->getData();
        //TODO: save to database
    }

    protected function saveToEmail(){

    }
}

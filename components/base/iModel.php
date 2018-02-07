<?php

namespace app\components\base;

/**
 * Interface to be implemented by models classes and represents CRUD methods (Create, Read, Update and Delete)
 * 
 * @author victor.leite@gmail.com
 */
interface iModel {

    /**
     * Abstraction that force the model to implement the validation
     */
    public function validate();

    /**
     * Abstraction that force the model to implement the update on database
     */
    public function update();

    /**
     * Abstraction that force the model to implement the insert on database
     */
    public function insert();

    /**
     * Abstraction that force the model to implement the delete by pk on database
     * @param type $id
     */
    static function delete($id);

    /**
     * Abstraction that force the model to implement the creation of the model. 
     * Generally uses factories inside to delegate that job.
     */
    static function create();

    /**
     * Abstraction that force the model to implement the find by pk
     * @param type $id
     */
    static function find($id);

    /**
     * Abstraction that force the model to implement the find all the models
     * 
     * Must be improved, passing filters and order parameters
     */
    static function findAll();
}

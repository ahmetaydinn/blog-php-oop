<?php

namespace app\components\base;

/**
 * Interface to be implemented by models classes
 * 
 * @author victor.leite@gmail.com
 */
interface iModel {

    /**
     * Validate the model
     */
    public function validate();

    /**
     * Update the model on database
     */
    public function update();

    /**
     * Insert the model on database
     */
    public function insert();

    /**
     * Delete by pk de model on database
     * @param type $id
     */
    static function delete($id);
    
    /**
     * Create the model
     */
    static function create();

    /**
     * Find the model by pk
     * @param type $id
     */    
    static function find($id);

    /**
     * Find all the models
     */
    static function findAll();
}

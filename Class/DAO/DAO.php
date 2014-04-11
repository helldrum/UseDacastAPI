<?php

/**
 * Interface use to structure the DAO 
 * (all the DAO objet have the same name functions and expect the same result )
 *
 * @author Jonathan CHARDON
 */
interface DAO {  
    
    const API_URL = "https://www.dacast.com/backend/api/live";

    public function create($object);

    public function update($object);

    public function deleteById($id);

    public function getById($id);

    public function get_userSettings();

    public function get_currentObjet();

    public function get_fullUrlCall();

    public function get_all();

    public function set_userSettings($_userSettings);

    public function set_currentObjet($_currentObjet);

    public function set_fullUrlCall($_fullUrlCall);

    public function reset_allObject();
    
    public function getEmbedCode($id, $type);
}

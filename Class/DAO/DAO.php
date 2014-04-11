<?php

interface DAO {  
    
    const API_URL = "https://www.dacast.com/backend/api/live";

    public function create($object);

    public function update($object);

    public function getALL();

    public function deleteById($id);

    public function getById($id);

    public function get_userSettings();

    public function get_currentObjet();

    public function get_fullUrlCall();

    public function get_allObject();

    public function set_userSettings($_userSettings);

    public function set_currentObjet($_currentObjet);

    public function set_fullUrlCall($_fullUrlCall);

    public function reset_allObject();
}

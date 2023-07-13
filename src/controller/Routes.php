<?php

namespace v\controller;

class Routes
{

    public static function getRoutes()
    {
        return [
            "/membres" => "membres",
            "/membre/creer" => "create-membre",
            "/membre/update" => "update-membre",
            "/liberations" => "liberations",
            "/liberation/creer" => "create-liberation",
            "/liberation/update" => "update-liberation",
            "/souscriptions" => "souscriptions",
            "/souscription/creer" => "create-souscription",
            "/souscription/update" => "update-souscription",
        ];
    }

    public static function postRoutes()
    {
        return [
            "/membre/creer" => "",
            "/membre/update" => "",
            "/membre/delete" => "",
            "/liberation/creer" => "",
            "/liberation/update" => "",
            "/liberation/delete" => "",
            "/souscription/creer" => "",
            "/souscription/update" => "",
            "/souscription/delete" => "",
        ];
    }
}

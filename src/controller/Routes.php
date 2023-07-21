<?php

namespace v\controller;

class Routes
{

    public static function getRoutes()
    {
        return [
            // Connexion
            "/connexion" => "connexion",

            // Lists
            "/membres" => "membres",
            "/liberations" => "liberations",
            "/souscriptions" => "souscriptions",

            // Creation
            "/membre/creer" => "create-membre",
            "/liberation/creer" => "create-liberation",
            "/souscription/creer" => "create-souscription",

            // Update
            "/membre/update" => "update-membre",
            "/liberation/update" => "update-liberation",
            "/souscription/update" => "update-souscription",

            // Taux
            "/taux" => "taux",

            // Error page
            "/error" => "404",

            // Printing 
            "/print" => "print",
            "/print/custom" => "custom",

        ];
    }

    public static function postRoutes()
    {
        return [
            // Connexion
            "/connexion" => "",

            // Creation
            "/membre/creer" => "",
            "/liberation/creer" => "",
            "/souscription/creer" => "",

            // Update
            "/membre/update" => "",
            "/liberation/update" => "",
            "/souscription/update" => "",

            // Deletion
            "/membre/delete" => "",
            "/liberation/delete" => "",
            "/souscription/delete" => "",

            // Taux
            "/taux" => "",

            // Printing
            "/print" => "",
            "/print/custom" => "",
        ];
    }
}

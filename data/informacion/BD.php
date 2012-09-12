<?php

/* * ********************************************
  The MyReview system for web-based conference management

  Copyright (C) 2003-2006 Philippe Rigaux
  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation;

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 * ********************************************** */

// This class encapsulates the MySQL PHP API
class BD {

// ----   Private part: properties
    var $connexion, $erreurRencontree = 0, $base, $message;

    // Object constructor
    function BD($login, $motDePasse, $base, $serveur) {
        // Connect to the server
        $this->connexion = mysql_connect($serveur, $login, $motDePasse);
        if (!$this->connexion)
            $this->message("Sorry, unable to connect to $serveur\n");

        // Connnect to the DB
        if (!mysql_select_db($base)) {
            $this->message("Sorry, unable to access to the DB $base\n");
            $this->message("<B>MySQL says: </B>" .
                    mysql_error($this->connexion));
            $this->erreurRencontree = 1;
        }
        mysql_set_charset('utf8', $this->connexion);

        $this->base = $base;
        // End of constructor
    }

    // ---- Private part: methods
    // Shows a message
    function message($message) {
        // Just output an HTML message
        echo "<B>Error:</B> $message<BR>\n";
    }

    // Execute a query
    function execRequete($requete) {
        $resultat = mysql_query($requete, $this->connexion);

        if (!$resultat) {
            $this->message("Problem when executing query: $requete");
            $this->message("<B>MySQL says: </B>" .
                    mysql_error($this->connexion));
            $this->erreurRencontree = 1;
        }
        return $resultat;
    }

    // Get the next object
    function objetSuivant($resultat) {
        return mysql_fetch_object($resultat);
    }

    // Disconnect
    function quitter() {
        @mysql_close($this->connexion);
    }

// End of the class
}

?>

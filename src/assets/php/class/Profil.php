<?php

    class Profil {

        /**
         * @param $array return all information about profil in constructor
         * @return $_pseudo, $_pollen, $_miel, $_prefix, $_serveur, $_last, $_time return all var
         */
        private $_pseudo, $_pollen, $_miel, $_prefix, $_serveur, $_last, $_time;

        public function __construct($array) {
            if(!isset($array) || !is_array($array)) echo "Array non initilisée";
            $this->_pseudo = $array['pseudo'];
            $this->_pollen = $array['pollen'];
            $this->_miel = $array['miel'];
            $this->_prefix = $array['prefix'];
            $this->_serveur = $array['serveur'];
            $this->_last = $array['last'];
            $this->_time = $array['time'];
        }

        public function getPseudo() { return $this->_pseudo; }
        public function getPollen() { return $this->_pollen; }
        public function getMiel() { return $this->_miel; }
        public function getPrefix() { return $this->_prefix; }
        public function getServeur() { return $this->_serveur; }
        public function getLast() { return $this->_last; }
        public function isBanned() {
            global $db;
            $req = $db->prepare('SELECT * FROM ss_ban WHERE pseudo = :pseudo');
            $req->execute(array('pseudo' => $this->_pseudo));
            $isbanned = $req->fetchAll();
            return $isbanned;
        }
        public function getTime() { 
            $time_in_hours = $this->_time / 60;
            return $time_in_hours;
         }

    }
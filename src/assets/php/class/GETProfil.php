<?php

    namespace App\Classes;

    class GETProfil {

        /**
         * @param $name name of player
         * @return $profil return array of profil's player
         */

         private $_profil;

        public function __construct($name) {
            global $db;
            $req = $db->prepare("SELECT * FROM profils WHERE pseudo = :pseudo LIMIT 1");
            $req->execute(array(':pseudo' => $name));
            $profil = $req->fetchAll();
            if($profil != null) {

                $timestampregister = $profil[0]['register'] / 1000;
                $timestamp = $profil[0]['last'] / 1000;
                $now = new \DateTime();
                $disconnect = date('m/d/Y', $timestamp);
                $req2 = $db->prepare('SELECT TIMEDIFF(:timetime, :disconnect)');
                $req2->execute(array('timetime' => $now->format('Y-m-d'), 'disconnect' => $disconnect));

                $result = explode(':', $req2->fetchAll()[0][0]);
                if ($result[0] == 0)
                    if ($result[1] >= 1)
                        $profil[0]['last'] = $result[1] . ' minutes';
                    else $profil[0]['last'] = $result[1] . ' minute';
                else
                    if ($result[0] >= 1)
                        $profil[0]['last'] = $result[0] . ' heures';
                    else $profil[0]['last'] = $result[0] . ' heure';
                $profil[0]['register'] = round($timestampregister);
                $profil[0]['prefix'] = $this->getPlayerRank(utf8_converter($profil));
                $this->_profil = utf8_converter($profil);

            } else $this->_profil = null;
        }

        //get infos
        public function getProfilInfos() {
            return $this->_profil;
        }

        public function getPlayerRank($profil) {
            $prefix = $profil[0]['prefix'];
            if(preg_match('/^§5§[a-z|0-9]/', $prefix)) {
                $prefix_regexed = preg_replace('/^§5/', '', $prefix);
                if(preg_match('/§[a-z|0-9]$/', $prefix_regexed)) {
                    $prefix_regexed= preg_replace('/§[a-z|0-9]$/', '', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§4')) {
                    $prefix_regexed=str_replace('§4', '</span><span class="mc_color_red">', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§c')) {
                    $prefix_regexed=str_replace('§c', '</span><span class="mc_color_redred">', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§6')) {
                    $prefix_regexed=str_replace('§6', '</span><span class="mc_color_orange">', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§e')) {
                    $prefix_regexed=str_replace('§e', '</span><span class="mc_color_yellow">', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§2')) {
                    $prefix_regexed=str_replace('§2', '</span><span class="mc_color_greengreen">', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§a')) {
                    $prefix_regexed=str_replace('§a', '</span><span class="mc_color_green">', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§b')) {
                    $prefix_regexed=str_replace('§b', '</span><span class="mc_color_cyan">', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§3')) {
                    $prefix_regexed=str_replace('§3', '</span><span class="mc_color_blue">', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§1')) {
                    $prefix_regexed=str_replace('§1', '</span><span class="mc_color_blueblue">', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§9')) {
                    $prefix_regexed=str_replace('§9', '</span><span class="mc_color_blueblueblue">', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§d')) {
                    $prefix_regexed=str_replace('§d', '</span><span class="mc_color_pink">', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§5')) {
                    $prefix_regexed=str_replace('§5', '</span><span class="mc_color_purple">', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§f')) {
                    $prefix_regexed=str_replace('§f', '</span><span class="mc_color_white">', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§7')) {
                    $prefix_regexed=str_replace('§7', '</span><span class="mc_color_gray">', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§8')) {
                    $prefix_regexed=str_replace('§8', '</span><span class="mc_color_graygray">', $prefix_regexed);
                }
                if(strstr($prefix_regexed, '§0')) {
                    $prefix_regexed= str_replace('§0', '</span><span class="mc_color_black">', $prefix_regexed);
                }
                $rankrank = $prefix_regexed . '</span>';
                return $rankrank;
            } else if(preg_match('/^§[a-z|0-9]§[a-z|0-9]/', $prefix)) {
                $prefix_regexed = preg_replace('/^§[a-z|0-9]/', '', $prefix);
                if(strstr($prefix_regexed, '§4')) {
                    $rank = str_replace('§4', '<span class="mc_color_red">', $prefix_regexed);
                    return $rank . '</span>';
                } elseif(strstr($prefix_regexed, '§c')) {
                    $rank = str_replace('§c', '<span class="mc_color_redred">', $prefix_regexed);
                    return $rank . '</span>';
                } elseif(strstr($prefix_regexed, '§6')) {
                        $rank =str_replace('§6', '<span class="mc_color_orange">', $prefix_regexed);
                        return $rank . '</span>';
                } elseif(strstr($prefix_regexed, '§e')) {
                    $rank = str_replace('§e', '<span class="mc_color_yellow">', $prefix_regexed);
                    return $rank . '</span>';
                } elseif(strstr($prefix_regexed, '§2')) {
                    $rank =  str_replace('§2', '<span class="mc_color_greengreen">', $prefix_regexed);
                    return $rank . '</span>';
                } elseif(strstr($prefix_regexed, '§a')) {
                    $rank =  str_replace('§a', '<span class="mc_color_green">', $prefix_regexed);
                    return $rank . '</span>';
                } elseif(strstr($prefix_regexed, '§b')) {
                    $rank = str_replace('§b', '<span class="mc_color_cyan">', $prefix_regexed);
                    return $rank . '</span>';
                } elseif(strstr($prefix_regexed, '§3')) {
                        $rank = str_replace('§3', '<span class="mc_color_blue">', $prefix_regexed);
                        return $rank . '</span>';
                } elseif(strstr($prefix_regexed, '§1')) {
                        $rank = str_replace('§1', '<span class="mc_color_blueblue">', $prefix_regexed);
                        return $rank . '</span>';
                } elseif(strstr($prefix_regexed, '§9')) {
                        $rank = str_replace('§9', '<span class="mc_color_blueblueblue">', $prefix_regexed);
                        return $rank . '</span>';
                } elseif(strstr($prefix_regexed, '§d')) {
                        $rank = str_replace('§d', '<span class="mc_color_pink">', $prefix_regexed);
                        return $rank . '</span>';
                } elseif(strstr($prefix_regexed, '§5')) {
                        $rank =str_replace('§5', '<span class="mc_color_purple">', $prefix_regexed);
                        return $rank . '</span>';
                } elseif(strstr($prefix_regexed, '§f')) {
                        $rank =str_replace('§f', '<span class="mc_color_white">', $prefix_regexed);
                        return $rank . '</span>';
                } elseif(strstr($prefix_regexed, '§7')) {
                    $rank = str_replace('§7', '<span class="mc_color_gray">', $prefix_regexed);
                    return $rank . '</span>';
                } elseif(strstr($prefix_regexed, '§8')) {
                        $rank =str_replace('§8', '<span class="mc_color_graygray">', $prefix_regexed);
                        return $rank . '</span>';
                } elseif(strstr($prefix_regexed, '§0')) {
                        $rank = str_replace('§0', '<span class="mc_color_black">', $prefix_regexed);
                        return $rank . '</span>';
                }
            }
        }

        //convertisser
        public function utf8_converter($array) {
            array_walk_recursive($array, function (&$item, $key) {
                if (!mb_detect_encoding($item, 'utf-8', true)) {
                    $item = utf8_encode($item);
                }
            });
            return $array;
        }

    }
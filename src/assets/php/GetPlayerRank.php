<?php

    $pseudo = $_GET['pseudo'];
    include '../php/BDD.php';
    $req = $db->prepare("SELECT * FROM profils WHERE pseudo = :pseudo LIMIT 1");
    $req->execute(array(':pseudo' => $pseudo));
    $profil = $req->fetchAll();

    echo getPlayerRank($profil);

    function getPlayerRank($profil) {
        $prefix = $profil[0]['prefix'];
        if (preg_match('/^§5§[a-z|0-9]/', $prefix)) {
            $prefix_regexed = preg_replace('/^§5/', '', $prefix);
            if (preg_match('/§[a-z|0-9]$/', $prefix_regexed)) {
                $prefix_regexed = preg_replace('/§[a-z|0-9]$/', '', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§4')) {
                $prefix_regexed = str_replace('§4', '</span><span class="mc_color_red autocomplete">', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§c')) {
                $prefix_regexed = str_replace('§c', '</span><span class="mc_color_redred autocomplete">', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§6')) {
                $prefix_regexed = str_replace('§6', '</span><span class="mc_color_orange autocomplete">', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§e')) {
                $prefix_regexed = str_replace('§e', '</span><span class="mc_color_yellow autocomplete">', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§2')) {
                $prefix_regexed = str_replace('§2', '</span><span class="mc_color_greengreen autocomplete">', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§a')) {
                $prefix_regexed = str_replace('§a', '</span><span class="mc_color_green autocomplete">', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§b')) {
                $prefix_regexed = str_replace('§b', '</span><span class="mc_color_cyan autocomplete">', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§3')) {
                $prefix_regexed = str_replace('§3', '</span><span class="mc_color_blue autocomplete">', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§1')) {
                $prefix_regexed = str_replace('§1', '</span><span class="mc_color_blueblue autocomplete">', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§9')) {
                $prefix_regexed = str_replace('§9', '</span><span class="mc_color_blueblueblue autocomplete">', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§d')) {
                $prefix_regexed = str_replace('§d', '</span><span class="mc_color_pink autocomplete">', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§5')) {
                $prefix_regexed = str_replace('§5', '</span><span class="mc_color_purple autocomplete">', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§f')) {
                $prefix_regexed = str_replace('§f', '</span><span class="mc_color_white autocomplete">', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§7')) {
                $prefix_regexed = str_replace('§7', '</span><span class="mc_color_gray autocomplete">', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§8')) {
                $prefix_regexed = str_replace('§8', '</span><span class="mc_color_graygray autocomplete">', $prefix_regexed);
            }
            if (strstr($prefix_regexed, '§0')) {
                $prefix_regexed = str_replace('§0', '</span><span class="mc_color_blackautocomplete">', $prefix_regexed);
            }
            $rankrank = $prefix_regexed . '</span>';
            return $rankrank;
        } else if (preg_match('/^§[a-z|0-9]§[a-z|0-9]/', $prefix)) {
            $prefix_regexed = preg_replace('/^§[a-z|0-9]/', '', $prefix);
            if (strstr($prefix_regexed, '§4')) {
                $rank = str_replace('§4', '<span class="mc_color_red autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            } elseif (strstr($prefix_regexed, '§c')) {
                $rank = str_replace('§c', '<span class="mc_color_redred autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            } elseif (strstr($prefix_regexed, '§6')) {
                $rank = str_replace('§6', '<span class="mc_color_orange autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            } elseif (strstr($prefix_regexed, '§e')) {
                $rank = str_replace('§e', '<span class="mc_color_yellow autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            } elseif (strstr($prefix_regexed, '§2')) {
                $rank = str_replace('§2', '<span class="mc_color_greengreen autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            } elseif (strstr($prefix_regexed, '§a')) {
                $rank = str_replace('§a', '<span class="mc_color_green autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            } elseif (strstr($prefix_regexed, '§b')) {
                $rank = str_replace('§b', '<span class="mc_color_cyan autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            } elseif (strstr($prefix_regexed, '§3')) {
                $rank = str_replace('§3', '<span class="mc_color_blue autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            } elseif (strstr($prefix_regexed, '§1')) {
                $rank = str_replace('§1', '<span class="mc_color_blueblue autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            } elseif (strstr($prefix_regexed, '§9')) {
                $rank = str_replace('§9', '<span class="mc_color_blueblueblue autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            } elseif (strstr($prefix_regexed, '§d')) {
                $rank = str_replace('§d', '<span class="mc_color_pink autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            } elseif (strstr($prefix_regexed, '§5')) {
                $rank = str_replace('§5', '<span class="mc_color_purple autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            } elseif (strstr($prefix_regexed, '§f')) {
                $rank = str_replace('§f', '<span class="mc_color_white autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            } elseif (strstr($prefix_regexed, '§7')) {
                $rank = str_replace('§7', '<span class="mc_color_gray autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            } elseif (strstr($prefix_regexed, '§8')) {
                $rank = str_replace('§8', '<span class="mc_color_graygray autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            } elseif (strstr($prefix_regexed, '§0')) {
                $rank = str_replace('§0', '<span class="mc_color_black autocomplete">', $prefix_regexed);
                return $rank . '</span>';
            }
        }
    }

    function utf8_converter($array) {
        array_walk_recursive($array, function (&$item, $key) {
            if (!mb_detect_encoding($item, 'utf-8', true)) {
                $item = utf8_encode($item);
            }
        });
        return $array;
    }
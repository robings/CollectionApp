<?php

/**
 * get the collection data from the db
 *
 * @param $db - the database connection
 *
 * @return array - the data from the database in a assoc array
 */
function getAllTrains(PDO $db): array {
    $query = $db->prepare('SELECT `id`, `series`, `introducedYr`, `topSpeedKmh`, `topSpeedMph`, `withdrawn`, `withdrawnYr`, `imgUrl` FROM `shinkansens`;');
    $query->execute();
    return $query->fetchAll();
}

/**
 * function to build the display box for a collection item
 *
 * @param array $shinkansen - array for one row
 *
 * @return string - the html to display
 */
function displayTrains(array $shinkansens): string {
        $trains = '';
    foreach($shinkansens as $shinkansen) {
        if (!array_key_exists('series', $shinkansen) || (!array_key_exists('imgUrl', $shinkansen)) || (!array_key_exists('introducedYr', $shinkansen))) {
            return 'error! missing expected array key(s): function collectionBox';
        } elseif (!array_key_exists('topSpeedKmh', $shinkansen) || (!array_key_exists('topSpeedMph', $shinkansen)) || (!array_key_exists('withdrawn', $shinkansen))) {
            return 'error! missing expected array key(s): function collectionBox';
        } elseif (!array_key_exists('withdrawnYr', $shinkansen)) {
            return 'error! missing expected array key(s): function collectionBox';
        }
        $shinkansenBox = '<article><div class=\'item\'>';
        $shinkansenBox .= '<h2>Series ' . $shinkansen['series'] . '</h2>';
        $shinkansenBox .= '<img src=\'' . $shinkansen['imgUrl'] . '\' alt=\'Series ' . $shinkansen['series'] . ' Bullet Train\' />';
        $shinkansenBox .= '<ul>';
        $shinkansenBox .= '<li><span>Introduced:</span> ' . $shinkansen['introducedYr'] . '</li>';
        $shinkansenBox .= '<li><span>Top speed:</span> ' . $shinkansen['topSpeedKmh'] . 'km/h (' . $shinkansen['topSpeedMph'] . 'mph)</li>';
        $shinkansenBox .= '<li><span>Withdrawn:</span> ' . ($shinkansen['withdrawn'] == 1 ? $shinkansen['withdrawnYr'] : 'still in service') . '</li>';
        $shinkansenBox .= '</ul></div></article>';
        $trains .= $shinkansenBox;
    }
    return $trains;
}

function validateStringOnlyAlphaNumeric(string $string): bool {
    if (preg_match('/^[a-zA-Z0-9]*$/', $string)) {
        return true;
    }
    return false;
}

function validateSpeed(int $speed): bool {
    if (preg_match('/^\d{1,3}$/', $speed)) {
        return true;
    }
    return false;
}

function validateYear(int $year): bool {
    if (preg_match('/^[0-9]{4}$/', $year)) {
        return true;
    }
    return false;
}

function validateUrl(string $url): bool {
    if (file_exists($url)) {
        return true;
    }
    return false;
}

function addTraintoDb($shinkansen) {
    //bind params, then insert into db
}
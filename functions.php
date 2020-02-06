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

/**
 * function to sanitise and validate a string you want to be only alphanumeric
 *
 * @param $string - the string to sanitise
 *
 * @return string - the trimmed string, or 'error'
 */
function validateStringOnlyAlphaNumeric($string): string {
    trim($string);
    if (!(strlen($string) >0 && strlen($string) <20)) {
        return 'error';
    } elseif (preg_match('/^[a-zA-Z0-9]*$/', $string)) {
        return $string;
    }
    return 'error';
}

/**
 * function to validate speed fields - checks if a 1-3 digit integer has been entered
 *
 * @param $speed - the speed entered
 *
 * @return int - trimmed speed, or -1 to indicate error
 */
function validateSpeed($speed): int {
    trim($speed);
    if (preg_match('/^\d{1,3}$/', $speed)) {
        return $speed;
    }
    return -1;
}

/**
 * function to validate year fields - checks if a 4 digit integer has been entered
 *
 * @param $year - the year as entered
 *
 * @return int - the trimmed year or -1 to indicate error
 */
function validateYear($year): int {
    trim($year);
    if (preg_match('/^\d{4}$/', $year)) {
        return $year;
    }
    return -1;
}

/**
 * function to validate a url, using Filter_Sanitize_Url
 *
 * @param $url - the url as entered
 *
 * @return string - the trimmed url, or 'error'
 */
function validateUrl($url): string {
    trim($url);
    if ((strpos($url,'`') !== false) || (strpos($url, '&') !== false) || (strpos($url, '$') !== false)) {
        return 'error';
    } elseif (filter_var($url, FILTER_SANITIZE_URL) == false) {
        return 'error';
    } elseif (file_exists($url)) {
        return $url;
    }
    return 'error';
}

function addTraintoDb($shinkansen) {
    //bind params, then insert into db
}
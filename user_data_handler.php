<?php
function updateUserFile($userId, $happiness, $hunger, $energy) {
    $filename = 'user_data.txt'; // File in the same directory
    $userExists = false;

    if (file_exists($filename)) {
        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            $parts = explode(",", $line);
            if ($parts[0] == $userId) {
                $tempLines[] = "$userId,$happiness,$hunger,$energy";
                $userExists = true;
            } else {
                $tempLines[] = $line;
            }
        }
    }

    if (!$userExists) {
        $tempLines[] = "$userId,$happiness,$hunger,$energy";
    }

    file_put_contents($filename, implode("\n", $tempLines));
}

function getUserData($userId) {
    $filename = 'user_data.txt';

    if (file_exists($filename)) {
        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            $parts = explode(",", $line);
            if ($parts[0] == $userId) {
                return [
                    'happiness' => intval($parts[1]),
                    'hunger' => intval($parts[2]),
                    'energy' => intval($parts[3])
                ];
            }
        }
    }

    return null; //incase no user match
}
?>
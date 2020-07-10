<?php

download();

function download(): void
{
    if (!isset($_GET['file'])) {
        exit;
    }

    $json = json_decode(file_get_contents('downloads.txt'), true);
    $fileName = $_GET['file'];

    if (file_exists($fileName) && strpos($fileName, '/') === false) {
        $json[$fileName] = $json[$fileName] == null ? 1 : ++$json[$_GET['file']];
        @file_put_contents('downloads.txt', json_encode($json, JSON_PRETTY_PRINT));
        header('Location: ' . $fileName);
        exit;
    }
}

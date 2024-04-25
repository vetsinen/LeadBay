<?php
function parseEnv($filePath) {
    $content = file_get_contents($filePath);

    if ($content === false) {
        throw new Exception("Failed to read the .env file");
    }

    $lines = explode("\n", $content);
    $env = [];

    foreach ($lines as $line) {
        $line = trim($line);

        if ($line && strpos($line, '#') !== 0) {
            list($key, $value) = explode('=', $line, 2);
            $env[$key] = $value;
        }
    }

    return $env;
}

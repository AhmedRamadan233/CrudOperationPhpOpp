
<?php
class FileProcessor {
    public static function processFileName($filePath) {
        // Use the basename function to extract the file name from the file path.
        $fileName = basename($filePath);

        // Remove characters after the dot (file extension)
        $fileName = preg_replace('/\..*/', '', $fileName);

        // Replace underscores and hyphens with spaces
        $fileName = str_replace(['_', '-'], ' ', $fileName);

        // If the file name is 'index', change it to 'home'
        if ($fileName === 'index') {
            $fileName = 'home';
        }

        // Capitalize the first letter of each word
        $fileName = ucwords($fileName);

        // Return the modified file name.
        return $fileName;
    }

    public static function fileNameFromUrl() {
        // Get the protocol (http or https)
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        // Get the host (domain)
        $host = $_SERVER['HTTP_HOST'];

        // Get the current URL path
        $uri = $_SERVER['REQUEST_URI'];
        // Combine the components to form the complete URL
        $currentUrl = $protocol . '://' . $host . $uri;

        if (strpos($uri, '.php') !== false) {
            $uri = preg_replace('/\.php.*$/', '.php', $uri);
        }
        // Call the processFileName method to process the file name from the URL
        $fileNameFromUrl = self::processFileName($uri);

        return $fileNameFromUrl;
    }
}

?>

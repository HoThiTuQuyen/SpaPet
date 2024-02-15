<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'petshome';

// Define the full path to mysqldump
$mysqldumpPath = 'C:/xampp/mysql/bin/mysqldump';

// Specify the backup file path with the current date
$dateSuffix = date('Ymd_His');
$backupFile = dirname(__FILE__) . '/table-' . $database . '_' . $dateSuffix . '.sql';

// Build and execute the mysqldump command
$command = "{$mysqldumpPath} --user={$username} --password={$password} --host={$host} {$database} --result-file={$backupFile} 2>&1";
exec($command, $output);

// Check for errors
if (empty($output)) {
    echo 'Backup completed successfully.';

    // Set the retention period in days
    $retentionPeriod = 7;

    // Delete old backup files
    deleteOldBackups(dirname(__FILE__), $database, $retentionPeriod);
} else {
    echo 'Backup failed. Check error messages: <pre>' . implode("\n", $output) . '</pre>';
}

/**
 * Delete old backup files based on the retention period.
 *
 * @param string $directory
 * @param string $database
 * @param int $retentionDays
 */
function deleteOldBackups($directory, $database, $retentionDays)
{
    $pattern = '/table-' . $database . '_\d{8}_\d{6}\.sql/';
    $files = glob($directory . '/' . $pattern);

    foreach ($files as $file) {
        $fileCreationTime = filectime($file);
        $currentTime = time();
        $fileAgeDays = floor(($currentTime - $fileCreationTime) / (60 * 60 * 24));

        if ($fileAgeDays >= $retentionDays) {
            unlink($file);
            echo "Deleted old backup file: $file\n";
        }
    }
}
?>
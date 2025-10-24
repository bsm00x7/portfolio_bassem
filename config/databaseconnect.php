<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "port_db_";
$conn = null;
try {
    // Establish database connection
    $conn = mysqli_connect(
        $db_server,
        $db_user,
        $db_pass,
        $db_name
    );

    // Set charset to UTF-8 for proper character handling
    mysqli_set_charset($conn, "utf8mb4");
} catch (mysqli_sql_exception $e) {
    // Log error securely (don't expose to users)
    error_log("Database Connection Error: " . $e->getMessage());

    // Display user-friendly error message
    die("
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Database Error</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                }
                .error-container {
                    background: white;
                    padding: 40px;
                    border-radius: 10px;
                    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
                    text-align: center;
                    max-width: 500px;
                }
                h1 { color: #e53e3e; margin-bottom: 20px; }
                p { color: #4a5568; line-height: 1.6; }
                .error-code { 
                    font-size: 80px; 
                    font-weight: bold; 
                    color: #e53e3e;
                    margin: 0;
                }
            </style>
        </head>
        <body>
            <div class='error-container'>
                <p class='error-code'>⚠️</p>
                <h1>Database Connection Failed</h1>
                <p>We're experiencing technical difficulties. Please try again later.</p>
                <p style='font-size: 12px; color: #a0aec0; margin-top: 20px;'>
                    If you're the administrator, check your server logs for details.
                </p>
            </div>
        </body>
        </html>
    ");
}

// Optional: Test connection function
function testConnection($conn)
{
    if ($conn) {
        return true;
    }
    return false;
}

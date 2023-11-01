<!DOCTYPE html>
<html>
<head>
    <title>Favourite Movies</title>
</head>
<body>
    <h1>Favourite Movies</h1>

    <?php
    // Load the XML file
    $xml = simplexml_load_file('movies.xml');

    if ($xml) {
        $count = 0; // To track when to start a new row
        foreach ($xml->Movie as $movie) {
            if ($count % 3 === 0) {
                // Start a new row
                if ($count > 0) {
                    echo '</tr>';
                }
                echo '<tr>';
            }

            // Display movie information in a table cell
            echo '<td>';
            echo '<h1>' . $movie->Title . ' (' . $movie->Year . ')</h1>';
            echo '<p>Director: ' . $movie->Director . '</p>';
            echo '<p>Main Actor/Actress: ' . $movie->MainActor . '</p>';
            echo '<p>Genre: ' . $movie->Genre . '</p>';
            echo '<img src="' . $movie->Picture . '" alt="' . $movie->Title . '">';
            echo '</td>';

            $count++;
        }
        echo '</tr>';
    } else {
        echo 'Failed to load XML file.';
    }
    ?>
</body>
</html>
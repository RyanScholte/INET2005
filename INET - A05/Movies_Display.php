<?php
/* Ryan Revels-Scholte
   November 06/23
   Movies_Display.php
*/
// Define the Movie class 
class Movie {
    private $title;
    private $picture;
    private $director;
    private $mainActor;
    private $imdb;
    private $year;
    private $genre;

    public function __construct($title, $picture, $director, $mainActor, $imdb, $year, $genre) {
        $this->title = $title;
        $this->picture = $picture;
        $this->director = $director;
        $this->mainActor = $mainActor;
        $this->imdb = $imdb;
        $this->year = $year;
        $this->genre = $genre;
    }

    // Getters
    public function getTitle() {
        return $this->title;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function getDirector() {
        return $this->director;
    }

    public function getMainActor() {
        return $this->mainActor;
    }

    public function getIMDB() {
        return $this->imdb;
    }

    public function getYear() {
        return $this->year;
    }

    public function getGenre() {
        return $this->genre;
    }

    // Display method to format movie data
    public function display() {
        echo '<div class="movie">';
        echo '<img src="' . $this->picture . '" alt="' . $this->title . '">';
        echo '<h2>' . $this->title . '</h2>';
        echo '<p><strong>Director:</strong> ' . $this->director . '</p>';
        echo '<p><strong>Main Actor:</strong> ' . $this->mainActor . '</p>';
        echo '<p><strong>IMDB:</strong> <a href="' . $this->imdb . '" target="_blank">Link</a></p>';
        echo '<p><strong>Year:</strong> ' . $this->year . '</p>';
        echo '<p><strong>Genre:</strong> ' . $this->genre . '</p>';
        echo '</div>';
    }
}


$doc = new DOMDocument();
$doc->load('movies.xml');

$moviesArray = array();

// Loop through the XML elements and create Movie instances
foreach ($doc->getElementsByTagName('Movie') as $movieElement) {
    $title = $movieElement->getElementsByTagName('Title')->item(0)->textContent;
    $picture = $movieElement->getElementsByTagName('Picture')->item(0)->textContent;
    $director = $movieElement->getElementsByTagName('Director')->item(0)->textContent;
    $mainActor = $movieElement->getElementsByTagName('MainActor')->item(0)->textContent;
    $imdb = $movieElement->getElementsByTagName('IMDB')->item(0)->textContent;
    $year = $movieElement->getElementsByTagName('Year')->item(0)->textContent;
    $genre = $movieElement->getElementsByTagName('Genre')->item(0)->textContent;

    $movie = new Movie($title, $picture, $director, $mainActor, $imdb, $year, $genre);
    $moviesArray[] = $movie;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Movie Data</title>
    <style>
        .movie {
            width: 30%;
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
            display: inline-block;
            vertical-align: top;
        }
        img {
            max-width: 100%;
        }
    </style>
</head>
<body>
    <h1>My Favorite Movies</h1>
    <?php
    // Display the movie data in an HTML table (3 movies per row)
    echo '<div class="movie-container">';
    foreach ($moviesArray as $index => $movie) {
        $movie->display();
        if (($index + 1) % 3 === 0) {
            echo '<div style="clear:both;"></div>';
        }
    }
    echo '</div>';
    ?>
</body>
</html>
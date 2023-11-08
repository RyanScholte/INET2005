<?php
/* Ryan Revels-Scholte
   November 06/23
   movies.php
*/
// Create an XML document
$doc = new DOMDocument('1.0');
$doc->formatOutput = true;

// Create the root element
$root = $doc->createElement('FavouriteMovies');
$doc->appendChild($root);

// Define an array of favorite movies
$movies = array(
    array(
        'Title' => 'Deadpool 2',
        'Picture' => 'https://media-cache.cinematerial.com/p/500x/hdbgefm3/deadpool-2-british-movie-cover.jpg?v=1527540432',
        'Director' => 'David Leitch',
        'MainActor' => 'Ryan Reynolds',
        'IMDB' => 'https://www.imdb.com/title/tt5463162/?ref_=tt_mv_close',
        'Year' => '2018',
        'Genre' => 'Action, Adventure, Comedy'
    ),
    array(
        'Title' => 'Barbie',
        'Picture' => 'https://img.seriebox.com/films/76/76850/affich_76850_1.jpg?id=982',
        'Director' => 'Greta Gerwig',
        'MainActor' => 'Margot Robbie',
        'IMDB' => 'https://www.imdb.com/title/tt1517268/',
        'Year' => '2023',
        'Genre' => 'Adventure, Comedy, Fantasy'
    ),
    array(
        'Title' => 'Kung-Fu Panda',
        'Picture' => 'https://th.bing.com/th/id/OIP.sRA7ea5X5Vc9yj4BObJwUAHaKi?pid=ImgDet&w=500&h=711&rs=1',
        'Director' => 'Mark Osborne',
        'MainActor' => 'Jack Black',
        'IMDB' => 'https://www.imdb.com/title/tt0441773/?ref_=nv_sr_srsg_0_tt_8_nm_0_q_Kung',
        'Year' => '2008',
        'Genre' => 'Animation, Action, Adventure'
    ),
    array(
        'Title' => 'Avatar',
        'Picture' => 'https://www.themoviedb.org/t/p/original/6EiRUJpuoeQPghrs3YNktfnqOVh.jpg',
        'Director' => 'James Cameron',
        'MainActor' => 'Sam Worthington',
        'IMDB' => 'https://www.imdb.com/title/tt0499549/?ref_=nv_sr_srsg_0_tt_8_nm_0_q_Avatar',
        'Year' => '2009',
        'Genre' => 'Action, Adventure, Fantasy'
    ),
    array(
        'Title' => 'Spider-Man: Across the Spider-Verse',
        'Picture' => 'https://th.bing.com/th?id=OIP.W11TUc-kmp8l-XnAFQ6AtwAAAA&w=135&h=201&c=10&rs=1&qlt=90&o=6&dpr=1.3&pid=13.1',
        'Director' => 'Joaquim Dos Santos',
        'MainActor' => 'Shameik Moore',
        'IMDB' => 'https://www.imdb.com/title/tt9362722/?ref_=nv_sr_srsg_2_tt_6_nm_0_q_Spi',
        'Year' => '2023',
        'Genre' => 'Animation, Action, Adventure'
    ),
    array(
        'Title' => 'South Park: Joining the Panderverse',
        'Picture' => 'https://www.imdb.com/title/tt29474455/mediaviewer/rm3481096193/?ref_=tt_ov_i',
        'Director' => 'Trey Parker',
        'MainActor' => 'Janeshia Adams-Ginyard',
        'IMDB' => 'https://www.imdb.com/title/tt29474455/?ref_=nv_sr_srsg_3_tt_8_nm_0_q_South%2520Parq',
        'Year' => '2023',
        'Genre' => 'Animation, Comedy'
    ),
    array(
        'Title' => 'Top Gun: Maverick',
        'Picture' => 'https://th.bing.com/th/id/OIP.r-YAPAdR03d_J-iXVXd-VwHaK-?w=186&h=276&c=7&r=0&o=5&dpr=1.3&pid=1.7',
        'Director' => 'Joseph Kosinski',
        'MainActor' => 'Tom Cruise',
        'IMDB' => 'https://www.imdb.com/title/tt1745960/?ref_=nv_sr_srsg_4_tt_7_nm_0_q_Top',
        'Year' => '2022',
        'Genre' => 'Action, Drama'
    ),
    array(
        'Title' => 'Saving Private Ryan',
        'Picture' => 'https://th.bing.com/th/id/OIP.kydTuP4g_KVlSbym8Y8UnwHaKf?w=186&h=263&c=7&r=0&o=5&dpr=1.3&pid=1.7',
        'Director' => 'Steven Spielberg',
        'MainActor' => 'Tom Hanks',
        'IMDB' => 'https://www.imdb.com/title/tt0120815/?ref_=nv_sr_srsg_0_tt_8_nm_0_q_Saving',
        'Year' => '1998',
        'Genre' => 'Drama, War'
    ),
    array(
        'Title' => 'Minions',
        'Picture' => 'https://th.bing.com/th/id/OIP.6EIpVIdYNBHkcMM-54osgAHaLH?w=115&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7',
        'Director' => 'Kyle Baldea',
        'MainActor' => 'Sandra Bullock',
        'IMDB' => 'https://www.imdb.com/title/tt2293640/?ref_=fn_al_tt_1',
        'Year' => '2015',
        'Genre' => 'Animation, Adventure, Comedy'
    ),
    array(
        'Title' => 'Minions: The Rise of Gru',
        'Picture' => 'https://th.bing.com/th/id/OIP.J0KiJ_jz6FN-8ptPKAUntgHaK1?w=136&h=200&c=7&r=0&o=5&dpr=1.3&pid=1.7',
        'Director' => 'Matthew Fogel',
        'MainActor' => 'Steve Carell',
        'IMDB' => 'https://www.imdb.com/title/tt5113044/?ref_=nv_sr_srsg_3_tt_7_nm_1_q_Minions',
        'Year' => '2022',
        'Genre' => 'Animation, Adventure, Comedy'
    )
);

// Loop through the movies array and create elements for each movie
foreach ($movies as $movie) {
    $movieElement = $doc->createElement('Movie');

    foreach ($movie as $key => $value) {
        $element = $doc->createElement($key);
        $element->appendChild($doc->createTextNode($value));
        $movieElement->appendChild($element);
    }

    $root->appendChild($movieElement);
}

// Save the XML to a file (fav_movies.xml)
$doc->save('movies.xml');

echo 'XML file created successfully.';
?>
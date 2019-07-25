<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    public function viewHomePage()
    {
    	return view('homepage');
    }

    public function listMovies(){

        $movies = DB::select('select m.*, group_concat(distinct g.genre_name order by g.genre_name desc separator ", ") as genres
                                from movie m
                                inner join genre_assign ga on m.movie_pk = ga.movie_fk
                                inner join genre g on ga.genre_fk = g.genre_pk
                                group by m.movie_pk;');

        return Response()-> json($movies);

    }


    public function searchMovies(Request $req){
        $search_txt = $req-> search_txt;
    	$movie_genre = $req-> movie_genre;
    	$movie_year = $req-> movie_year;

    	$movies = DB::select('select m.*, GROUP_CONCAT(DISTINCT g.genre_name ORDER BY g.genre_name DESC SEPARATOR ", ") AS genres_name,
                                GROUP_CONCAT(DISTINCT g.genre_pk ORDER BY g.genre_pk DESC SEPARATOR ", ") AS genres_pk
                                FROM movie m
                                INNER JOIN genre_assign ga ON m.movie_pk = ga.movie_fk
                                INNER JOIN genre g ON ga.genre_fk = g.genre_pk
                                WHERE g.genre_pk LIKE "'. $movie_genre .'"
                                AND m.year LIKE "'. $movie_year .'"
                                AND m.title LIKE "%'. $search_txt .'%"
                                GROUP BY m.movie_pk;');

    	return Response()-> json($movies);

    }

    public function viewMovieDetailPage(Request $req){
        $movie_pk = $req -> movie_pk;

        //$movie_detail = DB::table('movie')->where('movie_pk', $movie_pk)->first();

        $movie_detail = DB::select('select m.*, group_concat(distinct g.genre_name order by g.genre_name desc separator ", ") as genres
                                from movie m
                                inner join genre_assign ga on m.movie_pk = ga.movie_fk
                                inner join genre g on ga.genre_fk = g.genre_pk
                                where movie_pk ='. $movie_pk .';');

        return view ('moviedetail')->with('movie_detail', $movie_detail); 

    }

    public function addMovie(){
        $movie_name = Input::get("movieNameTxt");
        $movie_year = Input::get("yearTxt");
        $movie_synopsis = Input::get("synopsisTxt");

        if(Input::hasFile('image')){
            $file = Input::file('image');
            $file-> move('movieImageUpload', $file-> getClientOriginalName());
            $movie_image_name = $file -> getClientOriginalName();
        }

        DB::insert('insert into movie(title, YEAR, synopsis, image)
                    VALUES("'. $movie_name .'","'.  $movie_year . '","' . $movie_synopsis . '","'. $movie_image_name . '");');

        $movie_pk_array = DB::select('select LAST_INSERT_ID() as movie_pk;');

        $movie_pk = $movie_pk_array[0]->movie_pk;

        foreach($_POST['check_list'] as $checkbox_value){
            DB::insert('insert into genre_assign(movie_fk, genre_fk)
                        VALUES('. $movie_pk .','. $checkbox_value .')');
        }

        echo "<script>
        alert('Movie Added successfully!');
        window.location.href = '\homepage';
        </script>";
    }

    public function editMovie(){
        $movie_pk = Input::get('movie_pk');
        $movie_name = Input::get("movieNameTxt");
        $movie_year = Input::get("yearTxt");
        $movie_synopsis = Input::get("synopsisTxt");
        $movie_image_name = Input::get("img_name");

        if(Input::hasFile('image')){
            $file = Input::file('image');
            $file-> move('movieImageUpload', $file-> getClientOriginalName());
            $movie_image_name = $file -> getClientOriginalName();
        }

        DB::select('update movie 
                    set title = "'. $movie_name .'", year="'.  $movie_year . '", synopsis="' . $movie_synopsis . '", image="'. $movie_image_name . '" 
                    where movie_pk ='. $movie_pk .';');

        DB::delete('delete from genre_assign
                    where movie_fk = '. $movie_pk . ';');

        foreach($_POST['check_list'] as $checkbox_value){
            DB::insert('insert into genre_assign(movie_fk, genre_fk)
                        VALUES('. $movie_pk .','. $checkbox_value .')');
        }

        echo "<script>alert('Movie Edited successfully!');
        window.location.href= '/movieDetail?movie_pk=' +". $movie_pk ."
        </script>";
    }

    public function deleteMovie(){
        $movie_pk = Input::get("movie_pk");

        DB::delete('delete from movie
                    where movie_pk = '. $movie_pk . ';');

        echo "<script>alert('Movie Deleted!');
        window.location.href = '\homepage';
        </script>";
    }
}

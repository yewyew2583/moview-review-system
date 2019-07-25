<!DOCTYPE html>
<html>
<head>
    <title></title>
<style type="text/css">
.hoverable-card:hover{
    box-shadow: 2px 2px 2px 4px #cccccc;
    cursor:pointer;
}

.hoverable-card{
    height:400px;
}

.card{
    height:300px;
}

.card-img{
    width:100%;
    height:100%;
}

.loader {
    margin:auto;
    margin-top:150px;
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
</head>

@include('app')
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                 <input type="text" class="form-control" id="searchTxt" name="searchTxt" placeholder="Enter Movie Name">
            </div>
            <div class="col-md-2">
                <select class="btn btn-default genre-select" id="genreTxt" style="width:100%;">
                  <option value="%%" selected="selected">any(Filter By Genre)</option>
                  <option value="1">action</option>
                  <option value="2">comedy</option>
                  <option value="3">adventure</option>
                  <option value="4">crime</option>
                  <option value="5">drama</option>
                  <option value="6">Fantasy</option>
                  <option value="7">historical</option>
                  <option value="8">horror</option>
                  <option value="9">mystery</option>
                  <option value="10">political</option>
                  <option value="11">biography</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="btn btn-default" id="yearTxt" style="width:100%;">
                    <option value="%%" selected="selected">any(Filter By Year)</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-primary" onclick="search()"><span class="glyphicon glyphicon-search"></span> Search Movie</button>
            </div>
            <div class="col-md-2 pull-right">
                <button type="button" class="btn btn-success pull-right" style="display:none;" id="btn-add-movie" data-toggle="modal" data-target="#addMovieModal"><span class="glyphicon glyphicon-plus"></span> Add Movie</button>
            </div>
        </div><br><br>
        <div class="row" id="row-to-append-movie">
            <!--<div class="col-md-3 hoverable-card" onclick="movieDetail(1)">
                <div class="card text-white bg-secondary mb-3">
                  <img class="card-img-top card-img" src="https://img00.deviantart.net/364f/i/2014/044/f/c/amazing_spider_man_3_wallpaper_by_webhead9707-d76cglu.png">
                  <div class="card-body">
                    <p class="card-text">
                        <p>Spiderman 3</p>
                        <p>Review: 
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </p>
                        <p>Genre: Comedy</p>
                    </p>
                  </div>
                </div>
            </div>-->
        </div>
        <div class="loader" id="preloader"></div>
            <!-- Modal -->
              <div class="modal fade" id="addMovieModal" role="">
                <div class="modal-dialog">
                <form action="{{ url('addMovie') }}" method="post" enctype="multipart/form-data">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" style="font-size:2.5em;">&times;</button>
                      <h4 class="modal-title">Add Movie</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                    <label for="image">Select Movie Image to Upload:<label id="required-label-img-name" class="text-danger required-label">*Please Upload Image of Movie!</label></label>
                                    <input type="file" class="btn btn-default image-file" name="image" id="image">
                                    <br>
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </div>
                            <div class="col-md-12"><hr></div>
                            <div class="col-md-8">
                                <label for="movieNameTxt">Movie Name:<label id="required-label-movie-name" class="text-danger required-label">*Please Enter name of Movie!</label></label>
                                <input type="text" class="form-control" name="movieNameTxt" id="movieNameTxt">
                            </div>
                            <div class="col-md-4">
                                <label for="yearTxt">Year Released:</label>
                                <select class="btn btn-default" id="yearTxt" name="yearTxt" class="form-control">
                                    <option>2000</option>
                                    <option>2001</option>
                                    <option>2002</option>
                                    <option>2003</option>
                                    <option>2004</option>
                                    <option>2005</option>
                                    <option>2006</option>
                                    <option>2007</option>
                                    <option>2008</option>
                                    <option>2009</option>
                                    <option>2010</option>
                                    <option>2011</option>
                                    <option>2012</option>
                                    <option>2013</option>
                                    <option>2014</option>
                                    <option>2015</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <p><b>Select Genre: <label id="required-label-genre" class="text-danger required-label">*Please select at least 2 genres</label></b></p>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="check_list[]" value="1" class="filled-in form-check-input checkboxes" id="checkbox1">
                                    <label class="form-check-label" for="checkbox1">Action</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="check_list[]" value="2" class="filled-in form-check-input checkboxes" id="checkbox2">
                                    <label class="form-check-label" for="checkbox2">Comedy</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="check_list[]" value="3" class="filled-in form-check-input checkboxes" id="checkbox3">
                                    <label class="form-check-label" for="checkbox3">Adventure</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="check_list[]" value="4" class="filled-in form-check-input checkboxes" id="checkbox4">
                                    <label class="form-check-label" for="checkbox4">Crime</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="check_list[]" value="5" class="filled-in form-check-input checkboxes" id="checkbox5">
                                    <label class="form-check-label" for="checkbox5">Drama</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="check_list[]" value="6" class="filled-in form-check-input checkboxes" id="checkbox6">
                                    <label class="form-check-label" for="checkbox6">Fantasy</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="check_list[]" value="7" class="filled-in form-check-input checkboxes" id="checkbox7">
                                    <label class="form-check-label" for="checkbox7">Historical</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="check_list[]" value="8" class="filled-in form-check-input checkboxes" id="checkbox8">
                                    <label class="form-check-label" for="checkbox8">Horror</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="check_list[]" value="9" class="filled-in form-check-input checkboxes" id="checkbox9">
                                    <label class="form-check-label" for="checkbox9">Mystery</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="check_list[]" value="10" class="filled-in form-check-input checkboxes" id="checkbox10">
                                    <label class="form-check-label" for="checkbox10">Political</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="check_list[]" value="11" class="filled-in form-check-input checkboxes" id="checkbox11">
                                    <label class="form-check-label" for="checkbox11">Biography</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="synopsisTxt">Synopsis:<label id="required-label-synopsis" class="text-danger required-label">*Please Enter synopsis of this movie!</label></label>
                                <textarea type="text" class="form-control" name="synopsisTxt" id="synopsisTxt" style="resize:none;height:200px"></textarea> 
                            </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary" name="submit" id="btn-confirm-add-movie">Add Movie</button>
                      <input type="submit" id="click-add-movie" style="display:none;">
                    </div>
                  </div>
                </div>
            </form>
            </div>
        </div>
        <!--add Movie modal ends-->
</body>
</html>
<script type="text/javascript">
var $member_type = sessionStorage.getItem('member_type');

if($member_type == "ADMIN"){
    $("#btn-add-movie").show();
}

$(document).ready(function(){
    //initialize the modal form to be clicked later
    $('#preloader').hide();
    $('.required-label').hide();
    $('.dropdown-toggle').dropdown();
    $.ajax({
        url: "{{ url('listMovies')}}",
        success:function(result){
            console.log(result);
            var $movies = result;

            for(var i=0;i<$movies.length;i++){

                var $p_movie_name = document.createElement('p');
                var $p_review = document.createElement('p');
                var $p_genre = document.createElement('p');

                var $p_card_text = document.createElement('p');

                var $div_card_body = document.createElement('div');
                var $img_card = document.createElement('img');

                var $div_card = document.createElement('div');

                var $col_card = document.createElement('div');

                $p_card_text.className = 'card-text';
                $div_card_body.className = 'card-body';
                $img_card.className = 'card-img-top card-img';
                $div_card.className = 'card text-white bg-secondary mb-3';
                $col_card.className = 'col-md-3 hoverable-card';

                $p_movie_name.innerHTML = $movies[i].title;
                $p_review.innerHTML = 'Review: ';
                for(var j=0;j<$movies[i].rating;j++){
                    var star = document.createElement('span');
                    star.className = 'glyphicon glyphicon-star';
                    $p_review.appendChild(star);
                }
                $p_genre.innerHTML = 'Genre: ' + $movies[i].genres;
                $img_card.src = 'movieImageUpload/' + $movies[i].image;

                $col_card.setAttribute("onclick", "movieDetail(" + $movies[i].movie_pk + ")");

                $p_card_text.appendChild($p_movie_name);
                $p_card_text.appendChild($p_review);
                $p_card_text.appendChild($p_genre);

                $div_card_body.appendChild($p_card_text);

                $div_card.appendChild($img_card);
                $div_card.appendChild($div_card_body);

                $col_card.appendChild($div_card);

                $row_to_append_movie = document.getElementById('row-to-append-movie');
                $row_to_append_movie.appendChild($col_card);
            }


        },
        fail:function(result){
            alert("server error");
        }
    });


    $("#btn-confirm-add-movie").on('click',function(){
        if(validateForm()){
            addMovieConfirm();
        }else{
            return false;
        }
    });
});

function addMovieConfirm(){
    if(confirm("Add Movie?")){
        $("#click-add-movie").click();
    }else{
        return false;
    }
}

function movieDetail(pk){
    sessionStorage.setItem('movie_pk', pk);
    window.location.href="/movieDetail?movie_pk=" + pk;
}

function search(){
    document.getElementById('row-to-append-movie').innerHTML = "";
    $('#preloader').show();
    var search_txt = document.getElementById('searchTxt').value;
    if(search_txt == "" || search_txt==null){
        search_txt = "%%";
    }

    $.ajax({
        url: "{{url('searchMovies')}}",
        data:{
            search_txt: search_txt,
            movie_genre: $("#genreTxt").val(),
            movie_year: $("#yearTxt").val()
        },
        success:function(result){
            $('#preloader').hide();
            var $movies = result;
            
            for(var i=0;i<$movies.length;i++){

                var $p_movie_name = document.createElement('p');
                var $p_review = document.createElement('p');
                var $p_genre = document.createElement('p');

                var $p_card_text = document.createElement('p');

                var $div_card_body = document.createElement('div');
                var $img_card = document.createElement('img');

                var $div_card = document.createElement('div');

                var $col_card = document.createElement('div');

                $p_card_text.className = 'card-text';
                $div_card_body.className = 'card-body';
                $img_card.className = 'card-img-top card-img';
                $div_card.className = 'card text-white bg-secondary mb-3';
                $col_card.className = 'col-md-3 hoverable-card';

                $p_movie_name.innerHTML = $movies[i].title;
                $p_review.innerHTML = 'Review: ';
                for(var j=0;j<$movies[i].rating;j++){
                    var star = document.createElement('span');
                    star.className = 'glyphicon glyphicon-star';
                    $p_review.appendChild(star);
                }
                $p_genre.innerHTML = 'Genre: ' + $movies[i].genres;
                $img_card.src = 'movieImageUpload/' + $movies[i].image;

                $col_card.setAttribute("onclick", "movieDetail(" + $movies[i].movie_pk + ")");

                $p_card_text.appendChild($p_movie_name);
                $p_card_text.appendChild($p_review);
                $p_card_text.appendChild($p_genre);

                $div_card_body.appendChild($p_card_text);

                $div_card.appendChild($img_card);
                $div_card.appendChild($div_card_body);

                $col_card.appendChild($div_card);

                $row_to_append_movie = document.getElementById('row-to-append-movie');
                $row_to_append_movie.appendChild($col_card);
            }
        }
    });
}


/************** Validating Add Movie Form!!!! *************************/
function validateForm(){
  var $img_name = document.getElementById("image").value;
  var $movie_name = document.getElementById("movieNameTxt").value;
  var $synopsis = document.getElementById("synopsisTxt").value;
  var checkboxes = document.getElementsByClassName("checkboxes");
  var checkboxes_checked =0;

  var bool_img_name, bool_movie_name, bool_synopsis, bool_select_genre;
  var total_bool_valid = 0;

  for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkboxes_checked++;
        }
   }

  if($img_name != null && $img_name != ''){
    bool_img_name = 1;
    document.getElementById("required-label-img-name").style.display = "none";
  }
  else{
    bool_img_name = 0;
    document.getElementById("required-label-img-name").style.display = "block";
  }

  if($movie_name != null && $movie_name != ''){
    bool_movie_name = 1;
    document.getElementById("required-label-movie-name").style.display = "none";
  }
  else{
    bool_movie_name = 0;
    document.getElementById("required-label-movie-name").style.display = "block";
  }

  if($synopsis != null && $synopsis != ''){
    bool_synopsis = 1;
    document.getElementById("required-label-synopsis").style.display = "none";
  }
  else{
    bool_synopsis = 0;
    document.getElementById("required-label-synopsis").style.display = "block";
  }

  if(checkboxes_checked > 1){
    bool_select_genre = 1;
    document.getElementById("required-label-genre").style.display = "none";
  }
  else{
    bool_select_genre = 0;
    document.getElementById("required-label-genre").style.display = "block";
  }

  total_bool_valid = bool_img_name + bool_movie_name + bool_synopsis + bool_select_genre;
  if(total_bool_valid == 4){
    return true;
  }
}
/************** Validating Add Movie Form ends!!!! *************************/
</script>

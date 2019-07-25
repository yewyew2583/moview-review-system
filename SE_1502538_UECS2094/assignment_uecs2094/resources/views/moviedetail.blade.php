<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
@include('app')
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<button  class="btn btn-primary" id="editBtn" data-toggle="modal" data-target="#editMovieModal" style="display:none;"><span class="glyphicon glyphicon-edit"></span> Edit</button>
				<button  class="btn btn-danger" id="deleteBtn" data-toggle="modal" data-target="#deleteMovieModal" style="display:none;"><span class="glyphicon glyphicon-remove"></span> Delete</button>
			</div>
	   	</div>
	   	<br><br>
			<div class="card">
				<div class="row">
					<div class="col-md-4">
						<div class="card-img" style="width:350px;height:350px;">
					    	<img class="card-img-top card-img" style="width:100%;height:100%;" src="movieImageUpload/{{ $movie_detail[0]-> image}}">
						</div>
					 </div>
					<div class="col-md-8">
						<div class="card-block">
							<h3 class="card-title"><b>{{ $movie_detail[0]->title }}</b></h4>
							<p><b>Synopsis:</b></p>
							<p class="card-text">{{ $movie_detail[0]->synopsis }}</p>
							<p><b>Genre: </b>{{ $movie_detail[0]->genres }}</p>
							<p><b>Year released: </b>{{ $movie_detail[0]->year }}</p>
							<p>
								<b>Reviews: </b>
								<b>{{ $movie_detail[0]->rating}}<span class="glyphicon glyphicon-star"></span></b>
							</p>
						</div>
					</div>
				</div>
			</div>
			   <!--edit modal-->
              <div class="modal fade" id="editMovieModal" role="">
                <div class="modal-dialog">
                <form action="{{ url('editMovie') }}" method="post" enctype="multipart/form-data">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" style="font-size:2.5em;">&times;</button>
                      <h4 class="modal-title">Edit Movie</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                  <img src='movieImageUpload/{{ $movie_detail[0]->image}}' style="height:100px;width:100px;"><br>
                                    <label for="image">Select Movie Image to Upload:</label>
                                    <input type="file" class="btn btn-default image-file" name="image" id="image">
                                    <input type="hidden" value="{{ $movie_detail[0]-> image}}" name="img_name" id="img_name">
                                    <br>
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </div>
                            <div class="col-md-12"><hr></div>
                            <div class="col-md-8">
                                <label for="movieNameTxt">Movie Name:<label id="required-label-movie-name" class="text-danger required-label">*Please Enter name of Movie!</label></label>
                                <input type="text" class="form-control" name="movieNameTxt" id="movieNameTxt" value="{{ $movie_detail[0]->title }}">
                            </div>
                            <div class="col-md-4">
                                <label for="yearTxt">Year Released:</label>
                                <select class="btn btn-default year-select-option" id="yearTxt" name="yearTxt" class="form-control" >
                                    <option value="2000" <?php if ($movie_detail[0]->year == "2000") echo "selected='selected'";?>>2000</option>
                                    <option value="2001" <?php if ($movie_detail[0]->year == "2001") echo "selected='selected'";?>>2001</option>
                                    <option value="2002" <?php if ($movie_detail[0]->year == "2002") echo "selected='selected'";?>>2002</option>
                                    <option value="2003" <?php if ($movie_detail[0]->year == "2003") echo "selected='selected'";?>>2003</option>
                                    <option value="2004" <?php if ($movie_detail[0]->year == "2004") echo "selected='selected'";?>>2004</option>
                                    <option value="2005" <?php if ($movie_detail[0]->year == "2005") echo "selected='selected'";?>>2005</option>
                                    <option value="2006" <?php if ($movie_detail[0]->year == "2006") echo "selected='selected'";?>>2006</option>
                                    <option value="2007" <?php if ($movie_detail[0]->year == "2007") echo "selected='selected'";?>>2007</option>
                                    <option value="2008" <?php if ($movie_detail[0]->year == "2008") echo "selected='selected'";?>>2008</option>
                                    <option value="2009" <?php if ($movie_detail[0]->year == "2009") echo "selected='selected'";?>>2009</option>
                                    <option value="2010" <?php if ($movie_detail[0]->year == "2010") echo "selected='selected'";?>>2010</option>
                                    <option value="2011" <?php if ($movie_detail[0]->year == "2011") echo "selected='selected'";?>>2011</option>
                                    <option value="2012" <?php if ($movie_detail[0]->year == "2012") echo "selected='selected'";?>>2012</option>
                                    <option value="2013" <?php if ($movie_detail[0]->year == "2013") echo "selected='selected'";?>>2013</option>
                                    <option value="2014" <?php if ($movie_detail[0]->year == "2014") echo "selected='selected'";?>>2014</option>
                                    <option value="2015" <?php if ($movie_detail[0]->year == "2015") echo "selected='selected'";?>>2015</option>
                                    <option value="2016" <?php if ($movie_detail[0]->year == "2016") echo "selected='selected'";?>>2016</option>
                                    <option value="2017" <?php if ($movie_detail[0]->year == "2017") echo "selected='selected'";?>>2017</option>
                                    <option value="2018" <?php if ($movie_detail[0]->year == "2018") echo "selected='selected'";?>>2018</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <p><b>Select Genre:<label id="required-label-genre" class="text-danger required-label">*Please select at least 2 genres</label></b></p>
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
                                <textarea type="text" class="form-control" name="synopsisTxt" id="synopsisTxt" style="resize:none;height:200px">{{ $movie_detail[0]->synopsis }}</textarea> 
                            </div>
                    </div>
                    <div class="modal-footer">
                      <input type="hidden" class="movie_pk" id="movie_pk_edit" name="movie_pk">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary" name="submit" id="btn-confirm-edit-movie">Save Changes</button>
                      <input type="submit" id="click-edit-movie" style="display:none;">
                    </div>
                  </div>
                </div>
            </form>
            </div>
        </div>
        <!--edit modal ends-->
        <!--delete modal-->
              <div class="modal fade" id="deleteMovieModal" role="">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" style="font-size:2.5em;">&times;</button>
                      <h4 class="modal-title">Delete Movie</h4>
                    </div>
                    <div class="modal-body">
                        <h3>Are you sure to delete this movie?</h3>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('deleteMovie') }}" method="POST">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-danger">Delete</button>
                          <input type="hidden" class="movie_pk" id="movie_pk_delete" name="movie_pk">
                          <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <!--delete modal ends-->
	</div><!--container-->
</body>
</html>
<script type="text/javascript">
var $member_type = sessionStorage.getItem('member_type');
var $movie_pk = sessionStorage.getItem('movie_pk');

document.getElementById('movie_pk_delete').value = $movie_pk;
document.getElementById('movie_pk_edit').value = $movie_pk;

if($member_type == "ADMIN"){
    $("#editBtn").show();
    $("#deleteBtn").show();
}

$(document).ready(function(){
  $('.required-label').hide();
  $("#btn-confirm-edit-movie").on('click',function(){
        editMovieConfirm();
    });
});

function editMovieConfirm(){
    if(validateForm()){
      if(confirm("Save Movie?")){
            $("#click-edit-movie").click();
      }else{
            return false;
      }
    }
}

/************** Validating Edit Movie Form!!!! *************************/
function validateForm(){
  var $img_name = document.getElementById("image").value;
  var $movie_name = document.getElementById("movieNameTxt").value;
  var $synopsis = document.getElementById("synopsisTxt").value;
  var checkboxes = document.getElementsByClassName("checkboxes");
  var checkboxes_checked =0;

  var bool_movie_name, bool_synopsis, bool_select_genre;
  var total_bool_valid = 0;

  for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkboxes_checked++;
        }
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

  total_bool_valid = bool_movie_name + bool_synopsis + bool_select_genre;
  if(total_bool_valid == 3){
    return true;
  }
}
/************** Validating Edit Movie Form ends!!!! *************************/
</script>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text],input[type=password], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<h1>Edit Form</h1>
<div class="container">
  <form method="post" action="<?=base_url('user/update/'.$user->id)?>">
    <div class="row">
      <div class="col-25">
        <label for="fname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="name" placeholder="Your Name.." value="<?=$user->name?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Email</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="email" placeholder="Your Email" value="<?=$user->email?>">
      </div>
    </div>
	<div class="row">
      <div class="col-25">
        <label for="password">Password</label>
      </div>
      <div class="col-75">
        <input type="password" id="password" name="password" placeholder="Your Password" value="<?=$user->password?>">
      </div>
    </div>
	<div class="row">
		<div class="col-25">
			<label for="category">Categories</label>
		</div>
		<div class="col-75" style="margin-top: 20px;">
			<input type="checkbox" name="categories[]" <?=in_array('Movies',$category_list)?'checked':''?> value="Movies">Movies
			<input type="checkbox" name="categories[]" <?=in_array('Books',$category_list)?'checked':''?> value="Books">Books
			<input type="checkbox" name="categories[]" <?=in_array('Internet',$category_list)?'checked':''?> value="Internet">Internet
			<input type="checkbox" name="categories[]" <?=in_array('Traveling',$category_list)?'checked':''?> value="Traveling">Traveling
		</div>
    </div>




    <div class="row">
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
</div>


</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/customer.png">
    <link rel="stylesheet" href="/css/style.css">
    <script type="text/javascript">
    function active(){
      var searchBar = document.getElementById('searchBar');
      if(searchBar.value == 'Search By Customer ID...'){
        searchBar.value = ''
        searchBar.placeholder = 'Search By Customer ID...'
      }
    }
    function inactive(){
      var searchBar = document.getElementById('searchBar');
      if(searchBar.value == 'Search By Customer ID...'){
        searchBar.value = 'Search By Customer ID...'
        searchBar.placeholder = ''
      }
    }
    </script>
    <title>Customer Records</title>
    <style>
        *{
            margin:0px;
            padding:0px;
        }
        body{
          background-color:white;
        }
        #searchBar{
border: 1px solid #000000;
font-size:16px;
border-right: none;
padding:10px;
outline:none;
width: 75%;
-webkit-border-top-left-radius: 10px ;
-webkit-border-bottom-left-radius: 10px ;
-moz-border-radius-topleft: 10px;
-moz-border-radius-bottomleft: 10px;
border-top-right-left: 10px;
border-bottom-right-left: 10px;
}
#searchBtn{
    border: 1px solid #000000;
    font-size:16px;
    padding:10px;
    width: 20%;
    background: #f1d829;
    font-weight: bold;
    cursor:pointer;
    outline: none;
    -webkit-border-top-right-radius: 10px ;
-webkit-border-bottom-right-radius: 10px ;
-moz-border-radius-topright: 10px;
-moz-border-radius-bottomright: 10px;
border-top-right-radius: 10px;
border-bottom-right-radius: 10px;
}
#searchBtn:hover{
  background: black;
  color: white;
}
 .btn
  {
    background-color:red;
    color:white;
    width:100%;
    font-size:200%;
    height:50px;
    float:right;

  }
  #editbtn
  {
    background-color:green;
    color:white;
    width:150px;
    font-size:20px;
    height:70px;
  }
  #editbtn1
  {
    background-color:blue;
    color:white;
    width:150px;
    font-size:20px;
    height:70px;
  }
        .container{
    background-color: black;
    color: #fff;
    height: 50px;
    font-size:50px;
    display:flex;
    text-align:center;
    justify-content:center;
    align-item:center;
}
select{
    background-color:red;
    color:white;
    width: 75%;
    font-size:200%;
    height:60px;
    float:left;
    justify-content:center;
    text-align:center;
    display:flex;
  }
  .btn1{
    background-color:red;
    color:white;
    width: 25%;
    font-size:300%;
    height:60px;
    float:left;
    justify-content:center;
    text-align:center;
    display:flex;
  }
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: center;
border:"2";
cellspacing:"7";
display:flex;
justify-content:center;
align-item:center;
}
th {
background-color: blue;
color: white;
colspan:"2";
align:center;
text-align:center;
}
.u{
  width: 40%;
  font-size:30px;
  height:50px;
  border: 1px;
  border-radius: 0.5px;
  display:inline-block;
  margin-right:10px;
  border-radius: 05px;
  box-shadow: 1px 1px 2px 1px grey;
}
.u{
  margin: 0;
  width: 500px;
  font-size: 20px;
  border: 1px solid #EEEEEE;
}
.btn5{
  margin: 0;
  width: 165px;
  font-size: 15px;
  padding: 20px;
  height:180px
  border-radius 2px;
  border: 1px solid #f2f2f2;
}
.link{
  color:white;
}
tr:nth-child(odd) {background-color: black}
tr:nth-child(even) {background-color: black}
</style>
</head>
<body>
    <h1 class="container">Customer Records</h1>
    <form action="sorting.php" method="GET">
    <select name="sort_alphabet" class="form-control">
      <option value ="">--Select Option--</option>
      <option value ="a-z" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z"){
        echo "selected";
      } ?>>A-Z(Ascending Order)</option>
   <option value ="z-a" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a"){
        echo "selected";
      } ?>>Z-A(Descending Order)</option>
</select>
<button type="submit" class="input-group-text btn1 btn-primary" id="basic-addon2">Sort</button>
</form>
<form action="" method="POST">
<input type="text" name = "get_id" id="searchBar" placeholder ="" value="Search By Customer ID..." maxlenght="25" autocomplete="off" onMouseDown="active();" onBlur="inactive();" /><input type="submit" name="search_by_id" id="searchBtn" value="GO!" />
</form> 
    <button class="btn" onclick="document.location='add.php'">INSERT NEW CUSTOMER</button>
    
    <table border='2' cellspacing='7'>
                <tr>
                 <th>Customer ID</th>
                 <th>First Name</th>
                 <th>Last Name</th>
                 <th>Email</th>
                 <th>Status</th>
                 <th>Date Time</th>
                 <?php
       include("connection.php");
       $conn = mysqli_connect("localhost", "root", "", "trip");
       if ($conn-> connect_error){
           die("Connection Failed:". $conn-> connect_error );
       }
       if (isset($_POST['search_by_id']))
       {
         $id = $_POST['get_id'];
                 $query = "SELECT * FROM trip WHERE id='$id'";
                 $query_run = mysqli_query($conn, $query);
                 if(mysqli_num_rows($query_run) > 0)
                 {
                 while($rows = mysqli_fetch_array($query_run))
                 {
                   ?>
                   <tr>
                      <td><?php echo $rows['id'];?></td>
                      <td><?php echo $rows['firstname'];?></td>
                      <td><?php echo $rows['lastname'];?></td>
                      <td><?php echo $rows['email'];?></td>
                      <td><?php echo $rows['status'];?></td>
                      <td><?php echo $rows['datetime'];?></td>
                   </tr> 
                   <?php
}
                }
              else{
?>
<tr>
<td colspan="7">No Record Found</td>
              </tr>
              <?php
              }
              ?>
            </thead>
            </table>
    </body>
    </html>
    <?php
              }
              ?>
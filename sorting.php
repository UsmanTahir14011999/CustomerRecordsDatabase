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
      if(searchBar.value == 'Search...'){
        searchBar.value = ''
        searchBar.placeholder = 'Search...'
      }
    }
    function inactive(){
      var searchBar = document.getElementById('searchBar');
      if(searchBar.value == 'Search...'){
        searchBar.value = 'Search...'
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
<form action="search.php" method="GET" id="searchForm">
<input type="text" name="get_id" id="searchBar" placeholder ="" value="YOU WANT TO SEARCH CUSTOMER DETAILS CLICK ON GO" maxlenght="25" autocomplete="off" onMouseDown="active();" onBlur="inactive();" /><input type="submit" name="search_by_id" id="searchBtn" value="WANT TO SEARCH!" />
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
                 <th colspan= '2' align='center'>Operations</th>
             <?php
                $conn = mysqli_connect("localhost", "root", "", "trip");
                if ($conn-> connect_error){
                    die("Connection Failed:". $conn-> connect_error );
                }
                $sort_option = "";
                if(isset($_GET['sort_alphabet']))
                {
                  if($_GET['sort_alphabet'] ==  "a-z")
                    {
                      $sort_option = "ASC";
                    }
                    else
                    {
                      $sort_option = "DESC";
                    }
                }
                $sql = "SELECT * from trip ORDER BY id $sort_option";
                $query= mysqli_query($conn, $sql);
                if(mysqli_num_rows($query)>0){
                  foreach($query as $row)
                  {
                    ?>
                    <tr>
                      <td><?php $row['id'];?></td>
                      <td><?php $row['firstname'];?></td>
                      <td><?php $row['lastname'];?></td>
                      <td><?php $row['email'];?></td>
                      <td><?php $row['status'];?></td>
                      <td><?php $row['datetime'];?></td>
                  </tr>
                  <?php
}
                }
              else{
?>
<tr>
<td colspan="7">No Record Found</td>
              }
            </tr>
            </thead>
        </tbody>
        <?php
              }
              $conn = mysqli_connect("localhost", "root", "", "trip");
              if ($conn-> connect_error){
                  die("Connection Failed:". $conn-> connect_error );
              }
                $result = $conn-> query($sql);
                if($result-> num_rows>0){
while ($row = $result-> fetch_assoc()){
 echo   "<tr><td>" . $row["id"]." </td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["email"] . "</td><td>" . $row["status"] . "</td><td>" . $row["datetime"]."</td><td>" . "<a href='update.php?id=$row[id]&fn=$row[firstname]&ln=$row[lastname]&em=$row[email]&st=$row[status]&dt=$row[datetime]'onclick='return checkedit()'><input type='submit' value='Edit/Update' id='editbtn'></a>" . "</td><td>" . "<a href='delete.php?id=$row[id]' onclick='return checkdelete()'><input type='submit' value='DELETE' id='editbtn1'></a>" . "</td></tr>" ;  
}
echo "</table>";
                }
            else
            {
                echo "No Record";
            }      
?>
            </body>
            </html>
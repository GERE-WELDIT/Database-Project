<?php 
// normally, any php page's is considered text/html webpage, so to change it to css, we 
//need to change it its the header of the file to text/css.

header("Content-type: text/css; charset: UTF-8"); 

?>

body {
    font-size: 19px;
    background-color: #e0ffff;
}
.container{
    
  margin-left: auto;
  margin-right: auto;
}
table{
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
}
tr {
    border-bottom: 1px solid #cbcbcb;
}
th, td{
    border: none;
    height: 30px;
    padding: 2px;
}
tr:hover {
    background: #F5F5F5;
}

form {
    width: 45%;
    margin: 50px auto;
    text-align: left;
    padding: 20px; 
    border: 1px solid #bbbbbb; 
    border-radius: 5px;
}

.input-group {
    margin: 10px 0px 10px 0px;
}
.input-group label {
    display: block;
    text-align: left;
    margin: 3px;
}
.input-group input {
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
}

/* button styling*/
.btn {
  box-shadow: inset 0px 1px 0px 0px #9acc85;
  background: linear-gradient(to bottom, #74ad5a 5%, #68a54b 100%);
  background-color: #74ad5a;
  border: 1px solid #3b6e22;
  display: inline;
  cursor: pointer;
  color: #ffffff;
  font-family: Arial;
  font-size: 13px;
  font-weight: bold;
  padding: 6px 12px;
  text-decoration: none;
}
.btn:hover {
  background: linear-gradient(to bottom, #68a54b 5%, #74ad5a 100%);
  background-color: #68a54b;
}
.btn:active {
  position: relative;
  top: 1px;
}

h2{
  text-align:center;
  color:blue;
}


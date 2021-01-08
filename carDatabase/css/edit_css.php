<?php 
// normally, any php page's is considered text/html webpage, so to change it to css, we 
//need to change it its the header of the file to text/css.

header("Content-type: text/css; charset: UTF-8"); 

?>


body {
    font-size: 19px;
    background-color:#e0ffff;
}

.container{
margin-left:auto;
margin-right:auto;
  width:1000px;
  text-align:center;


}


form {
    width: 54%;
    margin-left:auto;
    margin-right:auto;

    text-align: left;
    padding: 20px; 
    border: 1px solid #bbbbbb; 
    border-radius: 5px;
    display:inline-block;
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
    width: 80%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
}
.btn{
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #5F9EA0;
    border: none;
    border-radius: 5px;
}

.logoutBtn{
  margin-top:20px;
  margin-left:auto;
  margin-right:auto;
}

.logout{
  float:right;
  width:80px;


div.edit-form-container{
  margin-bottom: 10px;
  
}
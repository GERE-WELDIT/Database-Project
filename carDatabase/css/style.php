
<?php 
// normally, any php page's is considered text/html webpage, so to change it to css, we 
//need to change it its the header of the file to text/css.

header("Content-type: text/css; charset: UTF-8"); 

?>


body {
  margin-left:auto;
  margin-top:auto;
  background-color: #lightblue;
  font-size: 3rem;
  font-family: font-family: Georgia, "Times New Roman", Times, serif;
  
}

.container {
  background-color: #e0ffff;
  width: 1000px;
  margin-left: auto;
  margin-right: auto;
 
 
}
.header {
  background-color: #e0ffff;
  text-align: center;
  position: relative;
  clear: both;
}
.main {
  background-color: #e0ffff;
  padding-left: 10px;
  padding-right: 10px;
  text-align: center;
}

input[type="text"],
input[type="password"] {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}


.main-img {
  position: relative;
  padding-top: 10px;
  padding-bottom: 10px;
  margin-left: auto;
  margin-right: auto;
  float: right;
}
img {
  width: 780px;
}

.topic{
  margin-left:auto;
  margin-right:auto;
  
}

<!-- .form-container{
  margin-left:auto;
  margin-right:auto;
  margin-left: 200px;
  min-height: 500px; 
  display:inline-block;
  } -->

  .driver-form-container{
  margin-left:auto;
  margin-right:auto;
  margin-left: 200px;
  display:inline-block;
  }
  .car-form-container{
    position:relative;
    margin-top:20px;
    margin-right:auto;
    margin-left: 200px;
    min-height: 500px; 
    display:inline-block;
  }

  form{
    display:inline-block;
    margin-left:auto;
    margin-right:auto;
  }
h1 {
  text-align:center;
  font-size: 2rem;
  color:blue;
}
h2{
  text-align:center;
  font-size: 1.5rem;
  color:blue;
}
p{
  text-align:center;
font-size: 1.25rem;
}
table{
  margin-left:auto;
  margin-right:auto;
  border-style: dotted;
  font-size:1.25rem;
  
}


a{
  text-align: center;
  color: red;
  text-decoration: none;
}
.searchItem{
  display:inline;
}


.logoutBtn{
  magin-left:auto;
  margin-right:auto;
}

.logout{
  display:inline;
  float:right;
  padding-right:10px;
  padding-top:0;
}

/* button styling*/
.btn {
  box-shadow: inset 0px 1px 0px 0px #9acc85;
  background: linear-gradient(to bottom, #74ad5a 5%, #68a54b 100%);
  background-color: #74ad5a;
  border: 1px solid #3b6e22;
  display: inline-block;
  cursor: pointer;
  color: #ffffff;
  font-family: Arial;
  font-size: 16px;
  font-weight: bold;
  padding: 8px 12px;
  text-decoration: none;
}
.btn:hover {
  background: linear-gradient(to bottom, #68a54b 5%, #74ad5a 100%);
  background-color: #68a54b;
}


.footer {
  clear: both;
  position: relative;
  padding: 10px;
  background-color: lightblue;
}

.para-footer {
  text-align: center;
  font-family: Georgia, "Times New Roman", Times, serif;
  color: white;
}

/*css related to the style of the mainLandingPage.*/

.driver-section{

margin-left:auto;
margin-right:auto;
  
}


.cars-section{
  position:relative;
  top:2x;

}

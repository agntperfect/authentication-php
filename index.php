<?php
    include "PHP/function.inc.php";
    if (!isset($_SESSION["pass"])) {
        header('location: login.php');
    }
       
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/main.css">
        <title>K.A.B Store - Online Shopping</title>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="author" content="K.A.B Store">
    </head>
    <body>

<!-- Top navigation -->
        <div class="topnav">
            <a href="" class="title">K.A.B Store</a>
            <!-- Centered link -->
            <div class="topnav-centered">
                <div class="active">
                    <input type="text" placeholder="Search">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
            <!-- Right-aligned links -->
            <div class="topnav-right">
                <button name="cart" id="cart" class="cart">button</button>
                <a class="rightside">
                    <div class="image-circle"><img src="https://www.befunky.com/images/wp/wp-2014-08-milky-way-1023340_1280.jpg?auto=webp&format=jpg&width=1200&crop=16:9" alt="" srcset=""></div>
                    <span class='us_na'><?=$_KAB["user"]["name"]?>Abhishek Kharel</span>
                </a>
                <div class="dropdown">
                    <div class="user">
                        <a href="">My Orders</a>
                        <a href="">My Wishlists</a>
                        <a href="">My Return & Cancellation</a>
                        <a href="">Profile Setting</a>
                    </div>
                    <a href="">Log out</a>
                </div>
            </div>
        </div>
<!-- SideBAr -->
        <div class="sidebar">
            <span class="sidebar-btn">Grocery</span>
            <span class="sidebar-btn">Baby Care</span>
            <span class="sidebar-btn">Bakery & Dairy</span>
            <span class="sidebar-btn">Eggs & Meat</span>
            <span class="sidebar-btn">Packaged Food</span>
            <span class="sidebar-btn">Personal Care</span>
            <span class="sidebar-btn">Vegetables & Fruits</span>
            <span class="sidebar-btn">Beverage</span>
        </div>
        <div class="container">
            <div class="slideshow"></div>

        </div>
    </body>
</html>

<template>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="cart.html" class="btn btn-default btn-cart-xs visible-xs pull-right">
                    <i class="fa fa-shopping-cart"></i> Cart : 4 items
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><a href="products.html">Products</a></li>
                    <li><a href="cart.html">Shopping Cart</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Pages <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="blog-detail.html">Blog Detail</a></li>
                            <li><a href="checkout2.html">Checkout v2</a></li>
                            <li><a href="compare.html">Compare</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="detail.html">Product Detail</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li class="dropdown dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Submenu</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Submenu Link 1</a></li>
                                    <li><a href="#">Submenu Link 2</a></li>
                                    <li><a href="#">Submenu Link 3</a></li>
                                    <li><a href="#">Submenu Link 4</a></li>
                                    <li class="dropdown dropdown-submenu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sub Submenu</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Sub Submenu Link 1</a></li>
                                            <li><a href="#">Sub Submenu Link 2</a></li>
                                            <li><a href="#">Sub Submenu Link 3</a></li>
                                            <li><a href="#">Sub Submenu Link 4</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account</a>
                                <ul class="dropdown-menu">
                                    <li><a href="account-profile.html">My Profile</a></li>
                                    <li><a href="account-address.html">My Address</a></li>
                                    <li><a href="account-history.html">Order History</a></li>
                                    <li><a href="account-password.html">Change Password</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown mega-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Mega Menu <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <ul class="list-unstyled">
                                                <li><p><strong>Menu Title</strong></p></li>
                                                <li><a href="#"> Link Item </a></li>
                                                <li><a href="#"> Link Item </a></li>
                                                <li><a href="#"> Link Item </a></li>
                                                <li><a href="#"> Link Item </a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="list-unstyled">
                                                <li><p><strong>Menu Title</strong></p></li>
                                                <li><a href="#"> Link Item </a></li>
                                                <li><a href="#"> Link Item </a></li>
                                                <li><a href="#"> Link Item </a></li>
                                                <li><a href="#"> Link Item </a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="list-unstyled">
                                                <li><p><strong>Menu Title</strong></p></li>
                                                <li><a href="#"> Link Item </a></li>
                                                <li><a href="#"> Link Item </a></li>
                                                <li><a href="#"> Link Item </a></li>
                                                <li><a href="#"> Link Item </a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="list-unstyled">
                                                <li><p><strong>Menu Title</strong></p></li>
                                                <li><a href="#"> Link Item </a></li>
                                                <li><a href="#"> Link Item </a></li>
                                                <li><a href="#"> Link Item </a></li>
                                                <li><a href="#"> Link Item </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>


<style>

</style>


<script>
    export default{
        components:{

        }
    }
</script>

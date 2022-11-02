<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>online Store-Home page</title>

    <link rel="stylesheet" href="css/style.css">
    <style>
    img {
        width: 100px;
        border-radius: 100px;
        float: left;
        margin-right: 1px;
    }

    p {
        font-weight: bold;
        font-style: oblique;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    </style>

</head>

<body>
    <!--maybe remove this section later-->


    <!--<nav class="navbar">


        <ul class="links-container">
                <li class="link-item"><a href="#" class="link active">home</a></li>
                <li class="link-item"><a href="#" class="link">products</a></li>
                <li class="link-item"><a href="#" class="link">Login as client</a></li>
                <li class="link-item"><a href="#" class="link">login as landlord</a></li>
            </ul>
        
        <div class="user_intereactions">
            <div class="cart">

                <span class="cart-item-count">00</span>
                <div class="user">
                    <img src="img/user.png" class="user-icon" alt=""> <a href="#" class="link active">user </a></li>

                </div
            </div>
        </div>
    </nav>-->
    <?php include '../dxf/navbar.php';?>
    <header class="header-section">




        <h1 class="header-heading"><span>premium</span> properties</h1>

        <!--make changes to best selling-->

    </header>

    <section class="best-selling-product-section">
        <h1 class="section-title">categories</h1>
        <div class="product-container">
            <div class="product-card">
                <img src="rentals/pexels-mark-mccammon-1080696.jpg" class="product-img" alt="">
                <p class="product-name">air bnb's </p>
            </div>
            <div class="product-card">
                <img src="rentals/pexels-dom-j-303059.jpg" class="product-img" alt="">
                <p class="product-name">apartments </p>
            </div>
            <div class="product-card">
                <img src="rentals/pexels-chris-goodwin-32870.jpg" class="product-img" alt="">
                <p class="product-name">villas </p>
            </div>

        </div>
    </section>

    <!-- insert image collage -->
    <section class="image-mid-section">
        <div class="image-collage">
            <div class="image-collection">
                <img src="rentals/pexels-jahnae-neal-2604670.jpg" class="collage-img" alt="">
                <img src="rentals/pexels-mitchell-luo-3762497.jpg" class="collage-img" alt="">
                <img src="rentals/pexels-asad-photo-maldives-3293192.jpg" class="collage-img" alt="">
            </div>
        </div>
    </section>
    <!--insert review section-->
    <section class="review-section">
        <h1 class="section-title">what our <span>customers</span> says about us</h1>
        <div class="review-container">
            <div class="review-card">
                <div class="user-dp" data-rating="4.9"><img src="images2/IMG_2972.PNG" alt=""></div>
                <h2 class="review-title">best quality more than my expectation</h2>
                <p class="review">ashy</p>
            </div>
            <div class="review-card">
                <div class="user-dp" data-rating="4.9"><img src="images2/DARLAN.jpg" alt=""></div>
                <h2 class="review-title">Hands down my best booking experience</h2>
                <p class="review">darlan</p>
            </div>
            <div class="review-card">
                <div class="user-dp" data-rating="4.9"><img src="images2/Restless Relaxation___.jpg" alt=""></div>
                <h2 class="review-title">i love the wide range</h2>
                <p class="review">caisy</p>
            </div>
        </div>
    </section>

    <section class="end-section">
        <div class="section-item-container">
            <img src="rentals/pexels-expect-best-323780.jpg " class="section-bg" alt="">
            <div class="section-info">
                <h1 class="title">book <span>now</span></h1>
                <p class="info">shop for all favourites.</p>
            </div>
        </div>
    </section>

</body>
<footer>

</footer>

</html>
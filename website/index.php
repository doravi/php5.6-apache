<?php
$page = 'Home';
require_once('header.php');
?>

<!--  Body cont.-->
<div class="body">
    <div class="body-wrap ui-helper-clearfix">
	    
        <div class="recipecontent">
			<div class="welcome">
				<h4>Welcome to Gigya's demo site.</h4>
				<p class="welcome-message">The Daily Recipe site is a Gigya demo site written in PHP and JavaScript. This demo outlines how to make<br>
				a website using Gigya's platform.<br>
				The demo site's code is available for you to <a href="http://wikifiles.gigya.com/DemoSite/DailyRecipe.zip" alt="download">download</a>. Learn about the site implementation <a class="wiki" href="http://developers.gigya.com/display/GD/RaaS+Site+Implementation">here</a></p>
			</div>
            <div class="recipe-list">
                <ul class="pages">
                    <li class="odd first">
                        <div class="page-summery">
                            <a href="recipe1.php"><img class="image" src="images/hp/img1.png"/></a>

                            <div class="summery">
                                <a href="recipe1.php"><h3 class="summery-title">GATEAU A LA ROYALE</h3></a>

                                <div class="summery-desc">Jumping on the Royal Wedding bandwagon, I was tasked with
                                    making the Royal Wedding fridge cake for a tea party.
                                </div>
                                <a class="recipe-link" href="recipe1.php">Get the recipe</a>

                                <div class="cooking-time Icon-Clock">3h</div>
                            </div>
                        </div>
                    </li>
                    <li class="even">
                        <div class="page-summery">
                            <a href="recipe2.php"><img class="image" src="images/hp/img2.png"/></a>

                            <div class="summery">
                                <a href="recipe2.php"><h3 class="summery-title">MUSHROOM MYSTIQUE</h3></a>

                                <div class="summery-desc">I absolutely love mushrooms, and think that one of the
                                    simplest, most luxurious food that you can have is creamy mushroom soup!
                                </div>
                                <a class="recipe-link" href="recipe2.php">Get the recipe</a>

                                <div class="cooking-time Icon-Clock">1h</div>
                            </div>
                        </div>
                    </li>
                    <li class="odd last">
                        <div class="page-summery">
                            <a href="recipe3.php"><img class="image" src="images/hp/img3.png"/></a>

                            <div class="summery">
                                <a href="recipe3.php"><h3 class="summery-title">CARBONARA GNOCCHI</h3></a>

                                <div class="summery-desc">Gnocchi with bacon and spinach carbonara style.</div>
                                <a class="recipe-link" href="recipe3.php">Get the recipe</a>

                                <div class="cooking-time Icon-Clock">50m</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="rating-reviews">
                <div class="inner">
                    <h2 class="comments-title">Ratings and Reviews</h2>
                    <div class="code-opts">
                        <div class="code-links">
                            <a class="get-code" href="#" data-fn-name="rNr">Get Code </a>|
                            <a class="docs" href="#"> Docs</a>
                        </div>
                    </div>
                    <!-- Ratings and Reviews div -->
                    <div id="ratings" class="ratings"></div>
                    <div id="reviews" class="reviews"></div>
                </div>
            </div>
        </div>

<?php include_once('sidebar.php'); ?>

    </div>
</div>
<?php include_once('footer.php'); ?>




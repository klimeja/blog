</html><?php
include'databaze.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta keywords  = "blog, fashion, girl, cosmetic, moda, dívčí,">
    <meta autor = "Jan Kliment" >
    <meta http-equiv="content-type" content="text/html; charset=utf-16">
    <title>Lifestyle blog - Andrea Beňová</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/blog.css">
    <link href='http://fonts.googleapis.com/css?family=BenchNine:700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Archivo+Narrow&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=BenchNine:700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Poiret+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,500&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-social.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header-slider.css">
    <link rel="stylesheet" href="css/demo.css">
    <link href='http://fonts.googleapis.com/css?family=Dr+Sugiyama&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="container-fluid">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#">Galerie</a>
                    </li>
                    <li>
                        <a href="traveling.php">Cestování</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategorie
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="moda.php">Móda</a>
                            </li>
                            <li>
                                <a href="culture.php">Kultura</a>
                            </li>
                            <li>
                                <a href="food.php">Jídlo</a>
                            </li>
                            <li>
                                <a href="cosmetics.php">Kosmetika</a>
                            </li>
                            <li>
                                <a href="fitness.php">Fittness</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right loga">
                    <li><a href="https://www.facebook.com/abenova1?fref=ts" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a></li>
                    <li><a href="https://instagram.com/andrea_benova/" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a></li>
                    <li><a href="https://twitter.com/benova179" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a></li>
                    <li><a href="https://www.pinterest.com/anniesecretblog/" target="_blank">
                            <i class="fa fa-pinterest"></i>
                        </a></li>
                </ul>
       <!-- <form class="navbar-form" method="post" name="hledat">
            <div class="input-group">
                <input type="text" class="form-control pull-right" placeholder="Hledat..." name="slovo">
						    <span class="input-group-btn">
                                <button type="submit" class="btn btn-default search" style="border-radius: 4px;" >
								    <span class="glyphicon glyphicon-search">
									    <span class="sr-only">Search
                                        </span>
								    </span>
                                </button>
							    <button type="reset" class="btn btn-default" style="margin-left: 5px; border-radius: 4px;">
								    <span class="glyphicon glyphicon-remove">
									    <span class="sr-only">Close
                                        </span>
								    </span>
                                </button>
						    </span>
                        </input>
                    </div>
                </form>-->
            </div>
        </div>
    </nav>
    </div>
    <div  class="container-fluid">
        <ul class="cb-slideshow index">
            <li><span></span><div><h3>Annie's<br> Secrets</h3></div></li>
        </ul>
    </div>
    <!--<div class="container">
        <div class=" text-justify bio-wr">
            <img  class="foto-bio" src="image/foto-bio.jpg"  >
            <a class="text-nadpis-1" href="about.php">O MNĚ</a>
        <p>Jmenuji se Andrea. Je mi 19 let. Miluji fotografování a mojí rodinu. Ráda poznávám nové věci a chci, aby jste je poznávali se mnou. Věřím, že každý z nás má na světě nějaké poslání - já na to moje musím ještě přijít. Mým snem je procestovat celý svět. Ten sen si hodlám splnit.</p>
        </div>
        </div>-->
        <div class="container" id="clanky">
        <?php
            $db = new databaze('celkem');
            $db->vyber();
            ?>
        </div>
    </div>
    <div class="container">
        <div class="pager-arrows">
            <?php
            $db->paging();
            ?>
        </div>
        </div>
    <div class="container-fluid instagram-grid">
        <div class="container">
            <iframe src="http://www.intagme.com/in/?u=YW5kcmVhX2Jlbm92YXxpbnwyMDB8MTB8MXx8bm98MHx1bmRlZmluZWR8bm8=" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%; height: 200px" ></iframe>
        </div>
        </div>
        <!--<div class="col-sm-6 col-md-4 col-xs-12">
                <div class="loga">
                    <a class=" btn btn-social-icon btn-lg btn-instagram">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a class=" btn btn-social-icon btn-lg btn-facebook">
                        <i class="fa fa-facebook-f"></i>
                    </a>
                    <a class=" btn btn-social-icon btn-lg btn-twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class=" btn btn-social-icon btn-lg btn-pinterest">
                        <i class="fa fa-pinterest-p"></i>
                    </a>
                </div>
                <div class="foto">
                    <img src="image/foto.png">
                </div>
                <div class="social">
                    <a class="btn btn-block btn-social btn-lg btn-instagram">
                        <i class="fa fa-instagram"></i>
                        Follow on Instagram
                    </a>
                </div>
                <div class="slider">
                    <iframe class="instagram-show" src="http://www.intagme.com/in/?u=YW5kcmVhX2Jlbm92YXxzbHwyNDB8MnwzfHxub3w1fHVuZGVmaW5lZHxubw==">
                    </iframe>
                </div>
                <div class="social">
                    <a class="btn btn-block btn-social btn-lg btn-facebook">
                        <i class="fa fa-facebook-f"></i>
                        Follow on Facebook</a>
                </div>
                <div class="fb">
                    <div class="fb-like-box" data-href="https://www.facebook.com/FacebookDevelopers" data-width="240px" data-height="220px" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div></div>
                <div class="social">
                    <a class="btn btn-block btn-social btn-lg btn-pinterest">
                        <i class="fa fa-pinterest-p"></i>
                        Follow on Pinterest
                    </a>
                </div>
                <div class="social">
                    <a class="btn btn-block btn-social btn-lg btn-twitter">
                        <i class="fa fa-twitter"></i>
                        Follow on Twitter
                    </a>
                </div>
    <div class="container">
        <div class="col-sm-4">
            <a class=" btn btn-block btn-social btn-lg btn-anketa ">
                <i class="fa fa-tasks"></i>
                Anketa</a>
            <div id="poll">
                <p>Kolik je ti let?</p>
                <form>
                    13-15:
                    <input type="radio" name="vote" value="0" onclick="getVote(this.value)">
                    <br>15-18:
                    <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
                    <br>18-21:
                    <input type="radio" name="vote" value="2" onclick="getVote(this.value)">
                    <br>více..:
                    <input type="radio" name="vote" value="3" onclick="getVote(this.value)">
                </form>
            </div>
            </div>

            <!--<div class="travel col-sm-4">
            <a class=" btn btn-block btn-social btn-lg btn-travel ">
                <i class="fa fa-globe"></i>
                Cestování</a>
               <a href="#"><img src="image/map.png" height="150" width="150"></a>
            </div>
        <div class="col-sm-4">
            <a class="btn btn-block btn-social btn-lg btn-instagram" style="width: 200px">
                <i class="fa fa-instagram"></i>
               Instagram
            </a>
        <div class="slider">
            <iframe src="http://www.intagme.com/in/?u=YW5kcmVhX2Jlbm92YXxzbHwyMDB8MnwzfHxub3w1fHVuZGVmaW5lZHxubw==" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:205px; height: 205px" ></iframe>        </div>
        </div>
    </div>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/poll.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/cs_CZ/sdk.js#xfbml=1&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="js/readmore.js"></script>
        <script>$('article').readmore({
                speed: 1000,
                collapsedHeight: 130,
                moreLink: '<a href="#"><button type="submit" class="btn btn-book read-more-btn" style="border-radius: 4px;display: block; margin: 10px auto 10px"><span class="glyphicon glyphicon-book" aria-hidden="true" style="padding: 5px"></span> více </button></a>',
                lessLink: '<a href="#"><button type="submit" class="btn btn-book read-more-btn" style="border-radius: 4px;display: block; margin: 10px auto 10px"><span class="glyphicon glyphicon-book" aria-hidden="true" style="padding: 5px"></span> méně </button></a>'
            })
        </script>
</body>
</html>

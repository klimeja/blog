<?php
include 'config.php';
include "comment.class.php";

class databaze
{
    public $db;
    public $db_found;
    public $pocetCelkem;
    public $dotaz;
    public $od;
    public $pocetCestovani;
    public $kategorie;
    public $id;



    public function getOd()
    {
        define ("RADKY", 2);
        if ($this->pocetCelkem >= RADKY) {
            if (!isset($_GET["od"])) $od = 1; else $od = $_GET["od"];
        }
        else $od=1;
        return $od;
    }

    public function getdotaz()
    {
        if ($this->kategorie == "celkem") {
            $dotaz = mysql_query("select * from `text-obsah`ORDER BY id DESC" . " limit " . ($this->od - 1) . ", " . RADKY);
            return $dotaz;
        }

    else {
    $dotaz = mysql_query("select * from `text-obsah` WHERE kategorie = '$this->kategorie' ORDER BY id DESC" . " limit " . ($this->od - 1) . ", " . RADKY);
        return $dotaz;
}
}
    public function getPocet()
    {
        if ($this->kategorie == "celkem") {
                $dotaz = mysql_query("select count(*) from `text-obsah`");
            } else {
                $dotaz = mysql_query("select count(*) from `text-obsah` WHERE kategorie = '$this->kategorie';");
            }
        if (!isset($_GET["celkem"])) {
            $zaznam = mysql_fetch_array($dotaz);
            $pocetCelkem = $zaznam[0];
        }
            else {
                    $pocetCelkem = $_GET["celkem"];
                }
        return $pocetCelkem;
        }


    public function __construct($kategorie, $nazev = SQL_DBNAME, $server = SQL_HOST, $uzivatel = SQL_USERNAME, $heslo = SQL_PASSWORD)
    {
        $this->kategorie = $kategorie;
        $this->db = mysql_connect($server, $uzivatel, $heslo);
        $this->db_found = mysql_select_db($nazev);
        $this->db_charset = mysql_query("SET CHARACTER SET utf8");
        $this->pocetCelkem = $this->getPocet($kategorie);
        $this->od = $this->getOd();
        $this->dotaz = $this->getdotaz($kategorie);
    }

    public function obrazkyProSlider($id)
    {
        $sql = mysql_query("Select obrazky from `text-obsah` WHERE id = $id;");
        $zaznam = mysql_fetch_array($sql);
        $obr = explode(",", $zaznam[0]);
        $velikost = count($obr);
        ?>
        <ul class="bxslider2" xmlns="http://www.w3.org/1999/html">
            <?php
            for ($i = 0; $i < $velikost; $i++) {
                echo "<li style=\"float: none; list-style: outside none none; position: absolute; width: 240px; z-index: 0; display: none;\"><img src= \"$obr[$i]\"></li>";
            }
            ?>
        </ul>
        <!--<script type="text/javascript">
            $(document).ready(function(){
                $('.bxslider2').bxSlider({
                    mode:'fade',
                    auto: false,
                    autoHover: true,
                    adaptiveHeight: true
                });
            });;
        </script>-->
    <?php
    }

    public function vyber()
    {
        while ($zaznam = @MySQL_Fetch_Array($this->dotaz)) {
            $spojenejtext = preg_replace('/\s+/', '', $zaznam["nadpis"]);
            $odkaz = strtolower($spojenejtext . ".html");
            $zaznam['datum'] = strtotime($zaznam['datum']);
            ?>
            <p class="datum"><?php echo date('d M Y',$zaznam['datum'])?></p>
            <a class="text-nadpis-1" href= <?php echo $odkaz ?>>
                <?php echo $zaznam["nadpis"] ?></a>
            <?php //$this->obrazkyProSlider($id); ?>
            <article class="text-justify">
                <p class="obsah"><?php echo $zaznam["text"] ?>
                </p>
                <div id="main">

                    <?php
                    $comments = array();
                    $result = mysql_query("SELECT * FROM comments ORDER BY id ASC");

                    while($row = mysql_fetch_assoc($result))
                    {
                        $comments[] = new Comment($row);
                    }

                    /*
                    /	Output the comments one by one:
                    */


/*
/	Output the comments one by one:
*/

foreach($comments as $c){
    echo $c->markup();
}

?>

                    <div id="addCommentContainer">
                        <p>Add a Comment</p>
                        <form id="addCommentForm" method="post" action="">
                            <div>
                                <label for="name">Your Name</label>
                                <input type="text" name="name" id="name" />

                                <label for="email">Your Email</label>
                                <input type="text" name="email" id="email" />

                                <label for="url">Website (not required)</label>
                                <input type="text" name="url" id="url" />

                                <label for="body">Comment Body</label>
                                <textarea name="body" id="body" cols="20" rows="5"></textarea>

                                <input type="submit" id="submit" value="Submit" />
                            </div>
                        </form>
                    </div>

                </div>

                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
                <script type="text/javascript" src="script.js"></script>

            </article>
            <!--<div class="sdileni">
                <div style="float: left; margin-right: 20px" class="fb-like"
                     data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"
                     data-action="like" data-show-faces="true" data-share="true"></div>
                <span style="margin-top: 3px; float: left"><a href="https://twitter.com/share"
                                                              class="twitter-share-button" data-via="annie_secret">Tweet</a>
                <script>!function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = p + '://platform.twitter.com/widgets.js';
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, 'script', 'twitter-wjs');</script></span>
                <span style="float: left; margin: 3px;">
                <div class="g-plusone" data-size="medium"></div></span>
                <span class="clearfix"></span>
            </div> -->
        <?php
        }
    }

    public function paging()
    {
        ?>
        <div class="odkazyStrankovani">
            <script type="text/javascript" src="js/articles-ajax.js"></script>
            <?php
          for($i = 1; $i<=$this->pocetCelkem; $i++) {
              if($i == 1){
                  echo "<a href='#clanky'><button class='paging-buttons' onclick='switchpage(\"$this->kategorie\",$this->pocetCelkem,$i)'>$i</button></a>";

              }
              else if ($i<=$this->pocetCelkem - RADKY ) {
                  echo "<a href='#clanky'><button  class='paging-buttons' onclick='switchpage(\"$this->kategorie\",$this->pocetCelkem,$i + 1)'>$i</button></a>";
              }
          }
            ?>
        </div>
    <?php
    }
}

?>

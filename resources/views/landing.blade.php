<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans|Maven+Pro:500' rel='stylesheet' type='text/css'>
    <style>
        * {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }


        body {
            margin: 0;
            background: #fcaf17;
            font-size: 1.3em;
            color: #333;
            font-family: 'Open Sans', sans-serif;
        }

        section {
            float: left;
            width: 100%;
            background: #fff;
            position: relative;
            box-shadow: 0 0 5px 0px #333;
        }


        /* the important styles */

        .arrow-wrap {
            position: absolute;
            z-index: 1;
            left: 50%;
            top: -5em;
            margin-left: -5em;
            background: #111;
            width: 10em;
            height: 10em;
            padding: 4em 2em;
            border-radius: 50%;
            font-size: 0.5em;
            display: block;
            box-shadow: 0px 0px 5px 0px #333;
        }

        .arrow {
            float: left;
            position: relative;
            width: 0px;
            height: 0px;
            border-style: solid;
            border-width: 3em 3em 0 3em;
            border-color: #ffffff transparent transparent transparent;
            -webkit-transform: rotate(360deg)
        }

        .arrow:after {
            content: '';
            position: absolute;
            top: -3.2em;
            left: -3em;
            width: 0px;
            height: 0px;
            border-style: solid;
            border-width: 3em 3em 0 3em;
            border-color: #111 transparent transparent transparent;
            -webkit-transform: rotate(360deg)
        }


        .hint {
            position: absolute;
            top: 0.6em;
            width: 100%;
            left: 0;
            font-size: 2em;
            font-style: italic;
            text-align: center;
            color: #fff;
            opacity: 0;
        }


        .arrow-wrap:hover .hint {
            opacity: 1;
        }


        @-webkit-keyframes arrows {
            0% {
                top: 0;
            }

            10% {
                top: 12%;
            }

            20% {
                top: 0;
            }

            30% {
                top: 12%;
            }

            40% {
                top: -12%;
            }

            50% {
                top: 12%;
            }

            60% {
                top: 0;
            }

            70% {
                top: 12%;
            }

            80% {
                top: -12%;
            }

            90% {
                top: 12%;
            }

            100% {
                top: 0;
            }
        }

        .arrow-wrap .arrow {
            -webkit-animation: arrows 2.8s 0.4s;
            -webkit-animation-delay: 3s;
        }





        /*  this is the unimportant CSS used just to layout the content  */



        header {
            float: left;
            width: 100%;
            padding: 2em 4em;
            color: #fff;
            height: calc(100% - 3em);
        }

        header h1 {
            margin: 0;
        }

        header h3 {
            margin: 0;
            color: #56dcee;
        }

        header a {
            color: #56dcee;
            opacity: 0.5;
            text-decoration: none;
        }

        header a:hover {
            color: #333;
            opacity: 1;
        }


        .content {
            float: left;
            width: 70%;
            margin: 0 15%;
            padding: 2em 0;
        }

        h1 {
            font-family: 'Maven Pro', sans-serif;
            font-weight: 300;
            font-size: 2.4em;
        }

        h2,
        h3 {
            font-family: 'Maven Pro', sans-serif;
            font-weight: 300;
            font-size: 1.5em;
            margin-top: 2em;
        }

        pre {
            background: #ededed;
            padding: 1em;
        }

        p {
            color: #555;
            font-size: 0.9em;
        }

        p a {
            color: #14b5d1;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <header>
        <h1>Scroll Indicator</h1>
        <h3>
            An animated scroll button.
        </h3>
        <a href="http://www.robsawyer.me/blog/2013/09/17/scroll-indicator/">robsawyer.me</a>
    </header>


    <section class="main">
        <a class="arrow-wrap" href="#content">
            <span class="arrow"></span>
            <!--<span class="hint">scroll</span>-->
        </a>

        <div class="content" id="content">
            <h1>Content Section</h1>
            <p>
                The purpose of this arrow demo is to indicate that there is further content down the page. While studies
                have generally shown that users <em>do, in fact,</em> scroll (thus killing the worries about page fold),
                it still has become somewhat fashionable to indicate scroll intent.
            </p>
            <p>
                A subtle animation triggered after a period of time draws attention to the scroll indicator. Some jQuery
                hides the indicator after the user begins scrolling.
            </p>
            <h2>
                The CSS
            </h2>
            <pre>
.arrow-wrap {
  position:absolute;
  z-index:1;
  left:50%;
  top:-5em;
  margin-left:-5em;
  background:#111;
  width:10em;
  height:10em;
  padding:4em 2em;
  border-radius:50%;
  font-size:0.5em;
  display:block;
}

.arrow {
  float:left;
  position:relative;
  width: 0px;
  height: 0px;
  border-style: solid;
  border-width: 3em 3em 0 3em;
  border-color: #ffffff transparent transparent transparent;
  -webkit-transform:rotate(360deg)
}

.arrow:after {
  content:'';
  position:absolute;
  top:-3.2em;
  left:-3em;
  width: 0px;
  height: 0px;
  border-style: solid;
  border-width: 3em 3em 0 3em;
  border-color: #111 transparent transparent transparent;
  -webkit-transform:rotate(360deg)
}
    </pre>
            <h2>Animation</h2>
            <p>Be sure to use the correct vendor-prefixes</p>
            <pre>
  @-webkit-keyframes arrows {
    0% { top:0; }
    10% { top:12%; }
    20% { top:0; }
    30% { top:12%; }
    40% { top:-12%; }
    50% { top:12%; }
    60% { top:0; }
    70% { top:12%; }
    80% { top:-12%; }
    90% { top:12%; }
    100% { top:0; }
  }
  
  .arrow-wrap .arrow {
    -webkit-animation: arrows 2.8s 0.4s;
    -webkit-animation-delay: 3s;
  }
    </pre>
            <p>
                Read more at
                <a href="http://www.robsawyer.me/blog/2013/09/17/scroll-indicator/">robsawyer.me</a>
            </p>
        </div>

    </section>
    <script>
        //this is where we apply opacity to the arrow
        $(window).scroll(function() {

            //get scroll position
            var topWindow = $(window).scrollTop();
            //multipl by 1.5 so the arrow will become transparent half-way up the page
            var topWindow = topWindow * 1.5;

            //get height of window
            var windowHeight = $(window).height();

            //set position as percentage of how far the user has scrolled 
            var position = topWindow / windowHeight;
            //invert the percentage
            position = 1 - position;

            //define arrow opacity as based on how far up the page the user has scrolled
            //no scrolling = 1, half-way up the page = 0
            $('.arrow-wrap').css('opacity', position);

        });

        //Code stolen from css-tricks for smooth scrolling:
        $(function() {
            $('a[href*=#]:not([href=#])').click(function() {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location
                    .hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            });
        });
    </script>
</body>

</html>

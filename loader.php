<style>
.no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url(images/loader-128x/loader.gif) center no-repeat #fff;
    }
    </style>

    <script src="js/jquery.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script>
        //paste this code under head tag or in a seperate js file.
        // Wait for window load
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>

    </head>

    <body>
        <!-- Paste this code after body tag -->
        
        <!-- Ends -->

    <div id="content">
    <div class="se-pre-con"></div>
    
    
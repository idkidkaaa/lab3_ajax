<?php

//include 'foo.php';

?>


<html>
    <head>
    
        <title>Chat</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/timer.jquery/0.9.0/timer.jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
        
        <script>
            //var un = prompt("Name?");
            var start = 0;
            load();
            
            //$("form").submit(function(e) {
            function myfoo(e) {
                e.preventDefault();
                
                $.ajax({
   type: "POST",
   url: "foo.php",
   data: {s: "Lung", m: "pamagiti"},
   success: function() {
     console.log("spasiti");
   }
});
                $('#tbox').val('');
                

                return false;
            };

            function load() {
                $.get('foo.php?start=' + start, function(result){
                    if(result.items) {
                        result.items.forEach(item => {
                            start = item.id;
                            $("#msgbox").append(renderMessage(item));
                        })
                    };
                });
            }

            function renderMessage(item) {
                //return $item.sender'<div class="msg"><p>'.$item.sender.'</p>'.$item.message.'</div>';
                //console.log(item);
            }
                
        </script>

        <style>

            body {
                background: #efefef;
                color: #777;
            }

            .msgs {
                margin: 500px auto 0;
            }

            .container {
                padding: 25px 15px 25px 15px;
                font-weight: 400;
                overflow: hidden;
                width: 700px;
                height: auto;
                background: #fff;
                -webkit-box-shadow: 0 1px 3px rgba(0,0,0,.13);
                -moz-box-shadow: 0 1px 3px rgba(0,0,0,.13);
                box-shadow: 0 1px 3px rgba(0,0,0,.13);
            }

            .container form .input,.container input[type=text] {
                background: #fbfbfb;
                font-size: 24px;
                line-height: 1;
                width: 100%;
                padding: 3px;
                margin: 0 6px 5px 0;
                outline: none;
                border: 1px solid #d9d9d9;
            }

            .container form .input:focus {
                border: 1px solid #f58220;
                -webkit-box-shadow: 0 0 3px 0 rgba(245,130,32,0.75);
                -moz-box-shadow: 0 0 3px 0 rgba(245,130,32,0.75);
                box-shadow: 0 0 3px 0 rgba(245,130,32,0.75);
            }

            /*= Button
            --------------------------------------------------------*/

            .button {
                border: solid 1px #da7c0c;
                background: #f78d1d;
                background: -webkit-gradient(linear, left top, leftbottom, from(#faa51a), to(#f47a20));
                background: -moz-linear-gradient(top,  #faa51a, #f47a20);
                filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#faa51a', endColorstr='#f47a20');
                color: #fff;
                padding: 7px 12px;
                -webkit-border-radius:4px;
                moz-border-radius:4px;
                border-radius:4px;
                float: right;
                cursor: pointer;
            }

            .button:hover {
                background: #f47c20;
                background: -webkit-gradient(linear, left top, leftbottom, from(#f88e11), to(#f06015));
                background: -moz-linear-gradient(top,  #f88e11, #f06015);
                filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f88e11', endColorstr='#f06015');
            }

        </style>
         
    </head>
    <body>



        <div id='msgbox'>ASDFGHJKLJHGFGHJK</div>
        <div class="container msgs">
                <form>
                    <input type="text" id='tbox' autofocus autocomplete="off">
                    <button class="button" type="submit" value="send" onclick="myfoo()">send</button>
                </form>
        </div>

    </body>
</html>

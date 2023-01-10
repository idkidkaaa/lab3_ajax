<?php

    $index = isset($_GET['index']) ? $_GET['index'] : "-1";

?>

<html>
    <head>
    
        <title>AJAX chat</title>

        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jScrollPane/2.2.2/script/jquery.jscrollpane.min.js"></script>
        
		<link href="style.css" media="screen" rel="stylesheet">

        <script>
            $(document).ready(function() {
                var un = prompt("Enter name");
                var start = 0;
                var start_chats = 0;
                load();
                
                $('#sf').submit(function(e) {
                    e.preventDefault();
                    var inp = document.getElementById("tbox").value;
                    $.ajax({
                        type: "POST",
                        url: 'foo.php',
                        data: {s: un, m: inp, i: '<?php echo $index; ?>'},
                        success: function(response) {}
                    });

                    document.getElementById("tbox").value = '';
                    
                });

                $('#chf').submit(function(e) {
                    e.preventDefault();
                    var inp = document.getElementById("chbox").value;
                    $.ajax({
                        type: "POST",
                        url: 'addchat.php',
                        data: {chname: inp},
                        success: function(response) {}
                    });

                    document.getElementById("chbox").value = '';
                    
                });

                function load() {
                    let tid = setInterval(() => {
                        $.get('foo.php?start=' + start + '&i=<?php echo $index; ?>', function(result) {
                            if(result.items){
                                result.items.forEach(item => {
                                    start = item.id;
                                    document.querySelector('#pustoemesto').innerHTML +=
                                        ('<div class="msg"><p>'+item.sender+'</p>'+item.message+
                                        '<span>'+item.created+'</span></div>');
                                })
                                // autoscroll when update
                                var elem = document.querySelector('#pustoemesto');
                                elem.scrollTop = elem.scrollHeight;
                            };
                        }); 
                        $.get('addchat.php?start=' + start_chats,
                            function(result) {
                                if(result.items){
                                result.items.forEach(item => {
                                    start_chats = item.id;
                                    document.querySelector('#pustoemesto_x2').innerHTML +=
                                        ('<p><a href="?index=' + item.name + '">'+item.name+'</a></p>');
                                })
                            };
                        });
                    }, 500);
                                     
                }
            });

        </script>
         
    </head>
    <body>

        <div id="pustoemesto_x2"></div>
        <div class="container chats">
            <h2><center>Chats</center></h2>
            <form id="chf" method="post">
                <input type="text" id='chbox' autocomplete="off">
                <button class="button" type="submit" value="adch">add chat</button>
            </form>
        </div>
        <div id="pustoemesto"></div>
        <div class="container msgs">
            <form id="sf" method="post">
                <input type="text" id='tbox' autofocus autocomplete="off">
                <button class="button" type="submit" value="send">send</button>
            </form>
        </div>

    </body>
</html>

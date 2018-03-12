<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Exercice : les chiffres romains (jolimoi)</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        jQuery(document).ready(function($) {

            function convertSse()
            {
                var inputNumber = $("#nombreD").val();
                var myEvent = new EventSource('convert.php?nombreD='+inputNumber);

                myEvent.onmessage = function(event){
//                    document.getElementById("info").innerHTML += "Nombre romain : " + event.data + "<br>";
                    console.log(event.data);
                    $('#info').empty();
                    $('#info')
                        .append(" Nombre décimal : "+inputNumber)
                        .append(" - Nombre romain : "+event.data);
                };


//Tests
//                myEvent.onmessage = function (event) {
////                    var data = event.data.split('\n');
////                    var name = data[0];
////                    var action = data[1];
//                    console.log();
////                    console.log( name + " has “ +  action + “ the chat!");
//                };
//
//                myEvent.onerror = function(event) {
//                    console.log("SSE onerror " + event);
//                }
//
//                myEvent.onopen = function() {
//                    console.log("SSE onopen");
//                }
            }

            $("#convert").on("click", function () {
                convertSse();
            });
        });
    </script>
</head>
<body>
<h1> Conversion nombres décimaux en nombres romains </h1>
<form method="get" name="sse" action="" >
    <p>
        <label>
            Indiquez un nombre entre 1 et 100 :
            <br />
            <input id="nombreD" name="nombreD" type="number" min="1" max="100" />
        </label>
        <input type="button" value="Convertir" id="convert"/>
    <p id="info"></p>
    </p>
</form>
</body>
</html>
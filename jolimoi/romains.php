<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Exercice : les chiffres romains (jolimoi)</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        jQuery(document).ready(function($) {

            function convertAjax()
            {
                var inputNumber = $("#nombreD").val();
                $.ajax({
                    url: 'convert.php',
                    data: {
                        nombreD: inputNumber
                    },
                    error: function () {
                        $('#info').html('<p>An error has occurred</p>');
                    },
                    dataType: 'json',
                    success: function (data) {
//                        console.log(data);
                        $('#info').empty();
                        $('#info')
                            .append(" Nombre décimal : "+inputNumber)
                            .append(" - Nombre romain : "+data);
                    },
                    type: 'POST'
                });
            }

            $("#convert").on("click", function () {
                convertAjax();
            });
        });
    </script>
</head>
<body>
<h1> Conversion nombres décimaux en nombres romains </h1>
<form method="post" name="ajax" action="" >
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
    .alert{
        display: none;
        padding: 5px;
        color: red;
    }
    .results{
        display: none;
    }
</style>

    <div class="alert"></div>

    <div class="list">
        <label for="">Adınız</label>
        <input type="text" id="namee" name="namee">
    </div>
    <br>
    <div class="list">
        <label for="">Soydınız</label>
        <input type="text" id="surname" name="surname">
    </div>
    <br>
    <div class="list">
        <label for="">Mesajınız</label>
        <input type="text" id="messagee" name="messagee">
    </div>
    <br>
    <div class="list">
        <button class="veriGonder" id="veriGonder">Verimi Gönder</button>
    </div>
<br>

    <div class="results">
       
    </div>

    <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js></script>
    <script>
        $(document).ready(function()
        {
           
            $("#veriGonder").click(function (){
            var namee = $("input[name=namee]").val();
            var surname = $("input[name=surname]").val();
            var messagee = $("input[name=messagee]").val();
                $.ajax({
                    url: "ekle.php?mode=insert",
                    type: "POST",
                    data: {
                        'namee':namee,
                        'surname':surname,
                        'messagee':messagee
                    },
                   success: function(result)
                    {   
                        $("input[name=namee]").val("");
                        $("input[name=surname]").val("");
                        $("input[name=messagee]").val("");
                        $(".alert").show();
                        $(".alert").html(result);
                
                }});
            });
            function veriCek(){
                $.ajax({
                    url:"ekle.php?mode=get",
                    type:"POST",
                    success:function(result){
                        // display none kaldır
                        $(".results").show();
                        $(".results").html(result);
                    }
            });
            }

            setInterval(veriCek,1);

        });
       
    </script>
</body>
</html>
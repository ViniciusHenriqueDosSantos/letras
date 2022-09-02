<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <title>Lyrics</title>

        
    </head>
    <script>
    </script>
    <body class="">
    <?php session_start(); 
    if (!isset($_COOKIE['linkLetras'])) {
        $_COOKIE['linkLetras'] = "https://www.letras.mus.br/the-smiths/37052/";

    }

?>
    <form method="GET" class="container col-lg-6 col-sm-12 col-md-12 bg-white pt-xl-5  pb-xl-5 pl-xl-3 pr-xl-3  ">
        <div class="mb-3  ">
            <p class="text-center fs-3"  ><label for="nome_musica" class="form-label ">Nome da Música: </label></p>
            <input type="text" class="form-control" name="nome_musica" id="nome_musica" value = "<?php
            
            if(isset($_GET['nome_musica'])){
                
                echo $_GET['nome_musica']; 
            
            }
            
            
            
            
            ?>">
        </div>
        <div class="form-check">
            <input class="form-check-input" <?php
            
            if(isset($_GET['traducao'])){
                
                echo "checked"; 
            
            }
            
            
            
            
            ?> name="traducao" id="traducao" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            Tradução: 
        </label>
</div>
        <div class="col-6 mx-auto"><button type="submit"  class="btn btn-primary col-12">PROCURAR</button></div>
    </form>
    <div style="background-color: #F0F0F0;" class="container col-lg-6 col-md-12 col-sm-10 " id="letra">
    <?php
    
    if (isset($_GET["nome_musica"])) {
     
        $nome_musica = $_GET['nome_musica'];
        if (empty($nome_musica) || ctype_space($nome_musica)) {
            echo '
            <div class="alert alert-danger">
              <strong>Calma!</strong> Insira o nome de uma música.
            </div>';
        }else {
            $nome_musica = str_replace(" ","+",$nome_musica);
            $google = file_get_contents( "https://www.google.com/search?q=".$nome_musica."letra");
            echo "<div id='placeholder' style='display:none;'>".$google."</div>";
            echo "
            <script>
              var letraDiv = document.getElementById('letra')
                var letra =document.getElementsByClassName('egMi0 kCrYT')
                var placeholder = document.getElementById('placeholder')


                </script>";
                if (!isset($_GET['traducao'])) {
                    
                
                echo "
                <script>

                for (let index = 0; index < letra.length; index++) {
                    var element = letra[index].children[0].getAttribute('href');
                    if (element.includes('www.letras.mus') && !element.includes('traducao') && element.split('/').length >= 7) {
                        var linkLetras = element
                        break
                    }
                }
                </script>";
            }else {
                echo "
                <script>

                for (let index = 0; index < letra.length; index++) {
                    var element = letra[index].children[0].getAttribute('href');
                    if (element.includes('www.letras.mus') && element.includes('traducao') && element.split('/').length >= 7) {
                        var linkLetras = element
                        break
                    }
                }
                if(linkLetras == null){
                    alert('Não existe uma tradução para essa música!')
                    window.location.href= window.location.href.split('&')[0] 

                }

                </script>";
            }
                echo "


                if(linkLetras == null){
                    window.location.href= window.location.href.split('?')[0] + 'erro'
                }
                </script>";

               echo "
            <script> 


                linkLetras = linkLetras.split('&')[0]
                linkLetras = linkLetras.split('=')[1]
                console.log(linkLetras)

                document.cookie = 'linkLetras' + '=' + linkLetras ;
                document.cookie = 'linkLetras' + '=' + linkLetras;
                console.log(document.cookie.split('linkLetras=')[1].split(';')[0])

             </script>";

             echo "<script>
             letraDiv.innerHTML = ''
         </script>";
         
         echo "<p id='validacao'>".$_COOKIE['linkLetras']."</p>";

        echo "<script>
        

var validacao = document.getElementById('validacao').innerText
letraDiv.innerHTML = ''

if (validacao != linkLetras) {
    window.location.href = window.location.href

}

        </script>";

             $linkLetras = file_get_contents ($_COOKIE['linkLetras']);

            
             echo "<script>
             letraDiv.innerHTML = ''
             
         </script>";
        echo $linkLetras;
        if (!isset($_GET['traducao'])) {

        echo "<script>

        var lyrics = document.getElementsByClassName('cnt-letra')[0].innerHTML
        var nome = document.getElementsByClassName('cnt-head_title')[0].innerText
    
        letraDiv.innerHTML = ''

         letraDiv. innerHTML = '<h3>'+nome+'</h3>'+lyrics

    </script>";
        }else {
            echo "<script>

        var lyricsR = document.getElementsByClassName('cnt-trad_r')[0].innerHTML
        var lyricsL = document.getElementsByClassName('cnt-trad_l')[0].innerHTML

        letraDiv.innerHTML = ''

         letraDiv. innerHTML = lyricsR+lyricsL

    </script>";
        }




        }
    }

    ?>

    </div>
    </body>
</html>

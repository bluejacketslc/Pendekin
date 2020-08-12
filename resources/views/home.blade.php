<!DOCTYPE html>
<html lang="en">
<head>
    @include('header')
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .header {
            background-color: rgb(255, 111, 97);
            padding: 10%;
            width: 100%;
            margin: 0;
            z-index: -1;
        }

        .shortener {
            z-index: 10;
            margin-top: -2%;
            position: absolute;
            width: 100%;
        }

    </style>
</head>
<body>
    @include('navbar')
    <div class="header">
        <div id="title" style="font-size: 36px; font-weight: bold; font-family: 'Montserrat Alternates', sans-serif;"
            class="text-white text-center">
            Persingkat URL website dengan 1 langkah!
        </div>
        <div id="subtitle" style="font-size: 20px; font-weight: bold; font-family: 'Montserrat Alternates', sans-serif;
        font-family: 'Nanum Gothic Coding', monospace;" class="text text-center">
            Permudah untuk saling berbagi link website dengan <i><b>Pendekin</b></i>
        </div>
    </div>
    <div class="shortener d-flex justify-content-center">
        <div class="from form-group col-md-6">
            <input type="text" placeholder="Link asal" style="height: 48px;" class="form-control input-lg"
                id="basic-url" aria-describedby="basic-addon3">
        </div>
        <div class="form-group col-md-2">
            <button type="button" class="btn btn-danger btn-lg" id="short">Pendekin</button>
        </div>
    </div>
    <div class="result m-5" style="display: none;">

    </div>
    <div class="footer fixed-bottom">
        <div class="footer-copyright text-center py-3">© <?= date('Y') ?> Developed by Haku 
        </div>
    </div>
    <script>
    eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$(\'#n\').o(p(){$(\'.1\').q();$(\'.1\').r("s","t");$.u({v:{\'X-w-x\':$(\'y[z="A-B"]\').C(\'D\')},d:"E",2:"/e",F:{\'2\':$(\'#G-2\').8(),\'d\':\'H\'}}).I((8)=>{$1=J.K(8);L($1.2!=M){f 5=`<6 g="3 3-N 9-h"i="3">O:<b>${$1.2}</b></6>`;$(\'.1\').j(5);$(\'.1\').k("a")}P{f 5=`<6 g="3 3-Q 9-h"i="3">R S!T U V 2</b></6>`;$(\'.1\').j(5);$(\'.1\').k("a");W(()=>{$(\'.1\').Y("a")},Z)}}).10(()=>{11.12("%c 13 14 15 e :(","9-16: 0 0 17 #7,0 0 l #7,0 0 m #7,0 0 18 #4,0 0 19 #4,0 0 1a #4,0 0 1b #4,0 0 1c #4;1d:l;1e-1f:m;1g:#7;1h:#1i")})});',62,81,'|result|url|alert|ff00de|template|div|fff|val|text|slow|||type|api|let|class|center|role|append|slideDown|20px|30px|short|click|function|empty|css|display|none|ajax|headers|CSRF|TOKEN|meta|name|csrf|token|attr|content|POST|data|basic|unmember|done|JSON|parse|if|null|success|Result|else|danger|Url|error|please|input|correct|setTimeout||slideUp|2000|fail|console|log|Failed|to|connect|shadow|10px|40px|70px|80px|100px|150px|padding|font|size|color|background|000'.split('|'),0,{}))
    </script>
</body>
</html>

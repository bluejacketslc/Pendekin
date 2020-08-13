<!DOCTYPE html>
<html lang="en">

<head>
    @include('header')
    <title>About</title>
    <style>
        .header {
            background-color: rgb(255, 111, 97);
            padding: 10%;
            width: 100%;
            margin: 0;
            z-index: -1;
        }

    </style>
</head>

<body>
    @include('navbar')
    <div class="header">
        <div id="title" style="font-size: 36px; font-weight: bold; font-family: 'Montserrat Alternates', sans-serif;"
            class="text-white text-center">
            Kenapa Pendekin?
        </div>
        <div id="subtitle" style="font-size: 20px; font-weight: bold; font-family: 'Montserrat Alternates', sans-serif;
        font-family: 'Nanum Gothic Coding', monospace;" class="text text-center">
            Pernah kah kalian merasa sulit untuk membagikan link kepada teman atau kerabat kalian sehingga <br>
            link tersebut terlihat sangat panjang?. Disitulah kalian bisa menggunakan <i>Pendekin</i> Untuk membantu<br> kalian. 
            Selain bisa kalian pangkas panjang Link nya, dengan fitur premium kalian bisa merename link tersebut menjadi hal yang bisa kalian ingat dengan mudah!.
        </div>
    </div>
    @include('footer');
</body>

</html>

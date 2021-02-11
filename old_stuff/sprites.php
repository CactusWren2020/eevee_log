<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            background: url("people.png");
            background-repeat: no-repeat;
            margin: 15px;
        }

        #first {
            background-position: -702px -48px;
            width: 409px;
            height: 302px;
            float: right;
        }

        #second {
            background-position: -144px -1224px;
            width: 516px;
            height: 319px;
            clear: both;
        }

        #third {
            background-position: -708px -433px;
            width: 405px;
            height: 313px;
            float: right;
        }
        .container {
            padding: 25px;
        }
        .headings {
            background: none;
            margin: 0;
            position: relative;
            right: -50vw;
            top: 2vh;
        }
    </style>
</head>

<body>
    <section class="container">
    <h1 style="margin-top: 50px">Sprite practice</h1>
    <p>Wherein sprites are used and deployed on the screen</p>
    <div id="first"></div>
    <div id="second">
        <div class="headings">
            <h2>stuff</h2>
            <p>subheading here</p>
            <p>more text</p>
        </div>
    </div>
  
    <div id="third"></div>
    <h1 style="margin-top: 50px">Sprite practice</h1>
    <p>Wherein sprites are used and deployed on the screen</p>
    </section>
</body>

</html>
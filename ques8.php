<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery Effects Demo</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #box {
            width: 200px;
            height: 200px;
            background-color: lightblue;
            margin: 20px auto;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            text-align: center;
        }

        .btn {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">jQuery Effects Demo</h1>
    <div id="box">Effect Box</div>
    <div style="text-align: center;">
        <button class="btn" id="hide">Hide</button>
        <button class="btn" id="show">Show</button>
        <button class="btn" id="toggle">Toggle</button>
        <button class="btn" id="fadeIn">Fade In</button>
        <button class="btn" id="fadeOut">Fade Out</button>
        <button class="btn" id="fadeToggle">Fade Toggle</button>
        <button class="btn" id="slideUp">Slide Up</button>
        <button class="btn" id="slideDown">Slide Down</button>
        <button class="btn" id="slideToggle">Slide Toggle</button>
        <button class="btn" id="animate">Animate</button>
    </div>

    <script>
        $(document).ready(function () {
            $("#hide").click(function () {
                $("#box").hide();
            });

            $("#show").click(function () {
                $("#box").show();
            });

            $("#toggle").click(function () {
                $("#box").toggle();
            });

            $("#fadeIn").click(function () {
                $("#box").fadeIn();
            });

            $("#fadeOut").click(function () {
                $("#box").fadeOut();
            });

            $("#fadeToggle").click(function () {
                $("#box").fadeToggle();
            });

            $("#slideUp").click(function () {
                $("#box").slideUp();
            });

            $("#slideDown").click(function () {
                $("#box").slideDown();
            });

            $("#slideToggle").click(function () {
                $("#box").slideToggle();
            });

            $("#animate").click(function () {
                $("#box").animate({
                    width: "300px",
                    height: "300px",
                    fontSize: "24px"
                }, 500).animate({
                    width: "200px",
                    height: "200px",
                    fontSize: "20px"
                }, 500);
            });
        });
    </script>
</body>
</html>

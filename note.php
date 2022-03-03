<!DOCTYPE html>
<html>
    <head>
        <title>note</title>
        <link rel="stylesheet" href="notation.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>

        <!-- Ratebar -->
        <div class="rate-bar">
            <i id="first" onmousemove="rate('first-star')" class='fa fa-star'></i>
            <i id="second" onmousemove="rate('second-star')" class='fa fa-star'></i>
            <i id="third" onmousemove="rate('third-star')" class='fa fa-star'></i>
            <i id="four" onmousemove="rate('four-star')" class='fa fa-star'></i>
            <i id="fifth" onmousemove="rate('fifth-star')" class='fa fa-star'></i>
        </div>

        <div onclick="rate('submit')" class="btn">
            <i class='fa fa-check'></i>
        </div>

        <!-- Script -->
        <script>

            var count_rate = 0

            function rate(starName) {


                var first = document.getElementById("first")
                var second = document.getElementById("second")
                var third = document.getElementById("third")
                var four = document.getElementById("four")
                var fifth = document.getElementById("fifth")

                if (starName == "first-star"){
                    first.style.color = "#56ab2f";
                    second.style.color = "";
                    third.style.color = "";
                    four.style.color = "";
                    fifth.style.color = ""
                    window.count_rate = 1
                }

                else if (starName == "second-star"){
                    first.style.color = "#56ab2f";
                    second.style.color = "#56ab2f";
                    third.style.color = "";
                    four.style.color = "";
                    fifth.style.color = "";
                    window.count_rate = 2
                }

                else if (starName == "third-star"){
                    first.style.color = "#56ab2f";
                    second.style.color = "#56ab2f";
                    third.style.color = "#56ab2f";
                    four.style.color = "";
                    fifth.style.color = "";
                    window.count_rate = 3
                }

                else if (starName == "four-star"){
                    first.style.color = "#56ab2f";
                    second.style.color = "#56ab2f";
                    third.style.color = "#56ab2f";
                    four.style.color = "#56ab2f";
                    fifth.style.color = "";
                    window.count_rate = 4
                }

                else if (starName == "fifth-star"){
                    first.style.color = "#56ab2f";
                    second.style.color = "#56ab2f";
                    third.style.color = "#56ab2f";
                    four.style.color = "#56ab2f";
                    fifth.style.color = "#56ab2f";
                    window.count_rate = 5
                }

                if (starName == "submit"){
                    alert("Thank you for gived me" +" "+ count_rate +" "+ "stars")
                }

            }

        </script>

    </body>
</html>

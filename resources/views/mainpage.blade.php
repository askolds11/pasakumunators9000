<!--  
Mainpage.blade.php
Fails ir dotā laravel projekta galvenā lapa, 
cauru kuru lietotājs var sasniegt un piekļūt 
pārējām projekta funkcijām.
-->

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="{{url('css/styles-mainpage.css')}}">
    <!-- GOOGLE FONT LINKS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">   
    <title>Pasākumunators9000</title>
</head>
<body>
    <header id="header-project-name">
        <p>Pasākumunators9000</p>
    </header>
  
    <nav id="navbar">
        
        <ul class="nav-links">
            <li><a href="">JAUNUMI</a></li> <!-- Ved uz jaunumi *****tehniski, šī pati lapa -->
            <li><a href="">FILTRĒT</a></li></li> <!-- Ved uz filtrēšanas lapu, proti, lapa, kurā lietotājs būs spējīgs meklēt sev tīkamus  -->
            <li><a href="">REĢISTRĒTIES</a></li> <!-- Ved uz register lapu, kur lietotājs spēs reģistrēt sev jaunu pasākumu -->
            
        </ul>
        

        <button><a href="">LOGIN</a></button> <!-- Ved uz login page -->
    </nav>
  
    
    <section id="pasakums-preview">
        <h3 id="tituls-pasakums">TITULS</h3>
            <div id="saturs-par-pasakumu">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat dicta temporibus porro nihil? Praesentium voluptas ad debitis, nisi amet doloremque molestiae dolore est dicta quis sapiente ratione vitae adipisci assumenda. Sequi officiis odit voluptatem inventore unde nobis quos odio? Magnam corrupti praesentium mollitia ab voluptatum fugit facere tempore obcaecati! Facere praesentium qui beatae quidem maxime voluptatibus ducimus minus possimus, vel repellat magni blanditiis nostrum aliquid! Alias doloremque esse eveniet reprehenderit, rerum minima in laudantium error cumque, laborum porro eaque omnis provident itaque, beatae quis distinctio fugiat dolores qui quod illo. Molestias officiis ex modi. Voluptate similique sint laudantium distinctio eveniet perspiciatis porro quae. Consequuntur modi aliquid quas autem officia, alias dolores dolor. Enim assumenda deserunt earum at in voluptas nisi itaque beatae ipsa animi, veritatis cumque, quas cupiditate numquam quia illo esse deleniti doloribus? Consequuntur, doloremque. Ut aspernatur velit dignissimos quia blanditiis maxime quos maiores nam fuga, assumenda, ipsam qui itaque quidem commodi. Iusto quod fugiat magnam, commodi possimus hic, numquam autem incidunt temporibus nihil sequi, eos consequatur eveniet placeat iste molestiae? Eius distinctio porro aut veritatis dolore ipsa qui doloribus voluptates, vitae quos odio cumque aliquam quis omnis possimus necessitatibus mollitia consequuntur dicta voluptatibus, delectus odit, soluta ad nisi.

                </p>
                <button id="atteli-button">Attēli</button> <!-- Parādītu attēlus dotajam projektam -->
            </div>
    
    </section>
    <section id="komentari">
        <h3 id="tituls-komentari">KOMENTĀRI</h3>
        <div id="saturs-par-komentariem">
            <ul>
                <li>1.komentars</li>
                <li>1.komentars</li>
                <li>1.komentars</li>
            </ul>
        </div>
    </section>
    
    

    <!-- <section>
        <h3>About</h3>
        <p>Šīs lapas doma jada jada jada jada</p>
        <p>vrbt links uz mūsu darba aprakstu</p>
        <ul>
            <li>1. feature</li>
            <li>2. feature</li>
            <li>3. feature</li>

        </ul>
        <p>Best wishes!</p>
    </section> -->

    <footer id="footer">
        <p>Veidoja: Askolds Bērziņš, Johans Justs Eris, Aleksejs Romaņuks</p>
        <p>&copy Copyright AskoldsJustsAleksejs inc.</p>
    </footer>
</body>
</html>
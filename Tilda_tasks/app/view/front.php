<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>tilda Tasks</title>
</head>
<body class="wrapper">

   <header class="header">
      <div class="header__body container">
         <?php if($_SESSION['notFind']) :?>
         <p class="header__text">
            В вашем регионе еще пока нет нашего офиса. Поэтому звоните по телефону головного офиса: 
            <a href="tel:<?=$_SESSION['hrefTel'];?>"><?=$_SESSION['telephone'];?></a>
         </p>
         <?php else :?>
            <p class="header__text">
            Ваш регион: <?=$_SESSION['regionName'];?>поэтому звоните по телефону: 
            <a href="tel:<?=$_SESSION['hrefTel'];?>"><?=$_SESSION['telephone'];?></a>
         </p>
         <?php endif;?>
      </div>
   </header>

   <main class="content">

   А тут какое-то наполнение сайта
   </main>

   <footer class="footer">
   <div class="footer__body container">
         <?php if($_SESSION['notFind']) :?>
         <p class="footer__text">
            В вашем регионе еще пока нет нашего офиса. Поэтому звоните по телефону головного офиса: 
            <a href="tel:<?=$_SESSION['hrefTel'];?>"><?=$_SESSION['telephone'];?></a>
         </p>
         <?php else :?>
            <p class="footer__text">
            Ваш регион: <?=$_SESSION['regionName'];?>поэтому звоните по телефону: 
            <a href="tel:<?=$_SESSION['hrefTel'];?>"><?=$_SESSION['telephone'];?></a>
         </p>
         <?php endif;?>
      </div>
   </footer>
</body>
</html>
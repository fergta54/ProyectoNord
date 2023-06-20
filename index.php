<?php
session_start();
// $usuario = $_SESSION['usuario'];
$usuario = null;
$varRol = null;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NORDSTERN</title>
    <link rel="stylesheet" href="./recursos/css/pagPrincipal.css">
    <link rel="stylesheet" href="./recursos/css/cabecera.css">
    <link rel="stylesheet" href="./recursos/css/index.css">
    <link rel="stylesheet" href="./recursos/css/bootstrap.min.css">
   
    <script src="./recursos/js/jquery-3.7.0.min.js"></script>
    <script src="./recursos/js/bootstrap.min.js"></script>
    <style>
        @import url('http://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');
    .nav-item {
    margin-right: 10px;
    }
    *{
        margin:0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

section{
    position:relative;
    width: 100%;
    min-height: 100vh;
    padding: 100px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #F7F3E8;
}
.content{
    position: relative; 
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.content .textBox{
    position: relative;
    max-width: 600px;

}
.content .textBox h2{
    color: #333;
    font-size: 4em;
    line-height: 1.4em;
    font-weight: 500;
}
.span{
    color: #F47A1A;
    font-size: 1.2em;
    font-weight: 700;
}
.content .textBox p{
    color:#333;
}
.content .textBox a{
    display: inline-block;
    margin-top: 20px;
    padding: 8px 20px;
    background: #F47A1A;
    color:#fff;
    border-radius: 40px;
    font-weight: 500;
    letter-spacing: 1px;
    text-decoration: none;
}
.content .textBox a:hover{
    background: #333333;
}
.content .imgBox{
    width: 600px;
    height: 400px;
    display: flex;
    justify-content: flex-end;
    padding-right: 50px;
    margin-top: 50px;

}
.content .imgBox img{
    max-width: 100%;
}

    </style>
</head>


<body>


<?php include('./incluir/navVentas.php'); ?>


<section>
        <section>
        <div class="content">
            <div class="textBox">
                <h2>sdf sdf sdf sdfsds <br>sdff <span class="span">NORDSTERN</span></h2>
                <p>sadfsadfsadfsadfasdfsadfklafjdlsjflsdfjlsdjflskjflskdjflsdlfjkdslfjsdf
                    sadfasdfsadñlkfjsaldkfjldskjflsjfklsdjfklsjdfklsjdfklsdjflksdjflksdjfl
                    sdfjsdkjfskdjfsldjflsdjfklsdjflksdjflksdjfkdsjflksdjkfsdjiejoihtwoi.
                </p>
                <a href="#">Comprar</a>
            </div>
            <div class="imgBox">
                <img src="./recursos/img/routerC.png" class="persona">
            </div>
        </div>
        <!-- <ul class="thumb">
            <li><img src="./recursos/img/switchC.png" alt=""></li>
            <li><img src="./recursos/img/cableC.png" alt=""></li>
            <li><img src="./recursos/img/laptop3C.png" alt=""></li>
            <li><img src="./recursos/img/firewallC.png" alt=""></li>
        </ul> -->
      </section>   
      
</body>
<?php include('../incluir/footer.php'); ?>
</html>
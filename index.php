<?php
//session_start();
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
/* 
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
.content .imgBoxa{
    width: 600px;
    height: 400px;
    display: flex;
    justify-content: flex-end;
    padding-right: 50px;
    margin-top: 50px;
    

}
.content .imgBoxa img{
    max-width: 100%;
} */
.banner{
    width:100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)), url('./recursos/img/CiscoProductPortfolio.jpg');
    background-size: cover;
    background-position:center;
}
.content2{
    width:100%;
    position:absolute;
    top:50%;
    transform: translateY(-50%);
    text-align:center;
    color:#fff;
}
.content2 .h1C{
    font-size: 70px;
    margin-top:80px;
    background:none;
    color:#fff;
}
.content2 p{
    margin:20px, auto;
    font-weight: 100;
    line-height: 25px;
}
.btnC{
    width:200px;
    height: 50px;
    padding: 15px, 0;
    text-align: center;
    margin: 20px, 10px;
    border-radius:25px;
    font-weight: bold;
    border: 2px, solid;
    border-color: orange;
    background: transparent;
    color: #fff;
    cursor: pointer;
}
.btnC:hover{
    background-color: orange;
    color: #fff;
}

    </style>
</head>


<body>
    
        


<?php include('./incluir/navVentas.php'); ?>


    <div class="banner">
    <!-- <section>

            <div class="content">
                <div class="textBox">
                    <h2>sdf sdf sdf sdfsds <br>sdff <span class="span">NORDSTERN</span></h2>
                    <p>sadfsadfsadfsadfasdfsadfklafjdlsjflsdfjlsdjflskjflskdjflsdlfjkdslfjsdf
                        sadfasdfsadñlkfjsaldkfjldskjflsjfklsdjfklsjdfklsjdfklsdjflksdjflksdjfl
                        sdfjsdkjfskdjfsldjflsdjfklsdjflksdjflksdjfkdsjflksdjkfsdjiejoihtwoi.
                    </p>
                    <a href="../gestionVentas/menuProd.php">Comprar</a>
                </div>
                <div class="imgBoxa">
                    <img src="./recursos/img/routerC.png" class="persona">
                </div>
            </div>
            <ul class="thumb">
                <li><img src="./recursos/img/switchC.png" alt=""></li>
                <li><img src="./recursos/img/cableC.png" alt=""></li>
                <li><img src="./recursos/img/laptop3C.png" alt=""></li>
                <li><img src="./recursos/img/firewallC.png" alt=""></li>
            </ul> 
        </section>   -->

    
    </div>
         
    <div class="content2">
        <h1 class="h1C">Diseña tus redes</h1>
        
        <p>Compra todos los producto necesarios para telecomunicaciones. <br> Registrate para comprar los mejores products de telecomunicaciones</p>
        
        <div>
            <button class="btnC" type="button">Comprar</button>
            <button class="btnC" type="button">Registrarse</button>
        </div>
    </div>

      
</body>
<?php include('./incluir/footer.php'); ?>
</html>
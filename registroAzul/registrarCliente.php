<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
    <link rel="stylesheet" href="../recursos/css/login.css">
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <link rel="stylesheet" href="../recursos/css/cabecera.css">

    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap');
*{
    font-family: 'Poppins' ,sans-serif;
}

.overlay {
    background-image: url("../recursos/img/fondoLogin.jpg");
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
    mix-blend-mode: normal;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 1200px;
    background-color: rgba(0, 0, 0, 0.8); /* Ajusta el último valor (0.5) para controlar la opacidad */
}

.overl{
    mix-blend-mode: normal;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 1200px;
    background-color: rgba(0, 0, 0, 0.8); 
}

.buttonSubmit{
    width: 100%;
    height: 40px;
    border-radius: 5px;
    background-color: black;
    color: white;
    border-color: white;
    
}

.buttonSubmit:hover{
    background-color: whitesmoke;
    color: black;
    transition-duration: 500ms;
    transition-delay: 25ms;
}

.boxLog{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 90vh;
    
    
}
.containerLog{
    width: 500px;
    display: flex;
    flex-direction: column;
    padding: 0 15px 0 15px;
    border-radius: 10px;
}
span{
    color: #fff;
    font-size: small;
    display: flex;
    justify-content: center;
    padding: 10px 0 10px 0;
}
header{
    color: #fff;
    font-size: 30px;
    display: flex;
    justify-content: center;
    padding: 10px 0 10px 0;
}
.input-field .input{
    height: 45px;
    width: 100%;
    border: none;
    border-radius: 10px;
    color: #fff;
    font-size: 15px;
    padding: 0 0 0 45px;
    background: rgba(255,255,255,0.1);
    outline: none;
    margin-bottom: 25px;
}
i{
    position: relative;
    top: -33px;
    left: 17px;
    color: #fff;
}
::-webkit-input-placeholder{
    color: #fff;
}
.submit{
    border: none;
    border-radius: 30px;
    font-size: 15px;
    height: 45px;
    outline: none;
    width: 100%;
    color: black;
    background: rgba(255,255,255,0.7);
    cursor: pointer;
    transition: .3s ;
}
.submit:hover{
    box-shadow: 1px 5px 7px 1px rgba(0, 0, 0, 0.2);
}
.two-col{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    color: #fff;
    font-size: small;
    margin-top: 10px;
}
.one{
    display: flex;
}
label a{
    text-decoration: none;
    color: #fff;
}
#anav{
    color: white;
}
#anav:hover{
    color: orange;
}
    </style>
</head>

<body>
    
    <!-- <form action="./validar.php" method="post">
        <h1>Ingrese credencial</h1>
        <p>Usuario <input type="text" placeholder="Ingrese su nombre" name="usuario"></p>
        <p>Contraseña <input type="password" placeholder="Ingrese su contraseña" name="contrasenia"></p>
        <input type="submit" value="Ingresar">
    </form> -->

    <div class="overlay">
        <!-- navbar -->
        <div class="overl">
        <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container px-4 px-lg-5">
                    <a class="navbar-brand" href="../index.php">
                        <img src="../recursos/img/lg.png" alt="logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a id="anav" class="nav-link text-light" href="../index.php">
                                    Inicio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="anav" class="nav-link" href="../servicios.php">
                                    Servicios
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="anav" class="nav-link" href="../gestionVentas/menuProd.php">
                                    Comprar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="anav" class="nav-link" href="../sucursales.php">
                                    Sucursales
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="anav" class="nav-link" href="../sobreNosotros.php">
                                    Sobre Nosotros
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="anav" class="nav-link" href="../contactanos.php">
                                    Contacto
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="anav" class="nav-link" href="../loginAzul/loginC.php">
                                    Log In
                                </a>
                            </li>
                            <li class="nav-item">
                            <a id="anav" class="nav-link" href="../registroAzul/registrarCliente.php">
                                    Sign Up
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
    <form action="./crearCliente.php" method="post">
        <h1>REGISTRO DE CLIENTES</h1>
        <div class="form-group">
            <label for="nombrecli" style="color:white">Nombre</label><br>
            <input name="nombrecli" class="form-control-lg w-100" id="nombrecli" type="text" required>
            <br><br>
            <label for="apellidocli" style="color:white">Apellido</label><br>
            <input name="apellidocli" class="form-control-lg w-100" id="apellidocli" type="text" required>
            <br><br>
            <label for="correocli" style="color:white">Correo</label><br>
            <input name="correocli" class="form-control-lg w-100" id="correocli" type="text" required>
            <br><br>
            <label for="direccioncli" style="color:white">Direccion</label><br>
            <input name="direccioncli" class="form-control-lg w-100" id="direccioncli" type="text" required>
            <br><br>
            <label for="telefonocli" style="color:white">Telefono</label><br>
            <input name="telefonocli" class="form-control-lg w-100" id="telefonocli" type="text" required>
            <br><br>
            <label for="contraseniacli" style="color:white">Contraseña</label><br>
            <input name="contraseniacli" class="form-control-lg w-100" id="contraseniacli" type="text" required>
            <br><br>                                     
                <label style="color:white">Foto de Perfil</label>
                <input type="file" accept="image/*" class="localCat" id="lgcli">
                <input name="lgcli" id="lgcli" type="hidden">
                <script>
                    const $file = document.querySelector(".localCat");
                    let url = "../recursos/img/sinfoto.jpg"
                    // ESTA FUNCION PERMITE CARGAR UNA FOTO POR DEFECTO 
                    const toDataURL = url => fetch(url)
                        .then(response => response.blob())
                        .then(blob => new Promise((resolve, reject) => {
                            const reader = new FileReader()
                            //reader.onloadend = () => resolve(reader.result)
                            reader.onloadend = () => {
                                const inpLogo = document.getElementById("lgcli");
                                inpLogo.value = reader.result;
                            }

                            reader.onerror = reject
                            reader.readAsDataURL(blob)
                        }))
                    toDataURL(url);

                    // ESTA FUNCION PERMITE DETECTAR CARGADO DE IMAGEN EN INPUT
                    // Y CARGARLA
                    $file.addEventListener("change", (event) => {
                        const selectedfile = event.target.files;
                        if (selectedfile.length > 0) {
                            const [imageFile] = selectedfile;
                            const fileReader = new FileReader();

                            fileReader.readAsDataURL(imageFile);

                            fileReader.onload = () => {
                                const srcData = fileReader.result;
                                console.log('base64: ', srcData);
                                inpLogo = document.getElementById("lgcli");
                                inpLogo.value = srcData;

                                // $.post('gestionProductos/registrarCategoria.php', {
                                //     variableLogo: srcData
                                // });
                                console.log('exito enviando');
                            };
                        }
                    })
                </script>
            </div>
            <br>
            <input type="submit" value="REGISTRATE"></input>
    </form>
    </div>
</body>
</html>

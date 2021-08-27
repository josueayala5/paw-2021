<?php

    function AccesoLogin($user, $passw)
    {
        $consultas = new Login();
        $data = $consultas->getDataUser($user);

        if($data)
        {
            foreach ($data AS $result)
            {
                $idusuario = $result['idusuario'];
                $hash = $result['clave'];
                $tipo = $result['tipo'];
                $estado = $result['estado'];
            }

            if($estado == 1)
            {
                if(password_verify($passw,$hash))
                {
                    if($tipo == 1) //vista de Administrador
                    {
                        $_SESSION["idusuario"] = $idusuario;
                        $_SESSION["user"] = $user;
                        $_SESSION["tipo"] = $tipo;
                        header("Location: ../views/admin/");
                    }
                    else
                    {
                        $_SESSION["idusuario"] = $idusuario;
                        $_SESSION["user"] = $user;
                        $_SESSION["tipo"] = $tipo;
                        header("Location: ../views/operador/");
                    }
                }
                else
                {
                    header("Location: ../index.php?msj=".base64_encode
                    ("Contraseña incorrecta ..."));
                }
            }
            else
            {
                header("Location: ../index.php?msj=".base64_encode
                ("El usuario no tiene permisos de acceso ..."));
            }
        }
        else
        {
            header("Location: ../index.php?msj=".base64_encode
            ("El usuario no existe ..."));
        }
        
    }


?>
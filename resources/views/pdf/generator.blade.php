<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{$proyecto->clave}}</title>
    <style>
        * {
            background-image: url("{{public_path()}}/img/membrete-itsta.png");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            background-size: 100%;
            margin: 0px;
        }

        h4 {
            text-align: center;
            text-transform: uppercase;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 16px;

        }

        h5 {
            text-align: center;
            text-transform: uppercase;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 81%;
            text-align: center;
            font-size: 12px;
        }

        td {
            border: 1px solid black;
            border-collapse: collapse;
            width: 50%;
            height: 1cm;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }

        p {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
    </style>
</head>
<body>
<br><br><br><br><br>
<h4><b>INSTITUTO TECNOLÓGICO SUPERIOR DE TANTOYUCA</b></h4>
<h5><b>SUBDIRECCIÓN DE POSGRADO E INVESTIGACIÓN</b></h5>
<br>
<hr style=" margin-left: 2cm; margin-right: 2cm; ">
<p style="text-align: right; margin-right: 2cm;  ">Oficio No. SPEI/{{$today}} <br> Asunto: <b>Registro de proyecto</b>
    <br> Tantoyuca
    Ver. {{$today2}} </p>
<div class="contenido">
    <p style="margin-left: 2cm;">
        <b> {{$proyecto->getResponsable->nombre}} {{$proyecto->getResponsable->apellidoP}} {{$proyecto->getResponsable->apellidoM}}
            <br> @php
                $type = $proyecto->colab_type;
                if($type ==1){
                    echo 'Estudiante';
                } else if ($type ==2){
                    echo 'Docente';
                } else {  echo 'Ingeniero';}
            @endphp
            <br> PRESENTE</b></p>
    <br>
    <p style="text-align: justify; margin-left: 2cm; margin-right: 2cm;"> Por este medio le informo que el proyeto
        titulado "<b>{{$proyecto->nombre}}"</b> cuyo objetivo
        es {{$proyecto->objetivos}}, en la descripción del proyecto {{$proyecto->descripcion}},el cual ha quedado
        registrado en el área de investigación con la siguiente información:</p>
    <br>
    <table style="margin-left: 2cm; margin-right: 2cm;   border: 1px solid black;
  border-collapse: collapse;">
        <tr>
            <td>Clave del proyecto:</td>
            <td>{{$proyecto->clave}}</td>
        </tr>
        <tr>
            <td>Programa educativo:</td>
            <td>{{$proyecto->programa}}</td>
        </tr>
        <tr>
            <td>Linea de investigación:</td>
            <td>{{$proyecto->linea}}</td>
        </tr>
        <tr>
            <td>Nombre de la licenciatura o Posgrado invlucrado:</td>
            <td>{{$proyecto->getCarerras->nombrecarrera}}</td>
        </tr>
        <tr>
            <td>Fecha de inicio:</td>
            <td>{{$proyecto->fechaInicio}}</td>
        </tr>
        <tr>
            <td>Clave del proyecto</td>
            <td>{{$proyecto->fechaFin}}</td>
        </tr>
        <tr>
            <td>Responsable del proyecto</td>
            <td>{{$proyecto->getResponsable->nombre}} {{$proyecto->getResponsable->apellidoP}} {{$proyecto->getResponsable->apellidoM}}
            </td>
        </tr>
        <tr>
            <td>Colaboradores:</td>
            <td>
                @foreach($infoColaborador as $colab)
                    @php
                        $type = $colab->getColaborador->colab_type;
                        $nombre = $colab->getColaborador->nombre;
                        $apellidoP = $colab->getColaborador->apellidoP;
                        $apellidoM = $colab->getColaborador->apellidoM;

                        if($type == 2 || $type == 3 ){
                            echo '<p>'.$nombre.' '.$apellidoP.' '.$apellidoM.'</p>';
                        }
                    @endphp
                @endforeach
            </td>
        </tr>
    </table>
    <br>
    <p style="text-align: justify; margin-left: 2cm; margin-right: 2cm;">
        Seguro de contar con la disposicion y profesionalismo en el cumplimiento de las actividades que estarán bajo su
        responsabilidad, hago propicia la ocasión para enviarle un cordial saludo
    </p>
    <br><br>
    <p style="text-align: right; margin-right: 2cm;  ">Atentamente <br>
        <br><br><br>
        <b>Dra. Maria Leonor Méndez Hernandez</b>
        <br>Subdirectora de Posgrado e Investigación
    </p>

</div>
</body>
</html>

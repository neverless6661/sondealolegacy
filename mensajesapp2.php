<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Alertas</title>
    <style type="text/css">
        body {
            background-color: #0658C9;
            padding-bottom:2rem;
        }
        
        .header img {
            max-width: 95%;
            padding: 0.3rem;
            max-height: 5rem;
        }
        
        table td {
            font-size: 0.8rem;
        }
        
        table td:nth-child(2n-1) {
            font-weight: bold;
        }
        
        .alerta {
            background-color: rgba(255, 0, 0, 0.2)!important;
        }
    </style>
</head>

<body class="p-2 min-vh-100 w-100">


    <div class="container-fluid">

        <div class="row bg-light" id="contenedor-alertas">

        </div>
    </div>


    <div class="modal fade" id="modal-carousel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Evidencias</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="carousel" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                        <div class="carousel-inner" id="inner-carousel">
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="spinner" style="display:none;z-index: 10000; position:fixed;top:0;left:0;min-width:100vw;min-height:100vh;background-color:rgba(255,255,255,0.7);">
			<div class="text-center" style="width:100%;min-height:100vh;display:flex;justify-content:center;">
				<img style="margin:auto;max-height:20px;" src="https://sondealo.com/sitio/images/loader.gif"/>
			</div>
	</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        const modalElem = document.getElementById('modal-carousel');
        const spinner = document.getElementById('spinner');
        const nextElem = document.querySelector('.carousel-control-next');

           
        document.addEventListener('click', function(e){
            if(e.target.classList.contains('evidencia')){
                showSlider(e.target);
            }
        });


        function showSlider(elem) {
            nextElem.style.display = 'inline';

            ev1 = elem.dataset.url1;
            ev2 = elem.dataset.url2;

            let html = '';
            html += '<div class="carousel-item active"> <img src = "' + ev1 + '" class = "d-block w-100"></div>';
            if (ev2 != '') {
                html += '<div class="carousel-item"> <img src = "' + ev2 + '" class = "d-block w-100"></div>';
            } else {
                nextElem.style.display = 'none';
            }

            document.getElementById('inner-carousel').innerHTML = html;
            var modal = new bootstrap.Modal(modalElem)

            modal.show();
        }

        document.addEventListener('DOMContentLoaded', getAlertas);

        function getAlertas() {

            spinner.style.display = 'inherit';

            fetch('https://sondealo.com/sitio/api/reporte-movil/alertas', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        'sucursal': '<?=$_GET["sucursal"]?>'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    spinner.style.display = 'none';
                    document.getElementById('contenedor-alertas').innerHTML = data.html;

                });
        }
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


</head>
<body>
    @yield('contenido')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.
       min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/
        7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    
    <script>
        const today = new Date();
        const maxDate = today.toISOString().split('T')[0];
         document.getElementById('fecha_compra').setAttribute('max', maxDate);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    document.getElementById("placa").addEventListener("input", function(event) {
        const placaInput = event.target;
        const placaValue = placaInput.value;
        const placaRegex = /^[A-Za-z]{3}\d{3}$/;

        if (!placaRegex.test(placaValue)) {
            placaInput.setCustomValidity("La placa debe tener 3 letras seguidas de 3 números");
            return;
        } else {
            placaInput.setCustomValidity("");
        }

        fetch("{{ route('vehiculos.verificarPlaca') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-Token": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ placa: placaValue })
        })
        .then(response => response.json())
        .then(data => {
            if (data.existe) {
                placaInput.setCustomValidity("Esta placa ya está registrada en el sistema.");
            } else {
                placaInput.setCustomValidity("");
            }
        })
        .catch(error => {
            console.error("Error en la verificación de placa:", error);
            placaInput.setCustomValidity("No se pudo verificar la placa. Intente nuevamente.");
        });
    });
</script>


</body>
</html>
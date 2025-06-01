document.getElementById('loginForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    try {
        const response = await fetch(this.action, {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if(result.success) {
            // Mostrar alerta de éxito antes de redireccionar
            await Swal.fire({
                icon: 'success',
                title: '¡Bienvenido!',
                text: 'Inicio de sesión exitoso',
                showConfirmButton: false,
                timer: 1500
            });
            
            window.location.href = result.redirect;
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: result.message,
                confirmButtonColor: '#2563eb',
            });
        }
    } catch (error) {
        console.error('Error during login:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ocurrió un error al conectar con el servidor',
            confirmButtonColor: '#2563eb',
        });
    }
});
console.log("¡Página cargada correctamente!");

// Cargar header y footer automáticamente
document.addEventListener('DOMContentLoaded', () => {
    const cargar = async (selector, archivo) => {
        const contenedor = document.querySelector(selector);
        if (contenedor) {
            const resp = await fetch(archivo);
            const html = await resp.text();
            contenedor.innerHTML = html;

            // Si es el header, conectar el botón después de insertarlo
            if (archivo === "header.html") {
                const toggleBtn = document.getElementById('menuToggle');
                const menu = document.getElementById('menu');
                toggleBtn?.addEventListener('click', () =>{
                    menu.classList.toggle('abierto');
                });
                const boton = document.getElementById('modoBtn');

                if (localStorage.getItem('modo') === 'oscuro') {
                    document.body.classList.add('dark-mode');
                }

                boton?.addEventListener('click', () => {
                    document.body.classList.toggle('dark-mode');
                    const modo = document.body.classList.contains('dark-mode') ? 'oscuro' : 'claro';
                    localStorage.setItem('modo', modo);
                });
            }
        }
    };

    cargar("header", "header.html");
    cargar("footer", "footer.html");
});

document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.menu-link');

    sections.forEach(section => {
        section.addEventListener('click', function(event) {
            event.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            window.scrollTo({
                top: targetSection.offsetTop,
                behavior: 'smooth'
            });
        });
    });

    const form = document.getElementById('reservaForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(form);
        fetch('enviar_reserva.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('confirmacao-reserva').style.display = 'block';
                form.reset();
            } else {
                alert('Erro ao enviar reserva. Tente novamente.');
            }
        });
    });
});

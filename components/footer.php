<!-- Modal -->
<div class="modal fade text-dark" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cookieModalLabel">Informacja o ciasteczkach</h5>
      </div>
      <div class="modal-body">
        Ta strona korzysta z ciasteczek, aby zapewnić najlepsze doświadczenie użytkownika. 
        Kontynuując przeglądanie, zgadzasz się na nasze <a href="#">politykę prywatności</a>.
      </div>
      <div class="modal-footer">
        <button id="closeButton" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
      </div>
    </div>
  </div>
</div>

<script src="/lib/jq.js"></script>
<script src="/lib/bootstrap.bundle.min.js"></script>
<script>

    //Zegar
    function updateClock() {
    const now = new Date();
    const year = now.getFullYear();
    const month = (now.getMonth() + 1).toString().padStart(2, '0');
    const day = now.getDate().toString().padStart(2, '0');
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    const dateString = `${day}-${month}-${year}`;
    const timeString = `${hours}:${minutes}:${seconds}`;
    document.getElementById('clock').innerText = `${dateString} ${timeString}`;
    }
    setInterval(updateClock, 1000);
    updateClock();
   
    //Scrollowanie w adminie
    $(document).ready(function() {
        $('.scroll-button').on('click', function() {
            var target = $(this).data('target');
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 1000);
        });
    });

    //Modal skrypt
    window.onload = function() {
        var cookieModal = new bootstrap.Modal(document.getElementById('cookieModal'));

        if (!localStorage.getItem('cookieModalShown')) {
            cookieModal.show();
            // Zamykanie modala po kliknięciu przycisku "Zamknij"
            var closeButton = document.getElementById('closeButton');
            closeButton.addEventListener('click', function() {
                cookieModal.hide();
            });
            localStorage.setItem('cookieModalShown', 'true');
        }
    };
</script>
</body>
</html>

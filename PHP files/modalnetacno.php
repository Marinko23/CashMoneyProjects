<div class="modal fade" id="netacnoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="netacnoModalLabel">Greška!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                E-mail ili lozinka nisu ispravno uneti!
            </div>
            <div class="modal-footer">
                <button type="button" class="dugme boja-2" data-bs-dismiss="modal">U redu</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#netacnoModal").modal("show");
})
</script>

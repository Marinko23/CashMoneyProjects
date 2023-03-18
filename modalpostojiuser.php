<div class="modal fade" id="postojiModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postojiModalLabel">Greška!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Korisnik sa unetim e-mailom već postoji!
            </div>
            <div class="modal-footer">
                <button type="button" class="dugme boja-2" data-bs-dismiss="modal">U redu</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#postojiModal").modal("show");
})
</script>
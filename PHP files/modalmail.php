<div class="modal fade" id="emailModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emailModalLabel">Greška!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Nepravilan unos e-maila!
            </div>
            <div class="modal-footer">
                <button type="button" class="dugme boja-2" data-bs-dismiss="modal">U redu</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#emailModal").modal("show");
})
</script>

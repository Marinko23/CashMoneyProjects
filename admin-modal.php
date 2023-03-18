<?php
require_once("./db.php");
?>
<div class="modal fade" id="glavniModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="glavniModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="glavniModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="dugme boja-2" data-bs-dismiss="modal">Zatvori</button>
            </div>
        </div>
    </div>
</div>
<script src="./js/admin.js"></script>
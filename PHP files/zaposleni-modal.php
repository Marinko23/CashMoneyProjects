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
<script>
    function izmeniStavku(id) {
        $.ajax({
            type:"POST",
            url:"zaposlenipost.php",
            data:{
                id: id,
            },
            dataType: 'json',
            success:function(data) {
                $("#glavniModalLabel").html("Stavka: <i>" + data.naziv + "</i>");
                let forma = $("<form class='forma-modal' action='izmeniStavkuZaposleni.php' method='post'>");
                forma.append("<input type='hidden' name='id' value='" + id + "'/>");
                forma.append("<label for='status'>Status</label>");
                forma.append(`<select name='status' id='modalSelect'>
                <option value='0'>Na čekanju</option>
                <option value='1'>U izradi</option>
                <option value='2'>Završeno</option></select>`);
                forma.append("<label for='komentar'>Komentar</label>");
                forma.append(`<textarea rows="10" name='komentar'>${data.komentari}</textarea>`);
                forma.append('<div></div>')
                forma.append(`<button class="dugme boja-1" style="width: 100%; margin:0;">Izmeni</button>`)
                $("#glavniModalBody").html(forma);
                $(`#modalSelect option[value='${data.status}']`).prop('selected', true);
                $("#glavniModal").modal("show");
            }
        })
    }
</script>

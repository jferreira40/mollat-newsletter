<div class="modal fade" tabindex="-1" style="display: none;" id="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation suppression</h5>
            </div>
            <div class="modal-body">
                <p>Voulez vous vraiment supprimer cet élément ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Annuler</button>
                <a href="" id="delete-url" class="btn btn-danger">Supprimer</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('#modal .btn-close').addEventListener('click', (el) => {
        el.target.closest('#modal').style.display = 'none'
    })
</script>

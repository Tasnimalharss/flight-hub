<div wire:ignore.self class="modal fade " id="delete_ticket_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Ticket</h5>
                <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mt-2">
                       <h3> Are you sure you want to delete this Ticket ? </h3>
                    </div>
                </div>
            </div>
        </form>
            <div class="modal-footer mt-3">
                <button wire:click="delete()" type="button" class="btn btn-success px-3 rounded-pill">Delete</button>
                <button id="close-delete-modal" type="button" class="btn btn-danger px-3 rounded-pill" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

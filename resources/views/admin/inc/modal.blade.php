

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="post" id="deleteForm">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@yield('modal_title')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">
                    Are You Sure Want to Delete this ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-text-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-text-danger">Yes ! 100% Sure</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_{{ $name }}_{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modal_{{ $name }}_{{ $id }}_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_{{ $name }}_{{ $id }}_label">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you want to delete ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>

                <!-- Button trigger modal -->
                <form method="POST" action="{{ URL::to($url.'/'.$id) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="Delete"  class="btn btn-danger" data-toggle="modal" data-target="#modal_{{ $name }}_{{ $id }}">
                </form>

        </div>
        </div>
    </div>
</div>

<div id="set-booking-user" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select user for booking</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="set-user-form">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Select user</label>
                        <select id="select-user" name="user_id" class="form-control" style="width: 100%;">
                            <option selected="selected" value="">-- Choose User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->user_id }}">{{ $user->matricID }} - {{ $user->fullName }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" id="submit-user" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

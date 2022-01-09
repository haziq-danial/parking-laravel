<div id="set-booking-date" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Set Booking Date</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('book-parking.get-booking-date') }}" method="post" id="set-date-form">
                    @csrf
                    <div class="form-group">
                        <label>Date Booking</label>
                        <div class="input-group date" id="date_booking" data-target-input="nearest">
                            <input type="text" name="date_booking" class="form-control datetimepicker-input" data-target="#date_booking"/>
                            <div class="input-group-append" data-target="#date_booking" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="event.preventDefault(); document.getElementById('set-date-form').submit()" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

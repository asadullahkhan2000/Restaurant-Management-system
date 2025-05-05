<div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
    <div class="">
        <h2 class="section-title mb-5">BOOK A TABLE</h2>

        <form method="POST" action="{{ route('book.store') }}">
            @csrf 

            <div class="row mb-5">
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="text" class="form-control form-control-lg custom-form-control" name="phone_number" placeholder="Phone Number" required>
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="number" class="form-control form-control-lg custom-form-control" name="number_of_guests" placeholder="NUMBER OF GUESTS" max="20" min="1" required>
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="time" class="form-control form-control-lg custom-form-control" name="time" required>
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="date" class="form-control form-control-lg custom-form-control" name="date" required>
                </div>
            </div>

            <input type="submit" class="btn btn-lg btn-primary" id="rounded-btn" value="Proceed to Payment">
        </form>
    </div>
</div>

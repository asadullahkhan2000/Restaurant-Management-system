<div class="container">
    <h2>Book a Table</h2>
    <form method="POST" action="{{ route('book.store') }}">
        @csrf
        <label>Phone Number:</label>
        <input type="text" name="phone_number" required>

        <label>Number of Guests:</label>
        <input type="number" name="number_of_guests" required min="1">

        <label>Time:</label>
        <input type="time" name="time" required>

        <label>Date:</label>
        <input type="date" name="date" required>

        <button type="submit">Proceed to Payment</button>
    </form>
</div>

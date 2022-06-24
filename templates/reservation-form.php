            <div class="reservation-info">
                <form class="reservation-form" method="POST">
                    <h2>Make a rerservation</h2>
                    <div class="field">
                        <input type="text" name="name" placeholder="Full Name" require>
                    </div>
                    <div class="field">
                        <input type="datetime-local" name="date" placeholder="Date" require>
                    </div>
                    <div class="field">
                        <input type="email" name="email" placeholder="E-Mail" require>
                    </div>
                    <div class="field">
                        <input type="tel" name="phone" placeholder="Phone Number" require>
                    </div>
                    <div class="field">
                        <textarea name="message" placeholder="Message" require></textarea>
                    </div>
                    <input type="submit" name="reservation_submit" class="button" value="Make Reservation">
                    <input type="hidden" name="hidden" value="1">
                </form>
            </div>
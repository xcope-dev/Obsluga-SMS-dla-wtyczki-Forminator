// SMS
// Dodajemy akcje do obsługi formularzy
add_action( 'forminator_form_submit_response', 'handle_form_submission', 10, 2 );
add_action( 'forminator_form_ajax_submit_response', 'handle_form_submission', 10, 2 );

function handle_form_submission($response, $form_id) {
    // Sprawdź, czy formularz o ID 634 został wysłany
    if( $form_id == 634 && $response['success'] == 1 ){
        // Logowanie całej odpowiedzi dla debugowania
        error_log('Form response: ' . print_r($response, true));

        // Przekazanie danych z $_POST dla debugowania
        error_log('POST data: ' . print_r($_POST, true));

        // Pobranie numeru telefonu
        $phone_number = isset($_POST['phone-1']) ? sanitize_text_field($_POST['phone-1']) : '';

        // Logowanie numeru telefonu
        error_log('Phone number: ' . $phone_number);

        // Sprawdź, czy numer telefonu został poprawnie przekazany
        if (!empty($phone_number)) {
            // Wyślij SMS tylko jeśli formularz o ID 634
            send_sms_after_form_submission($form_id, $phone_number);
        } else {
            error_log('Phone number is empty.');
        }
    }

    return $response;
}

function send_sms_after_form_submission($form_id, $phone_number) {
    $url = 'https://api2.serwersms.pl/messages/send_sms';
    $args = array(
        'body' => array(
            'username' => 'Twoj login w serwerSMS',
            'password' => 'Twoje hasło w serwerSMS',
            'phone' => $phone_number, // Numer telefonu od użytkownika
            'text' => 'Dziękujemy za zgłoszenie serwisowe. Szczegóły zostały przesłane na adres e-mail podany w formularzu.',
            'sender' => 'Tu wpisz swoją nazwę',
            'group_id' => 'Wpisz ID grupy' // ID grupy z panelu SerwerSMS
        )
    );

    $response = wp_remote_post( $url, $args );

    if ( is_wp_error( $response ) ) {
        error_log( 'SMS sending failed: ' . $response->get_error_message() );
    } else {
        error_log( 'SMS sent successfully: ' . wp_remote_retrieve_body( $response ) );
    }
}

<?php
if (!empty($_SESSION['message'])) {
    $type = $_SESSION['message_type'] ?? 'info'; // Default to 'info' if type is missing
    $message = $_SESSION['message'];

    echo <<<ALERT
    <div class="alert alert-$type alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        $message
    </div>
    <script>
        // Auto-hide after 10 seconds
        setTimeout(() => {
            const alert = document.getElementById('session-alert');
            if (alert) {
                const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                bsAlert.close();
            }
        }, 2000);
    </script>
    ALERT;

    // Clear the message after showing it
    // unset($_SESSION['message'], $_SESSION['message_type']);    
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}
?>

<?php
$errors = [];  
$message = [];  
if ($exception) {
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];

    if (get_class($exception) === 'ValidationException') {
        $errors = $exception->getErrors();
    }
}
$alertType = '';
if (isset($message['type'])) {
    if ($message['type'] === 'error') {
        $alertType = 'danger';
    } else {
        $alertType = 'success';
    }
}
?>
<?php if ($message): ?>
    <div role="alert" 
        class="my-3 alert alert-<?=$alertType?>">
        <?= isset($message['message']) == 1 ? $message['message'] : '' ?>
    </div>

<?php  endif ?>
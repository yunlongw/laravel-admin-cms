<?php
require __DIR__ . '/vendor/autoload.php';

$options = array(
    'cluster' => 'ap1',
    'useTLS' => true
);
$pusher = new Pusher\Pusher(
    'a939ab1344e21e91b1fa',
    '1520a176bc1346e7a463',
    '669830',
    $options
);

$data['message'] = 'hello world';
echo $pusher->trigger('my-channel', 'my-event', $data);
echo 2;

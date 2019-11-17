
<h3>Hello {!! $detail['email'] !!}</h3>

<p>Seseorang meminta untuk mengganti password 
    <br><br>
    Jika bukan tolong abaikan pesan ini,
    <br>
    Silahkan klik link dibawah untuk mengganti password
</p>
<?php

$id = $detail['id'];
$code = $detail['code'];
?>
<a href="{{ route('reminder.edit', ['id' => $id, 'code' =>
    $code]) }}" class="btn btn-primary">Click Me
</a>
<h2>Thanks</h2>


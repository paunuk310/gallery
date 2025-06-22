
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "nikita.litvinuk@list.ru";
    $subject = "Новый заказ билетов";

    $fname = htmlspecialchars($_POST["fname"]);
    $lname = htmlspecialchars($_POST["lname"]);
    $cname = htmlspecialchars($_POST["cname"]);
    $country = htmlspecialchars($_POST["country"]);
    $city = htmlspecialchars($_POST["cityy"]);
    $address = htmlspecialchars($_POST["address"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $tel = htmlspecialchars($_POST["tel"]);
    $note = htmlspecialchars($_POST["note"]);
    $quantity = intval($_POST["quantity"]);
    $payment = isset($_POST["payment"]) ? htmlspecialchars($_POST["payment"]) : "Не указано";

    $ticket_price = 700;
    $total = $ticket_price * $quantity;

    $message = "
Имя: $fname
Фамилия: $lname
Компания: $cname
Страна: $country
Город: $city
Адрес: $address

Email: $email
Телефон: $tel
Количество билетов: $quantity
Цена билета: $ticket_price ₽
Общая сумма: $total ₽
Способ оплаты: $payment

Примечание: $note
";

    $headers = "From: noreply@yourdomain.com
";
    $headers .= "Reply-To: $email
";
    $headers .= "Content-Type: text/plain; charset=UTF-8
";

    if (mail($to, $subject, $message, $headers)) {
        echo "Заказ успешно отправлен.";
    } else {
        echo "Ошибка при отправке заказа.";
    }
} else {
    echo "Метод не поддерживается.";
}
?>

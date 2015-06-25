<? 
// ----------------------------конфигурация-------------------------- // 
 
$adminemail="leodent@rambler.ru, paveldenysov@gmail.com, leodent.work@gmail.com";  // e-mail админа 

$email="leodent@rambler.ru, paveldenysov@gmail.com, leodent.work@gmail.com"; // почта пользователя по умолчанию  
 
$date=date("d.m.y"); // число.месяц.год  
 
$time=date("H:i"); // часы:минуты:секунды 
 
$backurl="/spasibo?utm_source=m.leo-dent.com.ua&utm_medium=%D0%97%D0%B0%D0%BF%D0%B8%D1%81%D1%8C%20%D0%BD%D0%B0%20%D0%BF%D1%80%D0%B8%D1%91%D0%BC&utm_campaign=%D0%BA%D0%BE%D0%BD%D0%B2%D0%B5%D1%80%D1%81%D0%B8%D1%8F&utm_content=%D0%A1%D0%BD%D1%8F%D1%82%D0%B8%D0%B5%20%D0%B7%D1%83%D0%B1%D0%BD%D1%8B%D1%85%20%D0%BE%D1%82%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B9";  // На какую страничку переходит после отправки письма 
 
//---------------------------------------------------------------------- // 
 
  
 
// Принимаем данные с формы 
 

   
$phone=$_POST['lead_phone'];

$name=$_POST['lead_name']; 

$vrach=$_POST['lead_vrach'];
  
$message=$_POST['lead_text'];
 
$msg=" 
Хочу на приём. Интересует $vrach 

Имя: $name
Телефон: $phone
Услуга: $vrach
Дата и время: $message 

Запишите меня пожалуйста на $message и перезвоните, если это время занято. 



---
заявка с мобильной версии сайта
"; 
 
  
 
 // Отправляем письмо админу  
 
mail("$adminemail", "$date $time [Запись на приём] $name на $message ", "$msg"); 
 
  
 
// Сохраняем в базу данных 
 
$f = fopen("message.txt", "a+"); 
 
fwrite($f," \n $date $time Заявка с формы 'Задать вопрос' от $phone"); 
 
fwrite($f,"\n $msg "); 
 
fwrite($f,"\n ---------------"); 
 
fclose($f); 
 
  
 
// Выводим сообщение пользователю   
 
print "<script language='Javascript'><!-- 
function reload() {location = \"$backurl\"}; setTimeout('reload()', 0); 
//--></script> 
";  
exit; 
 
 
 
?>
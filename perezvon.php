<? 
// ----------------------------конфигурация-------------------------- // 
 
$adminemail="leodent@rambler.ru, paveldenysov@gmail.com, leodent.work@gmail.com";  // e-mail админа 

$email="leodent@rambler.ru, paveldenysov@gmail.com, leodent.work@gmail.com"; // почта пользователя по умолчанию  
 
$date=date("d.m.y"); // число.месяц.год  
 
$time=date("H:i"); // часы:минуты:секунды 
 
$backurl="/spasibo/?utm_source=Обратный%20звонок&utm_medium=конверсия&utm_campaign=заявка";  // На какую страничку переходит после отправки письма 
 
//---------------------------------------------------------------------- // 
 
  
 
// Принимаем данные с формы 
 

   
$phone=$_POST['lead_phone'];

$name=$_POST['lead_name']; 

$type=$_POST['lead_type'];
  
$message=$_POST['lead_text'];
 
$msg=" 
Перезвоните мне пожалуйста!

Телефон: $phone

---
заявка с мобильной версии сайта
"; 
 
  
 
 // Отправляем письмо админу  
 
mail("$adminemail", "$date $time [Перезвон] Заказ звонка на $phone", "$message"); 
 
  
 
// Сохраняем в базу данных 
 
$f = fopen("message.txt", "a+"); 
 
fwrite($f," \n $date $time Заявка с формы 'Обратный звонок' от $phone"); 
 
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
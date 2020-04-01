<?php


$action = $_GET['action'] ?? 'index';
switch ($action) {
	case "create":
		$name = $_POST['name'];
		$price = (int) $_POST['price'];
		$model = $_POST['model'];
		$smth_else = $_POST['smth_else'];
		createEntity ($name, $price, $model, $smth_else);
		break;
	case "delete":
		deleteEntity();
		break;
	
	case "index": 
		 default:
		echo getTable();
		break;
}



function createEntity(string $name, int $price, string $model, string $smth_else)
{
file_put_contents("save_item.txt","name=$name,price=$price,model=$model,smth_else=$smth_else;", FILE_APPEND);

echo getTable();
}






/*function deleteEntity(){
	file_put_contents("save_item.txt", '');
}
*/






/*function getClearTable(): string
{
$html = "<form action='index.php?action=delete' method='POST'>
	<input type='text' name= 'name' placeholder= 'Введите наименование'>
	<input type='number' name= 'price' placeholder= 'Введите цену'>
	<input type='text' name= 'model' placeholder= 'укажите модель'>
	<input type='text' name= 'smth_else' placeholder= 'Описание'>
	<input type='submit' name= 'create'>
	<button name= 'delete'>Очистить всю таблицу</button>
	</form>";

	
	
	

$html .= "<table border='1'>
			<thead>
				<th>Наименование</th>
				<th>Цена</th>
				<th>Модель</th>
				<th>Еще что-то</th>
			</thead>
		<tbody>";

		foreach (getData() as $field => $value) {
			$html .= "<tr>";
			$html .= "<td>{$value ['name']}</td>";
			$html .= "<td>{$value ['price']}</td>";
			$html .= "<td>{$value ['model']}</td>";
			$html .= "<td>{$value ['smth_else']}</td>";
			$html .= "</tr>";

		}

$html .= "</tbody></table>";

return $html;

}


*/
























function getTable(): string
{
$html = "<form action='index.php?action=create' method='POST'>
	<input type='text' name= 'name' placeholder= 'Введите наименование'>
	<input type='number' name= 'price' placeholder= 'Введите цену'>
	<input type='text' name= 'model' placeholder= 'укажите модель'>
	<input type='text' name= 'smth_else' placeholder= 'Описание'>
	<input type='submit' name= 'create'>
	<button name= 'delete'>Очистить всю таблицу</button>
	</form>";

	
	
	

$html .= "<table border='1'>
			<thead>
				<th>Наименование</th>
				<th>Цена</th>
				<th>Модель</th>
				<th>Еще что-то</th>
			</thead>
		<tbody>";

		foreach (getData() as $field => $value) {
			$html .= "<tr>";
			$html .= "<td>{$value ['name']}</td>";
			$html .= "<td>{$value ['price']}</td>";
			$html .= "<td>{$value ['model']}</td>";
			$html .= "<td>{$value ['smth_else']}</td>";
			$html .= "</tr>";

		}

$html .= "</tbody></table>";

return $html;

}


function getData(): array
{
	$item = [];

	$itemStr = file_get_contents("save_item.txt");
	
	if (!$itemStr) {
		return  $item;
	}
	
	$itemPcs = explode(";", $itemStr);


	foreach ($itemPcs as $row) {
		if (!$row) {
			continue;
		}

		$itemTmp = explode(",", $row);

		$r = [];
		foreach ($itemTmp as $t) {
			list ($key, $value) = explode("=", $t);
			$r [$key] = $value;
		}


		$item [] = $r;
				
		
	}

	return $item;


}





























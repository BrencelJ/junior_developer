<?php
  include_once("dbConnection.php"); // Include MySQL login information

	// Initilize all variable
	$params = $columns = $totalRecords = $data = array();
	$params = $_REQUEST;

	// Define index of column
	$columns = array(
    0 => 'deals.ID',
		1 => 'deals.vehicleID',
		2 => 'deals.inhouseSellerID',
    3 => 'buyers.name',
    3 => 'buyers.surname',
    4 => 'deals.modelID',
    5 => 'deals.saleDate',
    6 => 'deals.buyDate'
	);

	$where = $sqlTot = $sqlRec = "";

	// Check search value exist
	if( !empty($params['search']['value']) ) {
		$where .=" WHERE ";
		$where .=" ( buyers.name LIKE '".$params['search']['value']."%' ";
		$where .=" OR buyers.surname LIKE '".$params['search']['value']."%' ";
		$where .=" OR deals.saleDate LIKE '".$params['search']['value']."%' )";
	}

	// Getting total number records without any search
	$sql = "SELECT deals.ID, deals.vehicleID, deals.inhouseSellerID, buyers.name, buyers.surname, deals.modelID, deals.saleDate, deals.buyDate FROM `deals` INNER JOIN `buyers` ON deals.buyerID=buyers.buyerID";
	$sqlTot .= $sql;
	$sqlRec .= $sql;

	// Concatenate search sql if value exist
	if(isset($where) && $where != '') {
		$sqlTot .= $where;
		$sqlRec .= $where;
	}

 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";
	$queryTot = $conn->query($sqlTot);
	$totalRecords = $queryTot->num_rows;
	$queryRecords = $conn->query($sqlRec);

  // Iterate on results row and create new index array of data
	while($row = $queryRecords->fetch_row()) { $data[] = $row; }

	$json_data = array(
			"draw"            => intval($params['draw']),
			"recordsTotal"    => intval($totalRecords),
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data  // Total data array
			);
	echo json_encode($json_data); // Send data as json format
?>

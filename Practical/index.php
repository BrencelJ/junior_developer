<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" charset="utf8" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
    <title>Car Dealership Overwiew</title>
  </head>
  <body>
    <div class="container">
      <div class="">
        <h1>Deals Preview</h1>
         <div class="">
           <table id="deals_grid" class="display" width="100%" cellspacing="0">
             <thead>
               <tr>
                <th>ID</th>
                <th>Vehicle</th>
                <th>Inhouse Seller</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Model</th>
                <th>Sale Date</th>
                <th>Buy Date</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Vehicle</th>
                <th>Inhouse Seller</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Model</th>
                <th>Sale Date</th>
                <th>Buy Date</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#deals_grid').DataTable({
    				  "bProcessing": true,
              "serverSide": true,
              "ajax":{
                url :"response.php", // Json datasource
                type: "post",  // Type of method  ,GET/POST/DELETE
                error: function(){
                  $("#deals_grid_processing").css("display","none");
                }
              }
        });
      });
    </script>
  </body>
</html>

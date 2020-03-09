<!DOCTYPE html>
<html><head>
<title>Report Table</title>
  <style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:600px;
      border-radius: 5px;
    }
 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
 
    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }
 
    thead th{
      text-align: left;
      padding: 10px;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }
 
    tbody tr:nth-child(even){
      background: #F6F5FA;
    }
 
    tbody tr:hover{
      background: #EAE9F5
    }
  </style>
  </head><body>
<center>
<h3>Data Uang Masuk BOP</h3>
              <table>
                <thead>
                <tr>
                  <th style="widows: 5%">No</th>
                  <th>Nominal</th>
                  <th>Tanggal Masuk</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                <?php foreach($bop as $data):?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= number_format($data->nominal) ?></td>
                        <td><?= $data->tanggal_masuk  ?></td>
                    </tr>
                <?php endforeach ;?>
                </tbody>
              </table>
</body></html>
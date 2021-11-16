<!DOCTYPE html>
<html lang="en">
<head>
  <title>COUNTRY DATA- APP</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>COUNTRY DATA</h2>
  <p>Send country info as attachment by EMAIL</p>
  <form method="POST" action="makePDF.php">
    <div class="row">
      <div class="col">
        <input type="text" class="form-control input-group-lg" placeholder="Country Name" name="CN">
      </div>
      <div class="col">
        <input type="text" class="form-control input-group-lg" placeholder="Country City" name="CC">
      </div>
    </div>
	<br>
	<div class="row">
      <div class="col">
        <input type="text" class="form-control input-group-lg" placeholder="Population" name="Population">
      </div>
    </div>
	<br>
	<div class="row">
		<div class="d-grid">
			<button type="submit" name="Luo_JA_Laheta_PDF" class="btn btn-primary btn-block">LUO JA LAHETA PDF</button>
		</div>
    </div>
  </form>
</div>

</body>
</html>

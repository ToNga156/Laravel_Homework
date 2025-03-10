<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <table class="table table-striped">
        <thead>
        <tr class="table-primary">
            <th class="table-primary" scope="col">id</th>
            <th class="table-primary" scope="col">name</th>
            <th class="table-primary" scope="col">avatar</th>
            <th class="table-primary" scope="col">createdAt</th>
        </tr>
        </thead>
        <tbody id="product">

        </tbody>
    </table>
</div>
<script type="module">
    let data = await fetch('http://127.0.0.1:8000/api/products');
    let jsonData = await data.json();
    console.log(jsonData);
    jsonData.forEach(data => {
        document.getElementById('product').innerHTML += `<tr>
      <td class="table-primary">${data.id}</td>
      <td class="table-primary">${data.name}</td>
      <td class="table-primary">${data.avatar}</td>
      <td class="table-primary">${data.createdAt}</td>
    </tr>`;
    })
</script>
</body>
</html>
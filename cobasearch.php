<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous">
    </script>
</head>

<body>
    <form action="" class="from-inline" id="form">
        <div class="form-control">
            <input type="text" name="key" id="key">
            <button type="submit" name="search" id="search">Cari</button>
        </div>

    </form>
    <div id="listbuku"></div>
</body>
<script>
    <?php
    require_once('koneksi.php');
    $query = "SELECT * FROM BUKU";
    $parsesql = oci_parse($conn, $query);
    $result = oci_execute($parsesql);

    ?>
    var formItem = document.getElementById("form");
    formItem.addEventListener("submit", function(e) {
        e.preventDefault();
        var keyword = document.getElementById("key").value;
        var filtered = [];
        for (var j = 0; j < items.length; j++) {
            if (items[j][1].toLocaleLowerCase().includes(keyword.toLocaleLowerCase())) {
                filtered.push(items[j]);
            }
        }
        //console.log(filtered);
        printItems(filtered);
    });
</script>

</html>
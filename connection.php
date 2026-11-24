<?PHP 
# Nama host
$nama_host="localhost";

# nama pengguna bagi akaun SQL
$username_SQL="root";

# katalaluan bagi akaun SQL
$password_SQL="";

# nama pangkalan data
$nama_DB="tempahan_homestay";

# kod untuk connection ke pangkalan data.
$condb=mysqli_connect($nama_host,$username_SQL,$password_SQL,$nama_DB);

?>
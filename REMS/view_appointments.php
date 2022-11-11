<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<?php
include 'includes/connect.php';

$id = $_GET['id'];

$query = "SELECT * FROM appointments WHERE ap_id = $id";
$run = mysqli_query($conn, $query);



if (mysqli_num_rows($run) > 0) {
    while ($row = mysqli_fetch_array($run)) {
        $property = $row['pr_id'];
        $ap_date = $row['ap_date'];
        $status = $row['ap_status'];
        $u_id = $row['u_id'];
        $ld_id = $row['ld_id'];

        $get_user = "SELECT u_firstname, u_lastname FROM users WHERE u_id = " . $u_id;
        $run_user = mysqli_query($conn, $get_user);
        $user = mysqli_fetch_array($run_user);

        $get_landlord = "SELECT ld_firstname, ld_lastname FROM landlords WHERE ld_id = " . $ld_id;
        $run_landlord = mysqli_query($conn, $get_landlord);
        $landlord = mysqli_fetch_array($run_landlord);
?>
<style>
    body {
        background: #272075;
    }

    .card {
        margin-left: 25vw;
        margin-right: 25vw;
        margin-top: 2em;
        padding: 4em;
    }
</style>

<body>
    <div class="card">
        <form action="" method="post">
            <div class="form-group">
                <label for="user">User Id</label>
                <input type="text" class="form-control" name="user" value="<?php echo $u_id; ?>" disabled>
            </div>
            <div class="form-group">
                <label for=username>User Name</label>
                <input type="text" class="form-control" name="username" value=<?php echo $user['u_firstname'] . ' ' .
            $user['u_lastname']; ?> disabled>
            </div>
            <div class="form-group">
                <label for="property">Property</label>
                <input type="text" class="form-control" name="property" id="property" value="<?php echo $property; ?>"
                    disabled>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="date">Appointment Date</label>
                    <input type="date" class="form-control" name="date" id="date" value="<?php echo $ap_date ?>"
                        disabled>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status" disabled>
                        <option value="1">Pending</option>
                        <option value="2">completed</option>
                        <option value="0">cancelled</option>
                    </select>
                </div>
                <div class="form-group" style="margin-top: 1em;">
                    <button type="submit" name="submit" class="btn btn-primary">Back</button>
                    <input type="submit" value="Back" class="btn btn-danger" name="back" style="margin-left:200px;"
                        onclick=goback()>
                </div>
        </form>
    </div>
    <script>
        function goback() {
            window.open('index.php?appointments');
        }
    </script>
</body>

<?php
    }
}

if (isset($_POST['submit'])) {
    header('Location: index.php?appointments');
}

?>